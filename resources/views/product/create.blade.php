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
<form action="{{ route($page.'.store') }}" accept-charset="UTF-8" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="nameProduct">Name product: </label>
        <input type="text" class="form-control" name="name" id="nameProduct" value="{{ old('name') }}" placeholder="name">
    </div>
    <div class="form-group">
        <label for="priceProduct">Price: </label>
        <input type="text" class="form-control" name ="price" id="priceProduct" value="{{ old('price') }}" placeholder="price">
    </div>
    <select name="id_counterpaty" class="form-control">
    @foreach($counterpaties as $counterpaty)
        @if(old('id_counterpaty') && old('id_counterpaty') == $counterpaty['id'])
        <option value="{{ $counterpaty['id'] }}" selected>{{ $counterpaty['name'] }}</option>
        @continue
        @endif
        <option value="{{ $counterpaty['id'] }}">{{ $counterpaty['name'] }}</option>
    @endforeach
    </select>
    <button type="submit" class="btn btn-success" href="#">Create</button>
</form>
@endsection