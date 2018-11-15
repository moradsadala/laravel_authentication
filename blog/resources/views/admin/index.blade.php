@extends('layouts.admin')

@section('content')
    
    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{Session:: get('info')}}</p>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('create_admin') }}" class="btn btn-outline-success">New Post</a>
            <a href="{{ route('delete_all_posts') }}" class="btn btn-outline-danger">Delete All</a>
        </div>
    </div>
    {{-- <hr>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('delete_all_posts') }}" class="btn btn-success">Delete All</a>
        </div>
    </div> --}}
    <hr>
    @foreach($posts as $post)
    <div class="row">
        <div class="col-md-12">
            <h2 class="post-title"> {{$post->title}}</h2>
            <p class="text-center">{{$post->content}}</p>
            <a href="{{route('post',['id' => $post->id ])}}"><span class="read-link">read more .. </span></a> 
            <div class="container mt-2">
                    <div class='row'>
                        <div class="col text-center">
                            @foreach ($post->tags as $tag)
                                <a class="btn btn-primary" href="#" role="button">{{$tag->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            <div class="container mt-2">
                <div class='row'>
                        <div class="col">
                            <a href="{{ route('edit_admin',['id'=> $post->id]) }}"class="btn btn-outline-primary post-link">Edit</a>
                        </div>
                        <div class="col">
                            <a href="{{ route('delete_admin',['id'=> $post->id]) }}"class="btn btn-outline-danger post-link">Delete</a>
                        </div>
                </div>
            </div>

            <hr>
        </div>
    </div>
   @endforeach
    {{-- <div class="row">
        <div class="col-md-12">
            <p><strong>Learning Laravel</strong> <a href="{{ route('edit_admin',['id'=>1]) }}">Edit</a></p>
        </div>
    </div> --}}
@endsection