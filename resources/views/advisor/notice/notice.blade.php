@include('advisor/common/header')
    <div id="container">
      <div class="column-wrapper">
        <div class="column-left">
          <div class="notice-cont">
            <div class="counseling-notice__heading">
              <h3 class="counseling-notice__tit">공지사항</h3>
              <div class="notice-select__wrap">
                <div class="select-box">
                  <button class="select-box__label">@if($type=="old")과거순 @else 최신순 @endif<span class="icon select-down-icon"></span></button>
                  <!-- select-option__list에 acitve 클래스 붙으면 활성화 -->
                  <ul class="select-option__list">
                    <li class="select-option" onclick="changeOrder('new')">최신순</li>
                    <li class="select-option" onclick="changeOrder('old')">과거순</li>
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
                    @foreach($noticeList["data"] as $notice)
                  <div class="notice-table__row">
                    <div class="table-body__cell col-1">{{$notice["noticePK"]}}</div>
                    <div class="table-body__cell col-2"><a href="/advisor/notice/{{$notice["noticePK"]}}">{{$notice["title"]}}</a></div>
                    <div class="table-body__cell col-3">마음팔레트</div>
                    <div class="table-body__cell col-4">{{date_format(date_create($notice["createDate"]),"Y.m.d")}}</div>
                    <div class="table-body__cell col-5">{{number_format($notice["viewCount"])}}</div>
                  </div>
                    @endforeach
                </div>
              </div>
            </div>
            <div class="paging-box">
                @foreach ($noticeList["links"] as $link)
                    <a href="javascript:changePage('{{ $link['label'] }}')" class="paging-num @if($link['label'] == $noticeList["current_page"]) active @endif">{!! str_replace("Next ","",str_replace(" Previous","",$link['label'])) !!}</a>
                @endforeach
            </div>
          </div>
        </div> <!--column-left end-->

        @include('advisor/common/right')
      </div>
    </div> <!-- container end-->
    <script>
        function changeOrder(type) {
            location.href = '/advisor/notice?type='+type;
        }

        function changePage(page) {
            try {
                location.href = '/advisor/notice?type={{$type}}&page='+page;
            }catch (e) {
            }
        }
    </script>
    @include('advisor/common/footer')
    @include('advisor/common/end')
