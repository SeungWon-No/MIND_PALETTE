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
                    <input id="advisorName" name="advisorName" type="text" class="form-control name" onkeyup="validadvisorNameCheck()" placeholder="이름을 입력해주세요.">
                  </div>
                </div><br>
                <p id="valid-error-advisorName" class="form-group-text" style="display: none;">
                * 이름을 입력해주세요.
                </p>
              </div>
              <div class="form-group">
                <div class="member-label">이메일</div>
                <div class="form-group__item">
                  <div class="form-group__data">
                    <input id="email" name="email" type="email" class="form-control email" onkeyup="validEmailCheck()" placeholder="이름을 입력해주세요.">
                  </div>
                </div><br>
                <p id="valid-error-email" class="form-group-text" style="display: none;">
                * 이메일 형식이 올바르지 않습니다.
                </p>
              </div>
              <div class="form-group">
                <div class="member-label">비밀번호</div>
                <div class="form-group__item">
                  <div class="form-group__data">
                    <input id="advisorPassword" name="advisorPassword" type="password" class="form-control pwd" onkeyup="validPasswordCheck()" placeholder="이름을 입력해주세요.">
                  </div>
                </div><br>
                <p id="valid-error-confirmPassword" class="form-group-text" style="display: none;">
                  비밀번호를 입력해주세요.
                </p>
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

      // 이름 유효성 체크
      function validadvisorNameCheck(){
        var password = $('#advisorName').val();
        if(password == ''){
          $("#valid-error-advisorName").attr("style", "display:''; color:#ff0000").html('* 이름을 입력해주세요.');
          return false;
        }else{
          return true;
        }
      }

      // 이메일 유효성 체크
      function validEmailCheck() {
        var email = $('#email').val();
        var regExp = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i;
        var checkResult = regExp.test(email);

        if (email == '') {
          $("#valid-error-email").attr("style", "display:''; color:#ff0000").html('* 이메일을 입력해주세요.');
          return false;
        }

        if (checkResult == false) {
          $("#valid-error-email").attr("style", "display:''; color:#ff0000").html('* 올바른 이메일 주소를 입력하세요.');
          return false;

        }else{
          $("#valid-error-email").attr("style", "display:''; color:#4169e1;").html('* 사용 가능한 이메일입니다.');
          return true;
        }

      }
      
      // 비밀번호 체크
      function validPasswordCheck(){
        var password = $('#advisorPassword').val();
        if(password == ''){
          $("#valid-error-confirmPassword").attr("style", "display:''; color:#ff0000").html('* 비밀번호를 입력해주세요.');
          return false;
        }else{
          $("#valid-error-confirmPassword").attr("style", "display:'none';").html('');
          return true;
        }
      }

      //필수 서비스 이용약관 동의
      function serviceAgreeCheck(){
        var checkResult = $('[name=serviceAgree]').prop('checked');
        return checkResult;
      }
      
      function submitDeleteForm(){
        var validAdvisorNameResult = validadvisorNameCheck(); // 이름 체크
        var validAdvisorEmailResult = validEmailCheck(); // 이메일 체크
        var validAdvisorPasswordResult = validPasswordCheck(); // 비밀번호 체크
        var validServiceAgreeCheckboxResult = serviceAgreeCheck(); // 필수 동의 체크 여부
        
        if(validAdvisorNameResult == false || validAdvisorEmailResult == false || validAdvisorPasswordResult == false){ // 입력사항 오류
          return pop.open('alertDataPop');

        }else if (validServiceAgreeCheckboxResult == false){  // 필수사항 동의 미체크 
          return pop.open('noAgreePolicy'); 

        }else{ // 입력값에 이상이 없으면 submit form 실행
            $.ajax({
              type:'POST',
              url:'/advisor/memberWithdrawal',
              data: {
                  "advisorName" : document.deleteForm.advisorName.value,
                  "email" : document.deleteForm.email.value,
                  "advisorPassword" : document.deleteForm.advisorPassword.value,
              },
              async: false,
              headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
              success:function(json){
                  var data = JSON.parse(json);
                  if(data.status === 'success'){
                    pop.open('memberWithdrawal');
                    
                  }else{
                    pop.open('alertDataPop');
                  }
              }
          });
        }
      }
    </script>
    <!-- 입력오류 -->
  <article id="alertDataPop" class="layer-pop__wrap">
    <div class="layer-pop__parent">
      <div class="layer-pop__children">
        <div class="layer-pop__alert">
          <p class="pop-alert__desc">
            올바른 정보를 기입해주세요.
          </p>
          <button type="button" class="pop-alert__btn" onclick="pop.close()">확인</button>
        </div>
      </div>
    </div>
  </article>
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
          <button type="button" class="pop-alert__btn" onclick="location.href='/advisor/logout'">확인</button>
        </div>
      </div>
    </div>
  </article>
    @include('advisor/common/end')