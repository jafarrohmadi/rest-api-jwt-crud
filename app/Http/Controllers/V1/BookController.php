<?php

namespace App\Http\Controllers\V1;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
    	$book=Book::all();
		return response()->json($book,200);
    }

    public function store(Request $request)
	{
		$book = new Book();
		$book->name = $request->name;
		$book->price = $request->price;
		$book->stock = $request->stock;
		$book->sku = $request->sku;
		$success = $book->save();
	 
		if (!$success) {
	        return response()->json("error saving",500);
		}
	 
	    return response()->json("success",201);
	}

    public function show($id)
    {
    	$book = Book::find($id);
		if (is_null($book)) {
		    return response()->json("not found",404);
		}
	 
		return response()->json($book,200);
    }

    public function update($id, Request $request)
	{
		$book = Book::find($id);
		
		if (is_null($book)) {
			return response()->json("not found",404);
		}

		$book->name = $request->name;
		$book->price = $request->price;
		$book->stock = $request->stock;
	 	$book->sku = $request->sku;
		
		$success = $book->save();
	 
		if(!$success)
		{
			return response()->json("error updating",500);
		}
	 
		return response()->json("success",201);
	}
	
	public function destroy($id)
	{
		$book = Book::find($id);
		
		if (is_null($book)) {
			return Response::json("not found",404);
		}
	 
		$success=$book->delete();
	 
		if(!$success)
		{
			return response()->json("error deleting",500);
		}
	 
		return response()->json("success",200);
	}
}