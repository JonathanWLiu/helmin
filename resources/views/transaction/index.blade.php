@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>History</h2>
        <hr>

        @foreach($transactions as $date => $ts)
            <table class="table table-hover">
                {{$date}}
                <thead>
                <tr>
                    <th scope="col" colspan="2">Drinks</th>
                    <th scope="col"colspan="2">Quantity</th>
                    <th scope="col"colspan="2">Price</th>
                    <th scope="col">Sub Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ts as $t)
                    <tr>
                        <td><img src="{{asset($t->product->img)}}" alt="" width="100"></td>
                        <td>{{$t->product->name}}</td>
                        <td>{{$t->qty}}</td>
                        <td>x</td>
                        <td>Rp {{$t->product->price}}</td>
                        <td>=</td>
                        <td>Rp {{$t->product->price * $cart->qty}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endforeach

    </div>
@endsection