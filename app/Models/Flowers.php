<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;


class Flowers extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'tbl_mst_flowers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name_flower',
        'category_id',
        'price',
        'images',
        'created_at',
        'created_by',
        'updated_by',
        'updated_at',
    ];
}
