@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "title" => "회원탈퇴"
])
<section id="container" class="page-body">
    <form name="dataForm" method="post" action="/MyPage/withdrawalPrc">
        @csrf
    </form>
    <div class="page-contents page-write">
        <div class="point-title">유의사항을 확인해주세요.</div>
        <div class="basic-data-group">
            <div class="mypage-hack-info">
                <div class="text-list">
                    <div class="text-list-item circle">탈퇴 시 고객님께서 보유하시던 상담결과지, 정보들은 즉시 파기되며 복구할 수 없습니다.</div>
                    <div class="text-list-item circle">탈퇴 후 동일 아이디로 신규가입이 어려울 수 있습니다.</div>
                    <div class="text-list-item circle">탈퇴 시 고객님의 정보는 전자상거래 등에서의 소비자 보호에 관한 법률에 의거해 고객정보 보호정책에 따라 관리됩니다.</div>
                </div>
            </div>
            <div class="join-agree-all" id="agreeBox">
                <label class="form-checkbox">
                    <input id="withdrawalCheckbox" type="checkbox">
                    <span class="form-check-icon">
                        <em><strong>유의사항을 모두 확인했으며, 이에 동의합니다.</strong></em>
                    </span>
                </label>
            </div>
        </div>
        <!-- btn클래스에 disabled클래스 추가시 비활성화 표현 -->
        <div class="page-bottom-ui"><a id="nextButton" class="btn btn-orange btn-large-size btn-page-action disabled">탈퇴하기</a></div>
    </div>
</section>
<article id="hackPop" class="layer-pop-wrap">
    <div class="layer-pop-parent">
        <div class="layer-pop-children">
            <div class="pop-data alert-pop-data">
                <div class="pop-body">
                    <div class="msg-txt">
                        <div class="txt">정말로 마음팔레트를<br>탈퇴하시겠습니까?</div>
                    </div>
                    <div class="pop-body-btns">
                        <button type="button" class="btn btn-large-size btn-confirm" onclick="pop.close();">취소하기</button>
                        <button type="button" class="btn btn-large-size btn-cancel" onclick="document.dataForm.submit();">탈퇴하기</button>
                    </div>
                </div>
                <button type="button" class="btn-pop-close" onclick="pop.close();">닫기</button>
            </div>
        </div>
    </div>
</article>
<script>
    $("#agreeBox").on("click",function (){

        if ($("#withdrawalCheckbox").is(":checked")) {
            $("#nextButton").removeClass("disabled");
            $("#nextButton").attr("href",'javascript:pop.open("hackPop")');
        } else {

            $("#nextButton").addClass("disabled");
            $("#nextButton").removeAttr("href");
        }
    });
</script>
@include('/mobile/common/end')

