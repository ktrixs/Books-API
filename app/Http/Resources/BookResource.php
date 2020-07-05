<?php

declare (strict_types=1);


namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Author;
use App\BookReview;
use App\Http\Resources\AuthorResource;
use App\Http\Resources\BookReviewResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            // @TODO implement
        'id' => $this->id,
        'isbn' => $this->isbn,
        'title' => $this->title,           
        'description' => $this->description,           
        'authors' => AuthorResource::collection(Author::all()),           
        'review' => BookReviewResource::collection(BookReview::all()),
        ];
    }
}
