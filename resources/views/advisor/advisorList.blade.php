@include('advisor/common/header')
@csrf
    <div id="container">
      <div class="column-wrapper">
        <div class="column-left">
          <div class="counseling-cont">
            <div class="counseling-list__heading">
              <h3 class="counseling-list__tit">상담사리스트</h3>
              <div class="counselor-select__wrap">
                <form id="orderByForm" name="orderByForm" action="/advisor/orderByAdvisorList" method="GET">
                <div class="select-box">
                  <button id="orderBySelectBox" type="button" class="select-box__label">전체보기<span class="icon select-down-icon"></span></button>
                  <!-- select-option__list에 acitve 클래스 붙으면 활성화 -->
                      <ul class="select-option__list">
                        <input type="hidden" id="orderByValue" name="orderByValue" value=""/>
                        <li id="orderByRecent" class="select-option" onclick="orderByList('orderByRecent')">최신순</li>
                        <li id="orderByPast" class="select-option" onclick="orderByList('orderByPast')">과거순</li>
                      </ul>                      
                  </form>
                </div>
              </div>
            </div>
            <div class="expert-list">
            @foreach($advisorList['data'] as $list)
              <div class="expert-item">
                <div class="expert-item__head">
                  <div class="expert-profile__photo">
                  <img src="/advisorAssets/assets/images/user-profile.jpg" alt="" class="account-profile__img">
                  </div>
                  <div class="expert-profile">
                    <div class="expert-name">{{$list['advisorName']}}</div>
                    <div class="expert-star__review">
                      <span class="icon star-review-icon"></span>
                      <div class="star-review__score">{{($advisorProfile->rating == 0)?"0.0":sprintf('%0.1f', ($advisorProfile->rating/$advisorProfile->ratingCount))}}</div>
                      <div class="star-review__unit">/ 5</div>
                    </div>
                    <div class="expert-exp">
                        팔레트 상담 <span class="expert-exp__num">{{$myCompleteCount}}</span>회 진행
                    </div>
                  </div>
                </div>
                <div class="expert-item__body">
                  <h5 class="expert-introduce">자기소개</h5>
                  <p class="expert-introduce__desc">
                    아이의 전문적인 상담이 필요하신가요? 아이만을 위한 ‘개인적인 공간'에서 편안하게 고민을 털어 놓아주세요.꽁꽁 사매고 있던 짐을 나눠드릴 수 있는 시간들이 되실거라 기대합니다.
                  </p>
                </div>
              </div>
              @endforeach
            </div>
            <div class="paging-box">
                @foreach ($advisorList['links'] as $link)
                  <a href="{{ $link['url'] }}" class="paging-num active">{!! str_replace("Next ","",str_replace(" Previous","",$link['label'])) !!}</a>
                @endforeach
              </div>
          </div>
        </div>
        @include('advisor/common/right')
        <script>
            function orderByList($orderOption){
                var orderOption = $orderOption;
                $('#orderByValue').val(orderOption);
                $('#orderByForm').submit();
            }
        </script>
    </div>
    @include('advisor/common/footer')
    @include('advisor/common/end')