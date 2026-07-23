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
            'message'    => 'required|max:500',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'project_id' => 'required|exists:projects,id',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('reviews', 'public');
        }

        review::create([
            'user_id'    => Auth::id(),
            'project_id' => $request->project_id,
            'message'    => $request->message,
            'is_approved' => false,
            'image'      => $imagePath,
        ]);

        return back()->with('success', 'Review berhasil dikirim.');
    }
}