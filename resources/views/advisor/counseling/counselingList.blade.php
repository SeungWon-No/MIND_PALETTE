@include('advisor/common/header')
    <div id="container">
      <div class="column-wrapper">
        <div class="column-left">
          <div class="counseling-cont">
            <div class="counseling-tab__wrap">
              <!-- 활성화 된 버튼(counseling-tab__btn)에 클래스 active 추가 -->
              <a href="/advisor/counselingList" class="counseling-tab__btn active">전체</a>
              <a href="/advisor/waitingCounselingList" class="counseling-tab__btn">상담대기</a>
              <a href="/advisor/completeCounselingList" class="counseling-tab__btn">상담완료</a>
              <a href="/advisor/warningCounselingList" class="counseling-tab__btn">주의/위험</a>
              <a href="/advisor/impossibleCounselingList" class="counseling-tab__btn">상담불가</a>
            </div>
            <form id="searchForm" name="searchForm" action="/advisor/counselingList" method="POST">
              @csrf
            <div class="counseling-search__wrap">
              <div class="counseling-search__left">
                <div class="select-box">
                  <input type="hidden" id="selectBoxCategory" name="selectBoxCategory" value="-1"/>
                  <button id="select-box__label" class="select-box__label" type="button">선택 <span class="icon select-down-icon"></span></button>
                  <!-- select-option__list에 acitve 클래스 붙으면 활성화 -->
                  <ul class="select-option__list">
                    <li id="searchingName" name="searchingName" class="select-option" onclick="window.selectBoxCategory('counselorName')">아이이름</li>
                    <li id="searchingCode" name="searchingCode" class="select-option" onclick="window.selectBoxCategory('counselingCode')">상담코드</li>
                  </ul>
                </div>
                <div class="counseling-search__group">
                  <input type="text" class="counseling-search__form" name="searchingText" onkeyup="window.searchingText()" placeholder="검색 입력">
                </div>
              </div>
            </div>
            <div class="counseling-list__heading">
              <!-- 탭에 따라 문구변경
                전체-> 전체내역
                상담대기-> 상담대기 내역
                상담완료->상담완료 내역
                주의/위험->주의/위험 내역
                상담불가-> 상담불가 내역
              -->
              <h3 class="counseling-list__tit">전체내역</h3>
              <div class="counseling-sort__wrap">
                <div class="counseling-sort__btns">
                  <!-- 활성화 된 버튼(counseling-tab__btn)에 클래스 active 추가 -->
                  <a href="javascript:selectMonth('','')" class="counseling-sort active">전체</a>
                    @foreach($searchMonth as $key => $searchMonthRow)
                      <a href="javascript:selectMonth('{{$searchMonthRow['start']}}','{{$searchMonthRow['end']}}')" class="counseling-sort">{{$key}}</a>
                    @endforeach
                </div>
                <div class="counseling-sort__datepicker">
                  <input type="text" id="sdate" name="sdate" autocomplete="off" value="" onclick="window.formatStartDate()">
                  <span class="datepicker-unit">~</span>
                  <input type="text" id="edate" name="edate" autocomplete="off" value="" onclick="window.formatEndDate()">

                  <button type="button" class="datepicker-apply__btn" onclick="searchingData()">조회<span class="icon search-apply-icon"></span></button>
                </div>
              </div>
            </div>
            </form>
            <div class="counseling-list__wrap">
              @if (!empty($counselingList['data']))
              <ul class="counseling-list">
                @foreach ($counselingList['data'] as $list)
                  <li class="counseling {{ $statusCode[$list['counselorStatus']] }}">
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
                    <div class="counseling-link__cell">
                      <a href="/advisor/counselingDetail/{{$list['counselingPK']}}" class="counseling-link">상담하기</a>
                    </div>
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
                  <a href="{{ $link['url'] }}" class="paging-num active">{!! str_replace("Next ","",str_replace(" Previous","",$link['label'])) !!}</a>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        @include('advisor/common/right')
      </div>
    </div>
@include('advisor/common/footer')
  </div>
  <script src="../advisorAssets/assets/js/common.js"></script>
  <!-- datepicker-->
  <script src="../advisorAssets/assets/js/jquery-ui.min.js"></script>
  <script>

      function selectMonth(startDate, endDate) {
        $("#sdate").val(startDate);
        $("#edate").val(endDate);
      }

    $.datepicker.regional['ko'] = {
        closeText: '닫기',
        prevText: '이전달',
        nextText: '다음달',
        currentText: '오늘',
        monthNames: ['1월(JAN)','2월(FEB)','3월(MAR)','4월(APR)','5월(MAY)','6월(JUN)','7월(JUL)','8월(AUG)','9월(SEP)','10월(OCT)','11월(NOV)','12월(DEC)'],
        monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
        dayNames: ['일','월','화','수','목','금','토'],
        dayNamesShort: ['일','월','화','수','목','금','토'],
        dayNamesMin: ['일','월','화','수','목','금','토'],
        weekHeader: 'Wk',
        dateFormat: 'yy-mm-dd',
        firstDay: 0,
        isRTL: false,
        showMonthAfterYear: true,
        yearSuffix: '',
        showOn: 'both',
        buttonText: "달력",
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        yearRange: 'c-99:c+99',
        buttonImage: "../advisorAssets/assets/images/icon/datepicker-icon.png",
        buttonImageOnly: true,
    };
    $.datepicker.setDefaults($.datepicker.regional['ko']);

    $('#sdate').datepicker();
    $('#sdate').datepicker("option", "maxDate", $("#edate").val());
    $('#sdate').datepicker("option", "onClose", function ( selectedDate ) {
        $("#edate").datepicker( "option", "minDate", selectedDate );
    });

    $('#edate').datepicker();
    $('#edate').datepicker("option", "minDate", $("#sdate").val());
    $('#edate').datepicker("option", "onClose", function ( selectedDate ) {
        $("#sdate").datepicker( "option", "maxDate", selectedDate );
    });

    function takeCounseling($counselingPK){
      var counselingPK = $counselingPK;

      $.ajax({
        type:'GET',
        url:'/advisor/counselingList/'+counselingPK,
        data: {
            "counselingPK" : counselingPK
        },
        async: false,
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
        success:function(data){

        }
      });
    }

    // 검색 카테고리
    function selectBoxCategory(value) {
      $("#selectBoxCategory").val(value);
    }

    // 검색어
    function searchingText(){
      $('input[name=searchingText]').val();
    }

    // 날짜 선택
    function formatStartDate(){
      var getStartDate = $( "#sdate" ).datepicker("getDate");
      var formatStartDate = $.datepicker.formatDate("yy-mm-dd", getStartDate);
      $( "#sdate" ).val(formatStartDate);
    }

    function formatEndDate(){
      var getEndDate = $( "#edate" ).datepicker("getDate");
      var formatEndDate = $.datepicker.formatDate("yy-mm-dd", getEndDate);
      $( "#edate" ).val(formatEndDate);
    }

    function searchingData(){
      if ($('input[name="selectBoxCategory"]').val() == -1) {
        alert('검색 카테고리를 선택해주세요.');
        return false;
      }
      $('#searchForm').submit();
    }
  </script>
</body>
</html>
