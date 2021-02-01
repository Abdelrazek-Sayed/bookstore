<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookResourse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiBookController extends Controller
{
    public function index()
    {
        $books =Book::get();
    //    return response()->json($books); // easy methode
    //laravel method
    return BookResourse::collection($books);
    }


    // to read ONE BOOK
    public function show($id)
    {
        $books =Book::findOrFail($id);
    
    return new BookResourse($books);
    }

    // storing data through api 
    public function store(Request $request)
{
    // validation
// $request->validate(
//     [
//         'name' => 'required|string|min:2|max:255',
//         'desc' => 'required|string|min:10',
//          'img' => 'required|image|mimes:jpg,jpeg,png',
//         'cat_id' =>'required|integer|exists:cats,id',
//     ]
// );

$validator = Validator::make($request->all(),[

    'name' => 'required|string|min:2|max:255',
    'desc' => 'required|string|min:10',
     'img' => 'required|image|mimes:jpg,jpeg,png',
    'cat_id' =>'required|integer|exists:cats,id',
]);

if($validator->fails()){
    $errors = $validator->errors();
    return response()->json($errors);
}

    // upload: where - how

  $path = storage::putFile('books',$request->file('img'));
 

    //store in database
    Book::create([
        'name'=>$request->name,
        'desc'=>$request->desc,
        'img'=>$path,
        'cat_id'=>$request->cat_id,
    ]);

    // redirecttion 
    $msg = "book stored successfully";
    return  response()->json($msg);
}
// update api

public function update($id, Request $request)
{
    //validation 
    // $request->validate([
    //     'name' => 'required|string|min:5|max:255',
    //     'desc' => 'required|string|min:10',
    //     'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    //     'cat_id'=>'required|integer|exists:cats,id'
    // ]);

    $validator = Validator::make($request->all(),[

        'name' => 'required|string|min:5|max:255',
        'desc' => 'required|string|min:10',
        'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'cat_id'=>'required|integer|exists:cats,id'
    ]);

        if ($validator->fails()){

        $errors = $validator->errors();
        return response()->json($errors);
        
    }

    $book =  Book::findOrFail($id);
    $path = $book->img;
// if he upload image
    if($request->hasFile('img')){
        // delete old image
        storage::delete($path);
        //uploade new 
        $path =storage::putFile('books',$request->file('img'));
    } 
    /// store new data
   $book->update([
        'name'=>$request->name,
        'desc'=>$request->desc,
        'img' =>$path,
        'cat_id' =>$request->cat_id,
    ]);
    
    
    // redirect
    $msg = "book updated";
    return response()->json($msg);
  
}
public function delete($id)
{
            $book = Book::findOrFail($id);
            $path = $book->img;
            storage::delete($path);
            $book->delete();


            $msg = "book deleted";
            return response()->json($msg);
}


}
