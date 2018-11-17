@extends('layouts.master')

@section('content')
    @include('includes.errors')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('create_admin') }}" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <input type="text" class="form-control" id="content" name="content">
                </div>
                @foreach($tags as $tag)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{$tag->id}}" name="tags[]" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                        {{$tag->name}}
                        </label>
                    </div>
                @endforeach
                    {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection