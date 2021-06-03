@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h5>Edit Author</h5>
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
        <form action="{{ route('authors.update', ['author' => $author->id]) }}" method="post" class="py-3">
            @csrf
            @method('put')
            <div class="row">
                <div class="col col-md-6 mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="name" placeholder="Nama Penulis" value="{{ $author->name }}">
                </div>
                <div class="col col-md-6 mb-3">
                    <label for="book_id" class="form-label">Buku</label><br>
                    <select class="multi-select" name="book_id[]" multiple="multiple" style="width: 100%">
                        @foreach ($books as $item)
                            <option value="{{ $item->id }}" {{ in_array($item->id, $author->books->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $item->title }}</option>
                        @endforeach
                    </select>
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