@include('advisor/common/header')
<link rel="stylesheet" type="text/css" href="/commonEditor/stylesWrite.css?version={{CSS_VERSION}}">
<script src="/commonEditor/ckeditor.js"></script>
<script src="/commonEditor/ck.upload.adapter.js"></script>
<style>
</style>
<div id="container">
  <div class="column-wrapper">
    <form id="inquiryForm" name="inquiryForm" action="/advisor/writePost" method="POST">
      @csrf
        <div class="column-left">
          <div class="inquiry-cont">
            <div class="counseling-notice__heading">
              <h3 class="counseling-notice__tit">1:1 상담등록</h3>
              <div class="post-btn__wrap">
                <a href="/advisor/inquiry" class="counseling-post__btn counseling-post__btn--cancel">취소</a>
                <a onclick="javascript:submitForm()" class="counseling-post__btn" style="cursor: pointer;">등록하기</a>
              </div>
            </div>
            <div class="counseling-eidt__wrap">
              <div class="counseling-edit__top">
                <div class="counseling-edit__cell">
                  <div class="counseling-edit__label">제목</div>
                  <div class="counseling-edit">
                    <input type="text" class="counseling-edit__form" name="inquiryTitle" value="" placeholder="제목을 입력해주세요.">
                  </div>
                </div>
              </div>
              <div class="counseling-edit__body">
                <div class="counseling-edit__cell">
                  <div class="counseling-edit__label">상담내용</div>
                  <div class="counseling-edit__area">
                    <div class="counselor-editor2">
                      <textarea class="ckeditor" id="content" name="content"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!--column-left end-->
        </form>
        @include('advisor/common/right')
      </div>
    </div> <!-- container end-->
    <script>

      ClassicEditor.create( document.querySelector( '.ckeditor' ), {
          extraPlugins: [MyCustomUploadAdapterPlugin],
      } )
      .then( editor => {
          window.editor = editor;
      } )
      .catch( error => {
      } );

      function MyCustomUploadAdapterPlugin(editor) {
        editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
            return new UploadAdapter(loader)
        }
      }

      function submitForm(){
        $inquiryTitle = $('input[name=inquiryTitle]').val();
        $('input[name=inquiryTitle]').attr('value', $inquiryTitle);
        $('#inquiryForm').submit();
      }

    </script>
@include('advisor/common/footer')
@include('advisor/common/end')
