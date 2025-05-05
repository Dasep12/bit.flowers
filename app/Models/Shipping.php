<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;


class Shipping extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'tbl_mst_pickup';
    protected $primaryKey = 'id';
    protected $fillable = [
        'place_name',
        'latitude',
        'latitude',
        'status',
        'is_deleted',
        'description',
        'created_at',
        'created_by',
        'updated_by',
        'updated_at',
    ];
}
