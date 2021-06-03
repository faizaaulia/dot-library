@extends('layouts.app')

@section('content')
@if ($notif = Session::get('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $notif }}</strong>
    </div>
@endif
<div class="row">
    <div class="col-12 col-md-8">
        <h3>{{ $data->title }}</h3>
    </div>
    <div class="col-12 col-md-4 my-auto">
        <span class="float-md-right">{{ $data->formated_date }}</span>
    </div>
    <div class="col">
        <strong>Authors: {{ $data->authors->implode('name', ', ') }}</strong>
        <div class="content py-2">
            {{ $data->content }}
        </div>
        <strong>Total pages: {{ $data->pages }} pages</strong>
    </div>
    <hr>
</div>
<hr>
<div class="action">
    <a href="{{ route('books.edit', ['book' => $data->id]) }}" class="btn btn-sm btn-primary float-left mr-3">Edit</a>
    <form action="{{ route('books.destroy', ['book' => $data->id]) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus berita?')">Hapus</button>
    </form>
</div>
@endsection