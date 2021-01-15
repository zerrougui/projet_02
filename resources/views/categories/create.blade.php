@extends('layouts.app')

@section('content')
   
   <div style="background-color:silver; padding:40px">
     <h1 style="text-align:center;">{{ isset($categorie)? 'Update Categorie :': 'Ajouter Categorie :' }} </h1>
     <br/><br/><br/>

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
      <form action="{{ isset($categorie) ? route('categories.update',$categorie->id) : route('categories.store') }}" method="post">
          @csrf
          @if(isset($categorie))
              @method('PUT')
          @endif
          <div class="form-group">
              <label for="name"> <b>NOM DU CATEGORIES : </b></label>
              <input type="text" class="form-control" name="name" value="{{ isset($categorie)? $categorie->name :old('name') }}" />
          </div>
          <div class="list-group">
              <button type="submit" class="btn btn-success form-control">{{ isset($categorie) ? 'Update' : 'Ajouter' }}</button>
          </div>
      </form>
   </div>
@endsection