<?php

use Illuminate\Support\Facades\Route;

$mobileSubDomain = env('MOBILE_SUB_DOMAIN', 'dev-m');
$advisorSubDomain = env('ADVISOR_SUB_DOMAIN', 'dev-advisor');

Route::domain($mobileSubDomain .'.maeumpalette.com')->group(function () {
    Route::get('/', function () {
        return "MMM";
    });
});

Route::domain($advisorSubDomain.'.maeumpalette.com')->group(function () {
    Route::get('/', function () {
//        return view('welcome');
        return "DDDDD";
    });
});

