@php
  use App\Http\Util\CounselingTemplate;
    use Illuminate\Support\Facades\Crypt;
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
                        <img src="{{URL::asset('/storage/image/thumb/'.$images['house'])}}" alt="" class="detail-item__img">
                        <div class="detail-item__btn-wrap">
                          <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                          <button type="button" class="detail-item__btn doc active"><span class="icon document-icon"></span></button>
                        </div>
                      </div>
                      <div class="detail-item__label">집</div>
                    </div>
                    <div class="detail-item__qna">
                        @php
                            $rowIndex = 0;
                        @endphp
                        @foreach($houseQuestions as $houseQuestionsRow)
                            @php
                                if($rowIndex == 0) {
                                    $rowIndex++;
                                    continue;
                                }
                            @endphp
                            <div class="detail-item__text-g">
                                <p class="detail-item__desc detail-item__desc--q">{!! $houseQuestionsRow->questions !!}</p>
                                <p class="detail-item__desc detail-item__desc--a">{{($houseAnswer[$houseQuestionsRow->questionsPK] == "")?"ㅤ":$houseAnswer[$houseQuestionsRow->questionsPK]}}</p>
                            </div>
                        @endforeach
                    </div>
                  </div>
                  <div class="detail-item__slide swiper-slide">
                    <div class="detail-item__cell">
                      <div class="detail-item__photo">
                        <img src="{{URL::asset('/storage/image/thumb/'.$images['tree'])}}" alt="" class="detail-item__img">
                        <div class="detail-item__btn-wrap">
                          <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                          <button type="button" class="detail-item__btn doc active"><span class="icon document-icon"></span></button>
                        </div>
                      </div>
                      <div class="detail-item__label">나무</div>
                    </div>
                    <div class="detail-item__qna">
                        @php
                            $rowIndex = 0;
                        @endphp
                        @foreach($treeQuestions as $treeQuestionsRow)
                            @php
                                if($rowIndex == 0) {
                                    $rowIndex++;
                                    continue;
                                }
                            @endphp
                            <div class="detail-item__text-g">
                                <p class="detail-item__desc detail-item__desc--q">{!! $treeQuestionsRow->questions !!}</p>
                                <p class="detail-item__desc detail-item__desc--a">{{($treeAnswer[$treeQuestionsRow->questionsPK] == "")?"ㅤ":$treeAnswer[$treeQuestionsRow->questionsPK]}}</p>
                            </div>
                        @endforeach
                    </div>
                  </div>
                  <div class="detail-item__slide swiper-slide">
                    <div class="detail-item__cell">
                      <div class="detail-item__photo">
                        <img src="{{URL::asset('/storage/image/thumb/'.$images['person1'])}}" alt="" class="detail-item__img">
                        <div class="detail-item__btn-wrap">
                          <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                          <button type="button" class="detail-item__btn doc active"><span class="icon document-icon"></span></button>
                        </div>
                      </div>
                      <div class="detail-item__label">사람1</div>
                    </div>
                    <div class="detail-item__qna">
                        @php
                            $rowIndex = 0;
                        @endphp
                        @foreach($person1Questions as $person1QuestionRow)
                            @php
                                if($rowIndex == 0) {
                                    $rowIndex++;
                                    continue;
                                }
                            @endphp
                            <div class="detail-item__text-g">
                                <p class="detail-item__desc detail-item__desc--q">{!! $person1QuestionRow->questions !!}</p>
                                <p class="detail-item__desc detail-item__desc--a">{{($person1Answer[$person1QuestionRow->questionsPK] == "")?"ㅤ":$person1Answer[$person1QuestionRow->questionsPK]}}</p>
                            </div>
                        @endforeach
                    </div>
                  </div>
                  <div class="detail-item__slide swiper-slide">
                    <div class="detail-item__cell">
                      <div class="detail-item__photo">
                        <img src="{{URL::asset('/storage/image/thumb/'.$images['person2'])}}" alt="" class="detail-item__img">
                        <div class="detail-item__btn-wrap">
                          <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                          <button type="button" class="detail-item__btn doc active"><span class="icon document-icon"></span></button>
                        </div>
                      </div>
                      <div class="detail-item__label">사람2</div>
                    </div>
                    <div class="detail-item__qna">
                        @php
                            $rowIndex = 0;
                        @endphp
                        @foreach($person2Questions as $person2QuestionRow)
                            @php
                                if($rowIndex == 0) {
                                    $rowIndex++;
                                    continue;
                                }
                            @endphp
                            <div class="detail-item__text-g">
                                <p class="detail-item__desc detail-item__desc--q">{!! $person2QuestionRow->questions !!}</p>
                                <p class="detail-item__desc detail-item__desc--a">{{($person2Answer[$person2QuestionRow->questionsPK] == "")?"ㅤ":$person2Answer[$person2QuestionRow->questionsPK]}}</p>
                            </div>
                        @endforeach
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
        <div class="detail-md__cont">
            <div class="detail-md__inner">
                <div class="counselor-cont">
                    <div class="counselor-date">2022 . 11 . 29. 답변</div>
                    <div class="counselor-info">
                        <div class="counselor-info__top">
                            <div class="counselor-info__detail">
                                <div class="counselor-info__name">김아무 상담사</div>
                                <div class="counselor-info__more">
                                    <div class="counselor-info__work">부평 아동 전문병원</div>
                                    <div class="counselor-info__progress">팔레트 상담 <em>1353</em>진행</div>
                                </div>
                            </div>
                            <div class="counselor-info__photo">
                                <img src="../assets/images/user-profile.jpg" alt="" class="counselor-info__img">
                            </div>
                        </div>
                        <div class="counselor-info__carrier">
                            현)근로복지공단 전문상담사, 전)경기도 교육청 학생상담 자원봉사자, 전)용산구 건강가정지원센터 전문상담사
                        </div>
                    </div>

                    <div class="counselor-answer">
                        <div class="counselor-answer__text">
                            <p class="counselor-answer__desc">
                                사고의 양과 연상 활동은 부족한 편으로 보입니다. <br>정서상태 3단계로 사회적으로 통용되는 관습적 지각력은 매우 부족할 것으로 예상됩니다.<br><br>심리검사의 이해 소검사의 저조하 점수와 더불어 이와 같은 특성은 또래의 눈에 “특이한 아이”로 비춰질 수 있게 할 것이며, 이에 원만한 대인관계는 어려울 것으로 예측되며, 특히 모든 반응이 Bt또는 Ad, Cs반응으로 H반응은 결여되어있으므로, 실질적인 상호작용은 매우 적은 빈도로 일어날 것으로 판단됩니다.
                            </p>
                        </div>
                    </div>
                    <!-- 22.12.29 수정 -->
                    <div class="counselor-vote">
                        <div class="counselor-vote__desc">상담사 만족도에 대한 평가</div>
                        <!-- 텍스트 있을때 counselor-vote__cell에 클래스 active 추가-->
                        <div class="counselor-vote__cell active">
                            <div class="counselor-vote__star">
                                <span class="icon star-review-icon"></span>
                                <div class="star-review__score">4.0</div>
                                <div class="star-review__unit">/ 5</div>
                            </div>
                            <div class="counselor-vote__text">
                                아이에 대해 진중한 상담이 좋았습니다. 평소 다른 상담을 하였을 때,자세한 결과를 알기 힘들었는데 전문적인 분석내용과 더불어 평가 해 주셔서 좋았습니다.
                            </div>
                        </div>
                        <!-- 텍스트 없을때 -->
                        <div class="counselor-vote__cell">
                            <div class="counselor-vote__star">
                                <span class="icon star-review-icon"></span>
                                <div class="star-review__score">4.0</div>
                                <div class="star-review__unit">/ 5</div>
                            </div>
                        </div>
                    </div>
                    <!-- //22.12.29 수정 -->
                </div>
            </div>
        </div>
    <div id="editorForm" class="detail-md__cont" style="display: {{$cssStyle["editor"]}}">
        <form name="counselingWriteForm" action="/advisor/counselingDetail/{{$counselingPK}}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT"/>
            <input type="hidden" name="submitType" id="submitType"/>
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
                            <button onclick="cancel()" type="button" class="counselor-edit__btn counselor-edit__btn--cancel">상담취소</button>
                        </div>
                    </div>
                    <div class="counselor-edit__body">
                        <div class="counselor-editor__area">
                            <div class="counselor-editor__btn-wrap">
                                <button class="counselor-editor__btn guide">작성가이드</button>
                                <button onclick="clearForm()" type="button" class="counselor-editor__btn reset">폼 리셋</button>
                            </div>
                            <div class="counselor-editor2">
                                <textarea class="ckeditor" id="counselingResult" name="counselingResult">{{($clientInfo["counselingResult"] == "") ? $writeFormat["counselingResult"]:$clientInfo["counselingResult"]}}</textarea>
                            </div>
                        </div>
                        <div class="counselor-check__area">
                            <div class="counselor-time__area">
                                <div class="counselor-time__desc">작성까지 남은 시간</div>
                                <div class="counselor-time">{{$timer["hour"]}} : {{$timer["minute"]}}</div>
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
                                            <input type="radio"
                                                   class="note-check"
                                                   value="354"
                                                   name="counselorStatus"
                                                   @if($clientInfo["counselorStatus"] == ""||$clientInfo["counselorStatus"] == "354") checked @endif>
                                            <div class="note-check__cell">
                                                <span class="icon note-check-icon green"></span>
                                                <div class="note-check__label">해당없음</div>
                                            </div>
                                            <div class="note-check__desc">환자에게 해당하는 정서적 특이사항이 없을 경우.</div>
                                        </div>
                                        <div class="note-check__item">
                                            <input type="radio"
                                                   class="note-check"
                                                   value="355"
                                                   name="counselorStatus"
                                                   @if($clientInfo["counselorStatus"] == "355") checked @endif>
                                            <div class="note-check__cell">
                                                <span class="icon note-check-icon red"></span>
                                                <div class="note-check__label">위험</div>
                                            </div>
                                            <div class="note-check__desc">정서적 위험, 조치가 긴급한 환자의 경우..</div>
                                        </div>
                                        <div class="note-check__item">
                                            <input type="radio"
                                                   class="note-check"
                                                   value="356"
                                                   name="counselorStatus"
                                                   @if($clientInfo["counselorStatus"] == "356") checked @endif>
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
                @foreach($waiteCounseling as $waiteCounselingRow)
                    <div class="sb-counseling__slide swiper-slide">
                        <a href="#" class="sb-counseling__photo">
                            <img src="{{URL::asset('/storage/image/thumb/'.$waiteCounselingRow->answer)}}" alt="" class="sb-counseling__img">
                        </a>
                        <div class="sb-counseling__info">
                            <div class="sb-counseling__user">{{$waiteCounselingRow->counselorName}}</div>
                            <div class="sb-counseling__year">{{Crypt::decryptString($waiteCounselingRow->counselorBirthday)}}</div>
                            <div class="sb-counseling__gender">{{$waiteCounselingRow->codeName}}</div>
                        </div>
                    </div>
                @endforeach
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

    let myEditor;
    let hour = 24;
    let minute = 0;

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
                myEditor = editor;
            } )
            .catch( error => {
            } );
    }

    function clearForm() {
        if (confirm("폼 리셋시 작성중인 내용이 초기화 됩니다.\n폼 리셋을 하시겠습니까?")) {
            $("#counselingResult").html(`{{$writeFormat["counselingResult"]}}`);
            myEditor.setData(`{!! $writeFormat["counselingResult"]!!}`);
        }
    }

    function saveWrite(type) {
        $("#submitType").val(type);
        document.counselingWriteForm.submit();
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
                alert(data.message);
                location.reload();
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
