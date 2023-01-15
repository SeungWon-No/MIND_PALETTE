@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => false,
    "title" => "HTP 상담 결과"
])
@php
    use App\Http\Util\CounselingTemplate;
    $counselingTemplate = new CounselingTemplate;

    $levelInfo = [
      "L" => [
          "class" => "green",
          "title" => "낮음(L)수준"
      ],
      "M" => [
          "class" => "orange",
          "title" => "보통(M)수준",
      ],
      "H" => [
          "class" => "red",
          "title" => "높음(H)수준"
      ],
    ];
@endphp
<link rel="stylesheet" type="text/css" href="/commonEditor/stylesMobile.css?version={{CSS_VERSION}}">
<script src="/commonEditor/ckeditor.js"></script>
<section id="container" class="page-body">
    <div class="page-contents">
        <div class="advice-view">
            <div class="basic-data-group small">
                <div class="user-card">
                    <div class="user-card-info">
                        <div class="item-cate">
                            <h3 class="con-title">아이 정보</h3>
                            <div class="item-code">221201-ab32d</div>
                        </div>
                        <!-- 23.01.04 아이콘 변경 -->
                        <div class="item-data">
                            <div class="item-icons"><div class="icon icon-page-user-orange-bg"></div></div>
                            <div class="item-info">
                                <div class="item-name">
                                    <strong>{{$counseling->counselorName}}</strong>
                                    <span>{{Crypt::decryptString($counseling->counselorBirthday)}}</span></div>
                                <div class="item-date">상담 등록일: {{date_format(date_create($counseling->createDate),"Y.m.d H:i")}}</div>
                            </div>
                        </div>
                        <!-- //23.01.04 아이콘 변경 -->
                    </div>
                    <!-- 유료회원일 경우 -->
                    <div class="user-card-picture">
                        <h3 class="con-title small">등록 그림</h3>
                        <div class="grid-layout">
                            <div class="grid-layout-inner">
                                <div class="grid-layout-cell">
                                    <button type="button" class="btn-user-picture">
                                        <span class="thumb"><img src="{{URL::asset("/storage/image/thumb/".$images["house"])}}" alt=""/></span>
                                        <span class="name">집</span>
                                    </button>
                                </div>
                                <div class="grid-layout-cell">
                                    <button type="button" class="btn-user-picture">
                                        <span class="thumb"><img src="{{URL::asset("/storage/image/thumb/".$images["tree"])}}" alt=""/></span>
                                        <span class="name">나무</span>
                                    </button>
                                </div>
                                <div class="grid-layout-cell">
                                    <button type="button" class="btn-user-picture">
                                        <span class="thumb"><img src="{{URL::asset("/storage/image/thumb/".$images["person1"])}}" alt=""/></span>
                                        <span class="name">사람1</span>
                                    </button>
                                </div>
                                <div class="grid-layout-cell">
                                    <button type="button" class="btn-user-picture">
                                        <span class="thumb"><img src="{{URL::asset("/storage/image/thumb/".$images["person2"])}}" alt=""/></span>
                                        <span class="name">사람2</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- //유료회원일 경우 -->
                </div>
            </div>
            <div class="basic-data-group">
                <div class="result-tab-group">
                    <div class="result-tab-nav">
                        <!-- actived클래스 추가시 활성화 -->
                        <button id="resultTemperament" onclick="changeTab('resultTemperament','temperamentTab')" type="button" class="btn-result-tab-nav actived">기질검사</button>
                        <button id="resultHTP" onclick="changeTab('resultHTP','HTPTab')" type="button" class="btn-result-tab-nav">HTP검사</button>
                    </div>
                    <div class="result-tab-data">
                        <!-- 기질검사 -->
                        <!-- actived 클래스 추가시 활성화 -->
                        <div id="temperamentTab" class="tab-data actived">
                            <div class="result-card">
                                <div class="result-test-graph">
                                    <!-- 23.01.04 수정-->
                                    <h3 class="con-title">우리 아이 기질검사 종합 결과</h3>
                                    <div class="graph-wrap">
                                        <div class="graph-outer">
                                            <div class="graph-inner">
                                                <div class="graph-data-area">
                                                    <div class="graph-data-bars">
                                                        <div class="graph-data-bar">
                                                            <div style="height:{{$temperamentTest["emotion"]}}%;"
                                                                 class="bar {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["emotion"])]["class"]}}"></div>
                                                        </div>
                                                        <div class="graph-data-bar">
                                                            <div style="height:{{$temperamentTest["action"]}}%;"
                                                                 class="bar {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["action"])]["class"]}}"></div>
                                                        </div>
                                                        <div class="graph-data-bar">
                                                            <div style="height:{{$temperamentTest["relationshipAdaptation"]}}%;"
                                                                 class="bar {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipAdaptation"])]["class"]}}"></div>
                                                        </div>
                                                        <div class="graph-data-bar">
                                                            <div style="height:{{$temperamentTest["relationshipPursuit"]}}%;" class="bar orange"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="graph-grid-area">
                                                    <div class="graph-x-lines">
                                                        <!-- 색상 및 상황별 클래스값 -->
                                                        <!--
                                                        // green-line :  0단계
                                                        // yellow-line :  1단계
                                                        // orange-line :  2단계
                                                        // red-line :  3단계
                                                        -->
                                                        <div class="graph-x-line green-line point-line"></div>
                                                        <div class="graph-x-line"></div>
                                                        <div class="graph-x-line"></div>
                                                        <div class="graph-x-line yellow-line point-line"></div>
                                                        <div class="graph-x-line"></div>
                                                        <div class="graph-x-line"></div>
                                                        <div class="graph-x-line red-line point-line"></div>
                                                        <div class="graph-x-line "></div>
                                                        <div class="graph-x-line"></div>
                                                        <div class="graph-x-line"></div>
                                                        <div class="graph-x-line"></div>
                                                    </div>
                                                </div>
                                                <div class="graph-x-labels">
                                                    <!-- hide클래스 추가시 숨김 -->
                                                    <div class="graph-x-label "><div class="label-value">0</div></div>
                                                    <div class="graph-x-label hide"><div class="label-value">10</div></div>
                                                    <div class="graph-x-label hide"><div class="label-value">20</div></div>
                                                    <div class="graph-x-label"><div class="label-value">32</div></div>
                                                    <div class="graph-x-label hide"><div class="label-value">40</div></div>
                                                    <div class="graph-x-label hide"><div class="label-value">50</div></div>
                                                    <div class="graph-x-label "><div class="label-value">64</div></div>
                                                    <div class="graph-x-label hide"><div class="label-value">70</div></div>
                                                    <div class="graph-x-label hide"><div class="label-value">80</div></div>
                                                    <div class="graph-x-label hide"><div class="label-value">90</div></div>
                                                    <div class="graph-x-label hide"><div class="label-value">100</div></div>
                                                </div>
                                                <div class="graph-y-labels">
                                                    <div class="graph-y-label"><div class="label-name">정서표현</div><div class="label-value">{{$temperamentTest["emotion"]}}점</div></div>
                                                    <div class="graph-y-label"><div class="label-name">행동표현</div><div class="label-value">{{$temperamentTest["action"]}}점</div></div>
                                                    <div class="graph-y-label"><div class="label-name">관계적응</div><div class="label-value">{{$temperamentTest["relationshipAdaptation"]}}점</div></div>
                                                    <div class="graph-y-label"><div class="label-name">관계추구</div><div class="label-value">{{$temperamentTest["relationshipPursuit"]}}점</div></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- //23.01.04 수정-->
                                </div>
                                <div class="result-test-detail">
                                    <h3 class="con-title">내용 하위척도 상세 해석</h3>
                                    <div class="result-table-data">
                                        <table class="result-table">
                                            <colgroup>
                                                <col style="width:25%"/>
                                                <col style="width:75%"/>
                                            </colgroup>
                                            <thead>
                                            <tr>
                                                <th>척도명</th>
                                                <th>해석</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><strong class="font-color-black">정서표현</strong></td>
                                                <td class="text-align-left">여러 가지 감정을 불러일으키는 기분이나 분위기를 적절한 말로 표현하고, 상황에 맞는 행동이나 표정으로 나타낼 수 있는 영역을 의미합니다.</td>
                                            </tr>
                                            <tr>
                                                <td><strong class="font-color-black">행동표현</strong></td>
                                                <td class="text-align-left">구성적인 행동 경향은 개인의 특성으로 여러 상황, 활동(activity)에서 나타난다. 해당 영역은 내적 혹은 외적 자극에 의한 행동 반응 영역을 의미합니다.</td>
                                            </tr>
                                            <tr>
                                                <td><strong class="font-color-black">관계적응</strong></td>
                                                <td class="text-align-left">대인관계에서 발생하는 영향을 적절하고 유익하게 대처하는 능력으로, 둘 이상의 낯선 대인관계 상황에 놓일 때 얼마만큼 적응하면서 조화를 이루는가를 살피는 영역을 의미합니다.</td>
                                            </tr>
                                            <tr>
                                                <td><strong class="font-color-black">관계추구</strong></td>
                                                <td class="text-align-left">사람에 대한 자극이나 잠재적인 보상 단서에 접할 경우 관계 자극에 끌리면서 행동이 활성화 되는 영역을 의미합니다.</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="basic-data-group small">
                                <div class="result-card">
                                    <div class="result-analysis-top">
                                        <h4 class="con-title">세부 분석 결과 - 정서표현 지수</h4>
                                        <div class="item-desc">정서표현 척도는 부정정서 표출과 통제를<br>측정하기 위한 척도입니다.</div>
                                        <div class="result-analysis-graph">
                                            <div class="result-analysis-graph-table">
                                                <table>
                                                    <colgroup>
                                                        <col style="width:29%"/>
                                                        <col style="width:14%"/>
                                                        <col style="width:14%"/>
                                                        <col style="width:14%"/>
                                                        <col style="width:29%"/>
                                                    </colgroup>
                                                    <thead>
                                                    <tr>
                                                        <th rowspan="2"><strong>낮음</strong></th>
                                                        <th colspan="3"><strong>보통</strong></th>
                                                        <th rowspan="2"><strong>높음</strong></th>
                                                    </tr>
                                                    <tr>
                                                        <th>이하</th>
                                                        <th>보통</th>
                                                        <th>이상</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="5">
                                                            <div class="result-analysis-graph-data">
                                                                <div class="bar {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["emotion"])]["class"]}}" style="width:{{$temperamentTest["emotion"]}}%;"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="result-analysis-graph-value">
                                                <div class="item-value">
                                                    <strong class="font-color-{{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["emotion"])]["class"]}}">{{$temperamentTest["emotion"]}}점</strong>
                                                </div>
                                            </div>

                                            <div class="result-analysis-desc">
                                                <div class="txt"><strong>※30 이하: 정서적 절제(Emotional Moderation)</strong>, 자신이 느끼는 부정정서를 외부로 표현하지 않고 심사숙고하는 경향</div>
                                                <div class="txt"><strong>※70 이상: 정서적 폭발(Emotional Outburst)</strong>, 강한 감정 표현형으로 자신이 원하는 것과 원하지 않는 것에 대한 선호도가 분명함</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="result-analysis-view">
                                        <div class="result-headline">정서표현 지수는
                                            <strong class="font-color-{{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["emotion"])]["class"]}}">
                                                {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["emotion"])]["title"]}}
                                            </strong>입니다.
                                        </div>
                                        <div class="result-desc">{!! CounselingTemplate::$temperamentTestLevelInfo['emotion'][$counselingTemplate->getTemperamentTestLevel($temperamentTest["emotion"])] !!}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="basic-data-group small">
                                <div class="result-card">
                                    <div class="result-analysis-top">
                                        <h4 class="con-title">세부 분석 결과 - 행동표현 지수</h4>
                                        <div class="item-desc">행동표현(활동성)의 척도는 아동의 전체적 활동량을<br/>측정하기 위한 척도입니다.</div>
                                        <div class="result-analysis-graph">
                                            <div class="result-analysis-graph-table">
                                                <table>
                                                    <colgroup>
                                                        <col style="width:29%"/>
                                                        <col style="width:14%"/>
                                                        <col style="width:14%"/>
                                                        <col style="width:14%"/>
                                                        <col style="width:29%"/>
                                                    </colgroup>
                                                    <thead>
                                                    <tr>
                                                        <th rowspan="2"><strong>낮음</strong></th>
                                                        <th colspan="3"><strong>보통</strong></th>
                                                        <th rowspan="2"><strong>높음</strong></th>
                                                    </tr>
                                                    <tr>
                                                        <th>이하</th>
                                                        <th>보통</th>
                                                        <th>이상</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="5">
                                                            <div class="result-analysis-graph-data">
                                                                <div class="bar {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["action"])]["class"]}}" style="width:{{$temperamentTest["action"]}}%;"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="result-analysis-graph-value">
                                                <div class="item-value">
                                                    <strong class="font-color-{{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["action"])]["class"]}}">{{$temperamentTest["action"]}}점</strong>
                                                </div>
                                            </div>

                                            <div class="result-analysis-desc">
                                                <div class="txt"><strong>※30 이하: 비활동적 행동표현(Inactive Behavior)</strong>, 비활동적인 것을 좋아하고 좀처럼 지루해하지 않으며, 자신에게 익숙한 방식을 고수하려는 경향</div>
                                                <div class="txt"><strong>※70 이상: 자유 분방(Freewheeling))</strong>, 강한 행동 표현형으로 새로운 자극에 이끌려 행동이 활성화되는 성향</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="result-analysis-view">
                                        <div class="result-headline">행동표현 지수는
                                            <strong class="font-color-{{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["action"])]["class"]}}">
                                                {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["action"])]["title"]}}
                                            </strong>입니다.
                                        </div>
                                        <div class="result-desc">{!! CounselingTemplate::$temperamentTestLevelInfo['action'][$counselingTemplate->getTemperamentTestLevel($temperamentTest["action"])] !!}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="basic-data-group small">
                                <div class="result-card">
                                    <div class="result-analysis-top">
                                        <h4 class="con-title">세부 분석 결과 - 관계적응 지수</h4>
                                        <div class="item-desc">관계적응의 척도는 아동이 낯선 상황이나 낯선 환경에 대한<br/>적응방식을 측정하기 위한 척도입니다.</div>
                                        <div class="result-analysis-graph">
                                            <div class="result-analysis-graph-table">
                                                <table>
                                                    <colgroup>
                                                        <col style="width:29%"/>
                                                        <col style="width:14%"/>
                                                        <col style="width:14%"/>
                                                        <col style="width:14%"/>
                                                        <col style="width:29%"/>
                                                    </colgroup>
                                                    <thead>
                                                    <tr>
                                                        <th rowspan="2"><strong>낮음</strong></th>
                                                        <th colspan="3"><strong>보통</strong></th>
                                                        <th rowspan="2"><strong>높음</strong></th>
                                                    </tr>
                                                    <tr>
                                                        <th>이하</th>
                                                        <th>보통</th>
                                                        <th>이상</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="5">
                                                            <div class="result-analysis-graph-data">
                                                                <div class="bar {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipAdaptation"])]["class"]}}" style="width:{{$temperamentTest["relationshipAdaptation"]}}%;"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="result-analysis-graph-value">
                                                <div class="item-value">
                                                    <strong class="font-color-{{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipAdaptation"])]["class"]}}">{{$temperamentTest["relationshipAdaptation"]}}점</strong>
                                                </div>
                                            </div>

                                            <div class="result-analysis-desc">
                                                <div class="txt"><strong>※30 이하: 자발적 관계적응(Voluntary relational adaptation)</strong>, 사람에 대한 관심, 신뢰, 믿음이 있으며 낯선 환경에 개방적인 성향</div>
                                                <div class="txt"><strong>※70 이상: 비자발적 관계적응 / 수줍음(involuntary relational adaptation / shyness)</strong>, 낯선 환경에 놓일 때 생길 수 있는 위험에 대비해 조심스럽고 신중하게 접근하는 경향</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="result-analysis-view">
                                        <div class="result-headline">관계적응 지수는
                                            <strong class="font-color-{{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipAdaptation"])]["class"]}}">
                                                {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipAdaptation"])]["title"]}}
                                            </strong>입니다.
                                        </div>
                                        <div class="result-desc">{!! CounselingTemplate::$temperamentTestLevelInfo['relationshipAdaptation'][$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipAdaptation"])] !!}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="basic-data-group small">
                                <div class="result-card">
                                    <div class="result-analysis-top">
                                        <h4 class="con-title">세부 분석 결과 - 관계추구 지수</h4>
                                        <div class="item-desc">관계추구 척도는 긴밀한 대인관계를 맺기 위해 외향적<br/>관계추구 혹은 내향적 관계추구를 측정하기 위한 척도입니다.</div>
                                        <div class="result-analysis-graph">
                                            <div class="result-analysis-graph-table">
                                                <table>
                                                    <colgroup>
                                                        <col style="width:29%"/>
                                                        <col style="width:14%"/>
                                                        <col style="width:14%"/>
                                                        <col style="width:14%"/>
                                                        <col style="width:29%"/>
                                                    </colgroup>
                                                    <thead>
                                                    <tr>
                                                        <th rowspan="2"><strong>낮음</strong></th>
                                                        <th colspan="3"><strong>보통</strong></th>
                                                        <th rowspan="2"><strong>높음</strong></th>
                                                    </tr>
                                                    <tr>
                                                        <th>이하</th>
                                                        <th>보통</th>
                                                        <th>이상</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="5">
                                                            <div class="result-analysis-graph-data">
                                                                <div class="bar {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipPursuit"])]["class"]}}" style="width:{{$temperamentTest["relationshipPursuit"]}}%;"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="result-analysis-graph-value">
                                                <div class="item-value">
                                                    <strong class="font-color-{{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipPursuit"])]["class"]}}">{{$temperamentTest["relationshipPursuit"]}}점</strong>
                                                </div>
                                            </div>

                                            <div class="result-analysis-desc">
                                                <div class="txt"><strong>※30 이하: 내향적 관계추구(Introverted Relationship)</strong>, 자기 내면에 집중하는 기질로 깊이 있는 관계를 유지하면서 소수의 사람과 밀접한 관계를 이어가는 경향</div>
                                                <div class="txt"><strong>※70 이상: 외향적 관계추구(Extroverted Relationship)</strong>, 열정적이고 사교적인 특성이 있어서 타인과 함께할 때 즐거움을 느끼고 협조적인 경향</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="result-analysis-view">
                                        <div class="result-headline">관계추구 지수는
                                            <strong class="font-color-{{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipPursuit"])]["class"]}}">
                                                {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipPursuit"])]["title"]}}
                                            </strong>입니다.
                                        </div>
                                        <div class="result-desc">{!! CounselingTemplate::$temperamentTestLevelInfo['relationshipPursuit'][$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipPursuit"])] !!}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="page-bottom-ui small"><a href="javascript:changeTab('resultHTP','HTPTab')" class="btn btn-orange btn-large-size btn-page-action">HTP검사 결과 보기</a></div>
                        </div>
                        <!-- //기질검사 -->
                        <!-- HTP검사 -->
                        <!-- actived 클래스 추가시 활성화 -->
                        <div id="HTPTab" class="tab-data">
                            <!-- btn클래스에 disabled클래스 추가시 비활성화 표현 -->

                            <div class="displayCounselingResult" id="view-edit">
                                {!! $counseling->counselingResult !!}
                            </div>

                            <div class="page-bottom-ui small"><a href="javascript:changeTab('resultTemperament','temperamentTab')" class="btn btn-orange btn-large-size btn-page-action">기질검사 결과 보기</a></div>
                            <div id="advisorRating" class="basic-data-group">
                                <div class="result-card">
                                    <div class="result-card-master">
                                        <h3 class="con-title">상담은 만족스러우셨나요?</h3>
                                        <div class="master-info-wrap">
                                            <div class="item-thumb"><div class="thumb"><img src="../assets/images/user_thumb.png" alt=""/></div></div>
                                            <!-- 23.01.04 수정 -->
                                            <div class="item-info">
                                                <div class="item-name"><strong>{{$advisorName}}</strong> 상담사</div>
                                                <div class="item-history">
                                                    <!-- 現 한자고정 -->
                                                    <div class="txt blue"><strong class="font-color-blue">現 {{$advisorCenter}}</strong></div>
                                                    @foreach($advisorEducationLevel as $advisorEducationLevelRow)
                                                        <div class="txt">{{$advisorEducationLevelRow->school}}</div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!--// 23.01.04 수정 -->
                                        </div>
                                        <div class="master-review-wrap">
                                            <div class="item-select">
                                                <select>
                                                    <option value="">별점 선택</option>
                                                    <option value="">매우 불만족 : ★☆☆☆☆</option>
                                                    <option value="">불만족 : ★★☆☆☆</option>
                                                    <option value="">보통 : ★★★☆☆</option>
                                                    <option value="">만족 : ★★★★☆</option>
                                                    <option value="">매우 만족 : ★★★★★</option>
                                                </select>
                                            </div>
                                            <!-- 기본 display:none으로 처리요망 -->
                                            <div class="item-inputs" style="display:block;">
                                                <textarea placeholder="자세한 후기를 입력해주세요. 상담사에게 큰 도움이 됩니다."></textarea>
                                            </div>
                                            <!-- btn클래스에 disabled클래스 추가시 비활성화 표현 -->
                                            <div class="item-btns">
                                                <div class="page-bottom-ui">
                                                    <a id="btnReview" href="#"
                                                       class="btn btn-orange btn-large-size btn-page-action disabled">상담사 후기 등록</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="centerInfo" class="basic-data-group small" >
                                <div class="card-item card-store">
                                    <div class="item-info">
                                        <div class="item-name">{{$center->title}}</div>
                                        <div class="item-address">{{$center->addr1}} {{$center->addr2}}</div>
                                        <div class="item-btns">
                                            <a href="tel:{{$center->tel}}" class="btn-ui">전화하기</a>
                                            <a href="{{$center->siteUrl}}" target="_blank" class="btn-ui">사이트 방문하기</a>
                                        </div>
                                    </div>
                                    <div class="item-thumb">
                                        <div class="thumb-wrap">
                                            <div class="thumb"><img src="{{URL::asset('/storage/image/thumb/'.$center->thumImage)}}" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- //HTP검사 -->
                    </div>
                </div>
            </div>
            @if(!$serviceRating)
                <div class="basic-data-group middle" id="serviceInfo">
                    @csrf
                    <div class="service-review-wrap">
                        <div class="item-desc"><strong>마음팔레트 서비스</strong>는 어떠셨나요?<br>별점을 남겨주시면 서비스 개선에 도움이 됩니다.</div>
                        <div class="item-check">
                            <div class="review-check-group">
                                <!-- actived클래스 추가시 활성화 -->
                                <button type="button" class="btn-review-nav" onclick="serviceRating('1')">1점</button>
                                <button type="button" class="btn-review-nav" onclick="serviceRating('2')">2점</button>
                                <button type="button" class="btn-review-nav" onclick="serviceRating('3')">3점</button>
                                <button type="button" class="btn-review-nav" onclick="serviceRating('4')">4점</button>
                                <button type="button" class="btn-review-nav" onclick="serviceRating('5')">5점</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
<div id="commonToast" class="toast-pop-wrap">
    <div class="toast-pop-data" id="commonToastMessage">비밀번호가 성공적으로 변경되었습니다.</div>
</div>
<script>
    ClassicEditor
        .create( document.querySelector( '.displayCounselingResult' ), {
        } )
        .then( editor => {
            editor.enableReadOnlyMode( 'view-edit' );

            const toolbarElement = editor.ui.view.toolbar.element;
            toolbarElement.style.display = 'none';
        } )
        .catch( error => {
            console.log(error);
        } );

    function serviceRating(rating) {
        $.ajax({
            type:'POST',
            url:'/serviceRating',
            data: {
                "rating" : rating
            },
            async: false,
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success:function(json){
                var data = JSON.parse(json);
                $("#serviceInfo").css("display","none");
                $("#commonToastMessage").html(data.message);
                common.toastPopOpen('commonToast');
            }
        });
    }

    function changeTab(id, tab) {
        $("#resultTemperament").removeClass("actived");
        $("#resultHTP").removeClass("actived");

        $("#temperamentTab").removeClass("actived");
        $("#HTPTab").removeClass("actived");

        $("#"+id).addClass("actived");
        $("#"+tab).addClass("actived");
    }
</script>
@include('/mobile/common/end')

