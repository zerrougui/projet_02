@extends('layouts.app');

@section('content')
    <div style="text-align:center; background-color:silver; padding:40px">
        <h1> Categogie  {{ $categorie->id }} : </h1>
            <br/> <br/> 
        <h2> {{ $categorie->name }} </h2>
    <div>

@endsection