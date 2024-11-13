@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg max-w-lg mx-auto">
    <h2 class="text-2xl font-bold mb-4">Job Application Form</h2>

    <form action="{{ route('form.submit') }}" method="POST">
        @csrf
        @foreach ($fields as $field)
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">{{ $field->label }}</label>
                
                @if ($field->type === 'text')
                    <input type="text" name="{{ $field->name }}" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-green-500" required>
                @elseif ($field->type === 'textarea')
                    <textarea name="{{ $field->name }}" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-green-500" required></textarea>
                @endif
            </div>
        @endforeach

        <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded">Submit Application</button>
    </form>
</div>
@endsection
