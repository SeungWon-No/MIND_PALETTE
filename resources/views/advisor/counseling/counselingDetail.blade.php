@php
  use App\Http\Util\CounselingTemplate;
  $counselingTemplate = new CounselingTemplate;


  $level =
  [
    "L" => [
        "color" => "green",
        "text" => "낮음(L)",
        "class" => "low",
      ],

    "M" => [
        "color" => "yellow",
        "text" => "보통(M)",
        "class" => "mid",
      ],

    "H" => [
        "color" => "red",
        "text" => "높음(H)",
        "class" => "high",
      ],
  ];

@endphp
@include('advisor/common/header')
<link rel="stylesheet" type="text/css" href="/commonEditor/styles.css?version={{CSS_VERSION}}">
<script src="/commonEditor/ckeditor.js"></script>
<script src="/commonEditor/ck.upload.adapter.js"></script>
    @csrf
    <div id="container">
      <div class="detail-top__cont">
        <div class="detail-top__inner">
          <div class="detail-item__cont">
            <!-- detail-item__wrap에 클래스 active 추가시 활성화 -->
            <div class="detail-item__wrap active">
              <div class="detail-item">
                <div class="detail-item__photo">
                  <img src="{{URL::asset('/storage/image/thumb/'.$images['house'])}}" alt="" class="detail-item__img">
                  <div class="detail-item__btn-wrap">
                    <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                    <button type="button" class="detail-item__btn doc"><span class="icon document-icon"></span></button>
                  </div>
                </div>
                <div class="detail-item__label">집</div>
              </div>
              <div class="detail-item">
                <div class="detail-item__photo">
                  <img src="{{URL::asset('/storage/image/thumb/'.$images['tree'])}}" alt="" class="detail-item__img">
                  <div class="detail-item__btn-wrap">
                    <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                    <button type="button" class="detail-item__btn doc"><span class="icon document-icon"></span></button>
                  </div>
                </div>
                <div class="detail-item__label">나무</div>
              </div>
              <div class="detail-item">
                <div class="detail-item__photo">
                  <img src="{{URL::asset('/storage/image/thumb/'.$images['person1'])}}" alt="" class="detail-item__img">
                  <div class="detail-item__btn-wrap">
                    <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                    <button type="button" class="detail-item__btn doc"><span class="icon document-icon"></span></button>
                  </div>
                </div>
                <div class="detail-item__label">사람1</div>
              </div>
              <div class="detail-item">
                <div class="detail-item__photo">
                  <img src="{{URL::asset('/storage/image/thumb/'.$images['person2'])}}" alt="" class="detail-item__img">
                  <div class="detail-item__btn-wrap">
                    <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                    <button type="button" class="detail-item__btn doc"><span class="icon document-icon"></span></button>
                  </div>
                </div>
                <div class="detail-item__label">사람2</div>
              </div>
            </div>
            <!-- detail-slider__wrap에 클래스 active 추가시 활성화 -->
            <div class="detail-slider__wrap">
              <div class="detail-item__slider">
                <div class="detail-item__slider-wrapper swiper-wrapper">
                  <div class="detail-item__slide swiper-slide">
                    <div class="detail-item__cell">
                      <div class="detail-item__photo">
                        <img src="/advisorAssets/assets/images/detail-item-01.png" alt="" class="detail-item__img">
                        <div class="detail-item__btn-wrap">
                          <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                          <button type="button" class="detail-item__btn doc active"><span class="icon document-icon"></span></button>
                        </div>
                      </div>
                      <div class="detail-item__label">집</div>
                    </div>
                    <div class="detail-item__qna">
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 집에는 누가 살고 있나요?</p>
                        <p class="detail-item__desc detail-item__desc--a">이 집에는 엄마랑 아빠, 저만 살고있어요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 집의 분위기는 어떤가요?</p>
                        <p class="detail-item__desc detail-item__desc--a">화목해요. 밖에는 울타리가 쳐져있어요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 집을 누구네 집이라고 생각하며 그렸나요?</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집이에요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이것은 무엇인가요? 어떤 이유로 그렸나요?</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집 멍멍이에요 멍멍이랑 밖에서 뛰놀고 싶은데 못놀아요. 엄마가 자꾸 화내요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">기타( 그 외 특이사항)</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집 멍멍이에요 멍멍이랑 밖에서 뛰놀고 싶은데 못놀아요. 엄마가 자꾸 화내요.</p>
                      </div>
                    </div>
                  </div>
                  <div class="detail-item__slide swiper-slide">
                    <div class="detail-item__cell">
                      <div class="detail-item__photo">
                        <img src="/assets/images/detail-item-02.png" alt="" class="detail-item__img">
                        <div class="detail-item__btn-wrap">
                          <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                          <button type="button" class="detail-item__btn doc active"><span class="icon document-icon"></span></button>
                        </div>
                      </div>
                      <div class="detail-item__label">나무</div>
                    </div>
                    <div class="detail-item__qna">
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 나무는 몇 살 정도 되었나요?</p>
                        <p class="detail-item__desc detail-item__desc--a">이 집에는 엄마랑 아빠, 저만 살고있어요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 나무의 건강은 어떤가요?</p>
                        <p class="detail-item__desc detail-item__desc--a">화목해요. 밖에는 울타리가 쳐져있어요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">나무에게 소원이 있다면 무엇이 있을까요?</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집이에요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 나무의 주변에는 무엇이 있나요?</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집 멍멍이에요 멍멍이랑 밖에서 뛰놀고 싶은데 못놀아요. 엄마가 자꾸 화내요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">기타( 그 외 특이사항)</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집 멍멍이에요 멍멍이랑 밖에서 뛰놀고 싶은데 못놀아요. 엄마가 자꾸 화내요.</p>
                      </div>
                    </div>
                  </div>
                  <div class="detail-item__slide swiper-slide">
                    <div class="detail-item__cell">
                      <div class="detail-item__photo">
                        <img src="/advisorAssets/assets/images/detail-item-03.png" alt="" class="detail-item__img">
                        <div class="detail-item__btn-wrap">
                          <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                          <button type="button" class="detail-item__btn doc active"><span class="icon document-icon"></span></button>
                        </div>
                      </div>
                      <div class="detail-item__label">사람1</div>
                    </div>
                    <div class="detail-item__qna">
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 사람은 무엇을 하고 있나요?</p>
                        <p class="detail-item__desc detail-item__desc--a">이 집에는 엄마랑 아빠, 저만 살고있어요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 사람은 지금 몇살인가요?</p>
                        <p class="detail-item__desc detail-item__desc--a">화목해요. 밖에는 울타리가 쳐져있어요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 사람은 지금 기분이 어떤가요?</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집이에요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">가장 힘들었던 일은 무엇일까요?</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집 멍멍이에요 멍멍이랑 밖에서 뛰놀고 싶은데 못놀아요. 엄마가 자꾸 화내요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">누군가 생각하며 그린 사람이 있을까요?</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집 멍멍이에요 멍멍이랑 밖에서 뛰놀고 싶은데 못놀아요. 엄마가 자꾸 화내요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">기타( 그 외 특이사항)</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집 멍멍이에요 멍멍이랑 밖에서 뛰놀고 싶은데 못놀아요. 엄마가 자꾸 화내요.</p>
                      </div>
                    </div>
                  </div>
                  <div class="detail-item__slide swiper-slide">
                    <div class="detail-item__cell">
                      <div class="detail-item__photo">
                        <img src="/advisorAssets/assets/images/detail-item-04.png" alt="" class="detail-item__img">
                        <div class="detail-item__btn-wrap">
                          <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                          <button type="button" class="detail-item__btn doc active"><span class="icon document-icon"></span></button>
                        </div>
                      </div>
                      <div class="detail-item__label">사람2</div>
                    </div>
                    <div class="detail-item__qna">
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 사람은 무엇을 하고 있나요?</p>
                        <p class="detail-item__desc detail-item__desc--a">이 집에는 엄마랑 아빠, 저만 살고있어요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 사람은 지금 몇살인가요?</p>
                        <p class="detail-item__desc detail-item__desc--a">화목해요. 밖에는 울타리가 쳐져있어요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 사람은 지금 기분이 어떤가요?</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집이에요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">가장 힘들었던 일은 무엇일까요?</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집 멍멍이에요 멍멍이랑 밖에서 뛰놀고 싶은데 못놀아요. 엄마가 자꾸 화내요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">누군가 생각하며 그린 사람이 있을까요?</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집 멍멍이에요 멍멍이랑 밖에서 뛰놀고 싶은데 못놀아요. 엄마가 자꾸 화내요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">기타( 그 외 특이사항)</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집 멍멍이에요 멍멍이랑 밖에서 뛰놀고 싶은데 못놀아요. 엄마가 자꾸 화내요.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
              </div>
              <button type="button" class="detail-slider__close">
                <span class="icon close-icon"></span>
              </button>
            </div>
          </div>
          <div class="detail-info__wrap">
            <div class="detail-info__user">
              <!-- 남자일때 detail-info__avater 클래스명 boy 추가-->
              <!-- <div class="detail-info__avater boy"></div> -->
              <div class="detail-info__avater"></div>
              <div class="detail-info__cell">
                <div class="detail-info__label">이름</div>
                <div class="detail-info__name">{{$clientInfo['clientName']}}</div>
              </div>
            </div>
            <!-- 22.12.29 수정 -->
            <div class="detail-tab__box">
              <div class="detail-tab__head">
                <!-- detail-tab__btn에 클래스 active추가시 활성화 -->
                <button type="button" class="detail-tab__btn active">아이의 인적사항</button>
                <button type="button" class="detail-tab__btn">가족관계 사항</button>
                <button type="button" class="detail-tab__btn">심리상담 사유</button>
                <button type="button" class="detail-tab__btn">행동관찰</button>
                <button type="button" class="detail-tab__btn">기질검사</button>
              </div>
              <div class="detail-tab__content">
                <div class="detail-tab__bg-line"></div>
                <!-- content-cell에 클래스 active 추가시 활성화 -->
                <!-- detail-tab__btn의 순서대로 content-cell에도 순서대로 active-->
                <div class="content-cell active">
                  <div class="kid-info">
                    <div class="kid-info__item-wrap">
                      <div class="kid-info__item">
                        <div class="kid-info__label">생년월일</div>
                        <div class="kid-info__content">{{$clientInfo['counselorBirthday']}}</div>
                      </div>
                      <div class="kid-info__item">
                        <div class="kid-info__label">학교</div>
                        <div class="kid-info__content">{{$clientInfo['counselorSchool']}}</div>
                      </div>
                    </div>
                    <div class="kid-info__item-wrap">
                      <div class="kid-info__item">
                        <div class="kid-info__label">성별</div>
                        <div class="kid-info__content">{{$clientInfo['counselorGender']}}</div>
                      </div>
                      <div class="kid-info__item">
                        <div class="kid-info__label">취미활동</div>
                        <div class="kid-info__content">{{$clientInfo['hobby']}}</div>
                      </div>
                    </div>
                    <div class="kid-info__item-wrap">
                      <div class="kid-info__item">
                        <div class="kid-info__label">가족관계</div>
                        <div class="kid-info__content">{{$clientInfo['familyRelations1']}}남
                        {{$clientInfo['familyRelations2']}}녀중
                        {{$clientInfo['familyRelations3']}}째</div>
                      </div>
                      <div class="kid-info__item">
                        <div class="kid-info__label">장점 , 특기</div>
                        <div class="kid-info__content">{{$clientInfo['specialty']}}</div>
                      </div>
                    </div>
                    <div class="kid-info__item">
                      <div class="kid-info__label">교우관계</div>
                      <div class="kid-info__content">
                      {{$clientInfo['friendship']}}
                      </div>
                    </div>
                    <div class="kid-info__item">
                      <div class="kid-info__label">교사와의<br>관계</div>
                      <div class="kid-info__content">
                      {{$clientInfo['relationshipTeacher']}}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="content-cell">
                  <div class="family-info">
                    <div class="family-info__item-wrap">
                      <div class="family-info__item">
                        <div class="family-info__label">
                          <span class="icon father-icon"></span>부
                        </div>
                        <div class="family-info__desc">
                        {{$clientInfo['relationshipDad']}}
                        </div>
                      </div>
                      <div class="family-info__item">
                        <div class="family-info__label">
                          <span class="icon mother-icon"></span>모
                        </div>
                        <div class="family-info__desc">
                        {{$clientInfo['relationshipMother']}}
                        </div>
                      </div>
                      <div class="family-info__item">
                        <div class="family-info__label">
                          <span class="icon brother-icon"></span>형제
                        </div>
                        <div class="family-info__desc">
                        {{$clientInfo['relationshipSiblings']}}
                        </div>
                      </div>
                      <div class="family-info__item">
                        <div class="family-info__label">
                          <span class="icon sister-icon"></span>자매
                        </div>
                        <div class="family-info__desc">
                        {{$clientInfo['relationshipSister']}}
                        </div>
                      </div>
                    </div>
                    <div class="family-info__last">
                      <div class="family-info__label">가족내력 및 스트레스 요인</div>
                      <div class="family-info__desc">
                      {!! $clientInfo['stressCauses']!!}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="content-cell">
                  <div class="reason-info">
                    <p class="reason-info__desc">
                    {!! $clientInfo['reasonInspection'] !!}
                    </p>
                  </div>
                </div>
                <div class="content-cell">
                  <div class="observ-info">
                    @php
                    $index = 0;
                    @endphp
                    @foreach($questions as $list)
                    @if($index == 0)
                    <div class="observe-info__left">
                    @elseif($index == 3)
                    <div class="observe-info__right">
                    @endif
                      <div class="observe-info__item">
                        <div class="observe-info__question">{{$list->questions}}</div>
                        @if($answer[$list->questionsPK] == "Y")
                        <div class="observe-info__answer">네</div>
                        @else
                        <div class="observe-info__answer no">아니요</div>
                        @endif
                      </div>
                      @if($index == 2)
                      </div>
                      @elseif($index == 5)
                      </div>
                      @endif
                      @php
                      $index++;
                      @endphp
                      @endforeach
                    </div>
                </div>
                <div class="content-cell">
                  <div class="result-info">
                    <div class="result-info__left">
                      <div class="result-info__item">
                        <div class="result-info__label">정서표현지수는 <span class="{{$level[$counselingTemplate->getTemperamentTestLevel($temperamentTest['emotion'])]['class']}}">
                          {{$level[$counselingTemplate->getTemperamentTestLevel($temperamentTest['emotion'])]['text']}}수준</span>입니다.</div>
                        <div class="result-info__content">
                          <div class="result-info__desc">
                          {!! CounselingTemplate::$temperamentTestLevelInfo['emotion'][$counselingTemplate->getTemperamentTestLevel($temperamentTest["emotion"])] !!}
                          </div>
                        </div>
                      </div>

                      <div class="result-info__item">
                        <div class="result-info__label">행동표현 지수는 <span class="{{$level[$counselingTemplate->getTemperamentTestLevel($temperamentTest['action'])]['class']}}">
                          {{$level[$counselingTemplate->getTemperamentTestLevel($temperamentTest['action'])]['text']}} 수준</span>입니다.</div>
                        <div class="result-info__content">
                          <div class="result-info__desc">
                          {!! CounselingTemplate::$temperamentTestLevelInfo['action'][$counselingTemplate->getTemperamentTestLevel($temperamentTest["action"])] !!}
                          </div>
                        </div>
                      </div>
                      <div class="result-info__item">
                        <div class="result-info__label">관계적응 지수는 <span class="{{$level[$counselingTemplate->getTemperamentTestLevel($temperamentTest['relationshipAdaptation'])]['class']}}">
                          {{$level[$counselingTemplate->getTemperamentTestLevel($temperamentTest['relationshipAdaptation'])]['text']}} 수준</span>입니다.</div>
                        <div class="result-info__content">
                          <div class="result-info__desc">
                          {!! CounselingTemplate::$temperamentTestLevelInfo['relationshipAdaptation'][$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipAdaptation"])] !!}
                          </div>
                        </div>
                      </div>
                      <div class="result-info__item">
                        <div class="result-info__label">관계추구 지수는 <span class="{{$level[$counselingTemplate->getTemperamentTestLevel($temperamentTest['relationshipPursuit'])]['class']}}">
                          {{$level[$counselingTemplate->getTemperamentTestLevel($temperamentTest['relationshipPursuit'])]['text']}}</span>수준입니다.</div>
                        <div class="result-info__content">
                          <div class="result-info__desc">
                          {!! CounselingTemplate::$temperamentTestLevelInfo['relationshipPursuit'][$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipPursuit"])] !!}
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- 22.12.30 수정 -->
                    <div class="result-info__right">
                      <div class="graph-wrap">
                        <div class="graph-tit">기질검사 종합결과</div>
                        <div class="graph-content">
                          <div class="graph-data">
                            <div class="graph-bar__cell">
                              <!--
                                  bar에 클래스 red, yellow, green로 색구별
                                -->
                              <div class="graph-bar">
                                <div class="bar {{$level[$counselingTemplate->getTemperamentTestLevel($temperamentTest['emotion'])]['color']}}"
                                style="height:{{$temperamentTest['emotion']}}%;"></div>
                              </div>
                              <div class="graph-bar">
                                <div class="bar {{$level[$counselingTemplate->getTemperamentTestLevel($temperamentTest['action'])]['color']}}"
                                style="height:{{$temperamentTest['action']}}%;"></div>
                              </div>
                              <div class="graph-bar">
                                <div class="bar {{$level[$counselingTemplate->getTemperamentTestLevel($temperamentTest['relationshipAdaptation'])]['color']}}"
                                style="height:{{$temperamentTest['relationshipAdaptation']}}%;"></div>
                              </div>
                              <div class="graph-bar ">
                                <div class="bar {{$level[$counselingTemplate->getTemperamentTestLevel($temperamentTest['relationshipPursuit'])]['color']}}"
                                style="height:{{$temperamentTest['relationshipPursuit']}}%;"></div>
                              </div>
                            </div>
                          </div>
                          <div class="graph-grid">
                            <!--
                              1단계 green-line
                              2단계 yellow-line
                              3단계 red-line
                            -->
                            <div class="graph-x-line"></div>
                            <div class="graph-x-line"></div>
                            <div class="graph-x-line"></div>
                            <div class="graph-x-line point-line red-line"></div>
                            <div class="graph-x-line"></div>
                            <div class="graph-x-line point-line yellow-line"></div>
                            <div class="graph-x-line"></div>
                            <div class="graph-x-line point-line green-line"></div>
                            <div class="graph-x-line"></div>
                            <div class="graph-x-line"></div>
                            <div class="graph-x-line"></div>
                          </div>
                          <div class="graph-x-labels">
                            <!-- hide 클래스추가시 숨김 -->
                            <div class="graph-x-label hide">
                              <div class="label-value">100</div>
                            </div>
                            <div class="graph-x-label hide">
                              <div class="label-value">90</div>
                            </div>
                            <div class="graph-x-label hide">
                              <div class="label-value">80</div>
                            </div>
                            <div class="graph-x-label">
                              <div class="label-value">70</div>
                            </div>
                            <div class="graph-x-label hide">
                              <div class="label-value">60</div>
                            </div>
                            <div class="graph-x-label">
                              <div class="label-value">50</div>
                            </div>
                            <div class="graph-x-label hide">
                              <div class="label-value">40</div>
                            </div>
                            <div class="graph-x-label">
                              <div class="label-value">30</div>
                            </div>
                            <div class="graph-x-label hide">
                              <div class="label-value">20</div>
                            </div>
                            <div class="graph-x-label hide">
                              <div class="label-value">10</div>
                            </div>
                          </div>
                          <div class="graph-y-labels">
                            <div class="graph-y-label">
                              <div class="label-y-value">
                                정서표현
                                <span class="graph-result">{{$temperamentTest['emotion']}}점</span>
                              </div>
                            </div>
                            <div class="graph-y-label">
                              <div class="label-y-value">
                                행동표현
                                <span class="graph-result">{{$temperamentTest['action']}}점</span>
                              </div>
                            </div>
                            <div class="graph-y-label">
                              <div class="label-y-value">
                                관계적응
                                <span class="graph-result">{{$temperamentTest['relationshipAdaptation']}}점</span>
                              </div>
                            </div>
                            <div class="graph-y-label">
                              <div class="label-y-value">
                                관계추구
                                <span class="graph-result">{{$temperamentTest['relationshipPursuit']}}점</span>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                    <!-- //22.12.30 수정 -->
                  </div>
                </div>
                <div class="detail-tab__date">{{date_format(date_create($clientInfo["createDate"]),"Y . m . d .")}} 작성</div>
              </div>
            </div>
            <!--// 22.12.29 수정 -->
          </div>
        </div>
      </div>
      <div id="statusForm" class="detail-md__cont" style="display: {{$cssStyle["status"]}}">
        <div class="detail-md__inner">
          <div class="counselor-before__cont">
            <div class="counselor-common__info">
              <div class="common-info__photo">
                <img src="/advisorAssets/assets/images/user-profile.jpg" alt="" class="common-info__img">
              </div>
              <div class="common-info__name">김아무 상담사</div>
            </div>
            <div class="counselor-before__btn-wrap">
              <!-- 상담중일때, counselor-before__btn에 클래스 disabled 추가-->
              <a href="javascript:startCounseling()" class="counselor-before__btn">{{$statusCode[$clientInfo["counselingStatus"]]}}</a>
              <span class="icon donw-arrow-icon"></span>
            </div>
          </div>
        </div>
      </div>
    <div id="editorForm" class="detail-md__cont" style="display: {{$cssStyle["editor"]}}">
        <form name="counselingWriteForm">
            <div class="detail-md__inner">
                <!-- 22.12.29 수정 -->
                <div class="counselor-edit__cont">
                    <div class="counselor-edit__top">
                        <div class="counselor-common__info">
                            <div class="common-info__photo">
                                <img src="/advisorAssets/assets/images/user-profile.jpg" alt="" class="common-info__img">
                            </div>
                            <div class="common-info__name">김아무 상담사</div>
                        </div>
                        <div class="counselor-edit__btns-wrap">
                            <button onclick="saveWrite('temp')" type="button" class="counselor-edit__btn counselor-edit__btn--save">임시저장</button>
                            <button onclick="saveWrite('write')" type="button" class="counselor-edit__btn">상담등록</button>
                            <button onclick="cancel()"type="button" class="counselor-edit__btn counselor-edit__btn--cancel">상담취소</button>
                        </div>
                    </div>
                    <div class="counselor-edit__body">
                        <div class="counselor-editor__area">
                            <div class="counselor-editor__btn-wrap">
                                <button class="counselor-editor__btn guide">작성가이드</button>
                                <button class="counselor-editor__btn reset">폼 리셋</button>
                            </div>
                            <div class="counselor-editor2">
                                <textarea class="ckeditor" id="content" name="content"></textarea>
                            </div>
                        </div>
                        <div class="counselor-check__area">
                            <div class="counselor-time__area">
                                <div class="counselor-time__desc">작성까지 남은 시간</div>
                                <div class="counselor-time">24 : 00</div>
                            </div>
                            <div class="counselor-notice__area">
                                <span class="icon caution-icon"></span>
                                <div class="counselor-notice__text-g">
                                    <h5>24시간 이내에 작성해주세요.</h5>
                                    <p>시간 경과 시, 작성 중인 내용이 삭제되며 해당 검사지는 재상담이 불가합니다.</p>
                                </div>
                            </div>
                            <div class="counselor-note__check">
                                <div class="note-check__wrap">
                                    <div class="note-check__head">특이사항</div>
                                    <div class="note-check__body">
                                        <div class="note-check__item">
                                            <input type="radio" class="note-check" name="noteCheck" checked>
                                            <div class="note-check__cell">
                                                <span class="icon note-check-icon green"></span>
                                                <div class="note-check__label">해당없음</div>
                                            </div>
                                            <div class="note-check__desc">환자에게 해당하는 정서적 특이사항이 없을 경우.</div>
                                        </div>
                                        <div class="note-check__item">
                                            <input type="radio" class="note-check" name="noteCheck">
                                            <div class="note-check__cell">
                                                <span class="icon note-check-icon red"></span>
                                                <div class="note-check__label">위험</div>
                                            </div>
                                            <div class="note-check__desc">정서적 위험, 조치가 긴급한 환자의 경우..</div>
                                        </div>
                                        <div class="note-check__item">
                                            <input type="radio" class="note-check" name="noteCheck">
                                            <div class="note-check__cell">
                                                <span class="icon note-check-icon yellow"></span>
                                                <div class="note-check__label">주의</div>
                                            </div>
                                            <div class="note-check__desc">주의가 필요한 환자의 경우.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--// 22.12.29 수정 -->
            </div>
        </form>
    </div>
      <div class="detail-bt__cont">
        <div class="detail-bt__inner">
          <h3 class="sb-counseling__tit">대기중인 그림상담</h3>
          <div class="sb-counseling__slider">
            <div class="sb-counseling__wrapper swiper-wrapper">
              <div class="sb-counseling__slide swiper-slide">
                <a href="#" class="sb-counseling__photo">
                  <img src="../advisorAssets/assets/images/couns-list-01.jpg" alt="" class="sb-counseling__img">
                </a>
                <div class="sb-counseling__info">
                  <div class="sb-counseling__user">홍길동</div>
                  <div class="sb-counseling__year">191898</div>
                  <div class="sb-counseling__gender">남아</div>
                </div>
              </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
        </div>
      </div>
    </div>
<article id="detailImagePop" class="layer-pop__wrap">
    <div class="layer-pop__parent">
        <div class="layer-pop__children">
            <div class="layer-pop__photo">
                <div class="layer-photo__cell">
                    <img src="" alt="" class="layer-img">
                </div>
            </div>
        </div>
    </div>
</article>
<script>

    if("{{$cssStyle["editor"]}}" === "block") {
        editorLoader();
    }

    function startCounseling() {
        const status = "{{$clientInfo["counselingStatus"]}}";
        if (status === "279") {
            //counselingStatus
            $.ajax({
                type:'POST',
                url:'/advisor/counselingStatus/{{$counselingPK}}',
                data: {},
                async: false,
                headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
                success:function(json){
                    var data = JSON.parse(json);
                    if ( data.status === "success" ) {
                        $("#editorForm").css('display','block');
                        $("#statusForm").css('display','none');
                        editorLoader()
                    } else {
                        alert(data.message);
                    }
                }
            });
        }
    }

    function editorLoader(){
        ClassicEditor
            .create( document.querySelector( '.ckeditor' ), {
                extraPlugins: [MyCustomUploadAdapterPlugin],
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( error => {
            } );
    }

    function saveWrite(type) {
        var queryString = $("form[name=counselingWriteForm]").serialize() ;
        $.ajax({
            type:'POST',
            url:'/advisor/counselingDetail/{{$counselingPK}}',
            data: queryString,
            async: false,
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success:function(json){
                var data = JSON.parse(json);
                if ( data.status === "success" ) {

                } else {
                    // alert(data.message);
                }
            }
        });
    }

    function cancel() {
        $.ajax({
            type:'POST',
            url:'/advisor/counselingCancel/{{$counselingPK}}',
            data: {},
            async: false,
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success:function(json){
                var data = JSON.parse(json);
                if ( data.status === "success" ) {

                } else {
                    // alert(data.message);
                }
            }
        });
    }

    function MyCustomUploadAdapterPlugin(editor) {
        editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
            return new UploadAdapter(loader)
        }
    }
</script>
@include('advisor/common/footer')
@include('advisor/common/end')
