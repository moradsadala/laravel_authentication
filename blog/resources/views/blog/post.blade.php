@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="quote">{{$post->title}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="text-center">{{$post->content}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="text-center">Likes {{count($post->likes)}} | <a href="{{route('post_like',['id'=>$post->id])}}">Like</a></p>
        </div>
    </div>
@endsection