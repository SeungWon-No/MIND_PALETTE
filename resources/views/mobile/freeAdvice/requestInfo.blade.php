@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => false,
    "isShowCloseButton" => true,
    "title" => "무료 검사 체험하기"
])
<script>
    function pageClose(){
        location.href = '/';
    }
</script>
<section id="container" class="page-body">
    @csrf
    <div class="page-contents">
        <div class="advice-info-wrap free">
            <div class="advice-info-headline">
                <h2>마음팔레트 무료 검사 안내</h2>
                <div class="txt">※ 본 조사도구는 진단검사도구가 아닌 간이선별도구로써 학생 상담시 참고용으로만 사용하십시오.<br>본 척도의 해석지침에 제시된 점수는 절대적인 기준점수가 아닙니다.</div>
                <div class="input">
                    <input type="text" id="counselorName"
                           placeholder="아이의 이름을 입력해주세요 (필수)" onfocus="inputChange(this);"
                           onkeyup="inputChange(this);" onblur="inputBlur(this);" class="valid-error">
                </div>
            </div>
        </div>
        <div class="advice-free-wrap">
            <h3 class="data-title">아이의 이름을 입력 후</br>원하는 검사 항목을 선택해주세요.</h3>
            <div class="card-item card-write">
                <div class="item-info">
                    <div class="item-subject"><strong>우울 : Depression</strong></div>
                    <div class="item-desc">문항 수 : 27개</div>
                </div>
                <div class="item-ui"><a href="javascript:checkName()" class="btn btn-outline-orange btn-middle-size btn-inline "><strong>검사하기</strong></a></div>
            </div>
            <div class="card-item card-write">
                <div class="item-info">
                    <div class="item-subject"><strong>불안 : Anxiety</strong></div>
                    <div class="item-desc">문항 수 : 21개</div>
                </div>
                <div class="item-ui">
                    <a href="#" class="btn btn-outline-orange btn-middle-size btn-inline disabled">
                        <strong>검사하기</strong>
                    </a>
                </div>
            </div>
            <div class="card-item card-write">
                <div class="item-info">
                    <div class="item-subject"><strong>자아존중감 : Self-worth</strong></div>
                    <div class="item-desc">문항 수 : 10개</div>
                </div>
                <div class="item-ui">
                    <a href="#" class="btn btn-outline-orange btn-middle-size btn-inline disabled">
                        <strong>검사하기</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function checkName() {
        var counselorName = $("#counselorName").val();
        if (counselorName === "") {
            alert('아이의 이름을 입력해주세요');
            return false;
        }

        $.ajax({
            type:'POST',
            url:'/createFreeAdvice',
            data: {
                "counselorName" : counselorName
            },
            async: false,
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success:function(json){
                var data = JSON.parse(json);
                if ( data.status === "success" ) {
                    location.href = '/depressionStep1/'+data.counselingResultPK;
                } else {
                    alert(data.message);
                }
            }
        });
    }
</script>
@include('/mobile/common/end')

