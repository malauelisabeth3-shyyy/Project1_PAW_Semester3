<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') - Kasir Minimarket</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #222; background: #f4f5f7; margin: 0; }
        a { color: #2563eb; text-decoration: none; }
        a:hover { text-decoration: underline; }

        /* Header & menu */
        header { background: #fff; border-bottom: 1px solid #d9dce1; padding: 12px 24px; display: flex; flex-wrap: wrap; align-items: center; gap: 16px; }
        header strong { font-size: 16px; }
        header nav { flex: 1; }
        header nav a { margin-right: 14px; }
        header form { display: inline; margin: 0; }
        header button { background: #6b7280; }

        /* Konten */
        main { max-width: 1000px; margin: 20px auto; padding: 20px 24px; background: #fff; border: 1px solid #d9dce1; border-radius: 4px; }
        h3, h4 { margin: 0 0 14px; }
        h4 { display: inline-block; margin-right: 12px; font-size: 18px; }
        h4 + a { display: inline-block; background: #2563eb; color: #fff; padding: 6px 12px; border-radius: 3px; }
        h4 + a:hover { background: #1d4ed8; text-decoration: none; }

        /* Tabel */
        table { border-collapse: collapse; width: 100%; margin: 12px 0; }
        th, td { border: 1px solid #d9dce1; padding: 8px 10px; text-align: left; }
        th { background: #eef0f3; }
        tbody tr:nth-child(even) { background: #fafbfc; }

        /* Form */
        input[type=text], input[type=email], input[type=password], input[type=number], input[type=date], select, textarea {
            padding: 7px 8px; border: 1px solid #c4c8cf; border-radius: 3px; min-width: 280px; font-size: 14px;
        }
        label { font-weight: bold; }
        button { background: #2563eb; color: #fff; border: 0; padding: 7px 14px; border-radius: 3px; cursor: pointer; font-size: 14px; }
        button:hover { opacity: .9; }
        form[onsubmit] { display: inline; margin: 0; }
        form[onsubmit] button { background: #dc2626; padding: 4px 10px; }

        /* Pesan */
        .ok { background: #e7f6ec; border: 1px solid #b7e1c4; color: #1e6b3a; padding: 10px 12px; border-radius: 3px; margin-bottom: 14px; }
        .err { background: #fdecec; border: 1px solid #f3b8b8; color: #a12020; padding: 10px 12px; border-radius: 3px; margin-bottom: 14px; }

        /* Tombol halaman (pagination) */
        .pagination { list-style: none; padding: 0; }
        .pagination li { display: inline; margin-right: 6px; }
    </style>
</head>
<body>

<header>
    <strong>KASIR MINIMARKET</strong>
    <nav>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('transactions.index') }}">Transaksi</a>
        <a href="{{ route('products.index') }}">Produk</a>
        <a href="{{ route('categories.index') }}">Kategori</a>
        <a href="{{ route('suppliers.index') }}">Supplier</a>
    </nav>
    <div>
        {{ auth()->user()->name }}
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</header>

<main>
    @if (session('success'))
        <div class="ok">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="err">{{ session('error') }}</div>
    @endif

    @yield('content')
</main>

</body>
</html>
