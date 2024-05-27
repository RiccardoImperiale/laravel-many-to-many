@extends('layouts.admin')


@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container">
            <h2 class="text-center">Edit Technology</h2>
        </div>
    </header>

    <div class="container py-5">
        @include('partials.validation-messages')

        <form action="{{ route('admin.technologies.update', $technology) }}" method="post">
            @csrf
            @method('PUT')

            {{-- NAME --}}
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    placeholder="name" value="{{ old('name', $technology->name) }}" />
                @error('name')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- COLOR --}}
            <div class="mb-3">
                <label for="color" class="form-label">Color:</label>
                <input type="color" class="form-control @error('color') is-invalid @enderror" name="color"
                    id="color" value="{{ old('color', $technology->color) }}" />
                @error('color')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- PROJECTS --}}
            @if (count($projects) > 0)
                <div class="mb-3">
                    <label for="projects" class="form-label">Projects</label>
                    <select multiple class="form-select form-select-lg" name="projects[]" id="projects">
                        @foreach ($projects as $project)
                            @if ($errors->any())
                                <option value="{{ $project->id }}"
                                    {{ in_array($project->id, old('projects', [])) ? 'selected' : '' }}>
                                    {{ $project->title }}
                                </option>
                            @else
                                <option value="{{ $project->id }}"
                                    {{ $project->technologies->contains($project->id) ? 'selected' : '' }}>
                                    {{ $project->title }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('projects')
                        <div class="text-danger py-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            @endif

            <button type="submit" class="btn btn-danger">
                Confirm Edit
            </button>
        </form>
    </div>
@endsection
