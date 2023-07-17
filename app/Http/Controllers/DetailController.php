<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailRequest;
use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DetailController extends Controller
{
    public function index(Detail $detail)
    {
        $participant = " contoh : 
        1. Rifqi Ananda
        2. Dimas Satria
        3. Hilmi aja";
        return view('details.index', compact('detail', 'participant'));
    }

    public function update(Detail $detail, DetailRequest $request)
    {
        $attr = $request->all();

        if ($detail->product->discount != null) {
            $attr['amount'] = request('quantity') * $detail->product->discount;
        } else {
            $attr['amount'] = request('quantity') * $detail->product->price;
        }

        if (request('logo')) {
            \Storage::delete($detail->logo);
            $attr['logo'] = request('logo')->store('/images/logo');
        } else {
            $attr['logo'] = $detail->logo;
        }

        if (request('participant_auto')) {
            \Storage::delete($detail->participant_auto);
            $attr['participant_auto'] = request('participant_auto')->store('/participant');
        } else {
            $attr['participant_auto'] = $detail->participant_auto;
        }

        $detail->update($attr);

        session()->flash('success', 'Mantap, Detail pesananmu sudah kami simpan..');
        return redirect(route('carts.index'));
    }

    public function destroy(Detail $detail)
    {
        $detail->delete();

        session()->flash('success', 'Yah, Produk dihapus dari keranjang..');
        return back();
    }
}
