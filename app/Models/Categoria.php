<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    /*Dentro de este array se pueden especificar cuáles de los campos de la tabla pueden ser llenados 
    con asignación masiva (que es el caso cuando enviamos un formulario creando un array 
    asociativo para ser guardado).*/


    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName(){
        return "slug";
    }

    //Relacion uno a muchos
    public function posts(){
    //Retorna
        return $this->HasMany(Post::class);
    }
}
