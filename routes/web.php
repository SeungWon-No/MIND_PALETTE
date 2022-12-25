<?php

use App\Http\Controllers\Advisor\Join\AdvisorJoinController;
use App\Http\Controllers\Advisor\Join\VerifyEmailDuplicationController;
use App\Http\Controllers\Advisor\AdvisorIndexController;
use App\Http\Controllers\Advisor\Login\AdvisorLoginController;
use App\Http\Controllers\Advisor\Logout\AdvisorLogoutController;

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
use App\Models\Advisor;
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

    Route::get('/', AdvisorIndexController::class); // 메인
    Route::resource("/login",AdvisorLoginController::class)->only([ // 로그인
        'index', 'store'
    ]);
    Route::get("/logout", AdvisorLogoutController::class); // 로그아웃

    Route::resource('/join', AdvisorJoinController::class)->only([ // 회원가입
        'index', 'store', 'show'
    ]);
    Route::post("/emailCheck", VerifyEmailDuplicationController::class); // 이메일 중복체크

    Route::get('/detail', function () { // 상세 페이지
        return view('/advisor/counseling'); 
    });
    Route::get('/profile', function () {
        return view('/advisor/profile');
    });
});

