<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Book;
use Illuminate\Support\Facades\Validator;



class ApiBookController extends Controller
{
    public function index()
    {
        $books = Book::get();
        return response()->json($books);
    }

    public function show($id)
    {
        $books = Book::findorfail($id);
        return response()->json($books);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'title' =>'required|string|max:100',
        //     'desc'  =>'required|string',
        //     'img'   =>'required|image|mimes:jpg,png',
        //     'category_ids' => 'required',
        //     'category_ids.*' => 'exists:categories,id'
        // ]);

        $validator = Validator::make($request->all(), [
            'title' =>'required|string|max:100',
            'desc'  =>'required|string',
            'img'   =>'required|image|mimes:jpg,png',
            'category_ids' => 'required',
            'category_ids.*' => 'exists:categories,id'
        ]);
 
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }

        $img  = $request -> file('img');
        $ext  = $img     -> getClientOriginalExtension();
        $name = "book-" .uniqid() . ".$ext";
        $img  ->move( public_path('uploads/books'), $name );
        // dd($name);

        $book = Book::create([
            'title' => $request ->title,
            'desc'  => $request ->desc,
            'img'   => $name,
        ]);

        $book->categories()->sync($request->category_ids);
        $success = "Book Created Successfully";

        return response()->json($success);
    }

    public function update(request $request,$id)
    {
        // $request->validate([
        //     'title' =>'required|string|max:100',
        //     'desc'  =>'required|string',
        //     'img'   =>'nullable|image|mimes:jpg,png'
        // ]);

        $validator = Validator::make($request->all(), [
            'title' =>'required|string|max:100',
            'desc'  =>'required|string',
            'img'   =>'required|image|mimes:jpg,png',
            'category_ids' => 'required',
            'category_ids.*' => 'exists:categories,id'
        ]);
 
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }
        
        $book = Book::findorfail($id);
        $name = $book->img;

        if ($request->hasFile('img'))
        {
            if($name !== null)
            {
                unlink(public_path('uploads\books\\'.$name));
            }
            $img = $request->file('img');
            $ext = $img ->getClientOriginalExtension();
            $name = 'book-'. uniqid(). ".$ext"; 
            $img ->move(public_path('uploads/books'),$name);    
        }

        $book->update([
            'title' =>$request ->title,
            'desc'  =>$request ->desc,
            'img'   =>$name,
        ]);
        $book->categories()->sync($request->category_ids);
        $success = "Book Updated Successfully";

        return response()->json($success);
    }

    public function delete($id)
    {

        $book = Book::findOrFail($id);
        
        $img_path = public_path('uploads\books\\'.$book->img);
        // dd($img_path);
        if($book->img !== null)
        {
            unlink($img_path);
        }
        $book->categories()->sync([]);


        $book ->delete();

        $success = "Book deleted Successfully";

        return response()->json($success); 
    }
}
