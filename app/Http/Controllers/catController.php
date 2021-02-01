<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class catController extends Controller
{
    //index

    public function index(){

            $cats = Cat::get();
            return view('cats.index',[
            'cats' => $cats
]);
    }


    public   function show($id)
    {
            $cat = Cat::findOrFail($id); // get from model = database

            return view('cats.show',[   // send to  
            'cat'=> $cat
            ]);
    }
    public function create()
    {
            return view('cats.create');
    }

    // store data
    public function store(Request $request){

            $request->validate([
            'name' => 'required|string|max:50'
            ]);

            Cat::create([
            'name' => $request->name
            ]);

            return redirect(url('/cats'));
    }

    public function edit($id){
            $cat = Cat::findOrFail($id);
            return view('cats.edit',[
            'cat' => $cat
            ]);
    }

       // update data
       public function update($id,Request $request){

        $request->validate([
        'name' => 'required|string|max:50'
        ]);

        Cat::findOrFail($id)->update([
        'name' => $request->name
        ]);

        return redirect(url("/cats"));
}

public function delete($id)
{
     Cat::findOrFail($id)->delete();
     return redirect(url("/cats"));
}
}
