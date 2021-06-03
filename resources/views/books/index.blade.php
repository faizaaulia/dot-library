@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <h5>Data Buku</h5>
        @if ($notif = Session::get('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $notif }}</strong>
        </div>
        @endif
        <table class="table table-striped table-hover">
            <tr>
                <th>No.</th>
                <th width="50%">Judul</th>
                <th>Author</th>
                <th>Tanggal Publish</th>
                <th>Aksi</th>
            </tr>
            @forelse ($books as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->title }}</td>
                <td>
                    {{ $item->authors_count > 1 ? $item->authors[0]->name . ', dkk.' : $item->authors[0]->name }}
                </td>
                <td>{{ $item->formated_date }}</td>
                <td width="5%">
                    <a href="{{ route('books.show', ['book' => $item->id]) }}" class="btn btn-sm btn-block btn-info text-white">Detail</a>
                    <a href="{{ route('books.edit', ['book' => $item->id]) }}" class="btn btn-sm btn-block btn-primary text-white">Edit</a>
                    <form action="{{ route('books.destroy', ['book' => $item->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-block btn-danger mt-2" onclick="return confirm('Hapus data buku?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Belum ada data</td>
            </tr>
            @endforelse
        </table>
        {{ $books->links() }}
    </div>
</div>
@endsection