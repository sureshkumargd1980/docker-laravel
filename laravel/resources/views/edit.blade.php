@extends('layouts.app')

@section('content')

<div class="main-content mt-5">
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h6>Edit Post</h6>
            </div>
            <div class="col-md-6 text-right" style="text-align:right;">
                <a href="{{ route('posts.index') }}" class="btn btn-success mx-1">All Posts</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form action="">
            <div class="form-group">
                <label for="" class="form-group">Name</label>
                <input type="text" class="text form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primary mt-3">Submit</button>
            </div>
        </form>
    </div>
</div>
</div>

@endsection
