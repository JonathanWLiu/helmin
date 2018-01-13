@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Carts</h2>
        <hr>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" colspan="2">Drinks</th>
                    <th scope="col"colspan="2">Quantity</th>
                    <th scope="col"colspan="2">Price</th>
                    <th scope="col"colspan="2">Sub Total</th>
                </tr>
            </thead>
            <tbody>
            @foreach($carts as $cart)
                <tr>
                    <td><img src="{{asset($cart->product->img)}}" alt="" width="100"></td>
                    <td>{{$cart->product->name}}</td>
                    <td>{{$cart->qty}}</td>
                    <td>x</td>
                    <td>Rp {{$cart->product->price}}</td>
                    <td>=</td>
                    <td>Rp {{$cart->product->price * $cart->qty}}</td>
                    <td><a href="{{url('/cart/'.$cart->id)}}" class="btn btr-info" role="button">Remove</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/pay') }}">
            {{ csrf_field() }}
            <table class="table">
                <tr>
                    <td>Total Price</td>
                    <td>Rp {{$totalPrice}}</td>
                </tr>
                <tr>
                    <td>Payment</td>
                    <td class="form-group{{ $errors->has('payment') ? ' has-error' : '' }}">
                        <input id="payment" type="text" class="form-control" name="payment" value="{{ old('payment') }}">
                        @if ($errors->has('payment'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('payment') }}</strong>
                                    </span>
                        @endif
                    </td>
                    <td class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn"></i> Submit
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
@endsection