@extends('layouts.app')

@section('content')
<div class="container max-w-sm mx-auto mt-10">
    <h2 class="text-center text-green-600 font-bold text-2xl">Admin Login</h2>
    <form action="{{ route('admin.login') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="username" class="block text-gray-700">Username</label>
            <input type="text" name="username" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password</label>
            <input type="password" name="password" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded">Login</button>
    </form>
</div>
@endsection
