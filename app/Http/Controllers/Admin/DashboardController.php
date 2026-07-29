<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'products' => 12,
            'categories' => 4,
        ];

        return view('admin.dashboard', compact('stats'));
    }

    public function flashDemo()
    {
        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Day la flash message demo!');
    }
}