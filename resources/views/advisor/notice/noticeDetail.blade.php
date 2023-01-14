@include('advisor/common/header')
    <div id="container">
      <div class="column-wrapper">
        <div class="column-left">
          <div class="notice-cont">
            <div class="notice-post__heading">
              <h3 class="notice-post__tit">[상담 공지]11월 상담권 예약안내</h3>
              <div class="notice-post__btn-wrap">
                <a href="#none" class="notice-post__btn"> 목록</a>
              </div>
            </div>
            <div class="notice-post">
              <div class="notice-post__top">
                <div class="writer-info">
                  <div class="writer-info__item">
                    <div class="writer-info__label">작성자</div>
                    <div class="writer-info__name">마음팔레트</div>
                  </div>
                  <div class="writer-info__item">
                    <div class="writer-info__label">날짜</div>
                    <div class="writer-info__date">2022.11.28 <span>14:55</span></div>
                  </div>
                  <div class="writer-info__item">
                    <div class="writer-info__label">조회수</div>
                    <div class="writer-info__view">1353</div>
                  </div>
                </div>
              </div>
              <div class="notice-post__body">
                <div class="notice-post__content"></div>
              </div>
              <div class="notice-post__bottom">
                <a href="#none" class="notice-post__prev">[상담 안내] 12월 상담권 안내 공지</a>
                <a href="#none" class="notice-post__next">[상담 안내] 12월 상담권 안내 공지</a>
              </div>
            </div>
          </div>
        </div> <!--column-left end-->

        @include('advisor/common/right')
      </div>
    </div>
    @include('advisor/common/footer')
    @include('advisor/common/end')
