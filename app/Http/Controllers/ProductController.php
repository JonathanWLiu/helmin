<?php

namespace App\Http\Controllers;

use App\Product;
use App\Type;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        $products = Product::paginate(9);
        $type = null;
        return view('product.index',compact('types','products','type'));
    }

    public function type($type){
        $req = Type::where('name',$type)->first();
        $types = Type::all();
        $products = Product::where('typeId',$req->id)->paginate(9);
        return view('product.index',compact('types','products','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $products = Product::paginate(4);
        return view('product.create',compact('types','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:products,name|min:5',
            'type' => 'required',
            'price' => 'required|numeric',
            'img' => 'required',
        ]);

        $products =  new Product;

        $destinationPath = public_path('img/products');
        $extension = $request->file('img')->getClientOriginalExtension();
        $fileName = uniqid().'.'.$extension;
        $request->file('img')->move($destinationPath,$fileName);

        $products->name = $request->name;
        $products->typeId = $request->type;
        $products->price = $request->price;
        $products->img = $destinationPath.'/'.$fileName;
        $products->save();

        return redirect('/product/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Type::all();
        $product = Product::find($id);
        return view('product.edit',compact('types','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|unique:products,name|min:5',
            'type' => 'required',
            'price' => 'required|numeric',
            'img' => 'required',
        ]);

        $products =  Product::find($id);

        $destinationPath = public_path('img/products');
        $extension = $request->file('img')->getClientOriginalExtension();
        $fileName = uniqid().'.'.$extension;
        $request->file('img')->move($destinationPath,$fileName);

        $products->name = $request->name;
        $products->typeId = $request->type;
        $products->priceM = $request->priceM;
        $products->priceL = $request->priceL;
        $products->img = $destinationPath.'/'.$fileName;
        $products->save();

        return redirect('/product/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();

        return redirect()->back();
    }
}
