<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price'];
}
