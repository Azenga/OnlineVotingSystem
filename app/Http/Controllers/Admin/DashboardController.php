<?php

namespace App\Http\Controllers\Admin;

use App\Vote;
use App\Selection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        Gate::authorize('view-admin-dashboard');
        
        return view('admin.dashboard', [
            'votes' => $this->getAllVotes(),
            'presidential_votes' => $this->getPresidentialVotesCount(),
        ]);
    }

    private function getAllVotes()
    {
        return Vote::all(['id'])->count();
    }

    private function getPresidentialVotesCount()
    {
        return Selection::where('position_id', 1)->get()->count();
    }
}
