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
      <form id="joinForm" name="joinForm" action="/join" method="post" autocomplete="off">
      @csrf
        <div class="member-cell pd-56-114-105">
            <div class="member-group">
            <div class="form-group join">
                <div class="member-label">이메일<em class="need">*</em></div>
                <div class="form-group__item">
                <div class="form-group__data">
                    <input id="userEmail" name="userEmail" type="text" class="form-control wd-274" placeholder="입력">
                    <button type="button" class="form-control__btn">중복확인</button>
                </div>
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
                    <input id="userPassword" name="userPassword" type="password" class="form-control pwd" placeholder="6-14자 이내로  영문 , 숫자 , 특수문자를 조합하여 작성합니다.">
                </div>
                <p class="form-group-text">
                    * 사용 가능한 특수문자 !@#$%^&*?()_~
                </p>
                </div>
            </div>
            <div class="form-group join">
                <div class="member-label">비밀번호 재확인<em class="need">*</em></div>
                <div class="form-group__item">
                <div class="form-group__data">
                    <input id="confirmUserPassword" name="confirmUserPassword" type="password" class="form-control pwd">
                </div>
                </div>
            </div>
            <div class="form-group">
                <div class="member-label">이름<em class="need">*</em></div>
                <div class="form-group__item">
                <div class="form-group__data">
                    <input id="userName" name="userName" type="text" class="form-control name">
                </div>
                </div>
            </div>
            <div class="form-group join">
                <div class="member-label">휴대전화<em class="need">*</em></div>
                <div class="form-group__item">
                <div class="form-group__data">
                    <input id="userPhoneNumber" name="userPhoneNumber" type="tel" class="form-control wd-239" placeholder="“-”없이 입력">
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
        <input type="checkbox" class="form-checkbox">
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
        $("#joinForm").submit();
    }
</script>
@include('advisor/common/footer')    
@include('advisor/common/end')