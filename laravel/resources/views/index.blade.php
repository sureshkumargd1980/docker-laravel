@extends('layouts.app')

@section('content')

<div class="card mt-5">

    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h6>All Posts</h6>
            </div>
            <div class="col-md-6 justify-content-end">
                <a href="#" class="btn btn-success mx-1">Create</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-stripe border-dark">
            <thead style="background:#a8a83c;">
                <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td><a href="#" class="btn-primary btn-sm">Edit</a>&nbsp;<a href="#" class="btn-danger btn-sm">Delete</a>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
            </table>
    </div>
</div>

@endsection
