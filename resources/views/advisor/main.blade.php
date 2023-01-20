@include('advisor/common/header')
<div id="container">
      <div class="column-wrapper">
        <div class="column-left">
          <div class="counseling-wrap">
            <div class="counseling-fillter__tab">
              <button id="defalut" onclick="location.href='/advisor/'" type="button" class="counseling-filter__btn active" style="background:var(--point-green-color)">
                <span class="sun-icon"></span>
                <div class="filter__btn-tit">인천시 아동<br> 마음정신건강 지수 </div>
                <div class="counseling-status">
                  <span class="counseling-status__num">92</span>
                  <span class="counseling-status__unit">%</span>
                </div>
              </button>
              <button id="waitingCounseling" onclick="location.href='/advisor/waitingCounseling'" type="button" class="counseling-filter__btn" style="background:var(--point-blue-color)">
                <div class="filter__btn-tit">상담대기</div>
                <div class="counseling-status">
                  <span class="counseling-status__num">{{$waitingCount}}</span>
                  <span class="counseling-status__unit">건</span>
                </div>
              </button>
              <button id="completeCounseling" onclick="location.href='/advisor/completeCounseling'" type="button" class="counseling-filter__btn" style="background:var(--primary-color)">
                <div class="filter__btn-tit">상담완료</div>
                <div class="counseling-status">
                  <span class="counseling-status__num">{{$completeCount}}</span>
                  <span class="counseling-status__unit">건</span>
                </div>
              </button>
              <button id="warningCounseling" onclick="location.href='/advisor/warningCounseling'" type="button" class="counseling-filter__btn" style="background:var(--point-red-color)">
                <div class="filter__btn-tit">주의 / 위험</div>
                <div class="counseling-status">
                  <span class="counseling-status__num">{{$cautionCount + $dangerCount}}</span>
                  <span class="counseling-status__unit">건</span>
                </div>
              </button>
              <button id="impossibleCounseling" onclick="location.href='/advisor/impossibleCounseling'" type="button" class="counseling-filter__btn" style="background:var(--font-grray-color)">
                <div class="filter__btn-tit">상담불가</div>
                <div class="counseling-status">
                  <span class="counseling-status__num">{{$impossibleCount}}</span>
                  <span class="counseling-status__unit">건</span>
                </div>
              </button>
            </div>
          </div>
          <div class="counseling-cont">
              @if(isset($notice))
            <div class="counseling-notice">
              <a href="/advisor/notice/{{$notice->noticePK}}" class="counseling-notice__link"><span class="icon notice-alarm-icon"></span>[공지사항] {{$notice->title}}</a>
            </div>
              @endif
            <div class="cont-heading">
              <h3 class="cont-heading__tit">{{$listName}}</h3>
            </div>
            <div class="counseling-list__wrap">
              @if (!empty($counselingList['data']))
              <ul class="counseling-list">
                @foreach ($counselingList['data'] as $list)
                  <li class="counseling {{ $counselingStatus[$list['counselingStatus']] }} {{ $counselorStatus[$list['counselorStatus']] }}">
                    <a href="/advisor/counselingDetail/{{$list['counselingPK']}}" class="counseling-thumb">
                      <img src="{{URL::asset('/storage/image/thumb/'.$list['answer'])}}" alt="" class="counseling-thumb__img">
                    </a>
                    <div class="counseling-user__info">
                      <div class="counseling-user__name">{{$list['counselorName']}}</div>
                      <div class="counseling-user__year">{{$list['counselorBirthday']}}</div>
                      <div class="counseling-user__gender">{{$list['counselorGender']}}</div>
                    </div>
                    <div class="counseling-code__cell">
                      <div class="counseling-code__detail">상담코드:<span class="counseling-code">{{$list['counselingCode']}}</span></div>
                    </div>
                    @if($list['counselingStatus'] == 279 || $list['counselingStatus'] == 354)
                    <div class="counseling-link__cell">
                      <a href="/advisor/counselingDetail/{{$list['counselingPK']}}" class="counseling-link">상담하기</a>
                    </div>
                    @elseif($list['counselingStatus'] == 280)
                    <div class="counseling-link__cell">
                      <a class="counseling-link" style="cursor: default;">상담중</a>
                    </div>
                    @elseif($list['counselingStatus'] == 353 || $list['counselingStatus'] == 356 )
                    <div class="counseling-link__cell">
                      <a class="counseling-link" style="cursor: default;">상담불가</a>
                    </div>
                    @else

                    @endif
                  </li>
                @endforeach
              </ul>
              @else
              <div class="counseling-list__no-data">
                <p class="list-no-data__desc">
                  등록된 그림상담이 없습니다.
                </p>
              </div>
              @endif
              <div class="paging-box">
                @foreach ($counselingList['links'] as $link)
                  @php
                  if($link['label'] >= 1){
                    if ($counselingList['current_page'] == $link['label']){
                      $addClass = 'active';
                    }else{
                      $addClass = '';
                    }
                  }
                  @endphp
                <a href="{{ $link['url'] }}" class="paging-num {{$addClass}}">{!! str_replace("Next ","",str_replace(" Previous","",$link['label'])) !!}</a>
                @endforeach
              </div>
            </div>
          </div>
          <div class="expert-cont">
            <div class="cont-heading">
              <h3 class="cont-heading__tit">상담사 리스트</h3>
              <a href="/advisor/advisorList" class="cont-heading__link">상담사 더보기 <span class="icon link-more-icon"></span></a>
            </div>
            <div class="expert-list">
            @foreach ($advisorList['data'] as $list)
              <div class="expert-item">
                <div class="expert-item__head">
                  <div class="expert-profile__photo">
                  @if($list->profilePath)
                      <img id="userProfileImage" src="{{URL::asset('/storage/image/profile/'.$list->profilePath)}}" alt="" class="upload-file__img">
                  @endif
                    <img src="/advisorAssets/assets/images/user-profile.jpg" alt="" class="expert-profile__img">
                  </div>
                  <div class="expert-profile">
                    <div class="expert-name">{{$list['advisorName']}}</div>
                    <div class="expert-star__review">
                      <span class="icon star-review-icon"></span>
                      <div class="star-review__score">{{($advisorProfile->rating == 0)?"0.0":sprintf('%0.1f', ($advisorProfile->rating/$advisorProfile->ratingCount))}}</div>
                      <div class="star-review__unit">/ 5</div>
                    </div>
                    <div class="expert-exp">
                      팔레트 상담 <span class="expert-exp__num">{{$advisorProfile->counselingCount}}</span>회 진행
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
              <span class="icon notice-icon"></span>{{date("y년 m월 d일 H시 i분")}} 기준 정보입니다.
            </p>
          </div>
        </div>
        <script>
          var currentUrl = $(location).attr("href"); // 현재 페이지 url
          var splitUrl = currentUrl.split("/");
          var urlSection1 = splitUrl[3];
          var urlSection2 = splitUrl[4];

          if (urlSection1 == 'advisor' && (urlSection2 === '' || urlSection2 === undefined)){
            $(".counseling-filter__btn").attr("class", "counseling-filter__btn active");

          }else if(urlSection1 == 'advisor' && urlSection2 != '' || urlSection2 != undefined){
            $(".counseling-filter__btn").attr("class", "counseling-filter__btn");
            $("#"+urlSection2).attr("class", "counseling-filter__btn active");

          }
        </script>

        @include('advisor/common/right')
      </div>
    </div>
@include('advisor/common/footer')
@include('advisor/common/end')
