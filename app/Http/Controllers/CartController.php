<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store()
    {
        $product = Product::findOrFail(request('product_id'));
        $order = Order::where('user_id', auth()->user()->id)->latest()->first();

        if (!$order) {
            auth()->user()->orders()->create([
                'status' => 0,
                'summary' => 0,
                'unique_number' => mt_rand(101, 499),
            ]);

            $order = Order::where('user_id', auth()->user()->id)->latest()->first();
            $order->order_number = 'VC-' . $order->id;
            $order->update();
        }

        $detail = $order->details()->where('product_id', $product->id)->first();

        if (!$detail) {
            Detail::create([
                'product_id' => $product->id,
                'order_id' => $order->id,
            ]);
        }

        session()->flash('success', 'Asik, produk berhasil dimasukkan keranjang..');
        return redirect(route('products.index'));
    }

    public function new()
    {
        auth()->user()->orders()->create([
            'status' => 0,
            'unique_number' => mt_rand(101, 499),
        ]);

        $order = Order::where('user_id', auth()->user()->id)->latest()->first();
        $order_number = 'VC-' . $order->id;
        $order->update([
            'order_number' => $order_number,
        ]);

        return redirect(route('products.index'));
    }

    public function update(Order $order)
    {
        foreach ($order->details()->get() as $detail) {
            if ($detail->amount == 0) {
                session()->flash('error', 'Salah satu produk belum diisi detailnya..');
                return back();
            }
        }

        $attr['subtotal'] = request('subtotal');
        $attr['summary'] = request('summary');

        $order->update($attr);

        return redirect(route('carts.checkout', $order->id));
    }

    public function index()
    {
        $order = Order::where('user_id', auth()->user()->id)->latest()->first();

        if (!$order) {
            auth()->user()->orders()->create([
                'status' => 0,
                'summary' => 0,
                'unique_number' => mt_rand(101, 499),
            ]);

            $order = Order::where('user_id', auth()->user()->id)->latest()->first();
            $order->order_number = 'VC-' . $order->id;
            $order->update();
        }
        $details = Detail::where('order_id', $order->id)->latest()->get();

        $subtotal = 0;

        foreach ($details as $detail) {
            $subtotal = $subtotal + $detail->amount;
        }

        $summary = $subtotal + $order->unique_number;

        return view('carts.index', compact('details', 'order', 'subtotal', 'summary'));
    }

    public function checkout(Order $order)
    {
        return view('carts.checkout.index', compact('order'));
    }

    public function history()
    {
        $orders = Order::where('user_id', auth()->user()->id)->where('subtotal', '!=', '0')->paginate(10);
        return view('carts.history.index', compact('orders'));
    }
}
