@extends('layouts.index')

@section('content')
<h1>Select Counterparty:</h1>
<form action="{{ route('order.create') }}" method="GET">
    <select name="counterpaty" class="form-control">
        @foreach($counterpaties as $counterpaty)
        <option value="{{ $counterpaty['id'] }}">{{ $counterpaty['name'] }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-success">Done</button>
    <a href="/" class="btn btn-danger">Cancel</a>
</form>
@endsection