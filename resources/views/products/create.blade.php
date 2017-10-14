@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Product</div>

                <div class="panel-body">

                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">

                        {{  csrf_field() }}

                        <div class="form-group">

                            <label for="name"> Name: </label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">

                        </div>
                        <div class="form-group">

                            <label for="image"> Image: </label>
                            <input type="file" name="image" class="form-control" value="{{ old('image') }}">

                        </div>
                        <div class="form-group">

                            <label for="price"> Price: </label>
                            <input type="number" name="price" class="form-control" value="{{ old('price') }}">

                        </div>
                        <div class="form-group">

                            <label for="description"> Description: </label>
                            <textarea name="description" class="form-control" cols="30" rows="7">{{ old('description') }}</textarea>

                        </div>
                        <div class="form-group">

                            <button class="btn-success form-control">Store Product</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
