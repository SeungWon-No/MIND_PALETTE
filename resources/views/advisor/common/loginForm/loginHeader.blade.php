<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>마음팔레트</title>
  <meta name="Description" content="">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta property="og:title" content="">
  <meta property="og:description" content="">
  <meta property="og:type" content="website">
  <meta property="og:url" content="">
  <meta property="og:image" content="">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="타이틀">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">
  <link rel="canonical" href="">
  <script src="/advisorAssets/assets/js/jquery.js?v={{JS_VERSION}}"></script>
  <script src="/advisorAssets/assets/js/swiper.min.js?v={{JS_VERSION}}"></script>
  <link rel="stylesheet" href="/advisorAssets/assets/css/style.css?v={{CSS_VERSION}}">
</head>
@if (session('error'))
    <script>
        if(location.hash !== "#e"){
            history.pushState(null, '', window.location.pathname+"?#e");
            alert("{{session('error')}}");
        }
    </script>
@endif
