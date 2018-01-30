@extends('layouts.index')
    @if(session('message'))
    <div class="alert alert-success">
        <span>{{ session('message') }}</span>
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

@section('content')
    <div class="order-conteiner">
        <a href="/" class="btn btn-info order-conteiner__item">Back</a>

        <a class="btn btn-success order-conteiner__item"
            href="{{ route('order.create', ['buyer']) }}">Add Sell Order</a>

        <a class="btn btn-success order-conteiner__item" 
            href="{{ route('order.create', ['provider']) }}">Add Purchase Order</a>

        <a class="btn btn-warning order-conteiner__item" 
            href="{{ route('order.index') }}">Report</a>
    </div>
@endsection