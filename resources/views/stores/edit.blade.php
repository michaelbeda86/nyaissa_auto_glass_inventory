@extends('layouts.app')

@section('content')
    <h1>Edit Store</h1>
    <form action="{{ route('stores.update', $store->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ $store->name }}" required>
        </div>
        <div>
            <label>Location</label>
            <input type="text" name="location" value="{{ $store->location }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
