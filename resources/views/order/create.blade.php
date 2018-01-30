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
<form class="form-order" action="{{ route($page . '.store') }}" accept-charset="UTF-8" method="POST">
    {{ csrf_field() }}
    <div class="form-order__wrap-items">
        <div class="form-group">
            <label for="counterpaty">Counterpaties: </label>
            <div class="form-order__counterpaties">
                <select id="counterpaty" class="form-control">
                    @foreach($counterpaties as $counterpaty)
                    <option value="{{ $counterpaty['id'] }}">{{ $counterpaty['name'] }}</option>
                    @endforeach
                </select>
                <button id="checkCounterpaty" class="btn btn-warning">Ckeck</button>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success" href="#">Create</button>
</form>
@endsection