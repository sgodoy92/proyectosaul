<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'update_at'];
    //Retornar las relaciones
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Rel muchos a muchos
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //Rel uno a uno polimorica
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
