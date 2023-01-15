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
                  @foreach($getInquiryList['data'] as $list)
                    <div class="inquiry-table__row">
                      <!-- 상담완료 일때 inquiry-btn에 클래스 actived추가-->
                      <div class="table-body__cell col-1">{{$list['contactPK']}}</div>
                      <div class="table-body__cell col-2"><a href="/advisor/inquiry/{{$list['contactPK']}}">{{$list['contactTitle']}}</a></div>
                      <div class="table-body__cell col-3">{{date_format(date_create($list['createDate']),"Y.m.d")}}</div>
                      <div class="table-body__cell col-4">
                          @if($list['contactStatus'] == 352)
                        <a href="#" class="inquiry-btn">상담대기</a>
                          @else
                        <a href="#" class="inquiry-btn actived">상담완료</a>
                          @endif
                      </div>
                    </div>
                  @endforeach
                </div>
                <a href="/advisor/inquiryWrite" class="inquiry-writing__btn">글쓰기</a>
              </div>
            </div>
            <div class="paging-box">
              @foreach ($getInquiryList['links'] as $link)
                <a href="{{ $link['url'] }}" class="paging-num active">{!! str_replace("Next ","",str_replace(" Previous","",$link['label'])) !!}</a>
              @endforeach
            </div>
          </div>
        </div> <!--column-left end-->
        @include('advisor/common/right')
      </div>
    </div> <!-- container end-->
@include('advisor/common/footer')
@include('advisor/common/end')
