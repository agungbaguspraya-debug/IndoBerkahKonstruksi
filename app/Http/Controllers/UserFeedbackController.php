<?php

namespace App\Http\Controllers;

use App\Models\UserFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFeedbackController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'nullable|string|max:255',
            'content'    => 'required|string',
            'project_id' => 'required|exists:projects,id',
        ]);

        UserFeedback::create([
            'user_id'    => Auth::id(),
            'project_id' => $request->project_id,
            'title'      => $request->title ?: 'Masukan Laporan Lapangan',
            'content'    => $request->content,
            'status'     => 'pending',
        ]);

        return back()->with('feedback_success', 'Masukan Anda telah berhasil dikirim ke admin.');
    }
}
