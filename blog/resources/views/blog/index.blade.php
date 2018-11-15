@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="quote">The Beautiful Laravel </h1>
            <hr>
        </div>
    </div>
    
    @foreach($posts as $post)
    <div class="row">
        <div class="col-md-12">
            <h2 class="post-title"> {{$post->title}}</h2>
            <p class="text-center">{{$post->content}}</p>
            <a href="{{route('post',['id' => $post->id ])}}"><span class="read-link text-center">read more .. </span></a>
            
            <div class="container">
                <div class='row'>
                    <div class="col text-center">
                        @foreach ($post->tags as $tag)
                            <a class="btn btn-primary" href="#" role="button">{{$tag->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            
            
            <hr>
        </div>
    </div>
   @endforeach
    <div class="row pagination">
        <div class="col-md-12">
           {{$posts->links()}}
       </div>
   </div>
    

@endsection
{{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
    {{--<h1 class="quote">Hi From Welcome Page</h1>--}}
    {{--<hr>--}}
    {{--<h2 class="post-title">Control Structures</h2>--}}
    {{--@php($array = ['Tea','Milk','Sugar','Water'])          How to define variables in php in your view (not recommended)--}}
    {{--<ul>--}}
    {{--@foreach($array as $element)--}}
    {{--<li>{{$element}}</li>--}}
    {{--@endforeach--}}
    {{--</ul>--}}
    {{--<hr>--}}
    {{--<h2 class="post-title">XSS Protection</h2>--}}
    {{--{{ "<h1> HTML Code in view </h1> " }}--}}
    {{--{!! "<h3> HTML Code in view </h3> " !!}--}}
    {{--</div>--}}
    {{--</div>--}}
