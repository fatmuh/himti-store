<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'image',
        'price',
        'stock',
    ];

    protected $hidden;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function cart()
    {
        return $this->hasOne(Transaction::class, 'product_id');
    }
    public function detail_transaction(){
        return $this->hasMany(TransactionDetail::class);
    }

}
