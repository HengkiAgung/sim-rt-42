<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagementCitizenController extends Controller
{
    public function index (){
        return view('citizen.index');
    }

    // getDataTable
}
