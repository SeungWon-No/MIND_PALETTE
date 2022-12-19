@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "title" => "회원가입"
])
<section id="container" class="page-body">
    <div class="page-contents page-write">
        <div class="join-wrap">
            <div class="point-title">이용약관에 동의해주세요.</div>
            <div class="join-agree-all" onclick="allAgree()">
                <label class="form-checkbox">
                    <input id="allChecked" type="checkbox" class="check-agree-checkbox">
                    <span class="form-check-icon">
                        <em>
                            <strong>이용약관에 모두 동의합니다.</strong>
                        </em>
                    </span>
                </label>
            </div>
            <div class="join-agree-data">
                <div class="join-agree-check" onclick="checked('usedAgree')">
                    <label class="form-checkbox">
                        <input class="check-agree-checkbox" type="checkbox" id="usedAgree">
                        <span class="form-check-icon">
                            <em>
                                <strong>마음팔레트 이용 약관<span class="need">*</span></strong>
                            </em>
                        </span>
                    </label>
                </div>
                <div class="join-agree-detail">약관내용</div>
            </div>
            <div class="join-agree-data">
                <div class="join-agree-check" onclick="checked('userInfoAgree')">
                    <label class="form-checkbox">
                        <input class="check-agree-checkbox" id="userInfoAgree" type="checkbox">
                        <span class="form-check-icon">
                            <em>
                                <strong>개인정보 수집 및 이용<span class="need">*</span></strong>
                            </em>
                        </span>
                    </label>
                </div>
                <div class="join-agree-detail">약관내용</div>
            </div>
            <div class="page-bottom-ui"><a id="nextButton" class="btn btn-orange btn-large-size btn-page-action disabled">다음으로</a></div>
        </div>
    </div>
</section>
<script>
    function allAgree() {
        if ($("#allChecked").is(":checked")) {
            $(".check-agree-checkbox").prop('checked',false);
        } else {
            $(".check-agree-checkbox").prop('checked',true);
        }
        checkNextButtonStatus();
    }
    function checked(id) {
        if ( $('#'+id).is(":checked") ) {
            $('#'+id).prop('checked',false);
        } else {
            $('#'+id).prop('checked',true);
        }

        $("#allChecked").prop("checked",checkAgreeStatus());
        checkNextButtonStatus();
    }
    function checkNextButtonStatus() {
        if (checkAgreeStatus()) {
            $("#nextButton").removeClass("disabled");
            $("#nextButton").attr("href",'/join/create');
        } else {
            $("#nextButton").addClass("disabled");
            $("#nextButton").removeAttr("href");
        }
    }
    function checkAgreeStatus() {
        var praentChecked = ($("#allChecked").is(":checked")) ? 0 : 1;
        return $("input[class='check-agree-checkbox']:checked").length === $(".check-agree-checkbox").length - praentChecked;
    }
</script>
@include('/mobile/common/end')

