<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
    <!-- Page Infomation -->
    <title>MAUMPALETTE</title>
    <meta name="Description" content="">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="format-detection" content="telephone=no">
    <!-- SNS Basic -->
    <meta property="og:title" content="MAUMPALETTE">
    <meta property="og:description" content="MAUMPALETTE">
    <meta property="og:type" content="website">
    <meta property="og:url"    content="">
    <meta property="og:image" content="../assets/images/common/sns.jpg">
    <!-- SNS Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="MAUMPALETTE">
    <meta name="twitter:description" content="MAUMPALETTE">
    <meta name="twitter:image" content="../assets/images/common/sns.jpg">
    <link rel="canonical" href="대표도메인">
    <!-- custom css -->
    <link href="/mobile/assets/css/style.css" rel="stylesheet">
    <!-- jquery js -->
    <script src="/mobile/assets/js/jquery.js"></script>
    <script src="/mobile/assets/js/swiper/swiper.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/commonEditor/stylesMobile.css?version={{CSS_VERSION}}">
    <script src="/commonEditor/ckeditor.js"></script>
</head>
<body>

@php
    use App\Http\Util\CounselingTemplate;
    $counselingTemplate = new CounselingTemplate;

    $levelInfo = [
      "L" => [
          "class" => "green",
          "title" => "낮음(L)"
      ],
      "M" => [
          "class" => "orange",
          "title" => "보통(M)",
      ],
      "H" => [
          "class" => "red",
          "title" => "높음(H)"
      ],
    ];

    $today = date('Ymd');
    $birthday = date('Ymd' , strtotime(Crypt::decryptString($counseling->counselorBirthday)));
    $age     = floor(($today - $birthday) / 10000);
@endphp
<div id="container" class="result">
    <div class="result-inner">
        <div class="result-top">
            <div class="result-code">
                상담코드 :<span class="result-code__data"> {{$counseling->counselingCode}}</span>
            </div>
            <a href="#none" class="result-download" style="display: none">PDF 다운로드</a>
        </div>
        <div class="result-heading">
            <h2 class="result-tit">종합 관찰 결과</h2>
            <div class="total-result__info">
                <div class="total-result__item">
                    <div class="total-result__label">신청자</div>
                    <div class="total-result__data">{{$counseling->counselorName}}</div>
                </div>
                <div class="total-result__item">
                    <div class="total-result__label">아동나이</div>
                    <div class="total-result__data">(만){{$age}}세</div>
                </div>
                <div class="total-result__item">
                    <div class="total-result__label">상담 등록일</div>
                    <div class="total-result__data">{{date_format(date_create($counseling->createDate),"Y-m-d")}}  <span class="total-result__data--time">{{date_format(date_create($counseling->createDate),"H:i")}}</span></div>
                </div>
            </div>
        </div>
        <div class="result-cont">
            <div class="result-tab__wrap">
                <!-- result-tap__btn에 클래스 active 추가시 활성화
                첫번째 버튼, 첫번째 result-data__group에 active추가
                두전째 버튼, 두번째 result-data__group에 active추가
                -->
                <button id="resultTemperament" onclick="changeTab('resultTemperament','temperamentTab')" type="button" class="result-tap__btn active">기질검사</button>
                <button id="resultHTP" onclick="changeTab('resultHTP','HTPTab')" type="button" class="result-tap__btn ">HTP 검사</button>
            </div>
            <!-- 기질검사 -->
            <!-- result-data__group에 클래스 active 추가시 활성화 -->
            <div id="temperamentTab" class="result-data__group active">
                <div class="result-data__cell">
                    <h4 class="result-data__tit">종합척도 점수</h4>
                    <div class="result-data__wrap">
                        <div class="result-graph__wrap">
                            <div class="result-graph">
                                <div class="result-graph__data">
                                    <div class="graph-bar__cell">
                                        <!--  bar에 red, orange, yellow, green 클래스 추가시 색변경-->
                                        <div class="graph-bar">
                                            <div class="bar {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["emotion"])]["class"]}}" style="height: {{$temperamentTest["emotion"]}}%;">
                                                <span class="bar-score">{{$temperamentTest["emotion"]}}점</span>
                                            </div>
                                        </div>
                                        <div class="graph-bar">
                                            <div class="bar {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["action"])]["class"]}}" style="height: {{$temperamentTest["action"]}}%;">
                                                <span class="bar-score">{{$temperamentTest["action"]}}점</span>
                                            </div>
                                        </div>
                                        <div class="graph-bar">
                                            <div class="bar {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipAdaptation"])]["class"]}}" style="height: {{$temperamentTest["relationshipAdaptation"]}}%;">
                                                <span class="bar-score">{{$temperamentTest["relationshipAdaptation"]}}점</span>
                                            </div>
                                        </div>
                                        <div class="graph-bar">
                                            <div class="bar {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipPursuit"])]["class"]}}" style="height: {{$temperamentTest["relationshipPursuit"]}}%;">
                                                <span class="bar-score">{{$temperamentTest["relationshipPursuit"]}}점</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="result-graph__grid">
                                    <div class="graph-x-line"></div>
                                    <div class="graph-x-line"></div>
                                    <div class="graph-x-line"></div>
                                    <div class="graph-x-line"></div>
                                    <div class="graph-x-line"></div>
                                    <div class="graph-x-line"></div>
                                    <div class="graph-x-line"></div>
                                    <div class="graph-x-line"></div>
                                    <div class="graph-x-line"></div>
                                    <div class="graph-x-line"></div>
                                    <div class="graph-x-line"></div>
                                </div>
                                <div class="result-graph-x-labels">
                                    <!-- graph-x-label에 클래스 hide 클래스 추가시 숨김 -->
                                    <div class="graph-x-label">
                                        <div class="label-value">100</div>
                                    </div>
                                    <div class="graph-x-label hide">
                                        <div class="label-value">90</div>
                                    </div>
                                    <div class="graph-x-label hide">
                                        <div class="label-value">80</div>
                                    </div>
                                    <div class="graph-x-label">
                                        <div class="label-value">70</div>
                                    </div>
                                    <div class="graph-x-label hide">
                                        <div class="label-value">60</div>
                                    </div>
                                    <div class="graph-x-label">
                                        <div class="label-value">50</div>
                                    </div>
                                    <div class="graph-x-label hide">
                                        <div class="label-value">40</div>
                                    </div>
                                    <div class="graph-x-label">
                                        <div class="label-value">30</div>
                                    </div>
                                    <div class="graph-x-label hide">
                                        <div class="label-value">20</div>
                                    </div>
                                    <div class="graph-x-label hide">
                                        <div class="label-value">10</div>
                                    </div>
                                </div>
                                <div class="result-graph-y-labels">
                                    <div class="graph-y-label">
                                        <div class="graph-y-value">정서표현</div>
                                    </div>
                                    <div class="graph-y-label">
                                        <div class="graph-y-value">행동표현</div>
                                    </div>
                                    <div class="graph-y-label">
                                        <div class="graph-y-value">관계적응</div>
                                    </div>
                                    <div class="graph-y-label">
                                        <div class="graph-y-value">관계추구</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="result-analysis__table">
                            <thead class="analysis-table__head">
                            <tr>
                                <th style="width: 16.36%;" class="hei-40">척도명</th>
                                <th style="width: 83.64%;" class="hei-40">해석</th>
                            </tr>
                            </thead>
                            <tbody class="analysis-table__body">
                            <tr>
                                <td>
                                    <span class="analysis-table__label">정서표현</span>
                                </td>
                                <td>
                                    <p class="analysis-table__desc">
                                        여러 가지 감정을 불러일으키는 기분이나 분위기를 적절한 말로 표현하고, 상황에 맞는 행동이나 표정으로 나타낼 수 있는 영역을 의미한다.
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="analysis-table__label">행동표현</span>
                                </td>
                                <td>
                                    <p class="analysis-table__desc">
                                        구성적인 행동 경향은 개인의 특성으로 여러 상황, 활동(activity)에서 나타난다. 해당 영역은 내적 혹은 외적 자극에 의한 행동 반응 영역을 의미한다.
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="analysis-table__label">관계 적응</span>
                                </td>
                                <td>
                                    <p class="analysis-table__desc">
                                        대인관계에서 발생하는 영향을 적절하고 유익하게 대처하는 능력으로, 둘 이상의 낯선 대인관계 상황에 놓일 때 얼마만큼 적응하면서 조화를 이루는가를 살피는 영역을 의미한다.
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="analysis-table__label">관계 추구</span>
                                </td>
                                <td>
                                    <p class="analysis-table__desc">
                                        사람에 대한 자극이나 잠재적인 보상 단서에 접할 경우 관계 자극에 끌리면서 행동이 활성화 되는 영역을 의미한다.
                                    </p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="result-data__cell">
                    <h4 class="result-data__tit">세부분석 결과</h4>
                    <!-- 정서지수 -->
                    <div class="result-data__wrap">
                        <div class="result-label__group">
                            <div class="result-label">정서 지수 </div>
                            <div class="result-desc">정서표현 척도는 부정정서 표출과 통제를 측정하기 위한 척도입니다.</div>
                        </div>
                        <table class="result-analysis__table">
                            <thead class="analysis-table__head">
                            <tr>
                                <th class="hei-60" rowspan="2" style="width: 18.7935%;">항목</th>
                                <th class="hei-60" rowspan="2" style="width: 24.3619%">낮음</th>
                                <th colspan="3" style="width: 32.4826%">보통</th>
                                <th class="hei-60" rowspan="2" style="width: 24.362%;">높음</th>
                            </tr>
                            <tr>
                                <th>보통이하</th>
                                <th>보통</th>
                                <th>보통이상</th>
                            </tr>
                            </thead>
                            <tbody class="analysis-table__body">
                            <tr>
                                <td>
                                    <span class="analysis-table__label">정서표현</span>
                                </td>
                                <td colspan="5">
                                    <div class="analysis-table__graph">
                                        <!--  table-graph__bar에 red, orange, yellow, green 클래스 추가시 색변경-->
                                        <div class="table-graph__bar {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["emotion"])]["class"]}}" style="width: {{$temperamentTest["emotion"]}}%;"></div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="analysis-score__cell">
                            <!--  analysis-score__data에 red, orange, yellow, green 클래스 추가시 색변경-->
                            <div class="analysis-score__data {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["emotion"])]["class"]}}">{{$temperamentTest["emotion"]}}점</div>
                        </div>
                        <div class="result-label__group">
                            <div class="result-desc">※30 이하 : <span>정서적 절제(Emotional Moderation), 자신이 느끼는 부정정서를 외부로 보이지 않고 심사숙고하는 경향</span></div>
                            <div class="result-desc">※70 이상 : <span>정서적 폭발(Emotional Outburst), 강한 감정 표현형으로 자신이 원하는 것과 원하지 않는 것에 대한 선호도가 분명함</span></div>
                        </div>
                        <div class="analysis-result__wrap">
                            <!-- analysis-result의 span에  red, orange, yellow, green 클래스 추가시 색변경-->
                            <div class="analysis-result">∙ 정서 지수는 <span class="{{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["emotion"])]["class"]}}">
                                    {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["emotion"])]["title"]}}
                                </span> 수준입니다.</div>
                            <div class="analysis-result__desc">
                                {!! CounselingTemplate::$temperamentTestLevelInfo['emotion'][$counselingTemplate->getTemperamentTestLevel($temperamentTest["emotion"])] !!}
                            </div>
                        </div>
                    </div>
                    <!-- 행동지수 -->
                    <div class="result-data__wrap">
                        <div class="result-label__group">
                            <div class="result-label">행동 지수 </div>
                            <div class="result-desc">행동표현(활동성)의 척도는 아동의 전체적 활동량을 측정하기 위한 척도입니다.</div>
                        </div>
                        <table class="result-analysis__table">
                            <thead class="analysis-table__head">
                            <tr>
                                <th class="hei-60" rowspan="2" style="width: 18.7935%;">항목</th>
                                <th class="hei-60" rowspan="2" style="width: 24.3619%">낮음</th>
                                <th colspan="3" style="width: 32.4826%">보통</th>
                                <th class="hei-60" rowspan="2" style="width: 24.362%;">높음</th>
                            </tr>
                            <tr>
                                <th>보통이하</th>
                                <th>보통</th>
                                <th>보통이상</th>
                            </tr>
                            </thead>
                            <tbody class="analysis-table__body">
                            <tr>
                                <td>
                                    <span class="analysis-table__label">정서표현</span>
                                </td>
                                <td colspan="5">
                                    <div class="analysis-table__graph">
                                        <!--  table-graph__bar에 red, orange, yellow, green 클래스 추가시 색변경-->
                                        <div class="table-graph__bar {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["action"])]["class"]}}" style="width: {{$temperamentTest["action"]}}%;"></div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="analysis-score__cell">
                            <!--  analysis-score__data에 red, orange, yellow, green 클래스 추가시 색변경-->
                            <div class="analysis-score__data {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["action"])]["class"]}}">{{$temperamentTest["action"]}}점</div>
                        </div>
                        <div class="result-label__group">
                            <div class="result-desc">※30 이하 : <span>비활동적 행동표현(Inactive Behavior), 비활동적인 것을 좋아하고 스스로는 좀처럼 지루해하지 않으며, 자신에게 익숙한 방식을 고수하려는 경향.</span></div>
                            <div class="result-desc">※70 이상 : <span>자유 분방(Freewheeling), 강한 행동 표현형으로 새로운 자극에 이끌려 행동이 활성화되는 성향.</span></div>
                        </div>
                        <div class="analysis-result__wrap">
                            <!-- analysis-result의 span에  red, orange, yellow, green 클래스 추가시 색변경-->
                            <div class="analysis-result">∙ 행동 지수는 <span class="{{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["action"])]["class"]}}">
                                    {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["action"])]["title"]}}
                                </span> 수준입니다.</div>
                            <div class="analysis-result__desc">
                                {!! CounselingTemplate::$temperamentTestLevelInfo['action'][$counselingTemplate->getTemperamentTestLevel($temperamentTest["action"])] !!}
                            </div>
                        </div>
                    </div>
                    <!-- 관계적용 지수 -->
                    <div class="result-data__wrap">
                        <div class="result-label__group">
                            <div class="result-label">관계적응 지수</div>
                            <div class="result-desc">관계적응의 척도는 아동이 낯선 상황이나 낯선 환경에 대한 적응방식을 측정하기 위한 척도입니다.</div>
                        </div>
                        <table class="result-analysis__table">
                            <thead class="analysis-table__head">
                            <tr>
                                <th class="hei-60" rowspan="2" style="width: 18.7935%;">항목</th>
                                <th class="hei-60" rowspan="2" style="width: 24.3619%">낮음</th>
                                <th colspan="3" style="width: 32.4826%">보통</th>
                                <th class="hei-60" rowspan="2" style="width: 24.362%;">높음</th>
                            </tr>
                            <tr>
                                <th>보통이하</th>
                                <th>보통</th>
                                <th>보통이상</th>
                            </tr>
                            </thead>
                            <tbody class="analysis-table__body">
                            <tr>
                                <td>
                                    <span class="analysis-table__label">정서표현</span>
                                </td>
                                <td colspan="5">
                                    <div class="analysis-table__graph">
                                        <!--  table-graph__bar에 red, orange, yellow, green 클래스 추가시 색변경-->
                                        <div class="table-graph__bar {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipAdaptation"])]["class"]}}" style="width: {{$temperamentTest["relationshipAdaptation"]}}%;"></div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="analysis-score__cell">
                            <!--  analysis-score__data에 red, orange, yellow, green 클래스 추가시 색변경-->
                            <div class="analysis-score__data {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipAdaptation"])]["class"]}}">{{$temperamentTest["relationshipAdaptation"]}}점</div>
                        </div>
                        <div class="result-label__group">
                            <div class="result-desc">※30 이하 : <span>자발적 관계적응(Voluntary relational adaptation), 사람에 대한 관심, 신뢰, 믿음이 있으며 낯선 환경에 개방적인 성향.</span></div>
                            <div class="result-desc">※70 이상 : <span>비자발적 관계적응 / 수줍음(involuntary relational adaptation / shyness), 낯선 환경에 놓일 때 생길 수 있는 위험에 대비해 조심스럽고 신중하게 접근하는 경향</span></div>
                        </div>
                        <div class="analysis-result__wrap">
                            <!-- analysis-result의 span에  red, orange, yellow, green 클래스 추가시 색변경-->
                            <div class="analysis-result">∙ 관계적용 지수는 <span class="{{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipAdaptation"])]["class"]}}">
                                    {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipAdaptation"])]["title"]}}</span> 수준입니다.</div>
                            <div class="analysis-result__desc">
                                {!! CounselingTemplate::$temperamentTestLevelInfo['relationshipAdaptation'][$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipAdaptation"])] !!}
                            </div>
                        </div>
                    </div>
                    <!-- 관계추구 지수 -->
                    <div class="result-data__wrap">
                        <div class="result-label__group">
                            <div class="result-label">관계추구 지수</div>
                            <div class="result-desc">관계추구 척도는 긴밀한 대인관계를 맺기 위해 외향적 관계추구 혹은 내향적 관계추구를 측정하기 위한 척도입니다.</div>
                        </div>
                        <table class="result-analysis__table">
                            <thead class="analysis-table__head">
                            <tr>
                                <th class="hei-60" rowspan="2" style="width: 18.7935%;">항목</th>
                                <th class="hei-60" rowspan="2" style="width: 24.3619%">낮음</th>
                                <th colspan="3" style="width: 32.4826%">보통</th>
                                <th class="hei-60" rowspan="2" style="width: 24.362%;">높음</th>
                            </tr>
                            <tr>
                                <th>보통이하</th>
                                <th>보통</th>
                                <th>보통이상</th>
                            </tr>
                            </thead>
                            <tbody class="analysis-table__body">
                            <tr>
                                <td>
                                    <span class="analysis-table__label">정서표현</span>
                                </td>
                                <td colspan="5">
                                    <div class="analysis-table__graph">
                                        <!--  table-graph__bar에 red, orange, yellow, green 클래스 추가시 색변경-->
                                        <div class="table-graph__bar {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipPursuit"])]["class"]}}" style="width:{{$temperamentTest["relationshipPursuit"]}}%;"></div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="analysis-score__cell">
                            <!--  analysis-score__data에 red, orange, yellow, green 클래스 추가시 색변경-->
                            <div class="analysis-score__data {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipPursuit"])]["class"]}}">{{$temperamentTest["relationshipPursuit"]}}점</div>
                        </div>
                        <div class="result-label__group">
                            <div class="result-desc">※30 이하 : <span>내향적 관계추구(Introverted Relationship), 자기 내면에 집중하는 기질로 깊이 있는 관계를 유지하면서 소수의 사람과 밀접한 관계를 이어가는 경향.</span></div>
                            <div class="result-desc">※70 이상 : <span>외향적 관계추구(Extroverted Relationship), 열정적이고 사교적인 특성이 있어서 타인과 함께할 때 즐거움을 느끼고 협조적인 경향</span></div>
                        </div>
                        <div class="analysis-result__wrap">
                            <!-- analysis-result의 span에  red, orange, yellow, green 클래스 추가시 색변경-->
                            <div class="analysis-result">∙ 정서 지수는 <span class="{{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipPursuit"])]["class"]}}">
                                    {{$levelInfo[$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipPursuit"])]["title"]}}
                                </span> 수준입니다.</div>
                            <div class="analysis-result__desc">
                                {!! CounselingTemplate::$temperamentTestLevelInfo['relationshipPursuit'][$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipPursuit"])] !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- HTP검사 -->
            <!-- result-data__group에 클래스 active 추가시 활성화 -->
            <div id="HTPTab" class="result-data__group" >
                <div class="result-data__cell">
                    <h4 class="result-data__tit">아이그림</h4>
                    <div class="result-data__wrap">
                        <div class="child-painting__wrap">
                            <div class="child-painting__item">
                                <div class="child-painting__photo">
                                    <img src="{{(isset($images["tree"]))?URL::asset("/storage/image/thumb/".$images["tree"]):""}}" alt="" class="child-painting__img">
                                </div>
                                <div class="child-painting__label">나무</div>
                            </div>
                            <div class="child-painting__item">
                                <div class="child-painting__photo">
                                    <img src="{{(isset($images["tree"]))?URL::asset("/storage/image/thumb/".$images["house"]):""}}" alt="" class="child-painting__img">
                                </div>
                                <div class="child-painting__label">집</div>
                            </div>
                            <div class="child-painting__item">
                                <div class="child-painting__photo">
                                    <img src="{{(isset($images["person1"]))?URL::asset("/storage/image/thumb/".$images["person1"]):""}}" alt="" class="child-painting__img">
                                </div>
                                <div class="child-painting__label">사람1</div>
                            </div>
                            <div class="child-painting__item">
                                <div class="child-painting__photo">
                                    <img src="{{(isset($images["person2"]))?URL::asset("/storage/image/thumb/".$images["person2"]):""}}" alt="" class="child-painting__img">
                                </div>
                                <div class="child-painting__label">사람2</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="result-data__cell">
                    <h4 class="result-data__tit">HTP의 구조적 분석 영역</h4>
                    <div class="result-data__wrap">
                        <div class="result-data__view">
                            <div class="displayCounselingResult" id="view-edit">
                                {!! $counseling->counselingResult !!}
                            </div>
                        </div>
                        <div class="result-counselor__info">
                            <div class="counselor-info__left">
                                <div class="counselor-info__top">
                                    <div class="counselor-info__name">{{$advisorName}} 상담사</div>
                                    <div class="counselor-info__work">{{$advisorCenter}}</div>
                                </div>
                                <div class="counselor-info__carrier">
                                    @foreach($advisorEducationLevel as $advisorEducationLevelRow)
                                        {{$advisorEducationLevelRow->school}} {{$educationCode[$advisorEducationLevelRow->degree]}},
                                    @endforeach
                                </div>
                            </div>
                            <div class="counselor-info__right">
                                <div class="counselor-info__photo">
                                    <img src="{{URL::asset('/storage/image/profile/'.$advisorImage)}}" alt="" class="counselor-info__img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- result-inner -->
</div> <!-- container end-->
<script src="../assets/js/common.js"></script>
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
    function changeTab(id, tab) {
        $("#resultTemperament").removeClass("active");
        $("#resultHTP").removeClass("active");

        $("#temperamentTab").removeClass("active");
        $("#HTPTab").removeClass("active");

        $("#"+id).addClass("active");
        $("#"+tab).addClass("active");
    }11
</script>
</body>
</html>
