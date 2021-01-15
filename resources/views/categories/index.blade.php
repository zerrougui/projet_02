@extends('layouts.app')

@section('content')
   
   <div style="background-color:silver; padding:40px">
     <h1 style="text-align:center;"><b>All Category </b> </h1>

       @if(session()->has('success'))
           <div class="alert alert-success">
               <p class="lead"> {{ session()->get('success') }}</p>
           </div>
       @endif
     <br/>
     <a href="{{route('categories.create')}}" class="btn btn-success float-right " style="margin-right: 10px"> Ajouter Categorie</a>
     <br/> <br/>
     <ul style="padding: 10px">
        @forelse($categories as $categorie)
        <li class="list-group-item"  style="margin-bottom: 7px; padding-bottom: 22px" >
            {{ $categorie->id }} : {{ $categorie->name }}
             <form  action="{{ route('categories.destroy',$categorie->id) }}" method="post" class="float-right">
                 @method('DELETE')
                 @csrf
                 <button type="submit" class="btn btn-danger float-right" >suprimmer</button>
             </form>

             <a href="{{ route('categories.edit',$categorie->id) }}" class="btn btn-info float-right" style="margin-right: 7px">modifier</a>
             <a href="{{ route('categories.show',$categorie->id) }}" class="btn btn-secondary float-right" style="margin-right: 7px">show </a>
        </li>
        @empty
            <p class="lead">aucun category trouvé ! </p>
        @endforelse
     </ul>
   </div>
@endsection