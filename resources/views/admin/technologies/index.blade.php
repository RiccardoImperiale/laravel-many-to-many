@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container d-flex justify-content-between align-items-center">
            <h2 class="text-center">All Technologies</h2>
            <a class="btn btn-primary h-100" href="{{ route('admin.technologies.create') }}">
                Add New technology
            </a>
        </div>
    </header>
    @if (count($technologies) > 0)
        @include('partials.all-technologies')
    @else
        <div class="container pt-5">
            <h4>Sorry, no technologies to show...</h4>
        </div>
    @endif
@endsection
