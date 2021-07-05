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
        $author = Author::find($id);
        
        try {
            if ($author) {
                $author->delete();
                $author->books()->detach();
    
                return response()->json([
                    'success' => true,
                    'message' => 'Successfully delete author',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Author not found',
                ], 404);
            }
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
        $author = Author::find($id);
        
        try {
            if ($author) {
                $data = $authorRequest->except(['book_id']);
                $author->update($data);
                $author->books()->sync($authorRequest->book_id);
    
                return response()->json([
                    'success' => true,
                    'message' => 'Successfully update author',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Author not found',
                ], 404);
            }
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