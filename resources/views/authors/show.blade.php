@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        @if ($notif = Session::get('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $notif }}</strong>
        </div>
        @endif
        <h3>{{ $author->name }}</h3>
        <h5>Buku: @if ($author->books_count == 0) -</h5>
        @else
        <ul>
            @foreach ($author->books as $item)
            <li>{{ $item->title }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
<hr>
<div class="action">
    <a href="{{ route('authors.edit', ['author' => $author->id]) }}"
        class="btn btn-sm btn-primary float-left mr-3">Edit</a>
    <form action="{{ route('authors.destroy', ['author' => $author->id]) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus author?')">Hapus</button>
    </form>
</div>
@endsection
