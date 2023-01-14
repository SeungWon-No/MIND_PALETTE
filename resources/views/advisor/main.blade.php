@include('advisor/common/header')
<div id="container">
      <div class="column-wrapper">
        <div class="column-left">
          <div class="counseling-wrap">
            <div class="counseling-fillter__tab">
              <button type="button" class="counseling-filter__btn active" style="background:var(--point-green-color)">
                <span class="sun-icon"></span>
                <div class="filter__btn-tit">인천시 아동<br> 마음정신건강 지수 </div>
                <div class="counseling-status">
                  <span class="counseling-status__num">92</span>
                  <span class="counseling-status__unit">%</span>
                </div>
              </button>
              <button onclick="location.href='/advisor/waitingCounseling'" type="button" class="counseling-filter__btn active" style="background:var(--point-blue-color)">
                <div class="filter__btn-tit">상담대기</div>
                <div class="counseling-status">
                  <span class="counseling-status__num">{{$waitingCount}}</span>
                  <span class="counseling-status__unit">건</span>
                </div>
              </button>
              <button onclick="location.href='/advisor/completeCounseling'" type="button" class="counseling-filter__btn active" style="background:var(--primary-color)">
                <div class="filter__btn-tit">상담완료</div>
                <div class="counseling-status">
                  <span class="counseling-status__num">{{$completeCount}}</span>
                  <span class="counseling-status__unit">건</span>
                </div>
              </button>
              <button onclick="location.href='/advisor/warningCounseling'" type="button" class="counseling-filter__btn active" style="background:var(--point-red-color)">
                <div class="filter__btn-tit">주의 / 위험</div>
                <div class="counseling-status">
                  <span class="counseling-status__num">{{$cautionCount + $dangerCount}}</span>
                  <span class="counseling-status__unit">건</span>
                </div>
              </button>
              <button onclick="location.href='/advisor/impossibleCounseling'" type="button" class="counseling-filter__btn active" style="background:var(--font-grray-color)">
                <div class="filter__btn-tit">상담불가</div>
                <div class="counseling-status">
                  <span class="counseling-status__num">{{$impossibleCount}}</span>
                  <span class="counseling-status__unit">건</span>
                </div>
              </button>
            </div>
          </div>
          <div class="counseling-cont">
            <!-- notice on / off -->
            <div class="counseling-notice">
              <a href="#none" class="counseling-notice__link"><span class="icon notice-alarm-icon"></span>[공지사항] 상담중 처리에 대한 안내문 공지.</a>
            </div>
            <div class="cont-heading">
              <h3 class="cont-heading__tit">대기중인 그림상담</h3>
            </div>
            <div class="counseling-list__wrap">
              <ul class="counseling-list">
                <!-- case에 맞게 class명에 추가 -->
                <!-- case 1. [default] counseling -->
                <!-- case 2. [ing] counseling ongoing -->
                <!-- case 3. [end] counseling end -->
                <!-- case 3-1. [end + danger] counseling end danger -->
                <!-- case 3-2. [end + need-care] counseling end need-care -->

                @foreach ($counselingList['data'] as $list)
                  <li class="counseling">
                    <a href="/advisor/counselingDetail/{{$list['counselingPK']}}" class="counseling-thumb">
                      <img src="../advisorAssets/assets/images/couns-list-01.jpg" alt="" class="counseling-thumb__img">
                    </a>
                    <div class="counseling-user__info">
                      <div class="counseling-user__name">{{$list['counselorName']}}</div>
                      <div class="counseling-user__year">{{$list['counselorBirthday']}}</div>
                      <div class="counseling-user__gender">{{$list['counselorGender']}}</div>
                    </div>
                    <div class="counseling-code__cell">
                      <div class="counseling-code__detail">상담코드:<span class="counseling-code">{{$list['counselingPK']}}</span></div>
                    </div>
                    <div class="counseling-link__cell">
                      <a href="/advisor/counselingDetail/{{$list['counselingPK']}}" class="counseling-link">상담하기</a>
                    </div>
                  </li>
                @endforeach
              </ul>
              <div class="paging-box">
                @foreach ($counselingList['links'] as $link)
                  <a href="{{ $link['url'] }}" class="paging-num active">{!! str_replace("Next ","",str_replace(" Previous","",$link['label'])) !!}</a>
                @endforeach
              </div>
            </div>
          </div>
          <div class="expert-cont">
            <div class="cont-heading">
              <h3 class="cont-heading__tit">상담사 리스트</h3>
              <a href="#none" class="cont-heading__link">상담사 더보기 <span class="icon link-more-icon"></span></a>
            </div>
            <div class="expert-list">
            @foreach ($advisorList['data'] as $list)
              <div class="expert-item">
                <div class="expert-item__head">
                  <div class="expert-profile__photo">
                    <img src="../advisorAssets/assets/images/user-profile.jpg" alt="" class="expert-profile__img">
                  </div>
                  <div class="expert-profile">
                    <div class="expert-name">{{$list['advisorName']}}</div>
                    <div class="expert-star__review">
                      <span class="icon star-review-icon"></span>
                      <div class="star-review__score">4.0</div>
                      <div class="star-review__unit">/ 5</div>
                    </div>
                    <div class="expert-exp">
                      팔레트 상담 <span class="expert-exp__num">1242</span>회 진행
                    </div>
                  </div>
                </div>
                <div class="expert-item__body">
                  <h5 class="expert-introduce">자기소개</h5>
                  <p class="expert-introduce__desc">
                    {{$list['briefIntroduction']}}
                  </p>
                </div>
              </div>
            @endforeach
            </div>
            <p class="notice-data">
              <span class="icon notice-icon"></span>22년 11월 28일 14시 22분 기준 정보입니다.
            </p>
          </div>
        </div>

        @include('advisor/common/right')
      </div>
    </div>
@include('advisor/common/footer')
@include('advisor/common/end')
