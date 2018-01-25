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

<form action="{{ route($page.'.store') }}" accept-charset="UTF-8" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="nameCounterpaty">Name Counterpaty: </label>
        <input type="text" class="form-control" name="name" id="nameCounterpaty" value="{{ old('name') }}" placeholder="Sony">
    </div>
    <select name="type" class="form-control">
    @foreach($types as $type)
        @if(old('type') && old('type') === $type)
        <option value="{{ $type }}" selected>{{ $type }}</option>
        @continue
        @endif
        <option value="{{ $type }}">{{ $type }}</option>
    @endforeach
    </select>
    <div class="form-group">
        <label for="phoneCounterpaty">Phone: </label>
        <input type="text" class="form-control" name="phone" id="phoneCounterpaty" value="{{ old('phone') }}" placeholder="380673332211">
    </div>
    <div class="form-group">
        <label for="emailCounterpaty">Price: </label>
        <input type="email" class="form-control" name ="email" id="emailCounterpaty" value="{{ old('email') }}" placeholder="test@test.ua">
    </div>
    <button type="submit" class="btn btn-success" href="#">Create</button>
</form>
@endsection