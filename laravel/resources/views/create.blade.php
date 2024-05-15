@extends('layouts.app')

@section('content')

<div class="main-content mt-5">

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h6>Create Post</h6>
            </div>
            <div class="col-md-6 text-right" style="text-align:right;">
                <a href="{{ route('posts.index') }}" class="btn btn-success mx-1">All Posts</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form action="{{route('posts.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="" class="form-group">Name</label>
                <input type="text" class="text form-control" name="first_name">
            </div>
            <div class="form-group">
                <button class="btn btn-primary mt-3">Submit</button>
            </div>
        </form>
    </div>
</div>
</div>

@endsection
