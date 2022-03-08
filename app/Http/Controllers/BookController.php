<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'Title' => ['required', 'string', 'between:5,20'],
            'Author' => ['required','between:5,20'],
            'Page' => ['required','integer'],
            'Year' => ['required'],
        ], [
            'Title.required' => 'the title must be filled'
        ]);
        if ($validated) {
            Book::create([
                'Title' => $request->Title,
                'Author' => $request->Author,
                'Page' => $request->Page,
                'Year' => $request->Year,
            ]);
        }
        return back();
    }

    public function show(Book $book)
    {
        $books = Book::all();
        return view('list', compact('books'));
    }

    public function edit($id, Request $request)
    {
        $book = Book::findOrFail($id);
        return view('update', compact('book'));
    }

    public function update($id, Request $request, Book $book)
    {
        Book::findOrFail($id)->update([
            'Title' => $request->Title_book,
            'Author' => $request->Author_book,
            'Page' => $request->Page_book,
            'Year' => $request->Year_book,
        ]);
        $books = Book::all();
        return view('list', compact('books'));
    }

    public function destroy($id)
    {
        Book::destroy($id);
        return back();
    }
}
