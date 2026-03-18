<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayMode extends Model
{
    use HasFactory;

    protected $table = 'pay_mode';
    protected $fillable = [
        'name',
        'observation',
    ];
    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'pay_mode_id');
    }
}