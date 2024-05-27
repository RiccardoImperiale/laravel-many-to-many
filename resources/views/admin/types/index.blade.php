@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container d-flex justify-content-between align-items-center">
            <h2 class="text-center">All Types</h2>
            <a class="btn btn-primary h-100" href="{{ route('admin.types.create') }}">
                Add New type
            </a>
        </div>
    </header>
    @if (count($types) > 0)
        @include('partials.all-types')
    @else
        <div class="container pt-5">
            <h4>Sorry, no types to show...</h4>
        </div>
    @endif
@endsection
