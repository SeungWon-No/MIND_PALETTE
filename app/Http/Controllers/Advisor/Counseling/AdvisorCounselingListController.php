<?php

namespace App\Http\Controllers\Advisor\Counseling;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvisorCounselingListController extends Controller
{
    public function index(Request $request)
    {
        return view("/advisor/counseling/counselingList");
    }

    public function store(Request $request)
    {
        
    }

    public function show(Request $request)
    {
        
    }

}