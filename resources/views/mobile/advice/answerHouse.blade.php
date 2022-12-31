@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => true,
    "title" => "House : 집",
    "isShowProgress" => true,
    "progressValue" => $progressWidth
])
<script>
    function pageClose(){
        pop.open('savePop');
    }
</script>
<section id="container" class="page-body">
    <div class="page-contents page-write">
        <div class="advice-request-write">
            <div class="basic-data-group">
                <div class="picture-guide-thumb">
                    <div class="thumb">
                        <!-- 올리기 전 -->
                        <div style="display:block;">
                            <input type="file">
                            <div class="thumb-guide">
                                <div class="icon icon-file-house"><div class="icon icon-file-add"></div></div>
                                <div class="info">집 그림을 올려주세요.</div>
                            </div>
                        </div>
                        <!-- //올리기 전 -->
                        <!-- 올리기 후 -->
                        <div style="display:none">
                            <img src="../assets/images/content/advice-picture-sample-4.png" alt="" class="preview"/>
                        </div>
                        <!-- //올리기 후 -->
                    </div>
                    <div class="item-desc">(가로 용지)집 그림<em class="need">*</em></div>
                </div>
            </div>
            <div class="basic-data-group">
                <fieldset>
                    <legend>그림 질문 작성 폼</legend>
                    <div class="form-group">
                        <!-- 20221225 수정  -->
                        <div class="form-group-cell">
                            <div class="form-group-item">
                                <div class="form-item-label">소요시간<em class="need">*</em></div>
                                <div class="form-item-data">
                                    <div class="form-horizontal-items">
                                        <div class="form-label-input inline-flex">
                                            <input type="text" placeholder="답변"  onFocus="inputChange(this);" onKeyUp="inputChange(this);" onblur="inputBlur(this);" value="1" style="width:72px;">
                                            <div class="char">분</div>
                                        </div>
                                        <div class="form-label-input inline-flex">
                                            <input type="text" placeholder="답변"  onFocus="inputChange(this);" onKeyUp="inputChange(this);" onblur="inputBlur(this);" value="20" style="width:72px;">
                                            <div class="char">초</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-cell">
                            <div class="form-group-item">
                                <div class="form-item-label">그림 그리는 순서가 어떻게 되나요?<em class="need">*</em></div>
                                <div class="form-item-data">
                                    <input type="text" placeholder="답변"  onFocus="inputChange(this);" onKeyUp="inputChange(this);" onblur="inputBlur(this);" value="지붕-창문-문-기타">
                                </div>
                            </div>
                        </div>
                        <div class="form-group-cell">
                            <div class="form-group-item">
                                <div class="form-item-label">지우개 사용 위치 및 횟수는 어떻게 되나요?<em class="need">*</em></div>
                                <div class="form-item-data">
                                    <input type="text" placeholder="답변"  onFocus="inputChange(this);" onKeyUp="inputChange(this);" onblur="inputBlur(this);" value="지붕 0번, 창문 0번">
                                </div>
                            </div>
                        </div>
                        <!-- //20221225 수정  -->
                        <div class="form-group-cell">
                            <div class="form-group-item">
                                <div class="form-item-label">이 집에는 누가 살고 있나요?</div>
                                <div class="form-item-data">
                                    <input type="text" placeholder="답변"  onFocus="inputChange(this);" onKeyUp="inputChange(this);" onblur="inputBlur(this);">
                                </div>
                            </div>
                        </div>
                        <div class="form-group-cell">
                            <div class="form-group-item">
                                <div class="form-item-label">이 집의 분위기는 어떤가요?</div>
                                <div class="form-item-data">
                                    <input type="text" placeholder="답변"  onFocus="inputChange(this);" onKeyUp="inputChange(this);" onblur="inputBlur(this);">
                                </div>
                            </div>
                        </div>
                        <div class="form-group-cell">
                            <div class="form-group-item">
                                <div class="form-item-label">이 집을 그릴 때 누구네 집이라고 생각하며 그렸나요?</div>
                                <div class="form-item-data">
                                    <input type="text" placeholder="답변"  onFocus="inputChange(this);" onKeyUp="inputChange(this);" onblur="inputBlur(this);">
                                </div>
                            </div>
                        </div>
                        <div class="form-group-cell">
                            <div class="form-group-item">
                                <div class="form-item-label">이것은 무엇인가요? 어떤 이유로 그리셨나요?</div>
                                <div class="form-item-data">
                                    <input type="text" placeholder="답변"  onFocus="inputChange(this);" onKeyUp="inputChange(this);" onblur="inputBlur(this);">
                                </div>
                            </div>
                        </div>
                        <div class="form-group-cell">
                            <div class="form-group-item">
                                <div class="form-item-label">기타(그 외 특이사항)</div>
                                <div class="form-item-data">
                                    <textarea placeholder="질문 외 아이가 추가적으로 하는 행동이나 말들을 자유롭게 기재해주세요." onblur="inputBlur(this);" onFocus="inputChange(this);" onKeyUp="inputChange(this);" onblur="inputBlur(this);"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <!-- btn클래스에 disabled클래스 추가시 비활성화 표현 -->
            <div class="page-bottom-ui"><a href="#" class="btn btn-orange btn-large-size btn-page-action">다음으로</a></div>
        </div>
    </div>
</section>
<script>
    function popupSaveAction() {
        checkSubmit("true");
    }

    function checkSubmit(isClose){
        var queryString = $("form[name=CTRFrom]").serialize() ;
        queryString = queryString + "&isClose="+isClose;

        var isSubmit = true;

        if ( isClose === "false") {
            isSubmit = (checkQuestionsTimer() && isSubmit);
            isSubmit = (checkQuestionsOrder() && isSubmit);
            isSubmit = (checkQuestionsCount() && isSubmit);
        }

        if (isSubmit) {
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
    }

    function checkQuestionsTimer() {
        var questions = $("#questions98").val();
        $("#cardBox").removeClass("valid-error");
        if (questions === "") {
            $("#cardBox").addClass("valid-error");
            return false;
        }
        return true;
    }

    function checkQuestionsOrder() {
        var questions = $("#questions89").val();
        $("#questions89").removeClass("valid-error");
        if (questions === "") {
            $("#questions89").addClass("valid-error");
            return false;
        }
        return true;
    }

    function checkQuestionsCount() {
        var questions = $("#questions90").val();
        $("#questions90").removeClass("valid-error");
        if (questions === "") {
            $("#questions90").addClass("valid-error");
            return false;
        }
        return true;
    }

    function clearFrom() {
        $("#questions98").val("");
        $("#questions89").val("");
        $("#questions90").val("");
    }
</script>
@include('/mobile/common/savePopup')
@include('/mobile/common/end')

