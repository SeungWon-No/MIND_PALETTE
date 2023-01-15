@php
    $isLogin = false;
    $loginSession = "";
    if (session()->has('login')) {
      $isLogin = true;
      $loginSession = session()->get('login')[0];
    }
    $isShowProgress = $isShowProgress ?? false;
    $isShowCloseButton = $isShowCloseButton ?? false;
    $progressValue = $progressValue ?? 0;
@endphp
@if($isShowBackButton || $isShowCloseButton)
    <header id="header" class="basic-header">
        @if($isShowBackButton)
            <div class="header-left">
                <a href="javascript:history.back()" class="btn-page-ui btn-page-prev">
                    <div class="icon icon-page-prev-gray">페이지 뒤로가기</div>
                </a>
            </div>
        @endif
        <div class="page-title">{{(isset($title))?$title:""}}</div>
        @if($isShowCloseButton)
            <div class="header-right">
                <a href="javascript:pageClose()" class="btn-page-ui btn-page-close">
                    <div class="icon icon-page-close-gray">페이지 닫기</div>
                </a>
            </div>
        @endif
        @if($isShowProgress)
            <div class="page-progress"><div class="bar" style="width:{{$progressValue}}%;"></div></div>
        @endif
    </header>
@else
    <header id="header" class="basic-header orange">
        <div class="header-left">
            <h1 class="logo-title">MAUMPALETTE</h1>
        </div>
        <div class="header-right">
            @if($isLogin)
                <a href="#" class="btn-page-ui btn-page-alarm actived">
                    <div class="icon icon-page-alarm-gray on"></div>
                    <div class="icon icon-page-alarm-white off"></div>
                </a>
                <a href="/mypage" class="btn-page-ui btn-page-user">
                    <div class="icon {{(Cookie::has('AD_ICO'))?Cookie::get('AD_ICO'):"icon-page-user-green"}} off"></div>
                </a>
            @else
                <a href="/login" class="btn-page-ui btn-page-login">로그인</a>
                <a href="/login" class="btn-page-ui btn-page-user">
                    <div class="icon icon-page-user-lightorange off"></div>
                </a>
            @endif
        </div>
    </header>
@endif
