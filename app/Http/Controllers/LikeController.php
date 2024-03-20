<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class LikeController extends Controller{
    public function like(Upload $like, Request $request) {
        if (!Auth::check()) {
            return response()->json(['error' => 'You must be logged in to like an upload.']);
        }
    
        // Check if user has already liked
        $userLiked = $like->likes()->where('user_id', auth()->id())->exists();
    
        if (!$userLiked) {
            $like->increment('likes');
            $like->likes()->attach(auth()->id());
    
            if ($request->ajax()) {
                $response = [
                    'success' => true,
                    'likes_count' => $like->likes,
                    'user_liked' => true,
                ];
                return response()->json($response);
            }
    
            return redirect()->back()->with('success', 'Upload liked successfully!');
        } else {
            // User has already liked, prevent duplicate likes
            return response()->json(['error' => 'You can only like an upload once.']);
        }
    }
    
    public function unlike(Upload $like, Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'You must be logged in to unlike an upload.']);
        }
    
        // Check if user has already liked
        $userLiked = $like->likes()->where('user_id', auth()->id())->exists();
    
        if ($userLiked) {
            $like->decrement('likes');
            $like->likes()->detach(auth()->id());
    
            if ($request->ajax()) {
                $response = [
                    'success' => true,
                    'likes_count' => $like->likes,
                    'user_liked' => false,
                ];
                return response()->json($response);
            }
    
            return redirect()->back()->with('success', 'Upload unliked successfully!');
        } else {
            // User hasn't liked yet, prevent unnecessary unlike actions
            return response()->json(['error' => 'You can only unlike an upload that you have already liked.']);
        }
    }
    
}

