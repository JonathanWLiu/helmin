<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::where('userId',Auth::user()->id)->groupBy(function ($date){return Carbon::parse($date->created_at)->format('d-m-y h:m');});
        return view('transaction.index',compact('transactions'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'payment' => 'required|numeric',
        ]);

        $carts = Cart::where('userId',Auth::user()->id)->get();
        $totalPrice = 0;
        foreach ($carts as $cart){
            $totalPrice += $cart->qty * $cart->product->price;
        }

        if ($request->payment < $totalPrice){
            $request->session()->flash('alert-warning','Not sufficient payment!');
            return redirect()->back();
        }

        foreach ($carts as $cart){
            $t = new Transaction();

            $t->userId = $cart->userId;
            $t->productId = $cart->productId;
            $t->qty =  $cart->qty;
            $t->save();
        }
        Cart::where('userId',Auth::user()->id)->delete();
        return redirect('/');
    }
}
