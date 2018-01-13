@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Our Products</h2>
        @if(!Auth::guest())
        <a href="{{url('/cart')}}" class="btn btn-info" role="button">Go To Cart</a>
        @endif
        <hr>

        <div class="row">

            <div class="col-sm-4">
                <div class="card border-light">
                    <ul class="list-group list-group-flush">

                    </ul>
                    @foreach($types as $t)
                        <li class="list-group-item {{$type == $t->name ? 'active' : ''}}">
                            <a href="{{url('/product/type='.$t->name)}} ">
                                <p class="text-left mt-3">
                                    {{$t->name}}
                                    <img src="{{asset($t->img)}}" height="40" class="d-inline-block align-right mb-2 ml-5">
                                </p>
                            </a>
                        </li>

                    @endforeach
                </div>
            </div>

            <div class="col-sm-8">
                <div class="card-deck" >
                    @foreach($products as $p)
                        <div class="card" style="display: inline-block;margin: 1%">
                            <img src="{{asset($p->img)}}" alt="" class="card-img-top" width="200">

                            <form action="{{url('/addtocart/' . $p->id)}}" method="post">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <p class="card-title text-center">{{$p->name}}</p>
                                    <hr>
                                    <div class="card-text text-center">
                                        Rp {{$p->priceM}}
                                        <br>
                                        <input type="number" name="qty" value="0"style="width: 80%;margin: auto">
                                    </div>
                                </div>
                                @if (!Auth::guest())
                                    <div class="card-footer">
                                        <input type="submit" class="btn btn-success float-left mx-auto" style="width:50%;" name="submit" value="Add To Cart">
                                    </div>
                                @endif

                            </form>
                        </div>
                    @endforeach
                </div>
                <div class="mx-auto">
                    {{$products->links()}}
                </div>
            </div>

        </div>

    </div>
@endsection