@extends('layouts.app')

@section('content')
    <h1>Stores</h1>
    <a href="{{ route('stores.create') }}">Create Store</a>
    <ul>
        @foreach ($stores as $store)
            <li>{{ $store->name }} - {{ $store->location }} <a href="{{ route('stores.edit', $store->id) }}">Edit</a></li>
        @endforeach
    </ul>
@endsection
