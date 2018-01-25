@extends('layouts.index')

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            {{ env('APP_NAME') }}
        </div>

        <div class="links">
            <a href="{{ route('product.index') }}">Products</a>
            <a href="{{ route('counterpaty.index') }}">Counterpaties</a>
            <a href="{{ route('order.index') }}">Orders</a>
        </div>
    </div>
</div>
@endsection