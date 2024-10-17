@extends('app')

@section('title', 'List Produk')

@section('content')

<div class="row">
    <h1 class="display-6 mb-5">List Produk</h1>

    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <div class="card border-0 shadow rounded">
        <div class="card-body">
            <a href="{{ route('products.create') }}" class="btn btn-mb btn-success mb-3 float-end">Baru</a>

            <table class="table table-bordered mt-1 text-center">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Rak</th>
                        <th scope="col">Tanggal Kadaluarsa</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->unit }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->rack }}</td>
                        <td>{{ $product->expired_at }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah anda yakin ?');"
                                action="{{ route('products.destroy', $product->id) }}" method="POST">
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center my-3" colspan="7">Data product tidak tersedia</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection