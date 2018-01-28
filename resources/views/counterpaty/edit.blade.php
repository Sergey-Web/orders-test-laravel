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
<form action="{{ route($page.'.update', $counterpaty['id']) }}" accept-charset="UTF-8" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group">
        <label for="nameCounterpaty">Name Counterpaty: </label>
        <input type="text" class="form-control" name="name" id="nameCounterpaty" value="{{ $counterpaty['name'] }}" placeholder="Sony">
    </div>
    <select name="type" class="form-control">
    @foreach($types as $type)
        @if($counterpaty['type'] === $type)
        <option value="{{ $type }}" selected>{{ $type }}</option>
        @continue
        @endif
        <option value="{{ $type }}">{{ $type }}</option>
    @endforeach
    </select>
    <div class="form-group">
        <label for="phoneCounterpaty">Phone: </label>
        <input type="text" class="form-control" name="phone" id="phoneCounterpaty" value="{{ $counterpaty['phone'] }}" placeholder="380673332211">
    </div>
    <div class="form-group">
        <label for="emailCounterpaty">Price: </label>
        <input type="email" class="form-control" name ="email" id="emailCounterpaty" value="{{ $counterpaty['email'] }}" placeholder="test@test.ua">
    </div>
    <button type="submit" class="btn btn-success" href="#">Create</button>
</form>
@endsection