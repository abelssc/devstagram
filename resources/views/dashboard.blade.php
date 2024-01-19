@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="flex flex-wrap">
        <div class="w-full md:w-6/12">
            <img src="{{asset('img/registrar.jpg')}}" alt="">
        </div>
        <div class="w-full md:w-6/12">
            {{ auth()->user()->username }}
        </div>
    </div>
@endsection