<?php

use App\Http\Controllers\Advisor\Join\AdvisorJoinController;
use App\Http\Controllers\Advisor\AdvisorIndexController;
use App\Http\Controllers\Advisor\Login\AdvisorLoginController;
use App\Http\Controllers\Common\FileUploadController;
use App\Http\Controllers\Mobile\Advice\AgreeController;
use App\Http\Controllers\Mobile\Advice\RequestAdviceController;
use App\Http\Controllers\Mobile\Advice\SampleController;
use App\Http\Controllers\Mobile\FreeAdvice\DepressionController;
use App\Http\Controllers\Mobile\FreeAdvice\RequestInfoController;
use App\Http\Controllers\Mobile\IndexController;
use App\Http\Controllers\Mobile\Join\EmailCheckController;
use App\Http\Controllers\Mobile\Join\JoinController;
use App\Http\Controllers\Mobile\Login\LoginController;
use App\Http\Controllers\Mobile\Logout\LogoutController;
use App\Http\Controllers\Mobile\Mypage\MyPageController;
use App\Http\Middleware\AutoLogin;
use App\Http\Middleware\LoginValid;
use App\Models\Advisor;
use Illuminate\Support\Facades\Route;

const CSS_VERSION = "1";
const JS_VERSION = "1";

$mobileSubDomain = env('MOBILE_SUB_DOMAIN', 'dev-m');
$advisorSubDomain = env('ADVISOR_SUB_DOMAIN', 'dev-advisor');

Route::middleware([AutoLogin::class])->group(function () {
    Route::post("/fileUpload", [FileUploadController::class,"fileUpload"]);
    Route::get("/sample",SampleController::class);
});

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

    Route::get('/freeAdviceRequest',RequestInfoController::class);
    Route::post('/createFreeAdvice',[RequestInfoController::class,"create"]);
    Route::get('/depressionStep1/{counselingResultPK}',[DepressionController::class,"depressionStep1"]);
    Route::get('/depressionStep2/{counselingResultPK}',[DepressionController::class,"depressionStep2"]);
    Route::get('/depressionStep3/{counselingResultPK}',[DepressionController::class,"depressionStep3"]);
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

