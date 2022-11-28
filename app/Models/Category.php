<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function products() {
        return $this->hasMany('App\Models\Product');  //указывает на связь модели Category с моделью Product как 1 ко многим 
                                                      //у одной категории может быть много продуктов
    }
}
