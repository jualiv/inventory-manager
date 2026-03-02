<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    // Esto le dice a Laravel: "Permito que estos campos se rellenen automáticamente"
    protected $fillable = ['name', 'description', 'price'];
}
