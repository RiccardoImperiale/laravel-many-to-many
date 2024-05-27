@extends('layouts.admin')


@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container">
            <h2 class="text-center">Edit Project</h2>
        </div>
    </header>

    <div class="container py-5">
        @include('partials.validation-messages')

        <form action="{{ route('admin.types.update', $type) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    placeholder="name" value="{{ old('name', $type->name) }}" />
                @error('name')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-danger">
                Confirm Edit
            </button>
        </form>
    </div>
@endsection
