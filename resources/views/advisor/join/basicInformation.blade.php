@include('advisor/common/header')
<div id="container">
  <div class="member-cont">
    <div class="member-inner">
      <div class="member-heading">
        <h3 class="member-heading__tit">상담사 회원가입</h3>
      </div>
      <div class="member-text-g mg-t-28">
        <p class="member-text-g__desc">
          상담사 정보를 입력 후, 단계에 따라 진행해주세요
        </p>
      </div>
      <div class="join-progress">
        <div class="join-progress__bar"></div>
        <div class="join-progress__view">
          <!-- join-progress__item에 클래스 active -->
          <div class="join-progress__item active">
            <div class="icon join-progress__icon"></div>
            <div class="join-progress__desc">기본정보 입력</div>
          </div>
          <div class="join-progress__item">
            <div class="icon join-progress__icon"></div>
            <div class="join-progress__desc">상담 관련 정보 입력</div>
          </div>
          <div class="join-progress__item">
            <div class="icon join-progress__icon"></div>
            <div class="join-progress__desc">자격 심사</div>
          </div>
        </div>
      </div>
      <form id="joinForm" name="joinForm" action="/advisor/join" method="POST" autocomplete="off">
      @csrf
        <div class="member-cell pd-56-114-105">
            <div class="member-group">
            <div class="form-group join">
                <div class="member-label">이메일<em class="need">*</em></div>
                <div class="form-group__item">
                <div class="form-group__data">
                    <input id="userEmail" name="userEmail" type="text" class="form-control wd-274" placeholder="입력" onkeyup="validEmailCheck()" required>
                    <button type="button" class="form-control__btn" onclick="emailDuplicationCheck('check')">중복확인</button>
                </div>
                <p id="valid-error-email" class="form-group-text" style="display: none;">
                    * 이메일 형식이 올바르지 않습니다.
                </p>
                <p class="form-group-text">
                    * 심사 결과가 메일로 전송됩니다. 반드시 수신 가능한 이메일을 입력해주세요.
                </p>
                <p class="form-group-text">
                    * 수신할 수 없는 이메일을 입력하여 발생한 문제는 도움을 드릴 수 없습니다.
                </p>
                </div>
            </div>
            <div class="form-group join">
                <div class="member-label">비밀번호<em class="need">*</em></div>
                <div class="form-group__item">
                <div class="form-group__data">
                    <input id="userPassword" name="userPassword" type="password" class="form-control pwd" placeholder="8-20자 이내로  영문 , 숫자 , 특수문자를 조합하여 작성합니다."
                    onkeyup="validPasswordCheck()" required>
                </div>
                <p id="valid-error-password" class="form-group-text" style="display: none;">
                  영문+숫자+특수문자 8~20자를 입력하셔야 합니다.
                </p>
                <p class="form-group-text">
                    * 사용 가능한 특수문자 !@#$%^&*?()_~
                </p>
                </div>
            </div>
            <div class="form-group join">
                <div class="member-label">비밀번호 재확인<em class="need">*</em></div>
                <div class="form-group__item">
                <div class="form-group__data">
                    <input id="confirmUserPassword" name="confirmUserPassword" type="password" class="form-control pwd"
                    onkeyup="validConfirmUserPasswordCheck()" required>
                </div>
                <p id="valid-error-confirmPassword" class="form-group-text" style="display: none;">
                  비밀번호가 일치하지 않습니다.
                </p>
                </div>
            </div>
            <div class="form-group">
                <div class="member-label">이름<em class="need">*</em></div>
                <div class="form-group__item">
                <div class="form-group__data">
                    <input id="userName" name="userName" type="text" class="form-control name" required>
                </div>
                </div>
            </div>
            <div class="form-group join">
                <div class="member-label">휴대전화<em class="need">*</em></div>
                <div class="form-group__item">
                <div class="form-group__data">
                    <input id="userPhoneNumber" name="userPhoneNumber" type="tel" class="form-control wd-239" placeholder="“-”없이 입력" required>
                    <button type="button" class="form-control__btn">인증번호</button>
                </div>
                <p class="form-group-text">
                    * 연락 가능한 휴대전화 번호를 입력해주세요.
                </p>
                </div>
                <div class="form-group__item">
                <div class="form-group__data">
                    <input type="tel" class="form-control wd-371 mg-t-40" placeholder="인증번호 입력">
                </div>
                </div>
            </div>
            </div>
        </div>
      </form>
      <label class="label-checkbox member mg-t-53">
        <input id="agreeCheckbox" name="agreeCheckbox" type="checkbox" class="form-checkbox" onclick="agreeCheckbox()">
        <span class="icon check-off-round"></span>
        <em>(필수) </em> 서비스 이용약관 및 개인정보 처리방침에 동의합니다.
      </label>
      <div class="member-bt__btns-wrap mg-t-43">
      <a href="javascript:submitForm()"><button type="button" class="member-bt__btn wd-320">입력하기</button></a>
      </div>
    </div>
  </div>
</div>
<script>
  function submitForm() {
    var validEmailResult = validEmailCheck(); // 이메일 체크
    var validEmailDuplicationResult = emailDuplicationCheck('submit'); // 이메일 중복체크
    var validPasswordResult = validPasswordCheck(); // 비밀번호 체크
    var validConfirmUserPasswordResult = validConfirmUserPasswordCheck(); // 비밀번호 확인 체크
    var validAgreeCheckboxResult = agreeCheckbox(); // 필수 동의 체크 여부

    if (validEmailResult == false) {
      return alert('이메일을 확인해주세요.');

    }else if(validEmailDuplicationResult == false){
      return alert('이미 등록된 이메일 입니다.');

    }else if(validPasswordResult == false){
      return alert('비밀번호를 확인해주세요.');

    }else if(validConfirmUserPasswordResult == false ){
      return alert('비밀번호가 일치하지 않습니다.');

    }else if(validAgreeCheckboxResult == false){
      return alert('서비스 이용약관 및 개인정보 처리방침에 동의해주세요.');

    }else{
      $("#joinForm").submit();
    }

  }

  // 이메일 유효성 체크
  function validEmailCheck() {
    var email = $('#userEmail').val();
    var regExp = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i;
    var checkResult = regExp.test(email);

    if (email == '') {
      $("#valid-error-email").html('* 이메일을 입력해주세요.');
      return false;
    }

    if (checkResult == false) {
      $("#valid-error-email").attr("style", "display:''; color:#ff0000").html('* 이메일 형식이 올바르지 않습니다.');
      return false;

    }else{
      $("#valid-error-email").attr("style", "display:''; color:#4169e1;").html('* 사용 가능한 이메일입니다.');
      return true;
    }

  }

  // 이메일 중복 체크
  function emailDuplicationCheck($sign){
    var email = $('#userEmail').val();
    var emailCount = "1";
    var sign = $sign;

    if (email == "") {
      $("#valid-error-email").attr("style", "display:''; color:#ff0000").html('* 이메일을 입력해주세요.');
      return false;
    }

    $.ajax({
        type:'POST',
        url:'/advisor/emailCheck',
        data: {
            "userEmail" : email
        },
        async: false,
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
        success:function(data){ // 중복 이메일이 있는 경우엔 1, 없는 경우엔 0을 return함
            emailCount = data;
        }
    });

    if ( emailCount === "1" && sign == 'check') { // 중복된 이메일이 있는 경우
      $("#valid-error-email").attr("style", "display:''; color:#ff0000").html('* 이미 등록된 이메일 입니다.');
      alert('이미 등록된 이메일 입니다.');
      return false;

    }else if(sign == 'check'){ // 이메일 사용 가능한 경우
      alert('사용 가능한 이메일입니다.');
      return true;
    }

  }

  // 비밀번호 유효성 체크
  function validPasswordCheck() {
    var password = $('#userPassword').val();
    var regExp = /^(?=.*[a-zA-z])(?=.*[0-9])(?=.*[$`~!@$!%*#^?&\\(\\)\-_=+]).{8,20}$/;
    var checkResult = regExp.test(password);
    var lengthCheck = true;

    if (password == "") {
      $("#valid-error-password").attr("style", "display:''; color:#ff0000").html('* 비밀번호를 입력해주세요.');
      return false;
    }

    if (password.length < 8 || password.length > 20) { //8-20자 이내
      return false;
    }

    if (checkResult == false || lengthCheck == false) {
      $("#valid-error-password").attr("style", "display:''; color:#ff0000").html('영문+숫자+특수문자 8~20자를 입력하셔야 합니다.');
      return false;

    }else if(checkResult == true && lengthCheck == true){
      $("#valid-error-password").attr("style", "display:''; color:#4169e1;").html('* 사용 가능한 비밀번호 입니다.');
      return true;
    }

  }

  // 비밀번호 재확인 체크
  function validConfirmUserPasswordCheck() {
    var password = $('#userPassword').val();
    var confirmPassword = $('#confirmUserPassword').val();

    if (confirmPassword !== '') {
      if (password != confirmPassword) {
        $('#valid-error-confirmPassword').attr("style", "display:''; color:#ff0000").html('비밀번호가 일치하지 않습니다.');
        return false;
      }else {
        $('#valid-error-confirmPassword').attr("style", "display:''; color:#4169e1;").html('확인되었습니다.');
        return true;
      }
    }else{
      $('#valid-error-confirmPassword').attr("style", "display:''; color:#ff0000").html('* 비밀번호를 입력해주세요.');
      return false;
    }
  }

  // 필수 약관 동의 확인
  function agreeCheckbox(){
    var checkResult = $('[name=agreeCheckbox]').prop('checked');
    return checkResult;
  }
</script>
@include('advisor/common/footer')
@include('advisor/common/end')
