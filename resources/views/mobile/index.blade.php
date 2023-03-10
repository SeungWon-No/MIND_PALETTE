@include('/mobile/common/start')
@include('/mobile/common/header',["isShowBackButton" => false,"isShowCloseButton"=>false])
@php
use Illuminate\Support\Facades\Crypt;

    $iconClass = ["orange","blue","red","green"];
    $rowIndex = 0;
@endphp
<section id="container" class="page-body">
    <div class="page-contents">
        <div class="main-wrap">
            <div class="main-visual">
                <h2 class="main-visual-title">내 아이를 위한<br>최상의 마음 케어</h2>
                <div class="main-visual-desc">센터에 방문하지 않고 가정에서 보호자의 지도에 따라 HTP 검사를 통해 아이의 심리상태를 진단하실 수 있습니다.</div>
                <div class="main-visual-ui"><a href="javascript:advice()">상담 신청하기</a></div>
            </div>
            <div class="main-body">
                <div class="basic-data-group">
                    <div class="point-note">
                        <button type="button" class="btn-point-note-nav"><em>추가 상담 안내사항</em></button>
                        <div class="point-note-desc"><div class="txt">검사 이후 추가 상담 및 치료가 필요한 분들은 전문 상담사가 소속된 센터나, 가까운 심리 상담 센터에 방문해서 후속 상담 및 치료를 받으실 수 있습니다.</div></div>
                    </div>
                </div>
                @if($counselingCount > 0)
                    <div class="basic-data-group">
                        <div class="main-advice-list">
                            <div class="gallery-list-wrap">
                                <div class="gallery-list-top">
                                    <div class="gallery-list-title">우리 아이 상담 내역<em>{{number_format($counselingCount)}}</em></div>
                                    <a href="/mypage" class="btn-more-ui">더보기</a>
                                </div>
                                <div class="gallery-list-body">
                                    <div class="horizontal-swiper-scoller">
                                        <div class="scoller-inner">
                                            <div class="scoller-list">

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
                                                            @if($counseling->type == "FREE")
                                                                <div class="thumb">
                                                                    <div class="advice-free">
                                                                        <em></em><strong>마음팔레트 무료 상담
                                                                            @if(isset($counselingStatus[$counseling->counselingStatus]))
                                                                                {{$counselingStatus[$counseling->counselingStatus]["title"]}}
                                                                            @endif</strong>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                @if($payStatus == "write")
                                                                    <div class="thumb">
                                                                        <div class="advice-ing">
                                                                            <em></em><strong>상담 신청을 완료해주세요.</strong>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <div class="thumb">
                                                                    @if(isset($HTPImageRow[$counseling->PK]))
                                                                        <img src="/storage/image/thumb/{{$HTPImageRow[$counseling->PK]}}" alt=""/>
                                                                    @endif
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        </div>

                                                        <div class="item-info">
                                                            <div class="item-icon"><div class="icon icon-page-user-{{$iconClass[$rowIndex]}}-bg"></div></div>
                                                            <div class="item-data">
                                                                <div class="item-name">{{$counseling->counselorName}}</div>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="basic-data-group">
                    <h3 class="con-title">About</h3>
                    <div class="main-about">
                        <div class="main-about-inner">
                            <div class="main-about-cell">
                                <a href="/HTPInformation" class="card-item card-icon">
                                    <div class="item-icon"><div class="icon icon-ui-draw"></div></div>
                                    <div class="item-subject">HTP 검사란?</div>
                                </a>
                            </div>
                            <div class="main-about-cell">
                                <a href="/adviceProcessInformation" class="card-item card-icon">
                                    <div class="item-icon"><div class="icon icon-ui-text"></div></div>
                                    <div class="item-subject">검사 진행 방법</div>
                                </a>
                            </div>
                            <div class="main-about-cell">
                                <a href="/freeAdviceRequest" class="card-item card-banner blue">
                                    <div class="item-info">
                                        <div class="item-subject"><em class="font-color-darkblue">마음팔레트 무료 상담 체험</em></div>
                                        <div class="item-desc">30가지 문항으로 우리 아이의<br>상태를 체크해보세요.</div>
                                    </div>
                                    <div class="item-icon"><img src="../mobile/assets/images/icon/icon-banner-document.png" alt="" width="54"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-footer">
                <div class="basic-data-group msmall">
                    <div class="basic-data-group">
                        <h3 class="con-title">전문 상담사 소개</h3>
                        <div class="main-advice-teacher">
                            <div class="horizontal-swiper-scoller">
                                <div class="scoller-inner">
                                    <div class="scoller-list">
                                        @foreach($advisor as $advisorRow)
                                        <div class="card-item card-user">
                                            <div class="thumb-wrap">
                                                <div class="thumb"><img src="{{URL::asset('/storage/image/profile/'.$advisorRow->profilePath)}}" onerror="this.src='/advisorAssets/assets/images/user-profile.jpg'" alt=""></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-info-inner">
                                                    <div class="item-name"><strong>{{Crypt::decryptString($advisorRow->advisorName)}}</strong> 전문의</div>
                                                    <div class="item-store">{{$advisorRow->centerName}}</div>
                                                    <div class="item-stats">
                                                        <div class="icon-like"><em>{{number_format($advisorRow->rating)}}</em></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="basic-data-group">
                        <h3 class="con-title">안내</h3>
                        <div class="main-info">
                            <a href="#" class="card-item card-banner">
                                <div class="item-info">
                                    <div class="item-subject"><em class="font-color-darkred">바우처 프로그램</em></div>
                                    <div class="item-desc">마음팔레트에서 운영중인<br>프로그램을 소개합니다.</div>
                                </div>
                                <div class="item-icon"><img src="../mobile/assets/images/icon/icon-banner-program.png" alt="" width="72"></div>
                            </a>
                            <a href="/counselingCenter" class="card-item card-banner">
                                <div class="item-info">
                                    <div class="item-subject"><em class="font-color-darkblue">인근 상담 센터</em></div>
                                    <div class="item-desc">가장 가까운 곳에서<br>정확한 진단을 받아보세요.</div>
                                </div>
                                <div class="item-icon"><img src="../mobile/assets/images/icon/icon-banner-store.png" alt="" width="72"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function advice() {
        @if($isLogin)
            location.href = '/adviceAgree';
        @else
            location.href = '/login';
        @endif
    }
</script>
@include('/mobile/common/footer')
@include('/mobile/common/end')

