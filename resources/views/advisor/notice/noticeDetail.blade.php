@include('advisor/common/header')
<link rel="stylesheet" type="text/css" href="/commonEditor/styles.css?version={{CSS_VERSION}}">
<script src="/commonEditor/ckeditor.js"></script>
    <div id="container">
      <div class="column-wrapper">
        <div class="column-left">
          <div class="notice-cont">
            <div class="notice-post__heading">
              <h3 class="notice-post__tit">{{$notice->title}}</h3>
              <div class="notice-post__btn-wrap">
                <a href="/advisor/notice" class="notice-post__btn"> 목록</a>
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
                    <div class="writer-info__date">{{date_format(date_create($notice["createDate"]),"Y.m.d")}} <span>{{date_format(date_create($notice["createDate"]),"H:i")}}</span></div>
                  </div>
                  <div class="writer-info__item">
                    <div class="writer-info__label">조회수</div>
                    <div class="writer-info__view">{{number_format($notice["viewCount"])}}</div>
                  </div>
                </div>
              </div>
              <div class="notice-post__body">
                  <textarea class="displayCounselingResult" id="view-edit" name="content">{{$notice["content"]}}</textarea>
              </div>
              <div class="notice-post__bottom">
                  @if(isset($pageNavigation["prePage"]))
                    <a href="/advisor/notice/{{$pageNavigation["prePage"]["noticePK"]}}" class="notice-post__prev">{{$pageNavigation["prePage"]["title"]}}</a>
                  @endif

                  @if(isset($pageNavigation["nextPage"]))
                    <a href="/advisor/notice/{{$pageNavigation["nextPage"]["noticePK"]}}" class="notice-post__next">{{$pageNavigation["nextPage"]["title"]}}</a>
                  @endif
              </div>
            </div>
          </div>
        </div> <!--column-left end-->

        @include('advisor/common/right')
      </div>
    </div>
<script>
    ClassicEditor
        .create( document.querySelector( '.displayCounselingResult' ), {
        } )
        .then( editor => {
            editor.enableReadOnlyMode( 'view-edit' );

            const toolbarElement = editor.ui.view.toolbar.element;
            toolbarElement.style.display = 'none';
        } )
        .catch( error => {
            console.log(error);
        } );
</script>
    @include('advisor/common/footer')
    @include('advisor/common/end')
