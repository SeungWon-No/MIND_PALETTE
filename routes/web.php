<?php

use App\Http\Controllers\Advisor\Join\AdvisorEducationController;
use App\Http\Controllers\Advisor\Join\AdvisorJoinController;
use App\Http\Controllers\Advisor\Join\VerifyEmailDuplicationController;
use App\Http\Controllers\Advisor\AdvisorIndexController;
use App\Http\Controllers\Advisor\Login\AdvisorLoginController;
use App\Http\Controllers\Advisor\Logout\AdvisorLogoutController;
use App\Http\Controllers\Common\FileUploadController;
use App\Http\Controllers\Common\PASSAuthController;
use App\Http\Controllers\Mobile\Advice\AgreeController;
use App\Http\Controllers\Mobile\Advice\HTPController;
use App\Http\Controllers\Mobile\Advice\ProcessInformationController;
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

const CSS_VERSION = "2";
const JS_VERSION = "2";

Route::middleware(['autoLogin'])->group(function () {
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

    Route::get('/HTPInformation', function () {
        return view('/mobile/etc/HTPInformation'); // 상세 페이지
    });
    Route::get('/adviceProcessInformation', function () {
        return view('/mobile/etc/adviceInformation'); // 상세 페이지
    });

    Route::post("/fileUpload", [FileUploadController::class,"fileUpload"]);
    Route::post("/imageUpload", [FileUploadController::class,"imageUpload"]);
    Route::get("/sample",SampleController::class);
//    Route::get('/test', function () {
//        return phpinfo();
//    });

    Route::post('/auth', PASSAuthController::class);
    Route::get('/auth/return', [PASSAuthController::class, "authReturn"]);

    Route::get("/sample",SampleController::class);
});

Route::middleware(['autoLogin','loginValid'])->group(function () {
    Route::get("/adviceAgree", AgreeController::class);
    Route::resource("/requestAdvice", RequestAdviceController::class)->only([
        'index', 'store'
    ]);
    Route::resource("/mypage", MyPageController::class);
    Route::get("/logout", LogoutController::class);

    Route::get("/processInformation/{counselingPK}", ProcessInformationController::class);
    Route::get("/adviceInformation/{counselingPK}", [ProcessInformationController::class,"adviceInformation"]);
    Route::get("/paintingHouseTimer/{counselingPK}", [ProcessInformationController::class, "paintingHouseTimer"]);
    Route::get("/paintingTreeTimer/{counselingPK}", [ProcessInformationController::class, "paintingTreeTimer"]);
    Route::get("/paintingPerson1Timer/{counselingPK}", [ProcessInformationController::class, "paintingPerson1Timer"]);
    Route::get("/paintingPerson2Timer/{counselingPK}", [ProcessInformationController::class, "paintingPerson2Timer"]);
    Route::get("/answerInformation/{counselingPK}", [ProcessInformationController::class, "answerInformation"]);
    Route::get("/answerHouse/{counselingPK}", [ProcessInformationController::class, "answerHouse"]);
    Route::get("/answerTree/{counselingPK}", [ProcessInformationController::class, "answerTree"]);
    Route::get("/answerPerson1/{counselingPK}", [ProcessInformationController::class, "answerPerson1"]);
    Route::get("/answerPerson2/{counselingPK}", [ProcessInformationController::class, "answerPerson2"]);
    Route::get("/behaviorObservation/{counselingPK}", [ProcessInformationController::class, "behaviorObservation"]);
    Route::get("/temperamentTestInformation/{counselingPK}", [ProcessInformationController::class, "temperamentTestInformation"]);
    Route::get("/temperamentTestStep1/{counselingPK}", [ProcessInformationController::class, "temperamentTestStep1"]);
    Route::get("/temperamentTestStep2/{counselingPK}", [ProcessInformationController::class, "temperamentTestStep2"]);
    Route::get("/applicationFormInformation/{counselingPK}", [ProcessInformationController::class, "applicationFormInformation"]);
    Route::post('/HTPSave/{counselingPK}', [HTPController::class, "save"]);
});

Route::middleware(['autoLogin','freeAdviceVerify'])->group(function () {
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

// Advisor
Route::prefix('advisor')->group(function () { // (dev-)m.maeumpalette.com:8080/advisor/
    Route::middleware(['advisorAutoLogin'])->group(function () {

        Route::get('/', AdvisorIndexController::class); // 메인화면

        Route::resource("/login",AdvisorLoginController::class)->only(['index', 'store']); // 로그인

        Route::resource('/join', AdvisorJoinController::class)->only(['index', 'store', 'show']); // 상담사 회원가입

        Route::post("/emailCheck", VerifyEmailDuplicationController::class); // 이메일 중복체크

        Route::post('/education',[AdvisorEducationController::class,"store"]); // 상담사 추가 정보입력

        Route::get('/consultationInformation', [AdvisorJoinController::class,"consultationInformation"]);

        Route::post("/fileUpload", [FileUploadController::class,"fileUpload"]); // 파일 업로드

    });

    Route::get("/logout", AdvisorLogoutController::class); // 로그아웃

    Route::get('/loginFail', function () { // 로그인 실패시 화면
        return view('/advisor/login/loginFail');
    });


    Route::get('/detail', function () { // 상세 페이지
        return view('/advisor/counseling');
    });
    Route::get('/profile', function () {
        return view('/advisor/profile');
    });
});
