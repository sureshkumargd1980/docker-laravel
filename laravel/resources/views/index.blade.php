@extends('layouts.app')

@section('content')

<div class="main-content mt-5">
<div class="card mt-5">

    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h6>All Posts</h6>
            </div>
            <div class="col-md-6 justify-content-end" style="text-align:right;">
                <a href="{{route('posts.create')}}" class="btn btn-success mx-1">Create</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-stripe border-dark">
            <thead style="background:#a8a83c;">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">DOB</th>
                <th scope="col">Headache (frequency)</th>
                <th scope="col">Message</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @isset($posts)
                @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$post->first_name}}</td>
                    <td>{{$post->dob}}</td>
                    <td>
                        <?php
                            if ($post->frequency=="daily") {
                                echo $post->frequency . " " .$post->daily_frequency . "times";
                            } else {
                                echo $post->frequency;
                            }
                        ?>
                    </td>
                    <td>{{$post->message}}</td>
                    <td><a href="{{ route('posts.edit', $post->id) }}" class="btn-primary btn-sm">Edit</a>
                    <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn-danger btn-sm">Delete</button>
                    </form>
                    
                </tr>
                @endforeach
                @endisset
            </tbody>
            </table>
    </div>
</div>
</div>

@endsection
