<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }

    public function logs() {
        $reports = Report::join('posts', 'posts.id', '=', 'reports.post_id')
                            ->join('user_profiles', 'user_profiles.id', '=', 'reports.user_profile_id')
                            ->select('reports.*', 'posts.post_title', 'user_profiles.name')
                            ->get();
        return view('admin.logs', compact('reports'));
    }
}
