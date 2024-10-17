@extends('app')

@section('title', 'Edit Produk')

@section('content')

<div class="row">
    <h1 class="display-6 mb-5">Edit Produk</h1>

    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <div class="card border-0 shadow rounded">
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="category">Kategori</label>
                    <input type="text" class="form-control" name="category" value="{{ old('category', $product->category) }}" required>
                </div>

                <div class="mb-3">
                    <label for="unit">Satuan</label>
                    <input type="text" class="form-control" name="unit" value="{{ old('unit', $product->unit) }}" required>
                </div>

                <div class="mb-3">
                    <label for="stock">Stok</label>
                    <input type="number" class="form-control" name="stock" value="{{ old('stock', $product->stock) }}" required>
                </div>

                <div class="mb-3">
                    <label for="price">Harga</label>
                    <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price', $product->price) }}" required>
                </div>

                <div class="mb-3">
                    <label for="rack">Rak</label>
                    <input type="text" class="form-control" name="rack" value="{{ old('rack', $product->rack) }}" required>
                </div>

                <div class="mb-3">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control" name="description" required>{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="expired_at">Tanggal Kadaluarsa</label>
                    <input type="date" class="form-control" name="expired_at" value="{{ old('expired_at', $product->expired_at) }}" required>
                </div>

                <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                <a href="{{ route('products.index') }}" class="btn btn-md btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

@endsection