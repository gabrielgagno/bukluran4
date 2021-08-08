<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
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
        return Inertia::render('GuestHome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
}
