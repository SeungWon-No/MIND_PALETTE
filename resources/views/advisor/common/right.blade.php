@php
    use App\Models\Counseling;
    use App\Models\ServiceRating;
    $recentList = Counseling::findRecentCounseling($advisorProfile->advisorPK);
    $todayCounseling = Counseling::findTodayCounseling();
    $todayCompleteCounseling = Counseling::findTodayCompleteCounseling();
    $myCompleteCount = Counseling::findCompleteCounseling($advisorProfile->advisorPK);
    $myWritingCounseling = Counseling::findWritingCounseling($advisorProfile->advisorPK);

    $serviceRating = ServiceRating::avg('rating');

    $serviceRatingPercent = 0;
    if ($serviceRating) {
//        dd($serviceRating);
        $serviceRatingPercent = $serviceRating/5*100;
    }

    $myWritingCounselingCount = 0;
    if ($myWritingCounseling) {
        $myWritingCounselingCount = 1;

        $nowTime = date("Y-m-d H:i:s");
        $startTime = $myWritingCounseling['startDate'];
        $diffTime = strtotime($nowTime) - strtotime($startTime);
        $diffHour = ceil($diffTime / (60*60));

        $hour = "00";
        $minute = "00";
        if ($diffHour < 24) {
            $addOneDay = date("Y-m-d H:i:s", strtotime($startTime."+1 days"));
            $diffTime = strtotime($addOneDay) - strtotime($nowTime);
            $hour = floor($diffTime / (60*60));
            $minute = floor(($diffTime-($hour*60*60)) / 60);
            $hour = ($hour < 10) ? "0".$hour :$hour;
            $minute = ($minute < 10) ? "0".$minute :$minute;
        }
    }
@endphp
<div class="column-right">
    <div class="account">
        <div class="account-info__cell">
            <div class="account-profile__photo">
                @if($advisorProfile->profilePath)
                    <img id="userProfileImage" src="{{URL::asset('/storage/image/profile/'.$advisorProfile->profilePath)}}" alt="" class="upload-file__img">
                @endif
                <img src="/advisorAssets/assets/images/user-profile.jpg" alt="" class="account-profile__img">
            </div>
            <div class="account-profile">
                <div class="account-profile__cell">
                    <div class="account-profile__info">
                        <div class="account-profile__name">{{$advisorProfile['advisorName']}}</div>
                        <div class="account-profile__center">{{$advisorProfile->centerName}}</div>
                    </div>
                </div>
                <a href="/advisor/profile" class="account-profile__link">????????? ???????????? ></a>
            </div>
        </div>
    </div>
    <div class="my-history">
        <div class="my-history__heading">
            <div class="my-history__tit">?????? ????????????</div>
            <div class="my-history__total">
                (??? <span class="my-history__totalnum">{{number_format($advisorProfile->counselingCount)}}</span>???)
            </div>
        </div>
        <ul class="my-history__list">
            <li class="my-history__item">
                <!-- ?????? ?????? ????????? 1??? ???????????? class???  active?????? -->
                @if($myWritingCounselingCount > 0)
                <a href="/advisor/counselingDetail/{{$myWritingCounseling['']}}" class="my-history__obj active">??? ?????????
                    <span class="my-history__num">{{$myWritingCounselingCount}}</span><span class="my-history__unit">???</span>
                </a>
                @else
                <a class="my-history__obj active">??? ?????????
                    <span class="my-history__num">{{$myWritingCounselingCount}}</span><span class="my-history__unit">???</span>
                </a>
                @endif
                <!-- ?????? ?????? ????????? 1??? ???????????? ?????? ?????? ?????? -->
                @if($myWritingCounselingCount > 0)
                    <div class="my-history__time-cell">?????? ?????? <span class="my-history__time">{{$hour}}:{{$minute}}</span></div>
                @endif
            </li>
            <li class="my-history__item">
                <a href="/advisor/myCompleteCounseling" class="my-history__obj">??? ????????????
                    <span class="my-history__num">{{$myCompleteCount}}</span><span class="my-history__unit">???</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="recent-history">
        <div class="aside__heading">
            <h4 class="aside__heading__tit">?????? ?????? ??????</h4>
            <a href="/advisor/myCounselingList" class="aside__heading__link">?????????<span class="icon link-more-icon"></span></a>
        </div>
        <div class="recent-history__list">
            <!-- list items -->
            @foreach($recentList as $recent)
            <a href="/advisor/counselingDetail/{{$recent->counselingPK}}" class="recent-history__item">
                <div class="recent-history__photo">
                    <img src="{{URL::asset('/storage/image/thumb/'.$recent->answer)}}" alt="" class="recent-history__img">
                </div>
                <div class="recent-history__info-wrap">
                    <div class="recent-history__info">
                        <div class="recent-history__name">{{$recent->counselorName}}</div>
                        <div class="recent-history__year">{{Crypt::decryptString($recent->counselorBirthday)}}</div>
                        <div class="recent-history__gender">{{$recent->codeName}}</div>
                    </div>
                    <div class="counseling-code__cell">
                        <div class="counseling-code__detail">????????????:<span class="counseling-code">{{$recent->counselingCode}}</span></div>
                    </div>
                </div>
            </a>
            @endforeach
            <!-- list items -->
        </div>
    </div>
    <div class="my-prefer">
        <div class="my-prefer__inner">
            <div class="aside__heading">
                <h4 class="aside__heading__tit">?????? ????????????</h4>
            </div>
            <div class="my-prefer__star">
                <span class="icon star-review-icon"></span>
                <div
                    class="star-review__score">{{($advisorProfile->rating == 0)?"0.0":sprintf('%0.1f', ($advisorProfile->rating/$advisorProfile->ratingCount))}}</div>
                <div class="star-review__unit">/ 5</div>
            </div>
        </div>
    </div>
    <div class="today-qNa">
        <div class="today-qNa__cell">
            <div class="aside__heading">
                <h4 class="aside__heading__tit">????????? ???????????? ??? ??????</h4>
            </div>
            <div class="today-qNa__wrap">
                <div class="today-question__num">{{number_format($todayCounseling)}}</div>
                <div class="today-qNa__unit">/</div>
                <div class="today-answer__num">{{number_format($todayCompleteCounseling)}}</div>
            </div>
            <div class="today-data">{{date("Y.m.d")}}</div>
        </div>
        <div class="today-qNa__cell today-qNa__cell--svg">
            <div class="aside__heading">
                <h4 class="aside__heading__tit">???????????? ?????? ????????? ??????</h4>
            </div>
            <div class="service-eval__wrap">
                <!-- 22.12.30 ?????? -->
                <svg class="service-eval__svg" width="180" height="320" xmlns="http://www.w3.org/2000/svg">
                    <!--
                      ????????? 90%??????
                      <g class="arcCircle">??? offset-distance??? 90%
                      <path class="arcGraphValue">??? stroke-dashoffset??? 10%
                      ????????? 10%??????
                      <g class="arcCircle">??? offset-distance??? 10%
                      <path class="arcGraphValue">??? stroke-dashoffset??? 90%
                    -->
                    <path class="arcGraph" stroke-linecap="round"  d="M 10,90 A 1 1, 0, 0 1, 170 90"></path>
                    <path class="arcGraphValue" style="stroke-dashoffset:{{100-$serviceRatingPercent}}% !important;" stroke-linecap="round" d="M 10,90 A 1 1, 0, 0 1, 170 90"></path>
                    <g class="arcCircle" style="offset-distance:{{$serviceRatingPercent}}%;">
                        <circle class="shap-1" r="10"></circle>
                        <circle class="shap-2" r="8"></circle>
                    </g>
                </svg>
                <div class="service-eval__content">
                    <div class="service-eval">
                        <span class="service-eval__score">{{$serviceRatingPercent}}</span>
                        <span class="service-eval__unit">???</span>
                    </div>
                    <div class="service-eval__desc">5??? ?????? ??????</div>
                </div>
                <!--// 22.12.30 ?????? -->
            </div>
        </div>
        <!--// 22.12.29 ?????? -->
    </div>
    <div class="aside__link-banners">
        <a href="#" class="aside__link-banner aside__link-banner--top">
            <img src="/advisorAssets/assets/images/aside-link-01.png" alt="" class="aside__link-banner-img">
        </a>
        <a href="#" class="aside__link-banner aside__link-banner--bottom">
            <img src="/advisorAssets/assets/images/aside-link-02.png" alt="" class="aside__link-banner-img">
        </a>
    </div>
</div>
