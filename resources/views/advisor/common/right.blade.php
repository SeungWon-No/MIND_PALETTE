@php
    use App\Models\Counseling;
    $recentList = Counseling::findRecentCounseling($advisorProfile->advisorPK);
    $todayCounseling = Counseling::findTodayCounseling();
    $todayCompleteCounseling = Counseling::findTodayCompleteCounseling();
@endphp
<div class="column-right">
    <div class="account">
        <div class="account-info__cell">
            <div class="account-profile__photo">
                <img src="/advisorAssets/assets/images/user-profile.jpg" alt="" class="account-profile__img">
            </div>
            <div class="account-profile">
                <div class="account-profile__cell">
                    <div class="account-profile__info">
                        <div class="account-profile__name">{{$advisorProfile['advisorName']}}</div>
                        <div class="account-profile__center">{{$advisorProfile->centerName}}</div>
                    </div>
                </div>
                <a href="/advisor/profile" class="account-profile__link">프로필 바로가기 ></a>
            </div>
        </div>
    </div>
    <div class="my-history">
        <div class="my-history__heading">
            <div class="my-history__tit">나의 상담내역</div>
            <div class="my-history__total">
                (총 <span class="my-history__totalnum">{{number_format($advisorProfile->counselingCount)}}</span>건)
            </div>
        </div>
        <ul class="my-history__list">
            <li class="my-history__item">
                <!-- 작성 중인 상담이 1건 이상이면 class에  active추가 -->
                <a href="#none" class="my-history__obj active">• 작성중
                    <span class="my-history__num">1</span><span class="my-history__unit">건</span>
                </a>
                <!-- 작성 중인 상담이 1건 이상이면 남은 시간 추가 -->
                <div class="my-history__time-cell">남은 시간 <span class="my-history__time">11:30</span></div>
            </li>
            <li class="my-history__item">
                <a href="#none" class="my-history__obj">• 상담완료
                    <span class="my-history__num">1</span><span class="my-history__unit">건</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="recent-history">
        <div class="aside__heading">
            <h4 class="aside__heading__tit">최근 상담 내역</h4>
            <a href="#none" class="aside__heading__link">더보기<span class="icon link-more-icon"></span></a>
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
                        <div class="counseling-code__detail">상담코드:<span class="counseling-code">{{$recent->counselingCode}}</span></div>
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
                <h4 class="aside__heading__tit">나의 상담지수</h4>
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
                <h4 class="aside__heading__tit">오늘의 상담신청 및 완료</h4>
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
                <h4 class="aside__heading__tit">서비스에 대한 만족도 평가</h4>
            </div>
            <div class="service-eval__wrap">
                <!-- 22.12.30 수정 -->
                <svg class="service-eval__svg" width="180" height="320" xmlns="http://www.w3.org/2000/svg">
                    <!--
                      점수가 90%이면
                      <g class="arcCircle">의 offset-distance는 90%
                      <path class="arcGraphValue">의 stroke-dashoffset는 10%
                      점수가 10%이면
                      <g class="arcCircle">의 offset-distance는 10%
                      <path class="arcGraphValue">의 stroke-dashoffset는 90%
                    -->
                    <path class="arcGraph" stroke-linecap="round" d="M 10,90 A 1 1, 0, 0 1, 170 90"></path>
                    <path class="arcGraphValue" stroke-linecap="round" d="M 10,90 A 1 1, 0, 0 1, 170 90"></path>
                    <g class="arcCircle">
                        <circle class="shap-1" r="10"></circle>
                        <circle class="shap-2" r="8"></circle>
                    </g>
                </svg>
                <div class="service-eval__content">
                    <div class="service-eval">
                        <span class="service-eval__score">4.0</span>
                        <span class="service-eval__unit">점</span>
                    </div>
                    <div class="service-eval__desc">5점 만점 기준</div>
                </div>
                <!--// 22.12.30 수정 -->
            </div>
        </div>
        <!--// 22.12.29 수정 -->
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
