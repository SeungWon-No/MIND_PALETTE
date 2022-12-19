<?php

use App\Http\Controllers\Mobile\Login\LoginController;
use Illuminate\Support\Facades\Route;

$mobileSubDomain = env('MOBILE_SUB_DOMAIN', 'dev-m');
$advisorSubDomain = env('ADVISOR_SUB_DOMAIN', 'dev-advisor');

Route::domain($mobileSubDomain .'.maeumpalette.com')->group(function () {
    Route::get('/', function () {
        return "MMM";
    });

    Route::resource("/login",LoginController::class);
});

Route::domain($advisorSubDomain.'.maeumpalette.com')->group(function () {
    Route::get('/', function () {
        return view('/web/main'); // 메인 페이지
    });

    Route::get('/login', function () {
        return view('/web/login'); // 로그인 페이지
    });

    Route::get('/detail', function () {
        return view('/web/counseling'); // 상세 페이지
    });

    Route::get('/profile', function () {
        return view('/web/profile'); // 로그인 페이지
    });
});

