<article id="savePop" class="layer-pop-wrap">
    <div class="layer-pop-parent">
        <div class="layer-pop-children">
            <div class="pop-data alert-pop-data">
                <div class="pop-body">
                    <div class="msg-txt">
                        <div class="txt">저장 후 나가시겠습니까? 저장하지 않을 경우, 입력된 내용은 삭제됩니다.</div>
                    </div>
                    <div class="pop-body-btns">
                        <button type="button" class="btn btn-large-size btn-confirm" onclick="popupSaveButton()">저장함</button>
                        <button type="button" class="btn btn-large-size btn-cancel" onclick="doNotSave()">저장안함</button>
                    </div>
                </div>
                <button type="button" class="btn-pop-close" onclick="pop.close();">닫기</button>
            </div>
        </div>
    </div>
</article>
<script>
    function doNotSave() {
        location.href = '/';
        pop.close();
    }
    function popupSaveButton() {
        popupSaveAction();
        pop.close();
    }
</script>
