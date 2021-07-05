<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Exception;

class AuthorController extends Controller
{
    public function store(AuthorRequest $authorRequest)
    {
        $data = $authorRequest->all();

        try {
            Author::create($data);
            
            return response()->json([
                'success' => true,
                'message' => 'Successfully create author',
            ], 200);
        } catch (Exception $e) {
            report($e);
            
            return response()->json([
                'success' => false,
                'message' => 'Something wrong',
                'errors' => $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $author = Author::findOrFail($id);
            $author->delete();
            $author->books()->detach();

            return response()->json([
                'success' => true,
                'message' => 'Successfully delete author',
            ], 200);
        } catch (Exception $e) {
            report($e);
            
            return response()->json([
                'success' => false,
                'message' => 'Something wrong',
                'errors' => $e->getMessage()
            ]);
        }
    }

    public function update(AuthorRequest $authorRequest, $id)
    {
        $author = Author::findOrFail($id);
        $data = $authorRequest->except(['book_id']);

        try {
            $author->update($data);
            $author->books()->sync($authorRequest->book_id);

            return response()->json([
                'success' => true,
                'message' => 'Successfully update author',
            ], 200);
        } catch (Exception $e) {
            report($e);
            
            return response()->json([
                'success' => false,
                'message' => 'Something wrong',
                'errors' => $e->getMessage()
            ]);
        }
    }
}