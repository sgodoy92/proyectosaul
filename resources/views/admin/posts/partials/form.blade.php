<div class="form-group">
        {!! Form::label('name', 'Nombre') !!}       
        {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'Ingrese el nombre del post']) !!}
        @error('name')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="form-group">
        {!! Form::label('slug', 'Slug') !!}
        {!! Form::text('slug', null, ['class' => 'form-control','placeholder'=>'Ingrese nombre de Slug', 'readonly']) !!}
        @error('slug')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('categoria_id', 'Categoria') !!}       
        {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control']) !!}

        @error('categoria_id')
            <small class="text-danger">{{$message}}</small>
        @enderror

    </div>

    <div class="form-group">
        <p class="font-weight-bold">Etiquetas</p>
        @foreach ($tags as $tag)

            <label class="mr-2">
                {!! Form::checkbox('tags[]', $tag->id, null) !!}
                {{$tag->name}}  
            </label>
    
        @endforeach    

        @error('tags')
        <br>
            <small class="text-danger">{{$message}}</small>
        @enderror

    </div>


    <div class="form-group">
        <p class="font-weight-bold">Estado</p>
            <label>
                {!! Form::radio('status', 1, true) !!}
                Borrador
            </label>

            <label>
                {!! Form::radio('status', 2) !!}
                Publicado
            </label>

        

        @error('status')
        <br>
            <small class="text-danger">{{$message}}</small>
        @enderror

    </div>

    <div class="row mb-3">
        <div class="col">
            <div class="img-wrapper">
            
                @if ($post->image)
                    <img id="picture" src="{{Storage::url($post->image->url)}}">

                @else
                    <img id="picture" src="https://cdn.pixabay.com/photo/2018/08/21/23/29/fog-3622519_960_720.jpg">
                @endif
            
            </div>
        </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se muestra en el post:') !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept'=>'image/*']) !!}

            @error('file')
            <small class="text-danger">{{$message}} </small>
            @enderror
        </div>


        
        <p>Subir imagen</p>
    </div>
    
    </div>

    <div class="form-group">
        {!! Form::label('extract', 'Extracto:') !!}
        {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}

        @error('extract')
            <small class="text-danger">{{$message}} </small>
        @enderror

    </div>

    <div class="form-group">
        {!! Form::label('body', 'Cuerpo del post:') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

        @error('body')
            <span class="text-danger">{{$message}}</span>
        @enderror

    </div>