@extends('layouts.index')

@section('content')
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
    <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Type</th>
            <th>Phone</th>
            <th>Email</th>
            <th></th>
            <th></th>
        </tr>
        @if($counterpaties)
        @foreach($counterpaties as $key => $counterpaty)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $counterpaty['name'] }}</td>
                <td>{{ $counterpaty['type'] }}</td>
                <td>{{ $counterpaty['phone'] }}</td>
                <td>{{ $counterpaty['email'] }}</td>
                <td><a class="btn btn-success" href="{{ route($page . '.edit', $counterpaty['id']) }}">Edit</a></td>
                <td>
                    <form action="{{ route($page.'.destroy',  $counterpaty['id']) }}" accept-charset="UTF-8" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger" href="#" title="Delete">&#215;</button>
                    </form>
                </td>
            </tr>
        @endforeach
        @endif
    </table>
    <a href="{{ route('counterpaty.create') }}" class="btn btn-primary">Add new product</a>
@endsection