<?php

use App\Http\Controllers\Advisor\Join\AdvisorJoinController;
use App\Http\Controllers\Advisor\AdvisorIndexController;
use App\Http\Controllers\Advisor\Login\AdvisorLoginController;
use App\Http\Controllers\Common\FileUploadController;
use App\Http\Controllers\Mobile\Advice\AgreeController;
use App\Http\Controllers\Mobile\Advice\RequestAdviceController;
use App\Http\Controllers\Mobile\Advice\SampleController;
use App\Http\Controllers\Mobile\FreeAdvice\AnxietyController;
use App\Http\Controllers\Mobile\FreeAdvice\DepressionController;
use App\Http\Controllers\Mobile\FreeAdvice\RequestInfoController;
use App\Http\Controllers\Mobile\FreeAdvice\SelfWorthController;
use App\Http\Controllers\Mobile\IndexController;
use App\Http\Controllers\Mobile\Join\EmailCheckController;
use App\Http\Controllers\Mobile\Join\JoinController;
use App\Http\Controllers\Mobile\Login\LoginController;
use App\Http\Controllers\Mobile\Logout\LogoutController;
use App\Http\Controllers\Mobile\Mypage\MyPageController;
use Illuminate\Support\Facades\Route;

const CSS_VERSION = "1";
const JS_VERSION = "1";

$mobileSubDomain = env('MOBILE_SUB_DOMAIN', 'dev-m');
$advisorSubDomain = env('ADVISOR_SUB_DOMAIN', 'dev-advisor');

Route::middleware(['autoLogin'])->group(function () {
    Route::post("/fileUpload", [FileUploadController::class,"fileUpload"]);
    Route::get("/sample",SampleController::class);
});

Route::domain($mobileSubDomain .'.maeumpalette.com')->middleware(['autoLogin'])->group(function () {
    Route::get('/', IndexController::class);
    Route::resource("/login",LoginController::class)->only([
        'index', 'store'
    ]);
    Route::resource('/join', JoinController::class)->only([
        'index', 'create', 'store', 'show'
    ]);
    Route::post("/emailCheck", EmailCheckController::class);
    Route::post('/findRegion/{id}', [RequestAdviceController::class,"findRegion"]);

    Route::get('/freeAdviceRequest',RequestInfoController::class);
    Route::post('/createFreeAdvice',[RequestInfoController::class,"create"]);
});

Route::domain($mobileSubDomain .'.maeumpalette.com')
    ->middleware(['autoLogin','freeAdviceVerify'])->group(function () {

    Route::get('/depressionStep1/{counselingTemplatePK}',[DepressionController::class,"depressionStep1"]);
    Route::get('/depressionStep2/{counselingTemplatePK}',[DepressionController::class,"depressionStep2"]);
    Route::get('/depressionStep3/{counselingTemplatePK}',[DepressionController::class,"depressionStep3"]);
    Route::post('/depression/{counselingTemplatePK}',[DepressionController::class,"create"]);

    Route::get('/anxietyStep1/{counselingTemplatePK}',[AnxietyController::class,"anxietyStep1"]);
    Route::get('/anxietyStep2/{counselingTemplatePK}',[AnxietyController::class,"anxietyStep2"]);
    Route::get('/anxietyStep3/{counselingTemplatePK}',[AnxietyController::class,"anxietyStep3"]);
    Route::post('/anxiety/{counselingTemplatePK}',[AnxietyController::class,"create"]);

    Route::get('/selfWorthStep1/{counselingTemplatePK}',[SelfWorthController::class,"selfWorthStep1"]);
    Route::get('/selfWorthStep2/{counselingTemplatePK}',[SelfWorthController::class,"selfWorthStep2"]);
    Route::post('/selfWorth/{counselingTemplatePK}',[SelfWorthController::class,"create"]);
});

Route::domain($mobileSubDomain .'.maeumpalette.com')->middleware(['autoLogin','loginValid'])->group(function () {
    Route::get("/adviceAgree", AgreeController::class);
    Route::resource("/requestAdvice", RequestAdviceController::class)->only([
        'index', 'store'
    ]);

    Route::resource("/mypage", MyPageController::class);
    Route::get("/logout", LogoutController::class);
});

Route::domain($advisorSubDomain.'.maeumpalette.com')->group(function () {
    Route::get('/', AdvisorIndexController::class);

    Route::resource("/login",AdvisorLoginController::class)->only([
        'index', 'store'
    ]);

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

