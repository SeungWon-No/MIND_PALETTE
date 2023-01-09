@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "title" => "앱 설정"
])
<section id="container" class="page-body">
    @csrf
    <div class="page-contents">
        <div class="mypage-wrap">
            <div class="app-set-group">
                <div class="app-set-list">
                    <div class="app-set-item">
                        <div class="item-info">
                            <div class="item-name">서비스 알림</div>
                            <div class="item-desc">결제 완료, 상담 완료 등 알림을 받습니다.</div>
                        </div>
                        <div class="item-ui">
                            <label class="form-switch-toggle">
                                <input id="notiAgree1" type="checkbox" @if($noti->notiAgree1 == "Y") checked @endif>
                                <span class="bar"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="member-hack"><a href="/MyPage/withdrawal">회원탈퇴</a></div>
            <div class="app-set-info">
                <div class="desc">푸시가 오지 않을 경우, 기기의 설정-알림에서 앱 알림 허용여부를 확인해주세요.</div>
            </div>
        </div>
    </div>
</section>
<script>
    $("#notiAgree1").on("change",function (){
        var isChecked = "N";
        if ($(this).is(":checked")) {
            isChecked = "Y";
        }

        $.ajax({
            type:'POST',
            url:'/MyPage/changeAgree',
            data: {
                "agreePK" : "{{$noti->mbAgreePK}}",
                "isChecked" : isChecked,
            },
            async : false,
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success:function(data){
            }
        });
    });
</script>
@include('/mobile/common/end')

