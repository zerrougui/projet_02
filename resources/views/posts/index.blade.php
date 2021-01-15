@extends('layouts.app')

@section('content')
    <h2> All Posts : </h2>
    @if(session()->has('success'))
        <div class="alert alert-success">
            <p class="lead">{{ session()->get('success') }}</p>
        </div>
    @endif
    <a href="{{route('posts.create')}}" class="btn btn-success  float-right ">New Post</a>
    <br/><br/>
    <table class="table table-info">
        <thead>
           <tr>
                <th> Image</th>  <th >Title</th> <th> Action</th>
           </tr>
        </thead>
        <tbody>
           @forelse($posts as $post)
               <tr>
                   <td><img src="{{ asset('storage/'.$post->image) }}" width="180" height="80"/></td>
                   <td>{{ $post->title }}</td>
                   <td>
                       <form  action="{{route('posts.destroy',$post->id)}}" method="post" class="float-right">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-danger ml-3">{{ $post->trashed() ? 'delete':'trash' }}</button>
                       </form>
                       <a href="" class="btn btn-secondary float-right ml-3 ">Show</a>

                       <a href="{{ $post->trashed() ?  route('posts.restore',$post->id):route('posts.edit',$post->id) }}" class="btn btn-primary float-right  ">
                           {{ $post->trashed() ? 'restore':'edit' }}</a>
                   </td>
               </tr>
           @empty
               <tr>
                   <td colspan="3" ><p class="lead text-center py-5">aucun post trouvé !</p></td>
               </tr>

           @endforelse
        </tbody>
    </table>
@endsection