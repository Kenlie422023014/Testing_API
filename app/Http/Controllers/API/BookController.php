<?php

namespace App\Http\Controller\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\Httpkernel\Exception\HttpException;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the item
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Book::get();
    }

    /**
     * store a newly created item in storage
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $book = new Book;
            $book->fill($request->validated())->save();
            
            return $book;

        } catch(\Exception $exception){
            throw new HttpExceeption(400, "Invalid data-{$exception->getMessage}");
        }

    }
        /**
         * Display the specified item.
         * 
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $book = $Book::find0rfail($id);

            return $book;

        }

        /**
         * Uodate the specified item in storage
         * 
         * @param \Illuminate\Http\Request $request
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            if (!$id) {
                throw new HttpException(400, "Invalid id");
            }
            try {
                $book = Book::find($id);
                $book->fill($request->validated())->save();

                return $book;
            }
        
            catch (\Exception $exception) {
                throw new HttpException(400,"Invalid data - {$exception->getMessage}");
            }
            
        }

        /**
         * Remove the specified item from storage
         * 
         * @param int $id
         * @return \Illuminate\http\Response
         */
        public function destroy($id)
        {
            $book = Book::find0rfail(id);
            $book->delete();

            return response()->json(null,204);
        }

}