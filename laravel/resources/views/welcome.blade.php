@extends('layouts.app')

@section('content')

<div class="main-content mt-5">
<div class="card mt-5">

    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h6>Welcome to Screening data</h6>
            </div>
            <div class="col-md-6 justify-content-end" style="text-align:right;">
                <a href="{{route('posts.create')}}" class="btn btn-success mx-1">Create</a>
            </div>
        </div>
    </div>

    <div class="card-body">
       <a class="btn btn-primary" href="{{route('posts.index')}}">All Posts</a>
    </div>
</div>
</div>

@endsection