@extends('layouts.app')
@section('title', 'Edit Produk')

@section('content')
<h4 style="margin-bottom:12px">Edit Produk</h4>
<div>
    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf @method('PUT')
        @include('products._form')
    </form>
</div>
@endsection
