@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => true,
    "title" => "아이 인적사항",
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
                        <legend>아이의 인적사항 작성 폼</legend>
                        <div class="form-group">
                            <div class="form-group-cell">
                                <div class="form-group-item">
                                    <div class="form-item-label">이름<em class="need">*</em></div>
                                    <div class="form-item-data">
                                        <input
                                            id="counselorName"
                                            name="counselorName"
                                            type="text"
                                            placeholder="입력"
                                            maxlength="12"
                                            @if(isset($counseling->counselorName))
                                            value="{{Crypt::decryptString($counseling->counselorName)}}"
                                            @endif
                                            onFocus="inputChange(this);"
                                            onKeyUp="inputChange(this);"
                                            onblur="inputBlur(this);">
                                    </div>
                                </div>
                            </div>
                            <!-- 20221229 수정 -->
                            <div class="form-group-cell">
                                <div class="form-group-item">
                                    <div class="form-item-label">성별<em class="need">*</em></div>
                                    <div class="form-item-data" >
                                        <select id="counselorGender" name="counselorGender">
                                            <option value="-1">선택</option>
                                            @foreach($genders as $gender)
                                                <option value="{{$gender->codePK}}"
                                                @if($counseling->counselorGender==$gender->codePK)
                                                    selected
                                                @endif
                                                >{{$gender->codeName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- //20221229 수정 -->
                            <div class="form-group-cell">
                                <div class="form-group-item">
                                    <div class="form-item-label">생년월일<em class="need">*</em></div>
                                    <div class="form-item-data">
                                        <input
                                            id="counselorBirthday"
                                            name="counselorBirthday"
                                            type="text"
                                            maxlength="8"
                                            placeholder="입력"
                                            @if(isset($counseling->counselorBirthday))
                                                value="{{Crypt::decryptString($counseling->counselorBirthday)}}"
                                            @endif
                                            onFocus="inputChange(this);"
                                            onkeydown="return checkNumber(event)"
                                            onblur="inputBlur(this);">
                                    </div>
                                </div>
                            </div>
                            <!-- 20221220 수정 : 위치 변경 -->
                            <div class="form-group-cell">
                                <div class="form-group-item">
                                    <div class="form-item-label">형제관계<em class="need">*</em></div>
                                    <div class="form-item-data">
                                        <div class="form-horizontal-items">
                                            <div class="grid-layout">
                                                <div class="grid-layout-inner">
                                                    <div class="grid-layout-cell">
                                                        <div class="form-label-input">
                                                            <input
                                                                id="familyRelations1"
                                                                name="familyRelations1"
                                                                type="text"
                                                                placeholder="입력"
                                                                maxlength="3"
                                                                onFocus="inputChange(this);"
                                                                @if(isset($counseling->familyRelations1))
                                                                    value="{{$counseling->familyRelations1}}"
                                                                @endif
                                                                onkeydown="return checkNumber(event)"
                                                                onblur="inputBlur(this);">
                                                            <div class="char">남</div>
                                                        </div>
                                                    </div>
                                                    <div class="grid-layout-cell">
                                                        <div class="form-label-input">
                                                            <input
                                                                id="familyRelations2"
                                                                name="familyRelations2"
                                                                type="text"
                                                                placeholder="입력"
                                                                maxlength="3"
                                                                onFocus="inputChange(this);"
                                                                @if(isset($counseling->familyRelations2))
                                                                    value="{{$counseling->familyRelations2}}"
                                                                @endif
                                                                onkeydown="return checkNumber(event)"
                                                                onblur="inputBlur(this);">
                                                            <div class="char">녀&nbsp;&nbsp;&nbsp;中</div>
                                                        </div>
                                                    </div>
                                                    <div class="grid-layout-cell">
                                                        <div class="form-label-input">
                                                            <input
                                                                id="familyRelations3"
                                                                name="familyRelations3"
                                                                type="text"
                                                                placeholder="입력"
                                                                maxlength="3"
                                                                @if(isset($counseling->familyRelations3))
                                                                    value="{{$counseling->familyRelations3}}"
                                                                @endif
                                                                onFocus="inputChange(this);"
                                                                onKeyUp="inputChange(this);"
                                                                onblur="inputBlur(this);">
                                                            <div class="char">째</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-cell">
                                <div class="form-group-item">
                                    <div class="form-item-label">학교</div>
                                    <div class="form-item-data">
                                        <!-- 20221229 수정 -->
                                        <select id="counselorSchool" name="counselorSchool">
                                            <option value="-1">선택</option>
                                            @foreach($schools as $school)
                                                <option value="{{$school->codePK}}"
                                                    @if($counseling->counselorSchool==$school->codePK)
                                                        selected
                                                    @endif
                                                >{{$school->codeName}}</option>
                                            @endforeach
                                        </select>
                                        <!-- //20221229 수정 -->
                                    </div>
                                </div>
                            </div>
                            <!-- //20221220 수정 : 위치 변경 -->
                            <div class="form-group-cell">
                                <div class="form-group-item">
                                    <div class="form-item-label">장점,특기</div>
                                    <div class="form-item-data">
                                        <input
                                            id="specialty"
                                            name="specialty"
                                            type="text"
                                            placeholder="입력"
                                            @if(isset($counseling->specialty))
                                                value="{{$counseling->specialty}}"
                                            @endif
                                            onFocus="inputChange(this);"
                                            onKeyUp="inputChange(this);"
                                            onblur="inputBlur(this);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-cell">
                                <div class="form-group-item">
                                    <div class="form-item-label">취미활동</div>
                                    <div class="form-item-data">
                                        <input
                                            id="hobby"
                                            name="hobby"
                                            type="text"
                                            placeholder="입력"
                                            @if(isset($counseling->hobby))
                                                value="{{$counseling->hobby}}"
                                            @endif
                                            onFocus="inputChange(this);"
                                            onKeyUp="inputChange(this);"
                                            onblur="inputBlur(this);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-cell">
                                <div class="form-group-item">
                                    <div class="form-item-label">교우관계</div>
                                    <div class="form-item-data">
                                        <input
                                            id="friendship"
                                            name="friendship"
                                            type="text"
                                            placeholder="입력"
                                            @if(isset($counseling->friendship))
                                                value="{{$counseling->friendship}}"
                                            @endif
                                            onFocus="inputChange(this);"
                                            onKeyUp="inputChange(this);"
                                            onblur="inputBlur(this);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-cell">
                                <div class="form-group-item">
                                    <div class="form-item-label">교사와의 관계</div>
                                    <div class="form-item-data">
                                        <input
                                            id="relationshipTeacher"
                                            name="relationshipTeacher"
                                            type="text"
                                            placeholder="입력"
                                            @if(isset($counseling->relationshipTeacher))
                                                value="{{$counseling->relationshipTeacher}}"
                                            @endif
                                            onFocus="inputChange(this);"
                                            onKeyUp="inputChange(this);"
                                            onblur="inputBlur(this);">
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

        var isSubmit = true;

        if ( isClose === "false") {
            isSubmit = (checkName() && isSubmit);
            isSubmit = (checkGender() && isSubmit);
            isSubmit = (checkBirthday() && isSubmit);
            isSubmit = (checkFamilyRelations1() && isSubmit);
            isSubmit = (checkFamilyRelations2() && isSubmit);
            isSubmit = (checkFamilyRelations3() && isSubmit);
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

    function checkName() {
        var questions = $("#counselorName").val();
        $("#counselorName").removeClass("valid-error");
        if (questions === "") {
            $("#counselorName").addClass("valid-error");
            return false;
        }
        return true;
    }

    function checkGender() {
        var selectValue = $("#counselorGender option:selected").val();
        $("#counselorGender").removeClass("valid-error");
        if (selectValue <= 0 ) {
            $("#counselorGender").addClass("valid-error");
            return false;
        }
        return true;
    }

    function checkBirthday() {
        var questions = $("#counselorBirthday").val();
        $("#counselorBirthday").removeClass("valid-error");
        if (questions === "") {
            $("#counselorBirthday").addClass("valid-error");
            return false;
        }
        return true;
    }

    function checkFamilyRelations1() {
        var questions = $("#familyRelations1").val();
        $("#familyRelations1").removeClass("valid-error");
        if (questions === "") {
            $("#familyRelations1").addClass("valid-error");
            return false;
        }
        return true;
    }

    function checkFamilyRelations2() {
        var questions = $("#familyRelations2").val();
        $("#familyRelations2").removeClass("valid-error");
        if (questions === "") {
            $("#familyRelations2").addClass("valid-error");
            return false;
        }
        return true;
    }

    function checkFamilyRelations3() {
        var questions = $("#familyRelations3").val();
        $("#familyRelations3").removeClass("valid-error");
        if (questions === "") {
            $("#familyRelations3").addClass("valid-error");
            return false;
        }
        return true;
    }

    function checkNumber(event) {
        if(event.keyCode === 46 || event.keyCode === 8 || (event.key >= 0 && event.key <= 9)) {
            return true;
        }
        return false;
    }

</script>
@include('/mobile/common/savePopup')
@include('/mobile/common/end')

