<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    //Se ejecuta antes de que cree el post
    public function creating(Post $post)
    {
        // Asigna el post creado con el usuario con el usuario que lo crea
        //porque si no otro usuario podria modificar su post
        if(! \App::runningInConsole()){
        $post->user_id = auth()->user()->id;
        }
    }


    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleting(Post $post)
    {
        if($post->image){
            Storage::delete($post->image->url);
        }
    }


}
