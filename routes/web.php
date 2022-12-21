<?php

use App\Http\Controllers\Advisor\Join\AdvisorJoinController;
use App\Http\Controllers\Mobile\Advice\AgreeController;
use App\Http\Controllers\Mobile\Advice\RequestAdviceController;
use App\Http\Controllers\Mobile\IndexController;
use App\Http\Controllers\Mobile\Join\EmailCheckController;
use App\Http\Controllers\Mobile\Join\JoinController;
use App\Http\Controllers\Mobile\Login\LoginController;
use App\Http\Controllers\Mobile\Logout\LogoutController;
use App\Http\Controllers\Mobile\Mypage\MyPageController;
use App\Http\Middleware\AutoLogin;
use App\Http\Middleware\LoginValid;
use Illuminate\Support\Facades\Route;

const CSS_VERSION = "1";
const JS_VERSION = "1";

$mobileSubDomain = env('MOBILE_SUB_DOMAIN', 'dev-m');
$advisorSubDomain = env('ADVISOR_SUB_DOMAIN', 'dev-advisor');

Route::domain($mobileSubDomain .'.maeumpalette.com')->middleware([AutoLogin::class])->group(function () {
    Route::get('/', IndexController::class);
    Route::resource("/login",LoginController::class)->only([
        'index', 'store'
    ]);
    Route::resource('/join', JoinController::class)->only([
        'index', 'create', 'store', 'show'
    ]);
    Route::post("/emailCheck", EmailCheckController::class);
    Route::post('/findRegion/{id}', [RequestAdviceController::class,"findRegion"]);
});

Route::domain($mobileSubDomain .'.maeumpalette.com')->middleware([AutoLogin::class,LoginValid::class])->group(function () {
    Route::get("/adviceAgree", AgreeController::class);
    Route::resource("/requestAdvice", RequestAdviceController::class)->only([
        'index', 'store'
    ]);

    Route::resource("/mypage", MyPageController::class);
    Route::get("/logout", LogoutController::class);
});

Route::domain($advisorSubDomain.'.maeumpalette.com')->group(function () {
    Route::get('/', function () {
        return view('/advisor/main'); // 메인 페이지
    });

    Route::get('/login', function () {
        return view('/advisor/login/login'); // 로그인 페이지
    });

    Route::resource('/join', AdvisorJoinController::class)->only([
        'index', 'store', 'show'
    ]);

    Route::get('/detail', function () {
        return view('/advisor/counseling'); // 상세 페이지
    });

    Route::get('/profile', function () {
        return view('/advisor/profile'); // 로그인 페이지
    });
});

