@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => false,
    "title" => "신청자 정보 및 결제"
])
<script>
    function pageClose(){
        location.href = '/'
        // pop.open('savePop');
    }
</script>
<section id="container" class="page-body">
    <form>
        @csrf
        <div class="page-contents page-write">
            <div class="">
                <div class="basic-data-group msmall">
                    <a href="#" class="card-item htp-banner">
                        <div class="item-info">
                            <div class="item-subject">마음팔레트 HTP 검사</div>
                            <div class="item-desc">전문 상담원으로부터 센터 수준의<br>리포트 결과지를 받아보실 수 있습니다.</div>
                        </div>
                        <div class="item-label"><div class="label label-orange">한시적 무료</div></div>
                    </a>
                    <div class="buy-price-wrap">
                        <a href="#">바우처 프로그램 안내</a>
                        <div class="buy-price-value">결제금액<strong>0원</strong></div>
                    </div>
                </div>
                <div class="basic-data-group">
                    <fieldset>
                        <legend>신청자 정보 및 결제 작성 폼</legend>
                        <div class="form-group">
                            <div class="form-group-cell">
                                <div class="form-group-item">
                                    <div class="form-item-label">이름<em class="need">*</em></div>
                                    <div class="form-item-data">
                                        <input id="applicantName" type="text" placeholder="입력" maxlength='20'
                                               onFocus="inputChange(this);" onKeyUp="checkSubmit(false)"
                                               onblur="inputBlur(this);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-cell">
                                <div class="form-group-item">
                                    <div class="form-item-label">아이와의 관계<em class="need">*</em></div>
                                    <div class="form-item-data">
                                        <select id="relationshipCode" onchange="checkSubmit(false)">
                                            <option value="-1">선택</option>
                                            @foreach($relationship as $relationshipRow)
                                                <option value="{{$relationshipRow->codePK}}">{{$relationshipRow->codeName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-cell">
                                <div class="form-group-item">
                                    <div class="form-item-label">연락처<em class="need">*</em></div>
                                    <div class="form-item-data">
                                        <input placeholder="“-”없이 입력" id="phone" type="number"
                                               min="0" step="1" maxlength='11' onkeydown="if(event.key==='.'){event.preventDefault();}"
                                               oninput="maxLengthCheck(this)" onchange="checkSubmit(false)"
                                               onFocus="inputChange(this);" onKeyUp="inputChange(this);"
                                               onblur="inputBlur(this);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-cell">
                                <div class="form-group-item">
                                    <div class="form-item-label">거주지<em class="need">*</em></div>
                                    <div class="form-item-data">
                                        <div class="form-horizontal-items small">
                                            <div class="grid-layout">
                                                <div class="grid-layout-inner">
                                                    <div class="grid-layout-cell flex-1">
                                                        <select id="cityCode" onchange="cityChange()">
                                                            <option value="-1">시/도 선택</option>
                                                            @foreach($city as $cityRow)
                                                                <option value="{{$cityRow->codePK}}">
                                                                    {{$cityRow->codeName}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="grid-layout-cell flex-1">
                                                        <select id="regionCode" onchange="checkSubmit(false)">
                                                            <option value="-1">시/군/구 선택</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="page-bottom-ui">
                    <a id="requestAdviceForm" href="javascript:requestAdvice(true)"
                       class="btn btn-orange btn-large-size btn-page-action disabled">신청 및 결제하기</a>
                </div>
            </div>
        </div>
    </form>
</section>
<script>
    function popupSaveAction(){
        requestAdvice();
        location.href = '/';
    }

    function requestAdvice(isValidation) {
        if (isValidation) {
            if ( !checkSubmit(true) ) return false;
        }

        var applicantName = $("#applicantName").val();
        var relationshipCode = $("#relationshipCode option:selected").val();
        var phone = $("#phone").val();
        var cityCode = $("#cityCode option:selected").val();
        var regionCode = $("#regionCode option:selected").val();

        $.ajax({
            type:'POST',
            url:'/requestAdvice',
            data: {
                "applicantName" : applicantName,
                "relationshipCode" : relationshipCode,
                "phone" : phone,
                "cityCode" : cityCode,
                "regionCode" : regionCode
            },
            async: false,
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success:function(json){
                var data = JSON.parse(json);
                if ( data.status === "success" ) {
                    location.href = "/processInformation/"+data.requestAdvicePK;
                } else {
                    alert(data.message);
                }
            },
            error:function(data) {
                alert('상담신청에 실패하였습니다. 증상이 계속되면 고객센터로 문의해주세요');
            }
        });
    }

    function checkSubmit(isShowAlert) {
        var isSubmit = true;

        isSubmit = (isSubmit && checkName(isShowAlert));
        isSubmit = (isSubmit && checkRelationshipCode(isShowAlert));
        isSubmit = (isSubmit && checkPhoneNumber(isShowAlert));
        isSubmit = (isSubmit && checkCity(isShowAlert));
        isSubmit = (isSubmit && checkRegionCode(isShowAlert));

        if (isSubmit) {
            $("#requestAdviceForm").removeClass("disabled");
        } else {
            $("#requestAdviceForm").addClass("disabled");
        }
        return isSubmit;
    }

    function checkName(isShowAlert) {
        var applicantName = $("#applicantName").val();
        if (applicantName === "") {
            if (isShowAlert) alert('이름을 입력해주세요');
            return false;
        }
        return true;
    }

    function cityChange() {
        var selectValue = $("#cityCode option:selected").val();

        if (selectValue > 0 ) {
            $.ajax({
                type:'POST',
                url:'/findRegion/'+selectValue,
                headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
                success:function(data){
                    $("#regionCode").html(data);
                }
            });
        } else {
            $("#regionCode").html("<option value='-1'>시/군/구 선택</option>");
        }
        checkSubmit(false);
    }

    function checkPhoneNumber(isShowAlert) {
        var userPhone = $("#phone");
        var regPhone = /^01([0|1|6|7|8|9])-?([0-9]{3,4})-?([0-9]{4})$/;

        if (regPhone.test(userPhone.val()) === false) {
            if (isShowAlert) alert('휴대폰 번호를 정확히 입력해주세요');
            return false;
        }

        if (userPhone.val().length < 11 ) {
            if (isShowAlert)  alert('휴대폰 번호를 입력해주세요');
            // userPhone.focus();
            return false;
        }

        return true;
    }

    function checkRelationshipCode(isShowAlert) {
        var selectValue = $("#relationshipCode option:selected").val();

        if (selectValue <= 0 ) {
            if (isShowAlert) alert('아이와의 관계를 선택해주세요');
            return false;
        }
        return true;
    }

    function checkCity(isShowAlert) {
        var selectValue = $("#cityCode option:selected").val();

        if (selectValue <= 0 ) {
            if (isShowAlert) alert('시/도 를 선택해주세요');
            return false;
        }
        return true;
    }

    function checkRegionCode(isShowAlert) {
        var selectValue = $("#regionCode option:selected").val();

        if (selectValue <= 0 ) {
            if (isShowAlert) alert('시/군/구 를 선택해주세요');
            return false;
        }
        return true;
    }

    function maxLengthCheck(obj) {
        if (obj.value.length >obj.maxLength){
            obj.value = obj.value.slice(0, obj.maxLength);
        }
    }
</script>
@include('/mobile/common/savePopup')
@include('/mobile/common/end')

