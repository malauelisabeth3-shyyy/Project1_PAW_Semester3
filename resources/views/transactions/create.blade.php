@extends('layouts.app')
@section('title', 'Transaksi Baru')

@section('content')
<h4 style="margin-bottom:12px">Transaksi Baru</h4>
<div>
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        @include('transactions._form')
    </form>
</div>
@endsection
