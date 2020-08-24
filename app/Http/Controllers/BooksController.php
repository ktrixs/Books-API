<?php

declare (strict_types=1);

namespace App\Http\Controllers;

use App\User;
use App\Book;
use App\BookReview;
use App\Author;
use App\Http\Requests\PostBookRequest;
use App\Http\Requests\PostBookReviewRequest;
use App\Http\Resources\BookResource;
use App\Http\Resources\BookReviewResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;
use Auth;

class BooksController extends Controller
{
    public function getCollection(Request $request)
    {

        // $books = BookResource::collection(Book::with('authors')->paginate(15));
            $books = BookResource::collection(
        // GET /books?sort=-title
        QueryBuilder::for(Book::with('authors'))
        ->allowedSorts([
          'title','id',
        ])
        ->allowedFilters('name')
        ->get()
      );

            return $books;
    }

    public function post(PostBookRequest $request)
    {

        // @TODO implement
        if (Auth::user()->is_admin === 1) {
            # code...
          $author = Author::create([
            'name' => $request->name,
            'surname' => $request->surname,
          ]);

          $book = Book::create([
            'isbn' => $request->isbn,
            'title' => $request->title,
            'description' => $request->description,
            'authors' => [$author],
          ]);

          return new BookResource($book);
        }
        return response()->json(['error' => 'You cant create a books, you dont have access.'], 403);
    }

    public function postReview(int $bookId, PostBookReviewRequest $request)
    {
        
        // @TODO implement

        
    }
}
