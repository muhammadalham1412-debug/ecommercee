<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        // $items = Wishlist::with(['user', 'product'])->get();
        // return view('wishlist.index', compact('items'));
    }

    public function store(Request $request)
    {
        Wishlist::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
        ]);

        return back();
    }

    public function destroy($id)
    {
        Wishlist::where('id', $id)->where('user_id', auth()->id())->delete();
        return back();
    }
}
