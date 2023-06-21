@extends('master')

@section('content')
    <div class="container p-5">
        <div class="row">
            @foreach ($notes as $note)
                <div class="col-3 p-1">
                    <div class="border border-1 rounded-3 text-break p-3" style="height: 380px">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="fw-bold m-0">{{ $note->title }}</p>
                            <div class="d-flex align-items-center gap-2">
                                <a class="text-decoration-none text-body" href="/notes/{{ $note->id }}/edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="/notes/{{ $note->id }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn p-0 border-0" type="submit"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                        <hr class="mt-0" />
                        <p class="lead">{{ $note->content }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
