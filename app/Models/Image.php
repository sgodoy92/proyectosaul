<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['url'];
    //Rel Polimorfica

    //Las relaciones polimórficas nos permiten implementar ese comportamiento común 
    //(la capacidad de tener asociadas imágenes) una vez y reutilizar todo para todos los modelos que tengan ese comportamiento.
    public function imageable(){
        return $this->morphTo();
    }
}
