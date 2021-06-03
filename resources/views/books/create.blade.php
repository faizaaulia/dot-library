@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h5>{{ isset($book) ? 'Edit' : 'Tambah' }} Buku</h5>
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
        <form action="{{ route('books.store', isset($book) ? ['book' => $book->id] : '') }}" method="post" class="py-3">
            @csrf
            @isset($book)
                @method('put')
            @endisset
            <div class="row">
                <div class="col col-md-6 mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" name="title" placeholder="Judul Buku" value="{{ isset($book) ? $book->title : '' }}">
                </div>
                {{-- {{ dd($book->authors) }} --}}
                <div class="col col-md-6 mb-3">
                    <label for="author_id" class="form-label">Authors</label><br>
                    <select class="multi-select" name="author_id[]" multiple="multiple" width="100%">
                        @foreach ($authors as $item)
                            <option value="{{ $item->id }}" {{ isset($book) ? in_array($item->id, $book->authors->pluck('id')->toArray()) ? 'selected' : '' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="content" class="form-label">Isi</label>
                        <textarea class="form-control" id="content" name="content" rows="5">@isset($book){{ $book->content }}@endisset</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-6 mb-3">
                    <label for="pages" class="form-label">Jumlah Halaman</label>
                    <input type="number" class="form-control" name="pages" placeholder="Jumlah Halaman" value="{{ isset($book) ? $book->pages : '' }}">
                </div>
                <div class="col col-md-6 mb-3">
                    <label for="published_on" class="form-label">Tanggal Pembuatan</label>
                    <input type="date" class="form-control" name="published_on" max="{{ date('Y-m-d') }}" value="{{ isset($book) ? $book->published_on : '' }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.multi-select').select2();
    });
</script>
@endpush