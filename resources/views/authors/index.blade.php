@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h5>Data Author</h5>
        @if ($notif = Session::get('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $notif }}</strong>
        </div>
        @endif
        <table class="table table-striped table-hover">
            <tr>
                <th width="5%">No.</th>
                <th width="30%">Nama</th>
                <th>Buku</th>
                <th width="5%">Aksi</th>
            </tr>
            @forelse ($authors as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    @if (count($item->books) == 0)
                    -
                    @else
                    {!! $item->books->implode('title', "<br>") !!}
                    @endif
                </td>
                <td>
                    <a href="{{ route('authors.show', ['author' => $item->id]) }}" class="btn btn-sm btn-block btn-info text-white">Detail</a>
                    <a href="{{ route('authors.edit', ['author' => $item->id]) }}" class="btn btn-sm btn-block btn-primary text-white">Edit</a>
                    <form action="{{ route('authors.destroy', ['author' => $item->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-block btn-danger mt-2" onclick="return confirm('Hapus data author? Akan berpengaruh pada data buku')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Belum ada data</td>
            </tr>
            @endforelse
        </table>
        {{ $authors->links() }}
    </div>
</div>
@endsection