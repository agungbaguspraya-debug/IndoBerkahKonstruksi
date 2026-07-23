<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = \App\Models\TeamMember::where('is_visible', true)
            ->where('status', 'accepted')
            ->get();
        return view('frontend.our-team', compact('teamMembers'));
    }
}
