<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserJobController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $jobs = $user->jobs; 
        return view('user.edit_delete', compact('jobs')); 
    }
}
