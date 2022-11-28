<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function categories() {                               
        return $this->belongsTo('App\Models\Category');      //указывает на связь модели Product с моделью Category как 1 к 1 
                                                             //продукт может принадлежать только одной категории
    }
}
