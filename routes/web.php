<?php

use App\Http\Controllers\Mobile\IndexController;
use App\Http\Controllers\Mobile\Login\LoginController;
use Illuminate\Support\Facades\Route;

define("CSS_VERSION", "1");
define("JS_VERSION", "1");

$mobileSubDomain = env('MOBILE_SUB_DOMAIN', 'dev-m');
$advisorSubDomain = env('ADVISOR_SUB_DOMAIN', 'dev-advisor');

Route::domain($mobileSubDomain .'.maeumpalette.com')->group(function () {
    Route::get('/', IndexController::class);

    Route::resource("/login",LoginController::class);
});

Route::domain($advisorSubDomain.'.maeumpalette.com')->group(function () {
    Route::get('/', function () {
//        return view('welcome');
        return "DDDDD";
    });
});

