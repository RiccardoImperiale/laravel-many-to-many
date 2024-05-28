<div class="container">
    @include('partials.session-messages')
    <div class="mt-4">
        <table class="table align-middle table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">slug</th>
                    <th scope="col">color</th>

                    <th class="text-end" scope="col">actions</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($technologies as $tech)
                    <tr>
                        <th scope="row">{{ $tech->id }}</th>
                        <td>{{ $tech->name }}</td>
                        <td>{{ $tech->slug }}</td>
                        <td>
                            <div class="rounded w-50"
                                style="height:25px;background-color: {{ $tech->color ?? 'gray' }}; "></div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-end gap-1">

                                {{-- <a class="btn btn-dark" href="{{ route('admin.technologies.show', $tech) }}">
                                    <span style="font-size: 0.7rem" class="text-uppercase">Show</span>
                                </a> --}}

                                <a class="btn btn-dark" href="{{ route('admin.technologies.edit', $tech) }}">
                                    <span style="font-size: 0.7rem" class="text-uppercase">Edit</span>
                                </a>

                                <!-- Modal trigger button -->
                                <button tech="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modal-{{ $tech->id }}">
                                    <span style="font-size: 0.7rem" class="text-uppercase">Delete</span>
                                </button>

                                <div class="modal fade" id="modal-{{ $tech->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitle-{{ $tech->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-{{ $tech->id }}">
                                                    Delete tech
                                                </h5>
                                                <button tech="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this tech:
                                                {{ $tech->name }}
                                            </div>
                                            <div class="modal-footer">
                                                <button tech="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <form action="{{ route('admin.technologies.destroy', $tech) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button tech="submit" class="btn btn-danger">
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

        {{ $technologies->links('pagination::bootstrap-5') }}
    </div>
</div>
