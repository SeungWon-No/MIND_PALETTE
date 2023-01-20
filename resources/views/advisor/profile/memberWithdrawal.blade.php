@include('advisor/common/header')
    <div id="container">
      <div class="member-cont">
        <div class="member-inner">
          <div class="member-heading">
            <h3 class="member-heading__tit">회원탈퇴</h3>
          </div>
          <div class="member-text-g">
            <p class="member-text-g__desc">
              ∙ 탈퇴하신 아이디는 이후 영구적으로 사용이 중지되므로 새로운 아이디로만 재가입이 가능합니다.
              </p>
              <p class="member-text-g__desc">∙ 탈퇴하시면 관리자 확인 후 처리됩니다.</p>
          </div>
        <form id="deleteForm" name="deleteForm" action="/advisor/memberWithdrawal" method="POST">
          @csrf
          <div class="member-cell pd-56-114-105">
            <div class="member-group">
              <div class="form-group">
                <div class="member-label">이름</div>
                <div class="form-group__item">
                  <div class="form-group__data">
                    <input id="advisorName" name="advisorName" type="text" class="form-control name" placeholder="이름을 입력해주세요.">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="member-label">이메일</div>
                <div class="form-group__item">
                  <div class="form-group__data">
                    <input id="email" name="email" type="email" class="form-control email" placeholder="이름을 입력해주세요.">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="member-label">비밀번호</div>
                <div class="form-group__item">
                  <div class="form-group__data">
                    <input id="advisorPassword" name="advisorPassword" type="password" class="form-control pwd" placeholder="이름을 입력해주세요.">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
          <label class="label-checkbox member">
            <input id="serviceAgree" name="serviceAgree" type="checkbox" class="form-checkbox" onclick="javascript:serviceAgreeCheck()">
            <span class="icon check-off-round"></span>
            <em>(필수) </em> 서비스 이용약관 및 개인정보 처리방침에 동의합니다.
          </label>
          <div class="member-bt__btns-wrap">
            <button type="button" class="member-bt__btn" onclick="javascript:submitDeleteForm()">저장</button>
            <button type="button" class="member-bt__btn cancel">취소</button>
          </div>
        </div>
      </div>
    </div>
    @include('advisor/common/footer')
    <script>
      //필수 서비스 이용약관 동의
      function serviceAgreeCheck(){
        var checkResult = $('[name=serviceAgree]').prop('checked');
        return checkResult;
      }
      
      function submitDeleteForm(){
        var validServiceAgreeCheckboxResult = serviceAgreeCheck(); // 필수 동의 체크 여부
        if (validServiceAgreeCheckboxResult == false){
          return pop.open('noAgreePolicy');
        }else{
          return pop.open('memberWithdrawal');
        }
      }

      function submitMemberWithdrawal(){
        $('#deleteForm').submit();
      }
    </script>
    <!-- 약관 미동의 시 -->
  <article id="noAgreePolicy" class="layer-pop__wrap">
    <div class="layer-pop__parent">
      <div class="layer-pop__children">
        <div class="layer-pop__alert">
          <p class="pop-alert__desc">
            필수 약관 동의가 필요합니다.
          </p>
          <button type="button" class="pop-alert__btn" onclick="pop.close()">확인</button>
        </div>
      </div>
    </div>
  </article>
  <article id="memberWithdrawal" class="layer-pop__wrap">
    <div class="layer-pop__parent">
      <div class="layer-pop__children">
        <div class="layer-pop__alert">
          <p class="pop-alert__desc">
            탈퇴 완료<br>
            이용해 주셔서 감사합니다.
          </p>
          <button type="button" class="pop-alert__btn" onclick="submitMemberWithdrawal()">확인</button>
        </div>
      </div>
    </div>
  </article>
    @include('advisor/common/end')