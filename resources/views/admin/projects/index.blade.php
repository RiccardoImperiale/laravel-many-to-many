@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container d-flex justify-content-between align-items-center">
            <h2 class="text-center">All Projects</h2>
            <a class="btn btn-primary h-100" href="{{ route('admin.projects.create') }}">
                Add New Project
            </a>
        </div>
    </header>
    @include('partials.all-projects')
@endsection
