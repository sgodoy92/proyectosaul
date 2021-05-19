<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    //Regla de autorización para verificar si el usuario es el autor de un post
    //con esto evitamos que accedan al post y lo modifiquen
    public function author(User $user, Post $post){
        //si el usuario que esta intentando editar este post es el mismo que lo creo
        if($user->id == $post->user_id) {           
            return true;
        }else {
            return false;
        }
    }

    //Añadimos la siguiente linea para evitar que visualizen los borradores
    public function published(?User $user, Post $post){
        if($post->status == 2){
            return true;
        }else {
            return false;
        }  
    }

}
