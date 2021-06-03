@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h5>Tambah Author</h5>
        <hr class="mb-0">
        @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('authors.store') }}" method="post" class="py-3">
            @csrf
            <div class="row">
                <div class="col col-md-6 mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="name" placeholder="Nama Penulis">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection