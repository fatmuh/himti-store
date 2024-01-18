<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $table = 'detail_transaction';
    protected $fillable = [
        'product_id',
        'transaction_id',
        'qty',
        'base_price',
        'base_total',
    ];

    protected $hidden;

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
