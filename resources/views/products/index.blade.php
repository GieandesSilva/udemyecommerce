@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Products</div>

        <div class="panel-body">
                    
            <table class="table table-striped">
                <thead class="thead-inverse">
                    <tr>
                        <th>Featured</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" style="width:50px;">
                            </td>
                            <td> {{ $product->name }}</td>
                            <td> {{ $product->price }}</td>
                            <td> <a href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-warning btn-xs">Edit</a> </td>
                            <td> 
                                <form action="{{ route('products.destroy', ['id' => $product->id ]) }}" method="post">

                                    {{ csrf_field() }}

                                    {{ method_field('DELETE') }}
                                    
                                    <button class="btn btn-danger btn-xs">Delete</button> 
                                </form>
                            
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $products->links() }}                        
            </div>

        </div>
    </div>
</div>
@endsection
