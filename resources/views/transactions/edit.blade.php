@extends('layouts.app')
@section('title', 'Edit Transaksi')

@section('content')
<h4 style="margin-bottom:12px">Edit Transaksi {{ $transaction->invoice_no }}</h4>
<div>
    <form action="{{ route('transactions.update', $transaction) }}" method="POST">
        @csrf @method('PUT')
        @include('transactions._form')
    </form>
</div>
@endsection
