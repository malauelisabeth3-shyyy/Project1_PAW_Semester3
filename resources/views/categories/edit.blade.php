@extends('layouts.app')
@section('title', 'Edit Kategori')

@section('content')
<h4 style="margin-bottom:12px">Edit Kategori</h4>
<div>
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf @method('PUT')
        @include('categories._form')
    </form>
</div>
@endsection
