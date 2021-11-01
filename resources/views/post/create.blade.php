@extends('layouts.app')
@section('content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto fcolor">
                <h3> Create a New Post </h3>
            <form method="post" action="{{ url('/posts/store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">

                    <input  type="text" name="name" class="form-control" placeholder="name">
                    <input  type="number" name="price" class="form-control" placeholder="price">
                    <input class="finp" type="text" placeholder="Description" name="description" required data-validation-required-message="Please enter a description.">
                    <div class="col-md-6">
                        <input id="image" type="file" class="form-control" name="image" value="{{ old('image') }}">
                    </div>

                </div>

                 <div class="form-group">
                 <button class="btn btn-success btn-submit">Post</button>
                 </div>
            </form>
            </div>
        </div>
    </div>
    <hr>

@endsection
