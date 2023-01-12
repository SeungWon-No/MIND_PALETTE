@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "title" => "마이페이지"
])
@php
    $userEmail = session("login")[0]['memberEmail'] ?? '';
    $userName = session("login")[0]['memberName'] ?? '';

    $iconClass = ["orange","blue","red","green"];
    $rowIndex = 0;
@endphp
<section id="container" class="page-body">
    <div class="page-contents">
        <div class="mypage-main">
            <div class="mypage-main-info">
                <div class="item-icon">
                    <div class="icon icon-page-user-orange"></div>
                </div>
                <div class="item-info">
                    <div class="item-name">{{$userName}}님, 반가워요!</div>
                    <div class="item-mail">{{$userEmail}}</div>
                </div>
                <div class="item-ui"><a href="/logout" class="btn-logout">로그아웃</a></div>
            </div>
            <div class="mypage-menu">
                <a href="/MyPage/passwordChange" class="btn-mypage-menu">
                    <div class="icon icon-password-gray"></div>
                    <div class="txt">비밀번호 변경</div>
                </a>
                <a href="/MyPage/changePhone" class="btn-mypage-menu">
                    <div class="icon icoh-phone-gray"></div>
                    <div class="txt">전화번호 변경</div>
                </a>
                <a href="/MyPage/AppSetting" class="btn-mypage-menu">
                    <div class="icon icon-setting-gray"></div>
                    <div class="txt">앱 설정</div>
                </a>
            </div>
            <div class="gallery-list-wrap">
                <div class="gallery-list-top">
                    <div class="gallery-list-title">우리 아이 상담 내역<em>{{$counselingCount}}</em></div>
                    <a href="/MyPage/payList" class="btn-more-ui">결제내역</a>
                </div>
                <div class="gallery-list-body">
                    <!-- 내용이 있을 때 -->
                    <!-- 23.01.04 아이콘 변경 -->
                    @if ($counselingCount > 0)
                    <div class="gallery-list-group">
                        @foreach($counselingRow as $counseling)
                            @php
                                $link = "#";
                                $payStatus = "matching";
                                if ($counseling->type == "PAY") {
                                    if (in_array($counseling->counselingStatus, $payCounselingWritingCode)) {
                                        $payStatus = "write";
                                        $link = "/".$statusCode[$counseling->counselingStatus]."/".$counseling->PK;
                                    } else if ($counseling->counselingStatus == "281") {
                                        $payStatus = "complete";
                                        $link = "/HTPResult/".$counseling->PK;
                                    }
                                } else {
                                    $link = $counselingStatus[$counseling->counselingStatus]["link"].$counseling->PK;
                                }
                            @endphp
                            <a href="{{$link}}" class="gallery-list-item">
                                <div class="item-thumb">
                                    <div class="thumb">
                                        @if($counseling->type == "FREE")
                                            <div class="advice-free">
                                                <em></em><strong>마음팔레트 무료 상담
                                                    @if(isset($counselingStatus[$counseling->counselingStatus]))
                                                        {{$counselingStatus[$counseling->counselingStatus]["title"]}}
                                                    @endif
                                                </strong>
                                            </div>
                                        @else
                                            @if($payStatus == "write")
                                                <div class="thumb">
                                                    <div class="advice-ing">
                                                        <em></em><strong>상담 신청을 완료해주세요.</strong>
                                                    </div>
                                                </div>
                                            @else
                                                <img src="/storage/image/thumb/{{$HTPImageRow[$counseling->PK]}}" alt=""/>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item-icon"><div class="icon icon-page-user-{{$iconClass[$rowIndex]}}-bg"></div></div>
                                    <div class="item-data">
                                        <div class="item-name">{{Crypt::decryptString($counseling->counselorName)}}</div>
                                        <div class="item-date">{{$counseling->updateDate}}</div>
                                    </div>
                                    @if($counseling->type == "FREE" && isset($counselingStatus[$counseling->counselingStatus]))
                                    <div class="item-state">
                                        <div class="label label-{{$counselingStatus[$counseling->counselingStatus]["class"]}}">
                                            {{$counselingStatus[$counseling->counselingStatus]["status"]}}
                                        </div>
                                    </div>
                                    @elseif($counseling->type == "PAY")
                                        <div class="item-state">
                                            <div class="label label-{{$payCounselingStatus[$payStatus]["class"]}}">
                                                {{$payCounselingStatus[$payStatus]["status"]}}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </a>
                            @php
                                if($rowIndex == 3) {
                                    $rowIndex = 0;
                                } else {
                                    $rowIndex++;
                                }
                            @endphp
                        @endforeach
                    </div>
                    @else
                    <div class="none-list-data">내용이 없습니다.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@include('/mobile/common/end')

