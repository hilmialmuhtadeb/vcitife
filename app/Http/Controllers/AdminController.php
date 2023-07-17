<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $product = Product::count();
        $user = User::where('isAdmin', false)->count();
        $order = Order::where('status', 2)->count();

        return view('admin.index', compact('product', 'user', 'order'));
    }

    public function product()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.product', compact('products'));
    }

    public function order()
    {
        $orders = Order::where('status', 0)->where('subtotal', '!=', 0)->paginate(10);
        return view('admin.order.index', compact('orders'));
    }

    public function user()
    {
        $users = User::paginate(10);
        return view('admin.user', compact('users'));
    }

    public function orderWait()
    {
        $orders = Order::where('status', 1)->paginate(10);
        return view('admin.order.wait', compact('orders'));
    }

    public function orderAll()
    {
        $orders = Order::where('subtotal', '!=', 0)->paginate(10);
        return view('admin.order.all', compact('orders'));
    }

    public function orderUpdate(Order $order)
    {
        $status = $order->status;
        $order->update([
            'status' => $status + 1,
        ]);

        session()->flash('success', 'yeay, sudah berhasil!');
        return back();
    }

    public function orderDetail(Order $order)
    {
        return view('admin.order.detail', compact('order'));
    }

    public function addAdmin(User $user)
    {
        $user->update([
            'isAdmin' => true,
        ]);

        session()->flash('success', 'Yey, pengguna ini berhasil dijadikan sebagai admin');
        return back();
    }
}
