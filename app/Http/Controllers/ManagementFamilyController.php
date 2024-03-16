<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementFamilyController extends Controller
{
    public function index ()
    {
        return view('family.index');
    }
}
