<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;


class Product extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'tbl_mst_produk';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name_produk',
        'flowery_type_id',
        'product_type_id',
        'type_sales',
        'description',
        'created_at',
        'created_by',
        'updated_by',
        'updated_at',
    ];
}
