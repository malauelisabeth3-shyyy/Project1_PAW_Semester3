@extends('layouts.app')
@section('title', 'Tambah Supplier')

@section('content')
<h4 style="margin-bottom:12px">Tambah Supplier</h4>
<div>
    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        @include('suppliers._form')
    </form>
</div>
@endsection
