<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ManualBook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManualBookController extends Controller
{
    public function ShowManualBook()
    {
        $user = Auth::user();
        $manual_books = ManualBook::all();
        // return view('ManualBook.ManualBook', compact('user', 'manual_books'));
        return view('ManualBook.ManualBook', compact('user', 'manual_books'));
    }

    public function AddManualBookPage()
    {
        $user = User::all();
        $manual_books = ManualBook::all();
        return view('ManualBook.AddManualBook', compact('user', 'manual_books'));
    }

    public function AddManualBook(Request $request)
    {
        $request->validate([
            'manual_book_name' => 'required|string|max:255|unique:manual_books',
            'manual_book_description' => 'required|unique:manual_books',
            'manual_book_writer' => 'required|string|max:255',
        ]);
        ManualBook::create([
            'manual_book_name' => $request->manual_book_name,
            'manual_book_description' => $request->manual_book_description,
            'manual_book_writer' => $request->manual_book_writer,
        ]);

        $user = Auth::user();
        $manual_books = ManualBook::all();
        return view('ManualBook.ManualBook', compact('manual_books', 'user'))->with('success', 'Add Company successful!');
    }

    public function EditManualBookPage($id)
    {
        $user = Auth::user();
        $manual_book_id = ManualBook::findOrFail($id);
        $manual_book = ManualBook::all();
        return view('ManualBook.EditManualBook', compact('user', 'manual_book', 'manual_book_id'));
    }

    public function EditManualBook(Request $request, $id)
    {
        $manual_book = ManualBook::findOrFail($id);

        $request->validate([
            'manual_book_name' => 'nullable|string|max:255|unique:manual_books',
            'manual_book_description' => 'nullable|unique:manual_books',
            'manual_book_writer' => 'nullable|string|max:255|unique:manual_books',
        ]);

        $manual_book = ManualBook::findOrFail($id);

        $manual_book->manual_book_name = $request->manual_book_name;
        $manual_book->manual_book_description = $request->manual_book_description;
        $manual_book->manual_book_writer = $request->manual_book_writer;

        $manual_book->save();

        $user = Auth::user();
        $manual_books = ManualBook::all();

        return redirect()->route('ShowManualBook', compact('manual_books', 'user'));
        // return view('ManualBook.ManualBook', compact('manual_books', 'user'));
    }

    public function DetailManualBookPage(Request $request, $id)
    {
        $manual_book = ManualBook::findOrFail($id);
        $user = Auth::user();
        return view('ManualBook.DetailManualBook', compact('user', 'manual_book'));
    }

    public function DeleteManualBook($id)
    {
        $manual_book = ManualBook::findOrFail($id);
        $manual_book->delete();

        return redirect('/ManualBook')->with('success', 'ManualBook deleted');

    }

}
