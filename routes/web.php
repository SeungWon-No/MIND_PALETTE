<?php

use App\Http\Controllers\Mobile\indexController;
use App\Http\Controllers\Mobile\Login\LoginController;
use Illuminate\Support\Facades\Route;

define("CSS_VRSION", "1");
define("JS_VRSION", "1");

$mobileSubDomain = env('MOBILE_SUB_DOMAIN', 'dev-m');
$advisorSubDomain = env('ADVISOR_SUB_DOMAIN', 'dev-advisor');

Route::domain($mobileSubDomain .'.maeumpalette.com')->group(function () {
    Route::get('/', indexController::class);

    Route::resource("/login",LoginController::class);
});

Route::domain($advisorSubDomain.'.maeumpalette.com')->group(function () {
    Route::get('/', function () {
//        return view('welcome');
        return "DDDDD";
    });
});

