@extends('layouts.app')
@section('title', 'Tambah Produk')

@section('content')
<h4 style="margin-bottom:12px">Tambah Produk</h4>
<div>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        @include('products._form')
    </form>
</div>
@endsection
