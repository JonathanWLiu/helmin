<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $carts = Cart::where('userId',Auth::user()->id)->get();
        $totalPrice = 0;
        foreach ($carts as $cart){
            $totalPrice += $cart->qty * $cart->product->price;
        }
        return view('cart.index',compact('carts','totalPrice'));
    }

    public function store(Request $request,$id){
        $alert = 0;
        if ($request->qty > 0){
            $cart = new Cart();
            $cart->userId = Auth::user()->id;
            $cart->productId = $id;
            $cart->qty = $request->qty;
            $cart->size = 'M';
            $cart->save();
        }else
            $request->session()->flash('alert-warning','Quantity must be more than 0!');

        return redirect()->back();
    }

    public  function destroy($id){
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

}
