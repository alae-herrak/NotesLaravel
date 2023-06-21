@extends('master')

@section('content')
    <div class="container d-flex flex-column align-items-center p-5">
        <h1>Edit note</h1>
        <form class="w-50 mt-2" action="/notes/{{ $note->id }}" method="post">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control form-control-lg" name="title" id="title"
                    value="{{ $note->title }}" />
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control form-control-lg" name="content" id="content" cols="30" rows="10">{{ $note->content }}</textarea>
                @error('content')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
