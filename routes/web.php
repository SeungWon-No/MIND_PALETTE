<?php

use App\Http\Controllers\Mobile\IndexController;
use App\Http\Controllers\Mobile\Join\AgreeController;
use App\Http\Controllers\Mobile\Login\LoginController;
use Illuminate\Support\Facades\Route;

const CSS_VERSION = "1";
const JS_VERSION = "1";

$mobileSubDomain = env('MOBILE_SUB_DOMAIN', 'dev-m');
$advisorSubDomain = env('ADVISOR_SUB_DOMAIN', 'dev-advisor');

Route::domain($mobileSubDomain .'.maeumpalette.com')->group(function () {
    Route::get('/', IndexController::class);
    Route::resource("/login",LoginController::class);
    Route::get('/agree', AgreeController::class);
});

Route::domain($advisorSubDomain.'.maeumpalette.com')->group(function () {
    Route::get('/', function () {
//        return view('welcome');
        return "DDDDD";
    });
});

