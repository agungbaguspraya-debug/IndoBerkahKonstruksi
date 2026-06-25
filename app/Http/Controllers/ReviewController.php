<?php

namespace App\Http\Controllers;

use App\Models\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|max:500'
        ]);

        review::create([
            'user_id' => Auth::id(),
            'message' => $request->message,
            'is_approved' => true,
        ]);

        

        return back()->with('success', 'Review berhasil dikirim.');
    }
}