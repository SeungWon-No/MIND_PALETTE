@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "title" => "고객센터",
])
<section id="container" class="page-body">
    <form name="contactForm" method="POST" action="/contact/save">
        @csrf
        <div class="page-contents page-write">
            <div class="page-desc">마음팔레트에서 확인 후<br>연락처로 회신 드리겠습니다.</div>
            <div class="basic-data-group">
                <fieldset>
                    <legend>고객센터 입력 폼</legend>
                    <div class="form-group">
                        <div class="form-group-cell">
                            <div class="form-group-item">
                                <div class="form-item-label">작성자</div>
                                <div class="form-item-data">
                                    <input
                                        id="contactName"
                                        name="contactName"
                                        type="text"
                                        placeholder="입력"
                                        maxlength="10"
                                        onFocus="inputChange(this);"
                                        onKeyUp="inputChange(this);"
                                        onblur="inputBlur(this);">
                                </div>
                            </div>
                        </div>
                        <div class="form-group-cell">
                            <div class="form-group-item">
                                <div class="form-item-label">연락처</div>
                                <div class="form-item-data">
                                    <input
                                        id="contactPhone"
                                        name="contactPhone"
                                        type="text"
                                        placeholder="입력"
                                        onFocus="inputChange(this);"
                                        onKeyUp="inputChange(this);"
                                        onblur="inputBlur(this);">
                                </div>
                            </div>
                        </div>
                        <div class="form-group-cell">
                            <div class="form-group-item">
                                <div class="form-item-label">문의 내용</div>
                                <div class="form-item-data">
                                    <textarea
                                        id="contactContent"
                                        name="contactContent"
                                        placeholder="입력"
                                        onblur="inputBlur(this);"
                                        onFocus="inputChange(this);"
                                        onKeyUp="inputChange(this);"
                                        onblur="inputBlur(this);" class="large"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="page-bottom-ui"><a href="javascript:submitForm()" class="btn btn-orange btn-large-size btn-page-action">문의하기</a></div>
            </div>
        </div>
    </form>
</section>
<script>
    function submitForm() {
        var isSubmit = true;

        isSubmit = (isSubmit && checkName());
        isSubmit = (isSubmit && checkPhone());
        isSubmit = (isSubmit && checkContent());

        if (isSubmit) {
            document.contactForm.submit();
        }
    }

    function checkName() {
        if ($("#contactName").val() == "") {
            alert('작성자를 입력해주세요');
            return false;
        }
        return true;
    }

    function checkPhone() {
        if ($("#contactPhone").val() == "") {
            alert('연락처를 입력해주세요');
            return false;
        }
        return true;
    }

    function checkContent() {
        var content = $("#contactContent").val();
        content = content.replace(/\s*$/, "");
        if (content == "") {
            alert('문의내용을 입력해주세요');
            return false;
        }
        return true;
    }
</script>
@include('/mobile/common/savePopup')
@include('/mobile/common/end')

