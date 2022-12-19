@php
    $isLogin = false;
    $loginSession = "";
    if (session()->has('login')) {
      $isLogin = true;
      $loginSession = session()->get('login')[0];
    }
@endphp
@if($isShowBackButton)
    <header id="header" class="basic-header">
        <div class="header-left">
            <a href="javascript:history.back()" class="btn-page-ui btn-page-prev">
                <div class="icon icon-page-prev-gray">페이지 뒤로가기</div>
            </a>
        </div>
        <div class="page-title">{{(isset($title))?$title:""}}</div>
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
                    <div class="icon icon-page-user-orange on"></div>
                    <div class="icon icon-page-user-white off"></div>
                </a>
            @else
                <a href="/login" class="btn-page-ui btn-page-login">로그인</a>
                <a href="#" class="btn-page-ui btn-page-user">
                    <div class="icon icon-page-user-gray on"></div>
                    <div class="icon icon-page-user-lightorange off"></div>
                </a>
            @endif
        </div>
    </header>
@endif
