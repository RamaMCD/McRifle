<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CartController extends Controller
{
    public function index()
    {
        // Tampilkan halaman keranjang
        return view('cart.index');
    }

    public function add(Request $request, $productId)
    {
        // Ambil data produk dari database
        $product = \App\Models\Product::findOrFail($productId);

        // Ambil keranjang dari session, jika belum ada buat array kosong
        $cart = session()->get('cart', []);

        // Jika produk sudah ada di keranjang, tambah qty
        if (isset($cart[$productId])) {
            $cart[$productId]['qty'] += 1;
        } else {
            // Jika belum ada, tambahkan produk ke keranjang
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'qty' => 1,
            ];
        }

        // Simpan kembali ke session
        session(['cart' => $cart]);

        // Redirect ke halaman keranjang
        return redirect()->route('cart')->with('success', 'Produk berhasil dimasukkan ke keranjang!');
    }

    public function remove($id)
    {
        $cart = session('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session(['cart' => $cart]);
            return redirect()->route('cart')->with('success', 'Item berhasil dihapus dari keranjang!');
        }
        return redirect()->route('cart')->with('success', 'Item tidak ditemukan di keranjang.');
    }

    public function update(Request $request, $id)
    {
        // Logika update jumlah produk di keranjang
    }

    public function buy(Request $request)
    {
        $cart = session('cart', []);
        $selected = $request->input('items', []);
        $bought = [];
        $total = 0;
        foreach ($selected as $id) {
            if (isset($cart[$id])) {
                $bought[] = $cart[$id];
                $total += $cart[$id]['price'] * $cart[$id]['qty'];
                unset($cart[$id]); // Hapus dari cart setelah beli
            }
        }
        session(['cart' => $cart]);

        // Simpan ke riwayat pembelian user (contoh sederhana, bisa ke tabel orders)
        $history = session('history', []);
        $invoiceNumber = 'INV' . date('YmdHis') . rand(100,999);
        $invoice = [
            'number' => $invoiceNumber,
            'date' => now()->format('d-m-Y H:i'),
            'items' => $bought,
            'total' => $total,
        ];
        $history[] = $invoice;
        session(['history' => $history]);

        // Redirect ke halaman invoice (tampilan browser, bukan download)
        return redirect()->route('cart.invoice', $invoiceNumber);
    }

    public function invoice($number)
    {
        $history = session('history', []);
        $invoice = collect($history)->firstWhere('number', $number);
        if (!$invoice) abort(404);
        return view('cart.invoice_view', ['invoice' => $invoice]);
    }

    public function history()
    {
        $history = session('history', []);
        return view('cart.history', compact('history'));
    }

    public function download($number)
    {
        $history = session('history', []);
        $invoice = collect($history)->firstWhere('number', $number);
        if (!$invoice) abort(404);
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('cart.invoice', ['invoice' => $invoice]);
        return $pdf->download('invoice-'.$number.'.pdf');
    }
} 