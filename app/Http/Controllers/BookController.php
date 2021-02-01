<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Cat;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{
    public function index()
    {

        $books = Book::orderby("id","desc")->paginate(5);
  
       return view('books.index',[
           'books' => $books
       ]);
    }



    public function show($id)
    {
/**
 * get()= mysqli_fetch_all
 * first()= mysqli_fetch_assoc
 * find() to get page by id
 *  */  

     //  Book::where("id","=",$id)->first();

         $book = Book::findorfail($id);
         return view('books.show',[
        'book' => $book
        ]);
    }

public function search($keyword)
{
    $books = Book::where("name","like","%$keyword%")->get();
    return view('books.search',[
        'books'=> $books
    ]);
}

public function create()
{
$cats = Cat::get();
      return view('books.create',[
          'cats' => $cats
      ]);
}

public function store(Request $request)
{
    // validation
$request->validate(
    [
        'name' => 'required|string|min:2|max:255',
        'desc' => 'required|string|min:10',
        'img' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'cat_id' =>'required|integer|exists:cats,id',
    ]
);

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
return redirect(url('/books'));
}



//edit
public function edit($id){

    $book = Book::findOrFail($id);
    $cats = Cat::select('id','name')->get();

    return view('books/edit',[

        'book'=> $book,
        'cats' =>$cats
    
        ]);
}



public function update($id, Request $request)
{
    //validation 
    $request->validate([
        'name' => 'required|string|min:5|max:255',
        'desc' => 'required|string|min:10',
        'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'cat_id'=>'required|integer|exists:cats,id'
    ]);
    
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
    return redirect(url("/books/show/{$id}"));
}

//delete
public function delete($id)
{
            $book = Book::findOrFail($id);
            $path = $book->img;
            storage::delete($path);
            $book->delete();


    return redirect(url("/books"));
}
}
