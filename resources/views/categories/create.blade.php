@extends('layouts.app')
@section('title', 'Tambah Kategori')

@section('content')
<h4 style="margin-bottom:12px">Tambah Kategori</h4>
<div>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        @include('categories._form')
    </form>
</div>
@endsection
