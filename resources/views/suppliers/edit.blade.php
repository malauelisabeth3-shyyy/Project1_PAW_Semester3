@extends('layouts.app')
@section('title', 'Edit Supplier')

@section('content')
<h4 style="margin-bottom:12px">Edit Supplier</h4>
<div>
    <form action="{{ route('suppliers.update', $supplier) }}" method="POST">
        @csrf @method('PUT')
        @include('suppliers._form')
    </form>
</div>
@endsection
