<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        $roleName = Auth::user()->role->name;
        return Inertia::render('Dashboard', [
            'role' => $roleName,
        ]);
    }

    public function guest()
    {
        return Inertia::render('Welcome', [
            'role' => $roleName,
        ]);
    }
}
