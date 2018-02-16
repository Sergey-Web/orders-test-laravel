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
<form action="{{ route($page.'.update', $product['id']) }}" accept-charset="UTF-8" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group">
        <label for="nameProduct">Name product: </label>
        <input type="text" class="form-control" name="name" id="nameProduct" value="{{ $product['name'] }}" placeholder="name">
    </div>
    <div class="form-group">
        <label for="priceProduct">Price: </label>
        <input type="text" class="form-control" name ="price" id="priceProduct" value="{{ $product['price'] }}" placeholder="price">
    </div>
    <select name="id_counterpaty" class="form-control">
        @foreach($counterpaties as $counterpaty)
            @if($counterpaty['id'] === $product['counterpaty']['id'])
            <option value="{{ $counterpaty['id'] }}" selected>{{ $counterpaty['name'] }}</option>
            @continue
            @endif
            <option value="{{ $counterpaty['id'] }}">{{ $counterpaty['name'] }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-success" href="#">Update</button>
</form>
@endsection