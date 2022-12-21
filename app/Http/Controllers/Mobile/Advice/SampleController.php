<?php

namespace App\Http\Controllers\Mobile\Advice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function __invoke(Request $request)
    {
        return view("/mobile/advice/fileUploadSample");
    }
}
