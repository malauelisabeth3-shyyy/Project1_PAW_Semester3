<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class TransactionController extends Controller
{
    private function rules(): array
    {
        return [
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['required', 'integer', 'min:1'],
            'transaction_date' => ['required', 'date'],
        ];
    }

    public function index()
    {
        $transactions = Transaction::with(['product', 'user'])
            ->latest('transaction_date')->latest('id')
            ->paginate(10);

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('transactions.create', [
            'products' => Product::where('stock', '>', 0)->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        DB::transaction(function () use ($data) {
            $product = Product::lockForUpdate()->findOrFail($data['product_id']);

            if ($product->stock < $data['quantity']) {
                throw ValidationException::withMessages([
                    'quantity' => "Stok {$product->name} tidak cukup (sisa {$product->stock}).",
                ]);
            }

            $product->decrement('stock', $data['quantity']);

            Transaction::create([
                'invoice_no' => 'INV-' . now()->format('YmdHis') . rand(10, 99),
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'quantity' => $data['quantity'],
                'unit_price' => $product->price,
                'total_price' => $product->price * $data['quantity'],
                'transaction_date' => $data['transaction_date'],
            ]);
        });

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dicatat.');
    }

    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', [
            'transaction' => $transaction,
            'products' => Product::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Transaction $transaction)
    {
        $data = $request->validate($this->rules());

        DB::transaction(function () use ($data, $transaction) {
            // kembalikan stok transaksi lama
            Product::whereKey($transaction->product_id)->increment('stock', $transaction->quantity);

            $product = Product::lockForUpdate()->findOrFail($data['product_id']);

            if ($product->stock < $data['quantity']) {
                throw ValidationException::withMessages([
                    'quantity' => "Stok {$product->name} tidak cukup (sisa {$product->stock}).",
                ]);
            }

            $product->decrement('stock', $data['quantity']);

            $transaction->update([
                'product_id' => $product->id,
                'quantity' => $data['quantity'],
                'unit_price' => $product->price,
                'total_price' => $product->price * $data['quantity'],
                'transaction_date' => $data['transaction_date'],
            ]);
        });

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(Transaction $transaction)
    {
        DB::transaction(function () use ($transaction) {
            Product::whereKey($transaction->product_id)->increment('stock', $transaction->quantity);
            $transaction->delete();
        });

        return redirect()->route('transactions.index')->with('success', 'Transaksi dihapus dan stok dikembalikan.');
    }
}
