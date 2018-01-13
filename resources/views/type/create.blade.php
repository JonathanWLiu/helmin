@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Our Products</h2>
        <hr>

        <div class="row">

            <div class="col-sm-4">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/type') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Type Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
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
                                <i class="fa fa-btn "></i> Add Type
                            </button>
                        </div>
                    </div>
            </div>

            <div class="col-sm-8">
                <div class="card-deck" >
                    @foreach($types as $type)
                        <div class="card" style="display: inline-block;margin: 1%">
                            <form action="{{url('/type/' . $type->id)}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <p class="card-title text-center">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">Type Name</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" value="{{$type->name}}">

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    </p>
                                    <hr>
                                    <div class="card-text text-center" style="width: 50%;float: left;">
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-btn "></i> Update
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-text text-center"style="width: 50%;float: right">
                                        <td><a href="{{url('/type/'.$type->id)}}" class="btn btr-info" role="button">Remove</a></td>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>


        </div>


    </div>
@endsection