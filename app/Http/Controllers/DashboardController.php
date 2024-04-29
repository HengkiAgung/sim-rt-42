<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $chartData = [
            'labels' => ['Anak', 'Orang Tua', 'Lansia'],
            'data' => [65, 59, 80],
        ];
        return view('dashboard', compact('chartData'));
    }
}