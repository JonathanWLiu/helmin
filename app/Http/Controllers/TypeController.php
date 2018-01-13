<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

use App\Http\Requests;

class TypeController extends Controller
{
    public function create()
    {
        $types = Type::all();
        return view('type.create',compact('types'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:type,name|min:3',
            'img' => 'required',
        ]);

        $t = new Type();

        $destinationPath = public_path('img/types');
        $extension = $request->file('img')->getClientOriginalExtension();
        $fileName = uniqid().'.'.$extension;
        $request->file('img')->move($destinationPath,$fileName);


        $t->name = $request->name;
        $t->img = $destinationPath.'/'.$fileName;

        $t->save();

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:type,name|min:3',
        ]);

        $t =Type::find($id);

        $t->name = $request->name;
        $t->save();

        return redirect()->back();

    }

    public function destroy($id)
    {
        $t = Type::find($id);
        $t->delete();

        return redirect()->back();
    }
}
