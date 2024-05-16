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
                <input id="datepicker" name="dob" width="276" value="{{$post->dob}}" />
            </div>
            <br/>
            <div class="form-group">
                <label for="" class="form-group">Period</label>
                <select name="frequency" id="frequency" class="form-control">
                    <option value="monthly">Monthly</option>
                    <option value="weekly" <?php if($post->frequency=='weekly') echo "selected"; ?>>Weekly</option>
                    <option value="daily" <?php if($post->frequency=='daily') echo "selected"; ?>>Daily</option>
                </select>
            </div>
            <br/>
            <div class="form-group" id="daily-times" <?php if ($post->frequency=="daily") echo 'style="display:block"'; else echo 'style="display:none"'; ?>
            )>
                <label for="" class="form-group">If daily, how many times</label>
                <select name="daily_frequency" id="" class="form-control">
                    <option value="1-2">1-2</option>
                    <option value="3-4" <?php if($post->daily_frequency=='3-4') echo "selected"; ?>>3-4</option>
                    <option value="5+" <?php if($post->daily_frequency=='5') echo "selected"; ?>>5+</option>
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
        $('#frequency').change(function() {
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
