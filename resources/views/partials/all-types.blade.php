<div class="container">
    @include('partials.session-messages')
    <div class="mt-4">
        <table class="table align-middle table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">slug</th>
                    <th class="text-end" scope="col">actions</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($types as $type)
                    <tr>
                        <th scope="row">{{ $type->id }}</th>
                        <td>{{ $type->name }}</td>
                        <td>{{ $type->slug }}</td>
                        <td>
                            <div class="d-flex justify-content-end gap-1">

                                <a class="btn btn-dark" href="{{ route('admin.types.show', $type) }}">
                                    <span style="font-size: 0.7rem" class="text-uppercase">Show</span>
                                </a>

                                <a class="btn btn-dark" href="{{ route('admin.types.edit', $type) }}">
                                    <span style="font-size: 0.7rem" class="text-uppercase">Edit</span>
                                </a>

                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modal-{{ $type->id }}">
                                    <span style="font-size: 0.7rem" class="text-uppercase">Delete</span>
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
