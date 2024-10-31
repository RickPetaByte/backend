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
            'book_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $bookData = $request->all();
        $bookData['genres'] = json_encode($request->input('genres'));

        if ($request->hasFile('book_image')) {
            $fileName = time() . '_' . $request->file('book_image')->getClientOriginalName();
            $filePath = $request->file('book_image')->storeAs('images', $fileName, 'public');
            $bookData['book_image'] = '/storage/' . $filePath;
        }
    
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
            'book_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $book = Book::findOrFail($id);

        $bookData = $request->all();
        $bookData['genres'] = json_encode($request->input('genres'));

        if (!$request->hasFile('book_image')) {
            $request->merge(['book_image' => null]);
        }

        if ($request->hasFile('book_image') && $request->file('book_image')->isValid()) {
            if ($book->book_image && file_exists(public_path($book->book_image))) {
                unlink(public_path($book->book_image));
            }
        
            $fileName = time() . '_' . $request->file('book_image')->getClientOriginalName();
            $filePath = $request->file('book_image')->storeAs('images', $fileName, 'public');
            $bookData['book_image'] = '/storage/' . $filePath;
        } 
        else {
            $bookData['book_image'] = $book->book_image;
        }

        $book->update($bookData);
    
        return redirect()->route('welcome')->with('success', 'Book edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        // Sla de naam van de afbeelding op voordat je het boek verwijdert
        $imagePath = $book->book_image;

        // Verwijder het boek uit de database
        $book->delete();

        // Controleer of andere boeken dezelfde afbeelding gebruiken
        $otherBooksUsingImage = Book::where('book_image', $imagePath)->exists();

        // Verwijder de afbeelding alleen als er geen andere boeken zijn die deze afbeelding gebruiken
        if (!$otherBooksUsingImage && $imagePath && file_exists(public_path($imagePath))) {
            unlink(public_path($imagePath));
        }

        return redirect()->route('welcome')->with('success', 'Book deleted successfully');
    }

}
