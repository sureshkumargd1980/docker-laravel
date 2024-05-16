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
                <h6>Edit Post</h6>
            </div>
            <div class="col-md-6 text-right" style="text-align:right;">
                <a href="{{ route('posts.index') }}" class="btn btn-success mx-1">All Posts</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form action="{{route('posts.update', $post->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="" class="form-group">Name</label>
                <input type="text" class="text form-control" name="first_name" value="{{$post->first_name}}">
            </div>
            <br/>
            <div class="form-group">
                <label for="" class="form-group">Date of Birth</label>
                <input id="datepicker" width="276" />
            </div>
            <br/>
            <div class="form-group">
                <label for="" class="form-group">Period</label>
                <select name="frequeny" id="frequeny" class="form-control">
                    <option value="monthly">Monthly</option>
                    <option value="weekly">Weekly</option>
                    <option value="daily">Daily</option>
                </select>
            </div>
            <br/>
            <div class="form-group" id="daily-times" style="display:none">
                <label for="" class="form-group">If daily, how many times</label>
                <select name="frequeny" id="" class="form-control">
                    <option value="1-2">1-2</option>
                    <option value="3-4">3-4</option>
                    <option value="5">5+</option>
                </select>
            </div>
            <br/>
            <div class="form-group">
                <button class="btn btn-primary mt-3">Submit</button>
            </div>
        </form>
    </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#frequeny').change(function() {
            var fre = $(this).val();
            if (fre=="daily")
                $("#daily-times").css("display","block");
            else 
                $("#daily-times").css("display","none");
        });
    }); 
    
    $(function() {
        $('#datetimepicker1').datetimepicker();
    });
</script>

@endsection
