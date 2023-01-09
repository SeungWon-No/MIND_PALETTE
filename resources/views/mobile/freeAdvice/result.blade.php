@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => false,
    "title" => "무료 상담 결과"
])
<section id="container" class="page-body">
    <div class="page-contents">
        <div class="advice-view">
            <div class="basic-data-group small">
                <div class="user-card">
                    <div class="user-card-info">
                        <div class="item-cate">
                            <h3 class="con-title">아이 정보</h3>
                            <div class="item-code">{{$freeInfoData["code"]}}</div>
                        </div>
                        <!-- 23.01.04 아이콘 변경-->
                        <div class="item-data">
                            <div class="item-icons"><div class="icon icon-page-user-orange-bg"></div></div>
                            <div class="item-info">
                                <div class="item-name"><strong>{{$freeInfoData["name"]}}</strong></div>
                                <div class="item-date">상담 등록일: {{$freeInfoData["createDate"]}}</div>
                            </div>
                        </div>
                        <!-- //23.01.04 아이콘 변경-->
                    </div>
                </div>
            </div>
            <div class="basic-data-group small">
                <div class="result-card">
                    <!-- 우울 -->
                    <div class="result-card-process">
                        <h3 class="con-title">{{$freeInfoData["title"]}}</h3>
                        <div class="stats-graph {{$freeInfoData["levelClass"]}}">
                            <div class="stats-graph-cell">
                                <!-- 단계별 클래스 추가 , step-1 ~ step-4 -->
                                <div class="stats-graph-items step-{{$freeInfoData["levelIcon"]}}">
                                    <div class="stats-graph-label">{{$freeInfoData["label"]}}</div>
                                    <div class="stats-graph-progress">
                                        <div class="icon icon-feel-{{$freeInfoData["iconType"]}}-{{$freeInfoData["levelIcon"]}}"></div>
                                        <div class="value">
                                            <div class="bar" style="width:{{$freeInfoData["levelWidth"]}}%;"></div>
                                        </div>
                                    </div>
                                    <div class="stats-graph-label">{{$freeInfoData["score"]}}점 : {{$freeInfoData["level"]}}단계</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- //우울 -->
                    <div class="result-card-detail">
                        <!-- 0단계  -->
                        <div class="result-headline"><strong class="font-color-{{$colorClass[$freeInfoData["level"]]}}">{{$freeInfoData["statusText"]}}</strong>수준입니다.</div>
                        <div class="item-desc">
                            <div class="txt">{{$freeInfoData["resultText"]}}</div>
                        </div>
                        <div class="result-table-data">
                            <table class="result-table">
                                <colgroup>
                                    <col style="width:25%"/>
                                    <col style="width:75%"/>
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>점수</th>
                                    <th>설명</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if ($freeInfoData["iconType"] == "1")
                                <tr>
                                    <td><span class="font-color-black">0-21점</span></td>
                                    <td>정상</td>
                                </tr>
                                <tr>
                                    <td><span class="font-color-black">22-25점</span></td>
                                    <td>약간 우울</td>
                                </tr>
                                <tr>
                                    <td><span class="font-color-black">26-28점</span></td>
                                    <td>상당한 우울</td>
                                </tr>
                                <tr>
                                    <td><span class="font-color-black">29점 이상</span></td>
                                    <td>매우 심한 우울</td>
                                </tr>

                                @elseif ($freeInfoData["iconType"] == "2")
                                    <tr>
                                        <td><span class="font-color-black">0-21점</span></td>
                                        <td>정상</td>
                                    </tr>
                                    <tr>
                                        <td><span class="font-color-black">22-26점</span></td>
                                        <td>불안</td>
                                    </tr>
                                    <tr>
                                        <td><span class="font-color-black">27-31점</span></td>
                                        <td>심한 불안</td>
                                    </tr>
                                    <tr>
                                        <td><span class="font-color-black">32점 이상</span></td>
                                        <td>극심한 불안</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td><span class="font-color-black">10-19점</span></td>
                                        <td>낮은 자존감</td>
                                    </tr>
                                    <tr>
                                        <td><span class="font-color-black">20-29점</span></td>
                                        <td>보통의 자존감</td>
                                    </tr>
                                    <tr>
                                        <td><span class="font-color-black">30점 이상</span></td>
                                        <td>건강하고 바람직한 자존감</td>
                                    </tr>
                                @endif
                                </tbody>

                            </table>
                            <div class="result-table-info"><strong class="font-color-red">{{$freeInfoData["infoText"]}}</strong></div>
                        </div>
                    </div>
                </div>
            </div>
            @if(!$freeInfoData["isLogin"])
            <div class="basic-data-group">
                <div class="page-bottom-desc">결과를 저장하고 싶으신가요?<br>로그인 시 현재 결과를 기록할 수 있습니다.</div>
                <div class="page-bottom-ui"><a href="/login" class="btn btn-orange btn-large-size btn-page-action">로그인</a></div>
            </div>
            @endif
        </div>
    </div>
</section>
@include('/mobile/common/end')

