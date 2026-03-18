<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {
    protected $fillable = ['number', 'customer_id', 'date', 'pay_mode_id'];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function payMode() {
        return $this->belongsTo(PayMode::class, 'pay_mode_id');
    }

    public function details() {
        return $this->hasMany(Detail::class);
    }
}