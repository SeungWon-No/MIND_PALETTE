@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => true,
    "title" => "검사 진행 사유",
    "isShowProgress" => true,
    "progressValue" => $progressWidth
])
<script>
    function pageClose(){
        pop.open('savePop');
    }
</script>
<section id="container" class="page-body">
    <form name="CTRFrom" >
        @csrf
        <div class="page-contents page-write">
            <div class="advice-request-write">
                <div class="basic-data-group">
                    <fieldset>
                        <legend>검사 진행 사유 작성 폼</legend>
                        <div class="form-group">
                            <div class="form-group-cell">
                                <div class="form-group-item">
                                    <div class="form-item-label">검사를 진행하는 이유</div>
                                    <div class="form-item-data">
                                        <textarea
                                            id="reasonInspection"
                                            name="reasonInspection"
                                            placeholder="입력"
                                            onblur="inputBlur(this);"
                                            onFocus="inputChange(this);"
                                            onKeyUp="inputChange(this);"
                                            onblur="inputBlur(this);">
                                            @if(isset($counseling->reasonInspection))
                                                {{str_replace("<br/>","\n",$counseling->reasonInspection)}}
                                            @endif
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <!-- btn클래스에 disabled클래스 추가시 비활성화 표현 -->
                <div class="page-bottom-ui"><a href="javascript:checkSubmit('false')" class="btn btn-orange btn-large-size btn-page-action">검사 완료하기</a></div>
            </div>
        </div>
    </form>
</section>
<script>
    function popupSaveAction() {
        checkSubmit("true");
    }

    function checkSubmit(isClose){
        var queryString = $("form[name=CTRFrom]").serialize() ;
        queryString = queryString + "&isClose="+isClose;

        $.ajax({
            type:'POST',
            url:'/HTPSave/{{$counselingPK}}',
            data: queryString,
            async: false,
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success:function(json){
                var data = JSON.parse(json);
                if ( data.status === "success" ) {
                    location.href = data.nextStep;
                } else {
                    alert(data.message);
                }
            }
        });

    }
</script>
@include('/mobile/common/savePopup')
@include('/mobile/common/end')

