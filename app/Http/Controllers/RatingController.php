<?php

namespace App\Http\Controllers;

use App\Http\Requests\RatingRequest;
use App\Models\Detail;
use App\Models\Order;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index(Order $order)
    {
        $details = Detail::where('order_id', $order->id)->paginate(1);
        return view('ratings/add', compact('details'));
    }

    public function store()
    {
        $detail = Detail::where('id', request('detail_id'))->first();
        $order = Order::where('id', $detail->order->id)->first();

        $attr['product_id'] = $detail->product->id;
        $attr['user_id'] = auth()->user()->id;
        $attr['star'] = request('rating');

        Rating::create($attr);

        $adminController = new AdminController;
        $adminController->orderUpdate($order);

        session()->flash('success', 'Berhasil menambahkan rating');
        return redirect(route('carts.history'));
    }
}
