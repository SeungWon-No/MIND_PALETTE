@php
  use App\Http\Util\CounselingTemplate;
  $counselingTemplate = new CounselingTemplate;

  $level = [
    "L" => "green",
    "M" => "yellow",
    "H" => "red",
  ];

  $levelText = [
    "L" => "낮음(L)",
    "M" => "보통(M)",
    "H" => "높음(H)",
  ];

  $levelClass = [
    "L" => "low",
    "M" => "mid",
    "H" => "high",
  ];

@endphp
@include('advisor/common/header')
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
                        <img src="../advisorAssets/assets/images/detail-item-01.png" alt="" class="detail-item__img">
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
                        <img src="../assets/images/detail-item-02.png" alt="" class="detail-item__img">
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
                        <img src="../advisorAssets/assets/images/detail-item-03.png" alt="" class="detail-item__img">
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
                        <img src="../advisorAssets/assets/images/detail-item-04.png" alt="" class="detail-item__img">
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
                      {{$clientInfo['stressCauses']}}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="content-cell">
                  <div class="reason-info">
                    <p class="reason-info__desc">
                    {{$clientInfo['reasonInspection']}}
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
                        <div class="result-info__label">정서표현지수는 <span class="{{$levelClass[$counselingTemplate->getTemperamentTestLevel($temperamentTest['emotion'])]}}">
                          {{$levelText[$counselingTemplate->getTemperamentTestLevel($temperamentTest['emotion'])]}}수준</span>입니다.</div>
                        <div class="result-info__content">
                          <div class="result-info__desc">
                            이 척도에서 높은 점수를 보이는 자녀는 강한 감정 표현형으로 자신이 원하는 것과 원하지 않는 것에 대한 선호도가 분명할 수 있습니다. 타인이 정해놓은 규칙이나 행동들보다는 자유롭게 자신이 추구하는 즐거움을 탐색하려는 모습이 강하며, 심리적으로 좌절스럽거나 불편한 상황을 잘 견디지 못하고 피하려는 경향을 보일 수 있습니다.부정 정서는 주로 개인의 목표와 일치하지 않는 일을 경험할 때 발생한다는 점에서 대체로 자녀가 경험하고 싶어 하지 않은 정서라고 볼 수 있습니다. 그러나 그러한 느낌을 잘 알아차리고, 이를 자신의 것으로 수용하고, 표현할 수 있는 능력을 키우는 것은 자녀가 건강한 삶을 영위하는데 매우 중요합니다.부모가 자녀를 관찰하였을 때, 사소한 일에도 쉽게 성을 내고 분노를 밖으로 드러낸다면 이 부분을 살펴보시기 바랍니다. 자녀는 현재 정서교육이 필요한 시기입니다.잦은 부정적 정서 폭발은 자신과 타인이 합의되지 않은 상황에서 극적으로 이루어지므로 자녀는 부정적 피드백에 노출되거나 자기통제에 실패했다는 반복적 경험으로 낮은 자존감을 초래할 수 있습니다.부모는 쉽게 폭발하는 자녀의 정서에 크게 반응하거나 제한하기보다는 감정과 행동을 읽어주며, 부모가 느끼는 감정도 알려줄 필요가 있습니다. 부정적인 감정에 대해서 언어로 적절히 표현할 수 있고, 자율성과 책임감을 기를 수 있습니다.
                          </div>
                        </div>
                      </div>
                      
                      <div class="result-info__item">
                        <div class="result-info__label">행동표현 지수는 <span class="{{$levelClass[$counselingTemplate->getTemperamentTestLevel($temperamentTest['action'])]}}">
                          {{$levelText[$counselingTemplate->getTemperamentTestLevel($temperamentTest['action'])]}} 수준</span>입니다.</div>
                        <div class="result-info__content">
                          <div class="result-info__desc">
                            이 척도에서 높은 점수를 보이는 자녀는 강한 감정 표현형으로 자신이 원하는 것과 원하지 않는 것에 대한 선호도가 분명할 수 있습니다. 타인이 정해놓은 규칙이나 행동들보다는 자유롭게 자신이 추구하는 즐거움을 탐색하려는 모습이 강하며, 심리적으로 좌절스럽거나 불편한 상황을 잘 견디지 못하고 피하려는 경향을 보일 수 있습니다.부정 정서는 주로 개인의 목표와 일치하지 않는 일을 경험할 때 발생한다는 점에서 대체로 자녀가 경험하고 싶어 하지 않은 정서라고 볼 수 있습니다. 그러나 그러한 느낌을 잘 알아차리고, 이를 자신의 것으로 수용하고, 표현할 수 있는 능력을 키우는 것은 자녀가 건강한 삶을 영위하는데 매우 중요합니다.부모가 자녀를 관찰하였을 때, 사소한 일에도 쉽게 성을 내고 분노를 밖으로 드러낸다면 이 부분을 살펴보시기 바랍니다. 자녀는 현재 정서교육이 필요한 시기입니다.잦은 부정적 정서 폭발은 자신과 타인이 합의되지 않은 상황에서 극적으로 이루어지므로 자녀는 부정적 피드백에 노출되거나 자기통제에 실패했다는 반복적 경험으로 낮은 자존감을 초래할 수 있습니다.부모는 쉽게 폭발하는 자녀의 정서에 크게 반응하거나 제한하기보다는 감정과 행동을 읽어주며, 부모가 느끼는 감정도 알려줄 필요가 있습니다. 부정적인 감정에 대해서 언어로 적절히 표현할 수 있고, 자율성과 책임감을 기를 수 있습니다.
                          </div>
                        </div>
                      </div>
                      <div class="result-info__item">
                        <div class="result-info__label">관계적응 지수는 <span class="{{$levelClass[$counselingTemplate->getTemperamentTestLevel($temperamentTest['relationshipAdaptation'])]}}">
                          {{$levelText[$counselingTemplate->getTemperamentTestLevel($temperamentTest['relationshipAdaptation'])]}} 수준</span>입니다.</div>
                        <div class="result-info__content">
                          <div class="result-info__desc">
                            이 척도에서 높은 점수를 보이는 자녀는 강한 감정 표현형으로 자신이 원하는 것과 원하지 않는 것에 대한 선호도가 분명할 수 있습니다. 타인이 정해놓은 규칙이나 행동들보다는 자유롭게 자신이 추구하는 즐거움을 탐색하려는 모습이 강하며, 심리적으로 좌절스럽거나 불편한 상황을 잘 견디지 못하고 피하려는 경향을 보일 수 있습니다.부정 정서는 주로 개인의 목표와 일치하지 않는 일을 경험할 때 발생한다는 점에서 대체로 자녀가 경험하고 싶어 하지 않은 정서라고 볼 수 있습니다. 그러나 그러한 느낌을 잘 알아차리고, 이를 자신의 것으로 수용하고, 표현할 수 있는 능력을 키우는 것은 자녀가 건강한 삶을 영위하는데 매우 중요합니다.부모가 자녀를 관찰하였을 때, 사소한 일에도 쉽게 성을 내고 분노를 밖으로 드러낸다면 이 부분을 살펴보시기 바랍니다. 자녀는 현재 정서교육이 필요한 시기입니다.잦은 부정적 정서 폭발은 자신과 타인이 합의되지 않은 상황에서 극적으로 이루어지므로 자녀는 부정적 피드백에 노출되거나 자기통제에 실패했다는 반복적 경험으로 낮은 자존감을 초래할 수 있습니다.부모는 쉽게 폭발하는 자녀의 정서에 크게 반응하거나 제한하기보다는 감정과 행동을 읽어주며, 부모가 느끼는 감정도 알려줄 필요가 있습니다. 부정적인 감정에 대해서 언어로 적절히 표현할 수 있고, 자율성과 책임감을 기를 수 있습니다.
                          </div>
                        </div>
                      </div>
                      <div class="result-info__item">
                        <div class="result-info__label">관계추구 지수는 <span class="{{$levelClass[$counselingTemplate->getTemperamentTestLevel($temperamentTest['relationshipPursuit'])]}}">
                          {{$levelText[$counselingTemplate->getTemperamentTestLevel($temperamentTest['relationshipPursuit'])]}}</span>수준입니다.</div>
                        <div class="result-info__content">
                          <div class="result-info__desc">
                            이 척도에서 높은 점수를 보이는 자녀는 강한 감정 표현형으로 자신이 원하는 것과 원하지 않는 것에 대한 선호도가 분명할 수 있습니다. 타인이 정해놓은 규칙이나 행동들보다는 자유롭게 자신이 추구하는 즐거움을 탐색하려는 모습이 강하며, 심리적으로 좌절스럽거나 불편한 상황을 잘 견디지 못하고 피하려는 경향을 보일 수 있습니다.부정 정서는 주로 개인의 목표와 일치하지 않는 일을 경험할 때 발생한다는 점에서 대체로 자녀가 경험하고 싶어 하지 않은 정서라고 볼 수 있습니다. 그러나 그러한 느낌을 잘 알아차리고, 이를 자신의 것으로 수용하고, 표현할 수 있는 능력을 키우는 것은 자녀가 건강한 삶을 영위하는데 매우 중요합니다.부모가 자녀를 관찰하였을 때, 사소한 일에도 쉽게 성을 내고 분노를 밖으로 드러낸다면 이 부분을 살펴보시기 바랍니다. 자녀는 현재 정서교육이 필요한 시기입니다.잦은 부정적 정서 폭발은 자신과 타인이 합의되지 않은 상황에서 극적으로 이루어지므로 자녀는 부정적 피드백에 노출되거나 자기통제에 실패했다는 반복적 경험으로 낮은 자존감을 초래할 수 있습니다.부모는 쉽게 폭발하는 자녀의 정서에 크게 반응하거나 제한하기보다는 감정과 행동을 읽어주며, 부모가 느끼는 감정도 알려줄 필요가 있습니다. 부정적인 감정에 대해서 언어로 적절히 표현할 수 있고, 자율성과 책임감을 기를 수 있습니다.
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
                                <div class="bar {{$level[$counselingTemplate->getTemperamentTestLevel($temperamentTest['emotion'])]}}" 
                                style="height:{{$temperamentTest['emotion']}}%;"></div>
                              </div>
                              <div class="graph-bar">
                                <div class="bar {{$level[$counselingTemplate->getTemperamentTestLevel($temperamentTest['action'])]}}" 
                                style="height:{{$temperamentTest['action']}}%;"></div>
                              </div>
                              <div class="graph-bar">
                                <div class="bar {{$level[$counselingTemplate->getTemperamentTestLevel($temperamentTest['relationshipAdaptation'])]}}" 
                                style="height:{{$temperamentTest['relationshipAdaptation']}}%;"></div>
                              </div>
                              <div class="graph-bar ">
                                <div class="bar {{$level[$counselingTemplate->getTemperamentTestLevel($temperamentTest['relationshipPursuit'])]}}" 
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
                <div class="detail-tab__date">2022 . 11 . 28 . 작성</div>
              </div>
            </div>
            <!--// 22.12.29 수정 -->
          </div>
        </div>
      </div>
      <div class="detail-md__cont">
        <div class="detail-md__inner">
          <div class="counselor-before__cont">
            <div class="counselor-common__info">
              <div class="common-info__photo">
                <img src="../advisorAssets/assets/images/user-profile.jpg" alt="" class="common-info__img">
              </div>
              <div class="common-info__name">김아무 상담사</div>
            </div>
            <div class="counselor-before__btn-wrap">
              <!-- 상담중일때, counselor-before__btn에 클래스 disabled 추가-->
              <a href="#" class="counselor-before__btn">상담하기</a>
              <span class="icon donw-arrow-icon"></span>
            </div>
          </div>
        </div>
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
@include('advisor/common/footer')
  </div>

  <!-- 팝업 -->
  <!-- 이미지 레이어 팝업 -->
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
  <!-- 비디오 팝업 -->
  <article id="detailVideoPop" class="layer-pop__wrap">
    <div class="layer-pop__parent">
      <div class="layer-pop__children">
        <div class="layer-pop__video">
          <button type="button" class="pop-close__btn"><span class="icon close-white-icon"></span></button>
        </div>
      </div>
    </div>
  </article>
  
  <script src="../advisorAssets/assets/js/common.js"></script>
</body>
</html>