@extends('master')

@section('content')
    <div class="container d-flex flex-column align-items-center p-5">
        <h1>Create a new note</h1>
        <form class="w-50 mt-2" action="/notes" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control form-control-lg" name="title" id="title"
                    value="{{ old('title') }}" />
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control form-control-lg" name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
                @error('content')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="d-flex justify-content-end gap-2">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
