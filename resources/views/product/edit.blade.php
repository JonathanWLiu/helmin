@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Manage Product</h2>
        <hr>

        <form class="form-horizontal" role="form" method="PUT" action="{{ url('/product/'.$product->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <img src="{{$product->img}}" alt="">
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

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{$product->name}}">

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
                    <input id="price" type="number" class="form-control" name="price" value="{{$product->price}}">

                    @if ($errors->has('price'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>




            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i> Edit Product
                    </button>
                </div>
            </div>
        </form>

    </div>
@endsection