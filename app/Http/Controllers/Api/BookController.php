<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request('q') !== null){
            $books['data'] = Book::where('title', 'like', '%' . request('q') . '%')->get();

            return response()->json($books);
        }
        else{

            return BookResource::collection(Book::all());
            // $books = Book::orderBy('created_at', 'DESC')->paginate(6);

           // return response()->json($books);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $cover = request()->file('cover');
        // $imageName = $cover->getClientOriginalName();
        // $imageName = time().'_'.$imageName;
        // $cover->move(public_path('/assets/img/books'), $imageName);


        $book = new Book;
        $book->title = $request->title;
        $book->description = $request->description;
        // $book->cover = $imageName;
        // $book->author = $request->author;
        // $book->category = $request->category;
        $book->save();

        return response()->json($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
