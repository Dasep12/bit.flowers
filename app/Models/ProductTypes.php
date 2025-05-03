<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;


class ProductTypes extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'tbl_mst_producttype';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name_type',
        'remarks',
        'status',
        'created_at',
        'created_by',
        'updated_by',
        'updated_at',
    ];
}
