@extends('layouts.admin')

@section('content')
    @include('partials.heading', ['heading' => 'Projects'])

    @if (count($projects) > 0)
        @include('partials.all-projects')
    @else
        <div class="container pt-5">
            <h4>Sorry, no products to show...</h4>
        </div>
    @endif
@endsection
