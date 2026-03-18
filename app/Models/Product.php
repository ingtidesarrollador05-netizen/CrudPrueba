<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Nombre de la tabla según tu diagrama
    protected $table = 'products';

    // Campos que permitimos llenar (Mass Assignment)
    protected $fillable = [
        'name',
        'price',
        'stock',
        'category_id',
    ];

    /**
     * Relación: Un producto pertenece a una categoría.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}