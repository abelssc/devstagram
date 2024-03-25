@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <x-listar-post :posts="$posts" />
@endsection