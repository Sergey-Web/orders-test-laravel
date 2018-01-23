@extends('layouts.index')

@section('content')
<div class="wrap-product">
    @if(session('message'))
    <div class="alert alert-success">
        <span>{{ session('message') }}</span>
    </div>
    @endif
    <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>Product</th>
            <th>Counterpaty</th>
            <th>Count</th>
            <th>Price</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($products as $key => $product)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['counterpaty']['name'] }}</td>
                <td>{{ $product['count'] }}</td>
                <td>{{ $product['price'] }}</td>
                <td><a class="btn btn-success" href="#">Edit</a></td>
                <td>
                    <form action="{{ route($page.'.destroy',  $product['id']) }}" accept-charset="UTF-8" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger" href="#" title="Delete">&#215;</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection