@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                {{-- PROJECTS --}}
                <div class="card mb-3">
                    <div class="card-header">{{ __('User Dashboard') }}</div>

                    <div class="card-body">
                        @include('partials.all-projects')
                    </div>
                </div>

                {{-- TYPES --}}
                <div class="card mb-3">
                    <div class="card-header">{{ __('Types') }}</div>

                    <div class="card-body">
                        @include('partials.all-types')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
