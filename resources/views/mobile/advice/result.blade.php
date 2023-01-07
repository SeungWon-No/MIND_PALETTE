@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => false,
    "title" => "HTP 상담 결과"
])
@php
    use App\Http\Util\CounselingTemplate;
    $counselingTemplate = new CounselingTemplate;

    $levelColor = [
      "L" => "green",
      "M" => "orange",
      "H" => "red"
    ];

    $levelTitle = [
      "L" => "낮음(L)수준",
      "M" => "보통(M)수준",
      "H" => "높음(H)수준"
    ];
@endphp
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
                                    <strong>{{Crypt::decryptString($counseling->counselorName)}}</strong>
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
                        <button type="button" class="btn-result-tab-nav actived">기질검사</button>
                        <button type="button" class="btn-result-tab-nav">HTP검사</button>
                    </div>
                    <div class="result-tab-data">
                        <!-- 기질검사 -->
                        <!-- actived 클래스 추가시 활성화 -->
                        <div class="tab-data actived">
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
                                                                 class="bar {{$levelColor[$counselingTemplate->getTemperamentTestLevel($temperamentTest["emotion"])]}}"></div>
                                                        </div>
                                                        <div class="graph-data-bar">
                                                            <div style="height:{{$temperamentTest["action"]}}%;"
                                                                 class="bar {{$levelColor[$counselingTemplate->getTemperamentTestLevel($temperamentTest["action"])]}}"></div>
                                                        </div>
                                                        <div class="graph-data-bar">
                                                            <div style="height:{{$temperamentTest["relationshipAdaptation"]}}%;"
                                                                 class="bar {{$levelColor[$counselingTemplate->getTemperamentTestLevel($temperamentTest["relationshipAdaptation"])]}}"></div>
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
                                                        <div class="graph-x-line"></div>
                                                        <div class="graph-x-line"></div>
                                                        <div class="graph-x-line"></div>
                                                        <div class="graph-x-line green-line point-line"></div>
                                                        <div class="graph-x-line"></div>
                                                        <div class="graph-x-line"></div>
                                                        <div class="graph-x-line yellow-line point-line"></div>
                                                        <div class="graph-x-line "></div>
                                                        <div class="graph-x-line"></div>
                                                        <div class="graph-x-line"></div>
                                                        <div class="graph-x-line red-line point-line"></div>
                                                    </div>
                                                </div>
                                                <div class="graph-x-labels">
                                                    <!-- hide클래스 추가시 숨김 -->
                                                    <div class="graph-x-label hide"><div class="label-value">0</div></div>
                                                    <div class="graph-x-label hide"><div class="label-value">10</div></div>
                                                    <div class="graph-x-label hide"><div class="label-value">20</div></div>
                                                    <div class="graph-x-label"><div class="label-value">32</div></div>
                                                    <div class="graph-x-label hide"><div class="label-value">40</div></div>
                                                    <div class="graph-x-label hide"><div class="label-value">50</div></div>
                                                    <div class="graph-x-label "><div class="label-value">64</div></div>
                                                    <div class="graph-x-label hide"><div class="label-value">70</div></div>
                                                    <div class="graph-x-label hide"><div class="label-value">80</div></div>
                                                    <div class="graph-x-label hide"><div class="label-value">90</div></div>
                                                    <div class="graph-x-label "><div class="label-value">100</div></div>
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
                                                                <div class="bar {{$levelColor[$counselingTemplate->getTemperamentTestLevel($temperamentTest["emotion"])]}}" style="width:{{$temperamentTest["emotion"]}}%;"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="result-analysis-graph-value">
                                                <div class="item-value">
                                                    <strong class="font-color-{{$levelColor[$counselingTemplate->getTemperamentTestLevel($temperamentTest["emotion"])]}}">{{$temperamentTest["emotion"]}}점</strong>
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
                                            <strong class="font-color-{{$levelColor[$counselingTemplate->getTemperamentTestLevel($temperamentTest["emotion"])]}}">
                                                {{$levelTitle[$counselingTemplate->getTemperamentTestLevel($temperamentTest["emotion"])]}}
                                            </strong>입니다.
                                        </div>
                                        <div class="result-desc">이 척도에서 높은 점수를 보이는 자녀는 강한 감정 표현형으로 자신이 원하는 것과 원하지 않는 것에 대한 선호도가 분명할 수 있습니다. 타인이 정해놓은 규칙이나 행동들보다는 자유롭게 자신이 추구하는 즐거움을 탐색하려는 모습이 강하며, 심리적으로 좌절스럽거나 불편한 상황을 잘 견디지 못하고 피하려는 경향을 보일 수 있습니다.<br><br>부정 정서는 주로 개인의 목표와 일치하지 않는 일을 경험할 때 발생한다는 점에서 대체로 자녀가 경험하고 싶어 하지 않은 정서라고 볼 수 있습니다. 그러나 그러한 느낌을 잘 알아차리고, 이를 자신의 것으로 수용하고, 표현할 수 있는 능력을 키우는 것은 자녀가 건강한 삶을 영위하는데 매우 중요합니다.<br><br>부모가 자녀를 관찰하였을 때, 사소한 일에도 쉽게 성을 내고 분노를 밖으로 드러낸다면 이 부분을 살펴보시기 바랍니다. 자녀는 현재 정서교육이 필요한 시기입니다.잦은 부정적 정서 폭발은 자신과 타인이 합의되지 않은 상황에서 극적으로 이루어지므로 자녀는 부정적 피드백에 노출되거나 자기통제에 실패했다는 반복적 경험으로 낮은 자존감을 초래할 수 있습니다.부모는 쉽게 폭발하는 자녀의 정서에 크게 반응하거나 제한하기보다는 감정과 행동을 읽어주며, 부모가 느끼는 감정도 알려줄 필요가 있습니다. 부정적인 감정에 대해서 언어로 적절히 표현할 수 있고, 자율성과 책임감을 기를 수 있습니다.</div>
                                    </div>
                                </div>
                                <!-- btn클래스에 disabled클래스 추가시 비활성화 표현 -->
                                <div class="page-bottom-ui small"><a href="#" class="btn btn-orange btn-large-size btn-page-action">HTP검사 결과 보기</a></div>
                            </div>
                        </div>
                        <!-- //기질검사 -->
                        <!-- HTP검사 -->
                        <!-- actived 클래스 추가시 활성화 -->
                        <div class="tab-data actived">
                            <div class="result-card">
                                <div class="result-htp-top">
                                    <h3 class="con-title">우리 아이 HTP검사 결과</h3>
                                    <!-- 23.01.04 문구수정 -->
                                    <div class="item-detail">
                                        <div class="item-title"><div class="icon icon-note-warning"></div><h4>아동심리전문가 소견</h4></div>
                                        <div class="item-desc">집, 나무, 사람 그림검사의 해석이란 htp그림을 통하여 성격의 여러 면을 밝혀나가는 것을 말합니다. 이 해석은 htp검사와 함께 사용하는 다른 심리검사의 결과와 행동관찰, PDI(사후질문과정)를 고려하고, 피검자에게 적용하기에 가장 적절하고 유용할 것으로 판단되는 이론적 틀에 따라 종합적이고 전체적으로 해석 되어져야 합니다.<br><br>즉 그림만 가지고 성격의 단면을 추론하는 맹분석(blind analysis)의 해석은 위험한 것이라고 할 수 있습니다. 때문에 이 검사의 해석은 자녀의 단편적인 모습을 보여줄 수 있을 뿐 추후 보다 정확한 검사를 원할 시 전문가를 찾아 재수행하는 것이 좋습니다.</div>
                                    </div>
                                    <!--// 23.01.04 문구수정 -->
                                </div>
                                <div class="result-htp-view">
                                    에디터영역
                                </div>
                            </div>
                            <!-- btn클래스에 disabled클래스 추가시 비활성화 표현 -->
                            <div class="page-bottom-ui small"><a href="#" class="btn btn-orange btn-large-size btn-page-action">기질검사 결과 보기</a></div>
                            <div class="basic-data-group">
                                <div class="result-card">
                                    <div class="result-card-master">
                                        <h3 class="con-title">상담은 만족스러우셨나요?</h3>
                                        <div class="master-info-wrap">
                                            <div class="item-thumb"><div class="thumb"><img src="../assets/images/user_thumb.png" alt=""/></div></div>
                                            <!-- 23.01.04 수정 -->
                                            <div class="item-info">
                                                <div class="item-name"><strong>김아무</strong> 상담사</div>
                                                <div class="item-history">
                                                    <!-- 現 한자고정 -->
                                                    <div class="txt blue"><strong class="font-color-blue">現 사랑 마음 상담 센터</strong></div>
                                                    <div class="txt">서*대학교 의학 학사</div>
                                                    <div class="txt">서*대 대학원 의학 석사</div>
                                                    <div class="txt">사랑 마음 상담센터 전문의</div>
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
                                                <div class="page-bottom-ui"><a href="#" class="btn btn-orange btn-large-size btn-page-action disabled">상담사 후기 등록</a></div>
                                                <div class="page-bottom-ui"><a href="#" class="btn btn-orange btn-large-size btn-page-action">상담사 후기 등록</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="basic-data-group small">
                                <div class="card-item card-store">
                                    <div class="item-info">
                                        <div class="item-name">사랑 마음 상담센터</div>
                                        <div class="item-address">인천 부평구 부평대로 337 1239호</div>
                                        <div class="item-btns">
                                            <a href="#" class="btn-ui">전화하기</a>
                                            <a href="#" class="btn-ui">사이트 방문하기</a>
                                        </div>
                                    </div>
                                    <div class="item-thumb">
                                        <div class="thumb-wrap">
                                            <div class="thumb"><img src="../assets/images/user_thumb.png" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- //HTP검사 -->
                    </div>
                </div>
            </div>
            <div class="basic-data-group middle">
                <div class="service-review-wrap">
                    <div class="item-desc"><strong>마음팔레트 서비스</strong>는 어떠셨나요?<br>별점을 남겨주시면 서비스 개선에 도움이 됩니다.</div>
                    <div class="item-check">
                        <div class="review-check-group">
                            <!-- actived클래스 추가시 활성화 -->
                            <button type="button" class="btn-review-nav actived">1점</button>
                            <button type="button" class="btn-review-nav">2점</button>
                            <button type="button" class="btn-review-nav">3점</button>
                            <button type="button" class="btn-review-nav">4점</button>
                            <button type="button" class="btn-review-nav">5점</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('/mobile/common/end')

