@extends('layouts.app')
@section('title')
    Update your post
@endsection
@section('content')

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto fcolor">
                <h3>Update post of product</h3>
                <form  method="post" action="{{route('updatePost' , $product->id)}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <input  type="text" name="name" class="form-control" placeholder="name" value="{{$product->name}}">
                            <input  type="number" name="price" class="form-control" placeholder="price" value="{{$product->price}}">
                            <input class="finp" type="text" placeholder="Description" name="description" value="{{$product->description}}" required data-validation-required-message="Please enter a description.">

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control" name="image" value="{{ old('image') }}">
                            </div>

                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

    <hr>
@endsection
