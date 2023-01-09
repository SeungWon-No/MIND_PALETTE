<script src="/mobile/assets/js/common.js?v={{JS_VERSION}}"></script>

@if (session('toast'))
<div id="infoToast" class="toast-pop-wrap">
    <div id="infoToastText" class="toast-pop-data">{{session('toast')}}</div>
</div>
<script>
    if(location.hash !== "#t"){
        history.pushState(null, '', window.location.pathname+"?#t");
        common.toastPopOpen('infoToast');
    }
</script>
@endif
</body>
</html>
