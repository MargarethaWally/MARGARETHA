<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class namaModel extends Model
{
    protected $table = "products";
    protected $fillable = ['name', 'price'];
}
