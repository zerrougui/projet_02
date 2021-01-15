@extends('layouts.app')

@section('content')


    <div style="background-color:silver; padding:40px">
        <h1 class="h2" style="text-align:center;">{{ isset($post)? 'Update Post ': 'New Post ' }} </h1>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <ul>
                        <li>
                            {{ $error }}
                        </li>
                    </ul>
                @endforeach
            </div>
        @endif
        <form action="{{ isset($post) ? route('posts.update',$post->id) : route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($post))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="title"> <b>Title : </b></label>
                <input type="text" class="form-control" name="title" value="{{ isset($post)? $post->title :old('title') }}" />
            </div>
            <div class="form-group">
                <label for="descroption"> <b>Description : </b></label>
                <textarea rows="2" name="description" class="form-control"
                 placeholder="tape the description ...">{{ isset($post)? $post->description :old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="content"> <b>Content : </b></label>
                <textarea rows="4" name="content" class="form-control"
                 placeholder="tape the content ...">{{ isset($post)? $post->content :old('content') }}</textarea>
            </div>
            <div class="form-group">
                <label for="title"> <b>Image : </b></label>
                <input type="file" class="form-control-file" name="image" />
            </div>

            @if(isset($post))
                <div class="form-group">
                    <img  src="/storage/{{$post->image}}" width="100%" />
                </div>
            @endif


            <div class="list-group">
                <button type="submit" class="btn btn-success btn-lg form-control">{{ isset($post) ? 'Update' : 'Ajouter' }}</button>
            </div>
        </form>
    </div>

@endsection