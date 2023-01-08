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
            <!-- 20221225 수정 -->
            <div class="advice-info-headline">
                <h2>마음팔레트 무료 검사 안내</h2>
                <div class="txt"><span class="font-color-gray2">※ 본 조사도구는 진단검사도구가 아닌 간이선별도구로써 학생 상담시 참고용으로만 사용하십시오.<br>본 척도의 해석지침에 제시된 점수는 절대적인 기준점수가 아닙니다.</span></div>
                <div class="txt"><span class="font-underline">*권장 연령: 글을 읽을 수 있는 아동</span><br>(아이가 직접 선택하도록 지도해주세요)</div>
                <input type="text" id="counselorName"
                       placeholder="아이의 이름을 입력해주세요 (필수)" onfocus="inputChange(this);"
                       onkeyup="inputChange(this);" onblur="inputBlur(this);" class="valid-error">
            </div>
            <!-- //20221225 수정 -->
        </div>
        <div class="advice-free-wrap">
            <!-- 20221229 수정 -->
            <div style="padding:0 5px;">
                <h3 class="data-title">아이의 이름을 입력 후</br>원하는 검사 항목을 선택해주세요.</h3>
            </div>
            <div class="card-item card-write type-2">
                <div class="item-subject"><strong>아동용 우울척도 (CDI) </strong></div>
                <div class="item-desc">아동기 우울증의 인지적, 정서적 행동적 증상들을 평가 하기 위해 개발한 자기보고형 척도로써 Beck(1967)의 성인용 우울 척도를 아동의 연령에 맞게 변형시켰습니다.</div>
                <div class="item-bottom-ui">
                    <div class="item-number">전체 문항 수 : 27개</div>
                    <div class="item-ui"><a href="javascript:cdiTest()" class="btn btn-orange btn-middle-size"><strong>검사하기</strong></a></div>
                </div>
            </div>
            <!-- 23.01.04 수정 -->
            <div class="card-item card-write type-2">
                <div class="item-subject"><strong>Beck 불안척도 (BAI)</strong></div>
                <div class="item-desc">정신과 집단에서 호소하는 불안의 정도를 측정하기 위한 도구로, 특히 우울로부터 불안을 구별해내기 위한 목적으로 개발되었습니다.</div>
                <div class="item-bottom-ui">
                    <div class="item-number">전체 문항 수 : 21개</div>
                    <div class="item-ui"><a href="javascript:baiTest()" class="btn btn-orange btn-middle-size"><strong>검사하기</strong></a></div>
                </div>
            </div>
            <div class="card-item card-write type-2">
                <div class="item-subject"><strong>자아존중감 척도 (SES)</strong></div>
                <div class="item-desc">개인의 자아존중감 즉, 자기존중 정도와 자아승인양상을 측정하는 검사로, Rosenberg(1965)가 개발한 검사를전병제(1974)가 번안했습니다.</div>
                <div class="item-bottom-ui">
                    <div class="item-number">전체 문항 수 : 10개</div>
                    <div class="item-ui"><a href="javascript:sesTest()" class="btn btn-orange btn-middle-size"><strong>검사하기</strong></a></div>
                </div>
            </div>
            <!-- //23.01.04 수정 -->
            <!-- //20221229 수정 -->
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
        return true;
    }

    function cdiTest() {
        if (!checkName()) return false;

        var counselorName = $("#counselorName").val();
        $.ajax({
            type:'POST',
            url:'/createFreeAdvice',
            data: {
                "testType" : "depressionStep1",
                "counselorName" : counselorName
            },
            async: false,
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success:function(json){
                var data = JSON.parse(json);
                if ( data.status === "success" ) {
                    location.href = '/depressionStep1/'+data.counselingTemplatePK;
                } else {
                    alert(data.message);
                }
            }
        });
    }

    function baiTest() {
        if (!checkName()) return false;

        var counselorName = $("#counselorName").val();
        $.ajax({
            type:'POST',
            url:'/createFreeAdvice',
            data: {
                "testType" : "anxietyStep1",
                "counselorName" : counselorName
            },
            async: false,
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success:function(json){
                var data = JSON.parse(json);
                if ( data.status === "success" ) {
                    location.href = '/anxietyStep1/'+data.counselingTemplatePK;
                } else {
                    alert(data.message);
                }
            }
        });
    }


    function sesTest() {
        if (!checkName()) return false;

        var counselorName = $("#counselorName").val();
        $.ajax({
            type:'POST',
            url:'/createFreeAdvice',
            data: {
                "testType" : "selfWorthStep1",
                "counselorName" : counselorName
            },
            async: false,
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success:function(json){
                var data = JSON.parse(json);
                if ( data.status === "success" ) {
                    location.href = '/selfWorthStep1/'+data.counselingTemplatePK;
                } else {
                    alert(data.message);
                }
            }
        });
    }
</script>
@include('/mobile/common/end')

