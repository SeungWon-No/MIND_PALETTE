@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => true,
    "title" => "Person : 사람2",
    "isShowProgress" => true,
    "progressValue" => $progressWidth
])
<script>
    function pageClose(){
        pop.open('savePop');
    }
</script>
<section id="container" class="page-body">
    <form name="CTRFrom">
        @csrf
        <div class="page-contents page-write">
            <div class="advice-request-write">
                <div class="basic-data-group">
                    <div class="picture-guide-thumb">
                        <div class="thumb">
                            <!-- 올리기 전 -->
                            <div style="display:block;">
                                <input type="file" id="attachFile" name="filePath">
                                <input id="attachFilePath" type="hidden"
                                   @if(isset($answer[$questions[0]->questionsPK]))
                                       value="{{$answer[$questions[0]->questionsPK]}}"
                                   @else
                                       value=""
                                   @endif
                                >
                                <input id="questions{{$questions[0]->questionsPK}}"
                                       name="questions{{$questions[0]->questionsPK}}"
                                       type="hidden"
                                       @if(isset($answer[$questions[0]->questionsPK]))
                                           value="{{$answer[$questions[0]->questionsPK]}}"
                                       @else
                                           value=""
                                       @endif
                                >
                                <div id="thumbImageGuide" class="thumb-guide"
                                     @if(!isset($answer[$questions[0]->questionsPK]))
                                         style="display: flex;"
                                    @else
                                         style="display: none;"
                                    @endif>
                                    <div class="icon icon-file-user2"><div class="icon icon-file-add"></div></div>
                                    <div class="info">사람2 그림을 올려주세요.</div>
                                </div>
                                <img id="thumbImage"
                                     @if(isset($answer[$questions[0]->questionsPK]))
                                         src="/storage/image/thumb/{{$answer[$questions[0]->questionsPK]}}"
                                     @endif
                                     alt="" class="preview"
                                     @if(isset($answer[$questions[0]->questionsPK]))
                                         style="display: block;"
                                     @else
                                         style="display: none;"
                                     @endif
                                />
                            </div>
                        </div>
                        <div class="item-desc">(세로 용지)사람2 그림<em class="need">*</em></div>
                    </div>
                </div>
                <div class="basic-data-group">
                    <fieldset>
                        <legend>그림 질문 작성 폼</legend>
                        <div class="form-group">
                            @php
                                $index = 0;
                            @endphp
                            @foreach($questions as $questionsRow)
                                @php
                                    if($index == 0) {
                                        $index++;
                                        continue;
                                    }
                                @endphp
                                <div class="form-group-cell">
                                    <div class="form-group-item">
                                        <div class="form-item-label">{!! $questionsRow->questions !!}</div>
                                        @if($index == 1)
                                            @php
                                                $minute = "";
                                                $seconds = "";
                                                if(isset($answer[$questionsRow->questionsPK])) {
                                                    $splitValue = explode(":",$answer[$questionsRow->questionsPK]);
                                                    $minute = $splitValue[0];
                                                    $seconds = $splitValue[1];
                                                }
                                            @endphp
                                            <div class="form-item-data">
                                                <div class="form-horizontal-items">
                                                    <div class="form-label-input inline-flex">
                                                        <input type="text"
                                                               id="minute"
                                                               placeholder="분"
                                                               onfocusout="changeTimeFormat(this);"
                                                               onFocus="inputChange(this);"
                                                               onkeydown="return checkNumber(event)"
                                                               value="{{$minute}}"
                                                               maxlength="3"
                                                               onblur="inputBlur(this);" style="width:72px;">
                                                        <div class="char">분</div>
                                                    </div>
                                                    <div class="form-label-input inline-flex">
                                                        <input type="text"
                                                               id="seconds"
                                                               placeholder="초"
                                                               onFocus="inputChange(this);"
                                                               onfocusout="changeTimeFormat(this);"
                                                               onkeyup="return checkNumber(event)"
                                                               onblur="inputBlur(this);"
                                                               value="{{$seconds}}"
                                                               maxlength="2"
                                                               style="width:72px;">
                                                        <div class="char">초</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden"
                                                   id="questions{{$questionsRow->questionsPK}}"
                                                   name="questions{{$questionsRow->questionsPK}}"
                                                   @if(isset($answer[$questionsRow->questionsPK]))
                                                       value="{{$answer[$questionsRow->questionsPK]}}"
                                                   @else
                                                       value=""
                                                  @endif
                                            />
                                        @else
                                            <div class="form-item-data">
                                                <input type="text"
                                                       id="questions{{$questionsRow->questionsPK}}"
                                                       name="questions{{$questionsRow->questionsPK}}"
                                                       placeholder="답변"
                                                       onFocus="inputChange(this);"
                                                       onKeyUp="inputChange(this);"
                                                       onblur="inputBlur(this);"
                                                       @if(isset($answer[$questionsRow->questionsPK]))
                                                           value="{{$answer[$questionsRow->questionsPK]}}"
                                                       @else
                                                           value=""
                                                       @endif
                                                />
                                            </div>
                                        @endif
                                        @php
                                            $index++;
                                        @endphp
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </fieldset>
                </div>
                <div class="page-bottom-ui"><a href="javascript:checkSubmit('false');" class="btn btn-orange btn-large-size btn-page-action">다음으로</a></div>
            </div>
        </div>
    </form>
</section>
<script>
    $('input[name="filePath"]').change(function(){
        if($("#attachFile").val() === ""){
            // 파일 취소
            cancel();
        } else {
            imageSave();
        }
    });

    function imageSave() {
        const imageInput = $("#attachFile")[0];
        const formData = new FormData();
        formData.append("file", imageInput.files[0]);
        formData.append("oldFilePath", $("#attachFilePath").val());

        $.ajax({
            type:"POST",
            url: "/imageUpload",
            processData: false,
            contentType: false,
            data: formData,
            async: false,
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success: function(json){
                var data = JSON.parse(json);
                if ( data.status === "success" ) {
                    $("#attachFilePath").val(data.filePath);
                    uploadCompleted(data.filePath);
                } else {
                    alert(data.message);
                }
            },
            err: function(err){
                console.log("err:", err)
            }
        });
    }
    function cancel() {
    }

    function uploadCompleted(filePath) {
        $("#questions{{$questions[0]->questionsPK}}").val(filePath);
        $("#thumbImageGuide").css('display','none');
        $("#thumbImage").attr('src','/storage/image/thumb/'+filePath);
        $("#thumbImage").css('display','block');
    }

    function changeTimeFormat(obj) {
        var value = $(obj).val();
        $(obj).val(value.toString().padStart(2,'0'));
    }

    function checkNumber(event) {
        if(event.keyCode === 46 || event.keyCode === 8 || (event.key >= 0 && event.key <= 9)) {
            return true;
        }

        return false;
    }

    function popupSaveAction() {
        checkSubmit("true");
    }

    function checkSubmit(isClose){
        var queryString = $("form[name=CTRFrom]").serialize() ;
        queryString = queryString + "&isClose="+isClose;

        var minute = $("#minute").val().toString().padStart(2,'0');
        var seconds = $("#seconds").val().toString().padStart(2,'0');
        $("#questions{{$questions[1]->questionsPK}}").val(minute+":"+seconds);

        var isSubmit = true;
        if ( isClose === "false") {
            isSubmit = (checkImage() && isSubmit);
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

    function checkImage() {
        var questions = $("#questions{{$questions[0]->questionsPK}}").val();
        // $("#questions61").removeClass("valid-error");
        if (questions === "") {
            alert("그림을 등록해주세요");
            // $("#questions61").addClass("valid-error");
            return false;
        }
        return true;
    }

    function checkQuestionsTimer() {
        var minute = $("#minute").val();
        $("#minute").removeClass("valid-error");
        $("#seconds").removeClass("valid-error");
        if (minute === "") {
            $("#minute").addClass("valid-error");
            return false;
        }

        var seconds = $("#seconds").val();
        if (seconds === "" || (minute+seconds) === "0000") {
            $("#seconds").addClass("valid-error");
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
</script>
@include('/mobile/common/savePopup')
@include('/mobile/common/end')

