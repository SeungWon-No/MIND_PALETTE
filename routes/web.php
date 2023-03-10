<?php

use App\Http\Controllers\Advisor\AdvisorIndexController;
use App\Http\Controllers\Advisor\Etc\PrivacyController;
use App\Http\Controllers\Advisor\Etc\TermsController;
use App\Http\Controllers\Advisor\Etc\orderByAdvisorListController;
use App\Http\Controllers\Advisor\Join\AdvisorEducationController;
use App\Http\Controllers\Advisor\Join\AdvisorJoinController;
use App\Http\Controllers\Advisor\Join\VerifyEmailDuplicationController;
use App\Http\Controllers\Advisor\Join\AdvisorExamineController;
use App\Http\Controllers\Advisor\Join\AdvisorEducationEditController;
use App\Http\Controllers\Advisor\Login\AdvisorLoginController;
use App\Http\Controllers\Advisor\Login\AdvisorFindEmailController;
use App\Http\Controllers\Advisor\Login\AdvisorFindPasswordController;
use App\Http\Controllers\Advisor\Login\AdvisorNewPasswordSettingController;
use App\Http\Controllers\Advisor\Logout\AdvisorLogoutController;
use App\Http\Controllers\Advisor\Notice\AdvisorNoticeController;
use App\Http\Controllers\Advisor\Counseling\AdvisorCounselingListController;
use App\Http\Controllers\Advisor\Counseling\AdvisorMyCounselingListController;
use App\Http\Controllers\Advisor\Counseling\AdvisorCounselingDetailController;
use App\Http\Controllers\Advisor\Profile\AdvisorProfileController;
use App\Http\Controllers\Advisor\Profile\AdvisorWithdrawalController;
use App\Http\Controllers\Advisor\Inquiry\AdvisorInquiryController;

use App\Http\Controllers\Common\FileUpload;
use App\Http\Controllers\Common\FileUploadController;
use App\Http\Controllers\Common\PASSAuthController;
use App\Http\Controllers\Mobile\Advice\AgreeController;
use App\Http\Controllers\Mobile\Advice\HTPController;
use App\Http\Controllers\Mobile\Advice\HTPResultController;
use App\Http\Controllers\Mobile\Advice\ProcessInformationController;
use App\Http\Controllers\Mobile\Advice\RequestAdviceController;
use App\Http\Controllers\Mobile\Advice\SampleController;
use App\Http\Controllers\Mobile\Contact\ContactController;
use App\Http\Controllers\Mobile\CounselingCenter\CounselingCenterController;
use App\Http\Controllers\Mobile\FreeAdvice\AnxietyController;
use App\Http\Controllers\Mobile\FreeAdvice\DepressionController;
use App\Http\Controllers\Mobile\FreeAdvice\RequestInfoController;
use App\Http\Controllers\Mobile\FreeAdvice\SelfWorthController;
use App\Http\Controllers\Mobile\IndexController;
use App\Http\Controllers\Mobile\Join\EmailCheckController;
use App\Http\Controllers\Mobile\Join\JoinController;
use App\Http\Controllers\Mobile\Login\LoginController;
use App\Http\Controllers\Mobile\Logout\LogoutController;
use App\Http\Controllers\Mobile\MemberFind\IDFindController;
use App\Http\Controllers\Mobile\Mypage\AppSettingController;
use App\Http\Controllers\Mobile\Mypage\ChangePhoneController;
use App\Http\Controllers\Mobile\Mypage\MyPageController;
use App\Http\Controllers\Mobile\Mypage\PasswordChangeController;
use App\Http\Controllers\Mobile\Mypage\PayListController;
use App\Http\Controllers\Mobile\Mypage\WithdrawalController;
use Illuminate\Support\Facades\Route;

const CSS_VERSION = "8";
const JS_VERSION = "8";

Route::middleware(['autoLogin'])->group(function () {
    Route::get('/', IndexController::class);
    Route::get("/idFind",IDFindController::class);
    Route::get("/pwFind",function () {
        return view('/mobile/memberFind/pwFind'); // ?????? ?????????
    });
    Route::get('/joinAuth', function () {
        return view('/mobile/join/auth');
    });
    Route::post("/memberAuthFind",[IDFindController::class,"memberAuthFind"]);
    Route::post("/memberAuthCheck",[IDFindController::class,"memberAuthCheck"]);
    Route::post("/changeMemberPassword",[IDFindController::class,"changeMemberPassword"]);
    Route::resource("/login",LoginController::class)->only([
        'index', 'store'
    ]);
    Route::resource('/join', JoinController::class)->only([
        'index', 'store', 'show'
    ]);
    Route::post("/createMember", [JoinController::class,"createMember"]);
    Route::post("/emailCheck", EmailCheckController::class);
    Route::post('/findRegion/{id}', [RequestAdviceController::class,"findRegion"]);

    Route::get('/freeAdviceRequest',RequestInfoController::class);
    Route::post('/createFreeAdvice',[RequestInfoController::class,"create"]);

    Route::get('/HTPInformation', function () {
        return view('/mobile/etc/HTPInformation'); // ?????? ?????????
    });
    Route::get('/adviceProcessInformation', function () {
        return view('/mobile/etc/adviceInformation'); // ?????? ?????????
    });

    Route::post("/fileUpload", [FileUploadController::class,"fileUpload"]);
    Route::post('/editor/upload', FileUpload::class);
    Route::post("/imageUpload", [FileUploadController::class,"imageUpload"]);
    Route::post("/profileUpload", [FileUploadController::class,"profileUpload"]);

    Route::get("/counselingCenter",CounselingCenterController::class);
    Route::get('/contact', ContactController::class);
    Route::post("/contact/save",[ContactController::class,"save"]);

    Route::post('/auth', PASSAuthController::class);
    Route::get('/auth/return', [PASSAuthController::class, "authReturn"]);

    Route::get("/sample",SampleController::class);

    Route::get('/privacyStatement', function () {
        return view('/mobile/etc/privacyStatement'); // ?????? ?????????
    });
    Route::get('/terms', function () {
        return view('/mobile/etc/terms'); // ?????? ?????????
    });
});

Route::middleware(['autoLogin','loginValid'])->group(function () {
    Route::get("/adviceAgree", AgreeController::class);
    Route::get("/HTPRequestComplete/", [ProcessInformationController::class, "HTPRequestComplete"]);
    Route::get("/HTPResult/{counselingPK}", HTPResultController::class);
    Route::get("/HTPResultPC/{counselingPK}", [HTPResultController::class,"pcResult"]);
    Route::resource("/requestAdvice", RequestAdviceController::class)->only([
        'index', 'store'
    ]);
    Route::post("/serviceRating", [HTPResultController::class,"serviceRating"]);
    Route::post("/reviewRating/{counselingPK}", [HTPResultController::class,"reviewRating"]);

    Route::get("/MyPage/payList", PayListController::class);
    Route::get("/MyPage/AppSetting", AppSettingController::class);
    Route::get("/MyPage/withdrawal", WithdrawalController::class);
    Route::get("/MyPage/passwordChange", PasswordChangeController::class);
    Route::get("/MyPage/changePhone", function () {
        return view('/mobile/mypage/phoneChange'); // ?????? ?????????
    });
    Route::post("/MyPage/changePhone", ChangePhoneController::class);
    Route::post("/MyPage/changeAgree", [AppSettingController::class,"changeAgree"]);
    Route::post("/MyPage/withdrawalPrc", [WithdrawalController::class,"withdrawalPrc"]);
    Route::post("/MyPage/passwordChangePrc", [PasswordChangeController::class,"passwordChangePrc"]);

    Route::resource("/mypage", MyPageController::class);
    Route::get("/logout", LogoutController::class);
});
Route::middleware(['autoLogin','loginValid','adviceVerify'])->group(function () {

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
    Route::get("/personalData/{counselingPK}", [ProcessInformationController::class, "personalData"]);
    Route::get("/familyRelations/{counselingPK}", [ProcessInformationController::class, "familyRelations"]);
    Route::get("/reasonWrite/{counselingPK}", [ProcessInformationController::class, "reasonWrite"]);
    Route::post('/HTPSave/{counselingPK}', [HTPController::class, "save"]);
});

Route::middleware(['autoLogin','freeAdviceVerify'])->group(function () {
    Route::get('/depressionStep1/{counselingTemplatePK}',[DepressionController::class,"depressionStep1"]);
    Route::get('/depressionStep2/{counselingTemplatePK}',[DepressionController::class,"depressionStep2"]);
    Route::get('/depressionStep3/{counselingTemplatePK}',[DepressionController::class,"depressionStep3"]);
    Route::get('/depressionResult/{counselingTemplatePK}',[DepressionController::class,"depressionResult"]);
    Route::post('/depression/{counselingTemplatePK}',[DepressionController::class,"create"]);

    Route::get('/anxietyStep1/{counselingTemplatePK}',[AnxietyController::class,"anxietyStep1"]);
    Route::get('/anxietyStep2/{counselingTemplatePK}',[AnxietyController::class,"anxietyStep2"]);
    Route::get('/anxietyStep3/{counselingTemplatePK}',[AnxietyController::class,"anxietyStep3"]);
    Route::get('/anxietyResult/{counselingTemplatePK}',[AnxietyController::class,"anxietyResult"]);
    Route::post('/anxiety/{counselingTemplatePK}',[AnxietyController::class,"create"]);

    Route::get('/selfWorthStep1/{counselingTemplatePK}',[SelfWorthController::class,"selfWorthStep1"]);
    Route::get('/selfWorthStep2/{counselingTemplatePK}',[SelfWorthController::class,"selfWorthStep2"]);
    Route::get('/selfWorthResult/{counselingTemplatePK}',[SelfWorthController::class,"selfWorthResult"]);
    Route::post('/selfWorth/{counselingTemplatePK}',[SelfWorthController::class,"create"]);
});

// Advisor
Route::prefix('advisor')->group(function () { // (dev-)m.maeumpalette.com:8080/advisor/

    Route::middleware(['advisorAutoLogin','advisorLoginValid'])->group(function () { // ????????? ????????????

        Route::get('/', AdvisorIndexController::class); // ????????????
        Route::get('/waitingCounseling', [AdvisorIndexController::class, "waitingCounseling"]); // ????????????
        Route::get('/completeCounseling', [AdvisorIndexController::class, "completeCounseling"]); // ????????????
        Route::get('/warningCounseling', [AdvisorIndexController::class, "warningCounseling"]); // ??????/??????
        Route::get('/impossibleCounseling', [AdvisorIndexController::class, "impossibleCounseling"]); // ????????????
        Route::get('/advisorList', [AdvisorIndexController::class, "advisorList"]); // ????????????

        Route::resource('/profile', AdvisorProfileController::class); // ????????? ?????????
        Route::post('/profile/changePhone', [AdvisorProfileController::class,"changePhone"]); // ????????? ?????????
        Route::resource('/memberWithdrawal', AdvisorWithdrawalController::class); // ????????? ????????????

        Route::resource("/counselingList", AdvisorCounselingListController::class); // ???????????????
        Route::any("/waitingCounselingList", [AdvisorCounselingListController::class, "waitingCounselingList"]); // ???????????????
        Route::any("/completeCounselingList", [AdvisorCounselingListController::class, "completeCounselingList"]); // ???????????????
        Route::any("/warningCounselingList", [AdvisorCounselingListController::class, "warningCounselingList"]); // ???????????????
        Route::any("/impossibleCounselingList", [AdvisorCounselingListController::class, "impossibleCounselingList"]); // ???????????????

        Route::resource("/myCounselingList", AdvisorMyCounselingListController::class); // my ???????????????
        Route::any("/myWaitingCounseling", [AdvisorMyCounselingListController::class, "myWaitingCounseling"]); // my ???????????????
        Route::any("/myCompleteCounseling", [AdvisorMyCounselingListController::class, "myCompleteCounseling"]); // my ???????????????
        Route::any("/myWarningCounseling", [AdvisorMyCounselingListController::class, "myWarningCounseling"]); // my ???????????????
        Route::any("/myImpossibleCounseling", [AdvisorMyCounselingListController::class, "myImpossibleCounseling"]); // my ???????????????

        Route::resource("/counselingDetail", AdvisorCounselingDetailController::class); // ?????? ??????
        Route::post("/counselingStatus/{counselingPK}", [AdvisorCounselingDetailController::class,"counselingStatus"]); // ?????? ??????
        Route::post("/counselingCancel/{counselingPK}", [AdvisorCounselingDetailController::class,"counselingCancel"]); // ?????? ??????
        Route::get('/counselingStructureGuide', [AdvisorCounselingDetailController::class, "counselingStructureGuide"]);  // ???????????????
        Route::get('/counselingContentGuide', [AdvisorCounselingDetailController::class, "counselingContentGuide"]);  // ???????????????

        Route::resource('/notice', AdvisorNoticeController::class); // ????????????
        Route::resource('/inquiry', AdvisorInquiryController::class); // 1:1 ??????
        Route::post('/writePost', [AdvisorInquiryController::class, "writePost"]);// 1:1 ?????? ?????????
        Route::get('/inquiryWrite', [AdvisorInquiryController::class, "inquiryWrite"]);// 1:1 ?????? ????????? ??????
        Route::post('/inquiryEdit', [AdvisorInquiryController::class, "inquiryEdit"]);// 1:1 ?????? ??????

        Route::get('/privacy', PrivacyController::class);
        Route::get('/terms', TermsController::class);

        Route::get('/orderByAdvisorList', orderByAdvisorListController::class); // ????????? ????????? ??????
    });

    Route::middleware(['advisorAutoLogin'])->group(function () {

        Route::resource('/join', AdvisorJoinController::class)->only(['index', 'store', 'show']); // ????????? ????????????
        Route::get("/examine", AdvisorExamineController::class); // ????????????
        Route::post("/emailCheck", VerifyEmailDuplicationController::class); // ????????? ????????????
        Route::post("/memberAuthFind", [AdvisorJoinController::class,"memberAuthFind"]); // ???

        Route::resource("/login",AdvisorLoginController::class)->only([
            'index', 'store'
        ]);
        Route::get("/logout", AdvisorLogoutController::class); // ????????????
        Route::get('/consultationInformation', [AdvisorJoinController::class,"consultationInformation"]); // ???????????? step2
        Route::resource('/consultationInformationEdit', AdvisorEducationEditController::class); // ?????? ?????? ??? ????????????
        Route::post('/education',[AdvisorEducationController::class, "store"]); // ????????? ?????? ????????????
    });

    Route::get('/loginFindId', function () { // ?????????, ???????????? ?????? ?????????
        return view('/advisor/login/loginFindEmailPassword');
    });

    Route::get('/loginFindPassword', function () { // ???????????? ????????? ?????? ?????????
        return view('/advisor/login/loginFindPassword');
    });
    Route::post('/loginFindEmail', AdvisorFindEmailController::class); // ????????? ??????
    Route::post('/loginPasswordAuth', AdvisorFindPasswordController::class); // ???????????? ??????
    Route::post('/newPasswordSetting', AdvisorNewPasswordSettingController::class); // ??? ???????????? ??????
    Route::post("/fileUpload", [FileUploadController::class,"fileUpload"]); // ?????? ?????????
    Route::get('/loginFail', function () { // ????????? ????????? ??????
        return view('/advisor/login/loginFail');
    });

});
