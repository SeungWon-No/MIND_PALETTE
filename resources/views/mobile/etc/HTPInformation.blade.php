@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => false,
    "title" => "HTP란?",
])
<script>
    function pageClose(){
        pop.open('savePop');
    }
</script>
<section id="container" class="page-body">
    <div class="page-contents">
        <div class="basic-data-group">
            <div class="htp-overview-visual"><img src="../mobile/assets/images/content/htp-visual.png" alt=""/></div>
        </div>
        <div class="basic-data-group msmall">
            <div class="htp-overview-desc">
                <div class="txt"><strong>HTP는</strong>  house, tree, person의 앞글자를 딴 그림 치료 검사입니다. 이 세가지 그림은 아이들에게 친숙하고 자기상을 풍부하게 투사할 수 있는 대상으로, 그림의 세부 묘사들이 아동의 성격적 요인을 풍부히 드러내는 특징을 갖고 있습니다.</div>
                <div class="txt">검사자를 이해하는데 직관적이고 질문을 통한 상호작용으로 현재 임상가들에게 많이 활용되고 있는 검사입니다.</div>
            </div>
        </div>
        <div class="basic-data-group middle">
            <div class="htp-overview-special">
                <h3 class="con-title">HTP 검사의 특징</h3>
                <ul>
                    <li><div class="desc">쉬운 실시 (준비물 : 연필, 종이, 지우개)</div></li>
                    <li><div class="desc">쉬운 실시 (준비물 : 연필, 종이, 지우개)</div></li>
                    <li><div class="desc">언어 표현이 수줍은 아동, 외국인 등 능동적으로 그림을 통해 자신을 표현 가능</div></li>
                </ul>
            </div>
        </div>
    </div>
</section>
@include('/mobile/common/end')

