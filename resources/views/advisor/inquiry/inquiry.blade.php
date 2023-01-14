@include('advisor/common/header')
    <div id="container">
      <div class="column-wrapper">
        <div class="column-left">
          <div class="inquiry-cont">
            <div class="counseling-notice__heading">
              <h3 class="counseling-notice__tit">1:1 상담</h3>
            </div>
            <div class="inquiry-table">
              <div class="inquiry-table__inner">
                <div class="inquiry-table__header">
                  <div class="inquiry-table__row">
                    <div class="table-header__cell col-1">번호</div>
                    <div class="table-header__cell col-2">제목</div>
                    <div class="table-header__cell col-3">날짜</div>
                    <div class="table-header__cell col-4">분류</div>
                  </div>
                </div>
                <div class="inquiry-table__body">
                  <div class="inquiry-table__row">
                    <!-- 상담완료 일때 inquiry-btn에 클래스 actived추가-->
                    <div class="table-body__cell col-1">60</div>
                    <div class="table-body__cell col-2"><a href="#none">상담관련 내용입니다.</a></div>
                    <div class="table-body__cell col-3">2022.11.28</div>
                    <div class="table-body__cell col-4">
                      <a href="#none" class="inquiry-btn">상담대기</a>
                    </div>
                  </div>
                  <div class="inquiry-table__row">
                    <!-- 상담완료 일때 inquiry-btn에 클래스 actived추가-->
                    <div class="table-body__cell col-1">60</div>
                    <div class="table-body__cell col-2"><a href="#none">상담관련 내용입니다.</a></div>
                    <div class="table-body__cell col-3">2022.11.28</div>
                    <div class="table-body__cell col-4">
                      <a href="#none" class="inquiry-btn actived">상담완료</a>
                    </div>
                  </div>
                </div>
                <a href="/advisor/inquiry/edit" class="inquiry-writing__btn">글쓰기</a>
              </div>
            </div>
            <div class="paging-box">
              <a href="#none" class="paging-prev"><span class="icon pagin-perv-icon"></span></a>
              <a href="#none" class="paging-num active">1</a>
              <a href="#none" class="paging-num">2</a>
              <a href="#none" class="paging-next"><span class="icon pagin-next-icon"></span></a>
            </div>
          </div>
        </div> <!--column-left end-->
        @include('advisor/common/right')
      </div>
    </div> <!-- container end-->
@include('advisor/common/footer')
@include('advisor/common/end')
