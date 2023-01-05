@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => true,
    "title" => "가족 관계",
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
                        <legend>가족 관계 작성 폼</legend>
                        <div class="form-group">
                            <div class="form-group-cell">
                                <div class="form-group-item">
                                    <div class="form-item-label">아빠와의 관계</div>
                                    <div class="form-item-data">
                                        <input
                                            id="relationshipDad"
                                            name="relationshipDad"
                                            @if(isset($counseling->relationshipDad))
                                                value="{{$counseling->relationshipDad}}"
                                            @endif
                                            type="text"
                                            placeholder="입력"
                                            onFocus="inputChange(this);"
                                            onKeyUp="inputChange(this);"
                                            onblur="inputBlur(this);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-cell">
                                <div class="form-group-item">
                                    <div class="form-item-label">엄마와의 관계</div>
                                    <div class="form-item-data">
                                        <input
                                            id="relationshipMother"
                                            name="relationshipMother"
                                            @if(isset($counseling->relationshipMother))
                                                value="{{$counseling->relationshipMother}}"
                                            @endif
                                            type="text"
                                            placeholder="입력"
                                            onFocus="inputChange(this);"
                                            onKeyUp="inputChange(this);"
                                            onblur="inputBlur(this);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-cell">
                                <div class="form-group-item">
                                    <div class="form-item-label">형제와의 관계</div>
                                    <div class="form-item-data">
                                        <input
                                            id="relationshipSiblings"
                                            name="relationshipSiblings"
                                            @if(isset($counseling->relationshipSiblings))
                                                value="{{$counseling->relationshipSiblings}}"
                                            @endif
                                            type="text"
                                            placeholder="입력"
                                            onFocus="inputChange(this);"
                                            onKeyUp="inputChange(this);"
                                            onblur="inputBlur(this);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-cell">
                                <div class="form-group-item">
                                    <div class="form-item-label">자매와의 관계</div>
                                    <div class="form-item-data">
                                        <input
                                            id="relationshipSister"
                                            name="relationshipSister"
                                            @if(isset($counseling->relationshipSister))
                                                value="{{$counseling->relationshipSister}}"
                                            @endif
                                            type="text"
                                            placeholder="입력"
                                            onFocus="inputChange(this);"
                                            onKeyUp="inputChange(this);"
                                            onblur="inputBlur(this);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-cell">
                                <div class="form-group-item">
                                    <div class="form-item-label">가족 내력 및 스트레스 요인</div>
                                    <div class="form-item-data">
                                        <textarea
                                            id="stressCauses"
                                            name="stressCauses"
                                            placeholder="입력"
                                            onblur="inputBlur(this);"
                                            onFocus="inputChange(this);"
                                            onKeyUp="inputChange(this);"
                                            onblur="inputBlur(this);">
                                            @if(isset($counseling->stressCauses))
                                                {{str_replace("<br/>","\n",$counseling->stressCauses)}}
                                            @endif
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <!-- btn클래스에 disabled클래스 추가시 비활성화 표현 -->
                <div class="page-bottom-ui"><a href="javascript:checkSubmit('false')" class="btn btn-orange btn-large-size btn-page-action">다음으로</a></div>
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

