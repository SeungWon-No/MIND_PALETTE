<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>지게차드림</title>
@if($isSuccess)
	<script>
		opener.document.joinForm.userName.value = "{{$authResult['name']}}";
		opener.document.joinForm.userPhone.value = "{{$authResult['phone']}}";

		opener.document.joinForm.RSLT_NAME_DES.value = "{{$authResult['hashName']}}";
		opener.document.joinForm.TEL_NO_DES.value = "{{$authResult['hashPhone']}}";

		opener.document.joinForm.DI.value          = "{{$authResult['DI']}}";
		opener.document.joinForm.CI.value          = "{{$authResult['CI']}}";
		opener.document.joinForm.DI_DES.value          = "{{$authResult['hashDI']}}";
		opener.document.joinForm.CI_DES.value          = "{{$authResult['hashCI']}}";

		window.opener.authSuccess();
		self.close();
	</script>
	</head>
@else
	<script>
		alert('본인 인증에 실패하였습니다.');
		self.close();
	</script>
@endif
</body>
</html>
