@php
print_r($getMyInquiryPost);
@endphp
@include('advisor/common/header')
<form id="inquiryEditForm" name="inquiryEditForm" action="/advisor/inquiryEdit" method="POST">
    @csrf
    <input type="hidden" id="contactPK" name="contactPK" value="{{$getMyInquiryPost['contactPK']}}">
    <div id="container">
      <div class="column-wrapper">
        <div class="column-left">
          <div class="inquiry-cont">
            <div class="counseling-notice__heading">
              <h3 class="counseling-notice__tit">1:1 상담</h3>
            </div>
            <div class="inquiry-post">
              <div class="inquiry-post__question">
                <div class="post-question__top">
                  <!-- 답변 완료시  inquiry-post__status에 클래스 actived추가-->
                  <div class="post-status {{$getMyInquiryPost['contactType']}}">
                    내 문의 현황
                  </div>
                  <div class="post-tit__wrap">
                    <div class="post-tit">{{$getMyInquiryPost['contactTitle']}}</div>
                    <div class="post-date">{{$getMyInquiryPost['updateDate']}}</div>
                  </div>
                </div>
                <div class="post-question__body">
                  <div class="post-question__content">
                    {!! $getMyInquiryPost['contactContent'] !!}
                  </div>
                </div>
                <div class="post-question__bottom">
                  <div class="post-btn__wrap">
                    <a onclick="javascript:submitForm()" class="post-btn">수정하기</a>
                    <a href="#none" class="post-btn">삭제</a>
                  </div>
                </div>
              </div>
            </form>
              <div class="inquiry-post__answer">
                <div class="post-answer__top">
                  <div class="post-tit__wrap">
                    <div class="post-tit">답변입니다.</div>
                    <div class="post-date">2023.01.02</div>
                  </div>
                </div>                
                <div class="post-answer__body">
                  <div class="post-answer__content">
                    <!-- 답변위치 -->
                    안녕하세요 마음팔레트 입니다.<br>
                    <br>
                    해당사항을 확인하였습니다.<br>
                    선택적인 항목들 중 필수로 진행되어야 한다고 판단되는 질문들을<br>
                    정리하여 전달해주시면 재요청 드리겠습니다. 감사합니다!<br>
                    <br><br>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!--column-left end-->
        @include('advisor/common/right')
        <script>
            function submitForm(){
                $('#inquiryEditForm').submit();
            }
        </script>
      </div>
    </div> <!-- container end-->
@include('advisor/common/footer')
@include('advisor/common/end')