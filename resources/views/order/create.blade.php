@extends('layouts.index')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<a href="/" class="btn btn-info">Back</a>
<form action="" accept-charset="UTF-8" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="nameProduct">Name product: </label>
        <input type="text" class="form-control" name="name" id="nameProduct" value="{{ old('name') }}" placeholder="name">
    </div>
    <div class="form-group">
        <label for="countProduct">Count: </label>
        <input type="text" class="form-control" name="count" id="countProduct" value="{{ old('count') }}" placeholder="count">
    </div>
    <div class="form-group">
        <label for="priceProduct">Price: </label>
        <input type="text" class="form-control" name ="price" id="priceProduct" value="{{ old('price') }}" placeholder="price">
    </div>
    <div class="products">
        <select name="products" class="form-control">
            
        </select>
        <button class="btn btn-warning">Ckeck</button>
    </div>
    <button type="submit" class="btn btn-success" href="#">Create</button>
</form>
@endsection