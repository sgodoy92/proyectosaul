<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /** Si coincide el usuario lo que pone en campo id con el usuario auth permite ejecutar la accion */
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {       

        //Para crear un registro funciona esta regla de validación   
           $rules = [
           'name' => 'required',
           //'user_id' => 'required',
           'slug' => 'required|unique:posts',          
           'status' => 'required|in:1,2',
           'file' => 'image'
           
        ];


        //Para editar un registro funciona esta regla de validación
        $post= $this->route()->parameter('post');
        if($post){
            $rules['slug'] = 'required|unique:posts,slug,' . $post->id;
        }

        //Cuando sea publicado se le aplica regla de validacion para los campos
        if($this->status == 2){
            $rules = array_merge($rules,[
                'categoria_id' => 'required',
                'tags' => 'required',
                'extract' => 'required',
                'body' => 'required'
            ]);
        }

        return $rules;
    }
}
