@extends('app')

@section('content')

    <div class="container w-50 border p-4 mt-4">
        <form action="{{ route('posts') }}" method="POST">
            @csrf
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            @error('title')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror
            <div class="mb-3">
                <label for="title" class="form-label">Titulo de la publicacion</label>
                <input type="text" name="title" class="form-control">
            </div>
            <label for="category_id" class="form-label">Seleccione categoria</label>
            <select name="category_id" class="form-select">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary mt-3">Crear Publicacion</button>
            
        </form>
        <label for="posting" class="form-label mt-4">Publicaciones existentes: </label>
        <div class="mt-4">
            @foreach ($posts as $post)
                <div class="d-flex justify-content-between">
                    <div class="col-md-9">
                        <a href="{{ route('posts-edit', ['id' => $post->id]) }}">{{ $post->title }}</a>
                    </div>
                    <div>
                        <form action="{{ route('posts-destroy', [$post->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm mt-2">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection  
