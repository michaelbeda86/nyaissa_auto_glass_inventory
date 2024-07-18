@extends('layouts.app')

@section('content')
    <h1>Create Store</h1>
    <form action="{{ route('stores.store') }}" method="POST">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Location</label>
            <input type="text" name="location" required>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
