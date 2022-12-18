@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "title" => "마이페이지"
])
@php
    $userEmail = session("login")[0]['memberEmail'] ?? '';
    $userName = session("login")[0]['memberName'] ?? '';
@endphp
<section id="container" class="page-body">
    <div class="page-contents">
        <div class="mypage-main">
            <div class="mypage-main-info">
                <div class="item-icon">
                    <div class="icon icon-mypage-user"></div>
                </div>
                <div class="item-info">
                    <div class="item-name">{{$userName}}님, 반가워요!</div>
                    <div class="item-mail">{{$userEmail}}</div>
                </div>
                <div class="item-ui"><a href="/logout" class="btn-logout">로그아웃</a></div>
            </div>
            <div class="mypage-menu">
                <a href="#" class="btn-mypage-menu">
                    <div class="icon icon-password-gray"></div>
                    <div class="txt">비밀번호 변경</div>
                </a>
                <a href="#" class="btn-mypage-menu">
                    <div class="icon icoh-phone-gray"></div>
                    <div class="txt">전화번호 변경</div>
                </a>
                <a href="#" class="btn-mypage-menu">
                    <div class="icon icon-setting-gray"></div>
                    <div class="txt">앱 설정</div>
                </a>
            </div>
            <div class="gallery-list-wrap">
                <div class="gallery-list-top">
                    <div class="gallery-list-title">우리 아이 상담 내역<em>3</em></div>
                    <a href="#" class="btn-more-ui">결제내역</a>
                </div>
                <div class="gallery-list-body">
                    <!-- 내용이 있을 때 -->
                    <div class="gallery-list-group">
                        <a href="#" class="gallery-list-item">
                            <div class="item-thumb">
                                <div class="thumb"><img src="../assets/images/@picture.png" alt=""/></div>
                            </div>
                            <div class="item-info">
                                <div class="item-icon">
                                    <div class="icon icon-kids-small"></div>
                                </div>
                                <div class="item-data">
                                    <div class="item-name">홍길동</div>
                                    <div class="item-date">2022.11.15 13:20</div>
                                </div>
                                <div class="item-state">
                                    <div class="label label-red">상담사 매칭중</div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="gallery-list-item">
                            <div class="item-thumb">
                                <div class="thumb"><img src="../assets/images/@picture.png" alt=""/></div>
                            </div>
                            <div class="item-info">
                                <div class="item-icon">
                                    <div class="icon icon-kids-small"></div>
                                </div>
                                <div class="item-data">
                                    <div class="item-name">홍길동</div>
                                    <div class="item-date">2022.11.15 13:20</div>
                                </div>
                                <div class="item-state">
                                    <div class="label label-silver">상담완료</div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="gallery-list-item">
                            <div class="item-thumb">
                                <div class="thumb"><img src="../assets/images/@picture.png" alt=""/></div>
                            </div>
                            <div class="item-info">
                                <div class="item-icon">
                                    <div class="icon icon-kids-small"></div>
                                </div>
                                <div class="item-data">
                                    <div class="item-name">홍길동</div>
                                    <div class="item-date">2022.11.15 13:20</div>
                                </div>
                                <div class="item-state">
                                    <div class="label label-gray">작성중</div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="gallery-list-item">
                            <div class="item-thumb">
                                <div class="thumb"><img src="../assets/images/@picture.png" alt=""/></div>
                            </div>
                            <div class="item-info">
                                <div class="item-icon">
                                    <div class="icon icon-kids-small"></div>
                                </div>
                                <div class="item-data">
                                    <div class="item-name">홍길동</div>
                                    <div class="item-date">2022.11.15 13:20</div>
                                </div>
                                <div class="item-state">
                                    <div class="label label-silver">상담완료</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- //내용이 있을 때 -->
                    <!-- 내용이 없을 때 -->
                    <div class="none-list-data">내용이 없습니다.</div>
                    <!-- //내용이 없을 때 -->
                </div>
            </div>
        </div>
    </div>
</section>
@include('/mobile/common/end')

