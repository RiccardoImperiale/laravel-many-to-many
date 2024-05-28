@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container d-flex justify-content-between align-items-center">
            <h2 class="text-center">All Types</h2>
            {{-- <a class="btn btn-primary h-100" href="{{ route('admin.types.create') }}">
                Add New type
            </a> --}}
        </div>
    </header>
    @if (count($types) > 0)
        <div class="container">
            @include('partials.session-messages')
            <div class="row">
                <div class="col-12 col-md-5 mt-4">
                    <form action="{{ route('admin.types.store') }}" method="post">
                        @csrf
                        <div class="input-group">
                            <input name="name" type="text" class="form-control" placeholder="New Type..."
                                @error('name') is-invalid @enderror>
                            <button class="btn btn-primary" type="submit">Add</button>
                        </div>
                        @error('name')
                            <div class="text-danger py-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </form>
                </div>

                <div class="col-12 col-md-7 mt-4">
                    <table class="table align-middle table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th class=" ps-3" scope="col">name</th>
                                <th scope="col">slug</th>
                                <th class="text-end pe-3" scope="col">actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($types as $type)
                                <tr>
                                    <td>
                                        <form action="{{ route('admin.types.update', $type) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="name" placeholder="{{ $type->name }}">
                                        </form>
                                    </td>
                                    <td>{{ $type->slug }}</td>
                                    <td>
                                        <div class="d-flex justify-content-end">

                                            <!-- Modal trigger button -->
                                            <button type="button" class="btn btn-danger pb-2" data-bs-toggle="modal"
                                                data-bs-target="#modal-{{ $type->id }}">
                                                <span style="font-size: 0.7rem" class=" text-uppercase">Delete</span>
                                            </button>

                                            <div class="modal fade" id="modal-{{ $type->id }}" tabindex="-1"
                                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                                aria-labelledby="modalTitle-{{ $type->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalTitle-{{ $type->id }}">
                                                                Delete type
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this type:
                                                            {{ $type->name }}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <form action="{{ route('admin.types.destroy', $type) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="btn btn-danger">
                                                                    Confirm
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $types->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    @else
        <div class="container pt-5">
            <h4>Sorry, no types to show...</h4>
        </div>
    @endif
@endsection
