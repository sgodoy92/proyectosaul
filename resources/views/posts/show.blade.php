<x-app-layout>
<div class="container py-8">
    <h1 class="text-4xl font-bold text-gray-600">{{$post->name}}</h1>

    <div class="text-lg text-gray-500 mb-2">
        {!!$post->extract!!}
    </div>
<!-- 3 COLUMNAS -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Contenido principal -->
<div class="lg:col-span-2">
    <figure>
        <!-- Ancho y alto fijo -->
            @if($post->image)
            <img class="w-full h-72 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
            @else
            <img class="w-full h-72 object-cover object-center" src="https://cdn.pixabay.com/photo/2018/08/21/23/29/fog-3622519_960_720.jpg" alt="">
            @endif    </figure>

    <div class="text-base text-gray-500 mt-4">
         <!-- Retornamos contenido campo body -->
        {!!$post->body!!}

    </div>
</div>

    <aside>
        <h1 class="text-2xl font-bold text-gray-600 mb-4">Más en {{$post->categoria->name}}</h1>

        <ul>
            @foreach($similares as $similar)
                <li class="mb-4">
                    <a href="{{route('posts.show', $similar)}}" class="flex">
                        @if ($similar->image)
                        <img class="w-30 h-20 object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt="">

                        @else
                        <img class="w-30 h-20 object-cover object-center" src="https://cdn.pixabay.com/photo/2018/08/21/23/29/fog-3622519_960_720.jpg" alt="">

                        @endif
                        <span class="ml-2 text-gray-600">{{$similar->name}}</span>
                         </a>
                </li>
                
            @endforeach

        </ul>
    </aside>

</div>
</div>

</x-app-layout>