<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all books along with their authors and reviews
        $books = Book::all();
        return view('welcome', compact('books'));
        //dit is de welcome blade waar alle boeken wordt laten zien
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addbooks');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate and save a new book
        $request->validate([
            'book_title' => 'required|string|max:255',
            'book_author' => 'required|string|max:255',
            'publication_year' => 'required|integer|min:1900|max:2100',
            'genres' => 'nullable|array',
        ]);

        $bookData = $request->all();
        $bookData['genres'] = json_encode($request->input('genres'));
    
        Book::create($bookData);
    
        return redirect()->route('welcome')->with('success', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('bookdetails', compact('book')); //books.show
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('bookedit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate and edit a book
        $request->validate([
            'book_title' => 'required|string|max:255',
            'book_author' => 'required|string|max:255',
            'publication_year' => 'required|integer|min:1900|max:2100',
            'genres' => 'nullable|array',
        ]);

        $book = Book::findOrFail($id);

        $bookData = $request->all();
        $bookData['genres'] = json_encode($request->input('genres'));
    
        $book->update($bookData);
    
        return redirect()->route('welcome')->with('success', 'Book created successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return view('welcome');
    }
}
