<?php

//declare (strict_types=1);

namespace App\Http\Controllers;

use App\Book;
use App\BookReview;
use App\Http\Requests\PostBookRequest;
use App\Http\Requests\PostBookReviewRequest;
use App\Http\Resources\BookResource;
use App\Http\Resources\BookReviewResource;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function getCollection(Request $request)
    {
        // @TODO implement
        
    }

    public function post(PostBookRequest $request)
    {

        // @TODO implement
        
    }

    public function postReview(int $bookId, PostBookReviewRequest $request)
    {
        
        // @TODO implement

        
    }
}
