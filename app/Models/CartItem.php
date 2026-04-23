<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cart_items';

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        'price',
        'total',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
