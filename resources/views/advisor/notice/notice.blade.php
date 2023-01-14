@include('advisor/common/header')
    <div id="container">
      <div class="column-wrapper">
        <div class="column-left">
          <div class="notice-cont">
            <div class="counseling-notice__heading">
              <h3 class="counseling-notice__tit">공지사항</h3>
              <div class="notice-select__wrap">
                <div class="select-box">
                  <button class="select-box__label">전체보기<span class="icon select-down-icon"></span></button>
                  <!-- select-option__list에 acitve 클래스 붙으면 활성화 -->
                  <ul class="select-option__list">
                    <li class="select-option">최신순</li>
                    <li class="select-option">과거순</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="notice-table">
              <div class="notice-table__inner">
                <div class="notice-table__header">
                  <div class="notice-table__row">
                    <div class="table-header__cell col-1">번호</div>
                    <div class="table-header__cell col-2">제목</div>
                    <div class="table-header__cell col-3">작성자</div>
                    <div class="table-header__cell col-4">날짜</div>
                    <div class="table-header__cell col-5">조회수</div>
                  </div>
                </div>
                <div class="notice-table__body">
                    @foreach($noticeList as $notice)
                  <div class="notice-table__row">
                    <div class="table-body__cell col-1">60</div>
                    <div class="table-body__cell col-2"><a href="/advisor/notice/1">{{$notice->title}}</a></div>
                    <div class="table-body__cell col-3">마음팔레트</div>
                    <div class="table-body__cell col-4">2022.11.28</div>
                    <div class="table-body__cell col-5">115</div>
                  </div>
                    @endforeach
                </div>
              </div>
            </div>
            <div class="paging-box">
                {{ $noticeList->links() }}
            </div>
          </div>
        </div> <!--column-left end-->

        @include('advisor/common/right')
      </div>
    </div> <!-- container end-->
    @include('advisor/common/footer')
    @include('advisor/common/end')
