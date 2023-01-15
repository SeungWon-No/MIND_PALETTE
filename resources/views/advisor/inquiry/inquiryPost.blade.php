@include('advisor/common/header')
<form id="inquiryEditForm" name="inquiryEditForm" action="/advisor/inquiryEdit" method="POST">
    @csrf
    <input type="hidden" id="contactPK" name="contactPK" value="{{$myInquiryPost->contactPK}}">
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
                  <div class="post-status ">
                    내 문의 현황
                  </div>
                  <div class="post-tit__wrap">
                    <div class="post-tit">{{$myInquiryPost->contactTitle}}</div>
                    <div class="post-date">{{date_format(date_create($myInquiryPost->createDate),"Y.m.d")}}</div>
                  </div>
                </div>
                <div class="post-question__body">
                  <div class="post-question__content">
                    {!! $myInquiryPost->contactContent !!}
                  </div>
                </div>
                <div class="post-question__bottom">
                  <div class="post-btn__wrap">
                    <a onclick="javascript:submitForm()" class="post-btn">수정하기</a>
                    <a href="javascript:deleteForm()" class="post-btn">삭제</a>
                  </div>
                </div>
              </div>
            </form>
            @if($myInquiryPost->contactStatus == 364)
              <div class="inquiry-post__answer">
                <div class="post-answer__top">
                  <div class="post-tit__wrap">
                    <div class="post-tit">{{$myInquiryPost->replyTitle}}</div>
                    <div class="post-date">{{date_format(date_create($myInquiryPost->replyDate),"Y.m.d")}}</div>
                  </div>
                </div>
                <div class="post-answer__body">
                  <div class="post-answer__content">
                      {!! $myInquiryPost->replyContent !!}
                  </div>
                </div>
              </div>
              @endif
            </div>
          </div>

          <form name="inquiryDeleteForm" action="/advisor/inquiry/{{$myInquiryPost->contactPK}}" method="POST">
              @csrf
              @method('DELETE')
          </form>
        </div> <!--column-left end-->
        @include('advisor/common/right')
        <script>
            function deleteForm() {
                if (confirm("문의 글을 삭제하시겠습니까?")) {
                    document.inquiryDeleteForm.submit();
                }
            }
            function submitForm(){
                $('#inquiryEditForm').submit();
            }
        </script>
      </div>
    </div> <!-- container end-->
@include('advisor/common/footer')
@include('advisor/common/end')
