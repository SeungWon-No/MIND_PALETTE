@include('advisor/common/loginForm/loginHeader')
<body>
  <div id="wrapper">
    <div id="container" class="login">
      <div class="login-box">
        <div class="login-inner">
          <div class="login-heading">
            <p class="login-heading__desc">아동 심리케어 플랫폼</p>
            <div class="login-logo">
              <img src="../advisorAssets/assets/images/login-logo.png" alt="" class="login-logo__img">
            </div>
          </div>
          <div class="login-tab__cont">
            <div class="login-tab__wrap">
              <a href="#" class="login-tab active" data-tab="/loginFindEmail">아이디 찾기</a>
              <a href="#" class="login-tab" data-tab="/loginFindPassword">비밀번호 찾기</a>
            </div>
            <div class="lgoin-tab__content">
              <div class="login-tab__desc">
                회원정보에 등록한 전화번호를 입력하셔야<br>인증번호를 받으실 수 있습니다.
              </div>
            </div>
          </div>
          <div class="login-btn__wrap">
            <a href="#none" class="login-btn">휴대폰 인증</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<script>
	$(function() {
		// tab operation
		$('.login-tab').click(function() {
			var activeTab = $(this).attr('data-tab');
      console.log(activeTab);
      return;
      
			$.ajax({
				type : 'GET',                 //get방식으로 통신
				url : activeTab + ".html",    //탭의 data-tab속성의 값으로 된 html파일로 통신
				dataType : "html",            //html형식으로 값 읽기
				error : function() {          //통신 실패시
					alert('통신실패!');
				},
				success : function(data) {    //통신 성공시 탭 내용담는 div를 읽어들인 값으로 채운다.
					$('#tabcontent').html(data);
				}
			});
		});
		$('#default').click();          
	});
</script>