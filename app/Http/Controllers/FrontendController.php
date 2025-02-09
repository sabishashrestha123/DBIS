<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\StudentUser\StoreStudentUserRequest;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Feedback;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function index()
    {

        $sliders = Slider::where('status', 1)->latest()->get();
        $feedbacks = Feedback::latest()->get();
        return view('frontend.index', compact('sliders', 'feedbacks'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        if (empty($searchTerm)) {
            return view('frontend.book', ['books' => collect()]);
        }

        // Get all books
        $allBooks = Book::all();
        $searchResults = collect();

        // Linear search implementation
        foreach ($allBooks as $book) {
            // Convert both search term and book data to lowercase for case-insensitive search
            $searchTerm = strtolower($searchTerm);
            $title = strtolower($book->title);
            $author = strtolower($book->author);
            $edition = strtolower($book->edition);

            // Sequential checking of each field
            if (str_contains($title, $searchTerm) ||
                str_contains($author, $searchTerm) ||
                str_contains($edition, $searchTerm)) {
                $searchResults->push($book);
            }
        }

        return view('frontend.book', ['books' => $searchResults]);
    }
    public function studentLogin()
    {
        return view('frontend.auth.login');
    }

    public function studentRegistration()
    {
        return view('frontend.auth.register');
    }
    public function studentReg(StoreStudentUserRequest $request)
    {
        User::create(array_merge($request->validated(), ['password' => Hash::make($request->password), 'role' => 'student']));
        toast('You are  registered Successfully', 'success');
        return to_route('studentLogin');
    }
    public function adminlogin()
    {
        return view('frontend.auth.adminlogin');
    }
    public function csit()
    {
        return view('frontend.csit');
    }
    public function feedback()
    {
        return view('frontend.feedback');
    }
    public function feedbackPost(StoreFeedbackRequest $request)
    {

        Feedback::create($request->validated());
        toast('Feedback submitted successfully', 'success');
        return back();
    }
    public function librarian()
    {
        return view('frontend.auth.librarian');
    }
    public function bca()
    {
        return view('frontend.bca');
    }
    public function back()
    {
        return view('backend.index');
    }

    public function showByCategory(BookCategory $bookCategory)
    {
        $bookCategory->load(['semesters.books']);
        return view('frontend.bookDetail', compact('bookCategory'));
    }
    public function showBook(Book $book)
    {
        $book->load([ 'bookCategory']);
        return view('frontend.bookShow', compact('book'));
    }
}
