@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Manage Product</h2>
        <hr>

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/product') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                <label for="type" class="col-md-4 control-label">Type</label>

                <div class="col-md-6">
                    <select name="type" id="type" class="form-control">
                        @foreach($types as $t)
                            <option value="{{$t->id}}">{{$t->name}}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('type'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                <label for="price" class="col-md-4 control-label">Price</label>

                <div class="col-md-6">
                    <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}">

                    @if ($errors->has('price'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
                <label for="img" class="col-md-4 control-label">Image</label>

                <div class="col-md-6">
                    <input id="img" type="file" class="form-control" name="img" accept="/image">

                    @if ($errors->has('img'))
                        <span class="help-block">
                                                <strong>{{ $errors->first('img') }}</strong>
                                            </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i> Add New Product
                    </button>
                </div>
            </div>
        </form>

        <div class="card-deck" >
            @foreach($products as $p)
                <div class="card" style="display: inline-block;margin: 1%">
                    <img src="{{asset($p->img)}}" alt="" class="card-img-top" width="200">

                    <div class="card-body">
                        <p class="card-title text-center">{{$p->name}}</p>
                        <hr>
                        <div class="card-text text-center" >
                            Rp  {{$p->priceM}}
                            <br>
                            <form  action="{{url('/product/'.$p->id.'/edit')}}" method="get">
                                {{csrf_field()}}
                                <input type="submit" class="btn btn-success" name="submit" value="Update">
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="mx-auto">
            {{$products->links()}}
        </div>
    </div>
@endsection