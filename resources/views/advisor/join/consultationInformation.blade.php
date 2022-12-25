@include('advisor/common/header')
<form id="nextStepForm" name="nextStepForm" action="/join" method="post" autocomplete="off">
@csrf       
<div id="container">
      <div class="member-cont">
        <div class="member-inner">
          <div class="member-heading flex-row">
            <h3 class="member-heading__tit">상담사 관련 정보 입력</h3>
            <div class="member-heading__note">
              <em>*</em>은 필수사항입니다.
            </div>
          </div>
          <div class="member-text-g mg-t-28">
            <p class="member-text-g__desc li-h-25">
              ∙ 입력하신 상담관련 학력,자격,경력이 프로필에 올라갑니다.<br>
              ∙ 작성하신 사항은 관련 증명서 사본을 등록하여 주세요.<br>
              ∙ 증명서 사본은 개인정보를 확인 할 수 있는 형태로 등록하여 주세요.<br>
              ∙ 위조 또는 관련 증명서 누락이 확인 될 시 심사가 불가하며 승인이 거절됩니다. 
            </p>
          </div>
          <div class="join-progress mg-bt-40">
            <div class="join-progress__bar half"></div>
            <div class="join-progress__view ">
              <!-- join-progress__item에 클래스 active -->
              <div class="join-progress__item active">
                <div class="icon join-progress__icon"></div>
                <div class="join-progress__desc"><a href="/join">기본정보 입력</a></div>
              </div>
              <div class="join-progress__item active">
                <div class="icon join-progress__icon"></div>
                <div class="join-progress__desc">상담 관련 정보 입력</div>
              </div>
              <div class="join-progress__item">
                <div class="icon join-progress__icon"></div>
                <div class="join-progress__desc">자격 심사</div>
              </div>
            </div>
          </div>
          <div class="member-cell">
            <div class="member-group">
              <div class="member-label">학력사항<em>*</em></div>
              <!-- 학력사항 테이블은 member-table에 member-table--01 클래스 추가 -->
              <table class="member-table member-table--01">
                <thead class="member-table__thead">
                    <tr>
                      <th style="width: 69px;">학위</th>
                      <th style="width: 186px;">학교</th>
                      <th style="width: 186px;">학과</th>
                      <th style="width: 186px;">전공</th>
                      <th style="width: 94px;">졸업여부</th>
                      <th style="width: 114px;">증명성 사본</th>
                    </tr>
                </thead>
                <tbody class="member-table__body">
                  <tr class="table-row">
                    <td class="table-col no-padding">
                      <div class="select-box">
                        <button id="educationInfo" name="educationInfo" class="select-box__label" type="button">선택 <span class="icon select-down-icon"></span></button>
                        <ul class="select-option__list">
                          <li class="select-option">선택</li>
                          <li class="select-option">학사</li>
                          <li class="select-option">석사</li>
                          <li class="select-option">박사</li>
                        </ul>                      
                      </div>
                    </td>
                    <td class="table-col">  
                      <input id="schoolName" name="schoolName" type="text" class="tabel-form__control" placeholder="학교명">
                    </td>
                    <td class="table-col">
                      <input id="department" name="department" type="text" class="tabel-form__control" placeholder="학과명">
                    </td>
                    <td class="table-col">
                      <input id="major" name="major" type="text" class="tabel-form__control" placeholder="전공">
                    </td>
                    <td class="table-col no-padding">
                      <div class="select-box">
                        <button id="graduationInfo" name="graduationInfo" class="select-box__label" type="button">선택 <span class="icon select-down-icon"></span></button>
                        <!-- select-option__list에 acitve 클래스 붙으면 활성화 -->
                        <ul class="select-option__list">
                          <li class="select-option">선택</li>
                          <li class="select-option">졸업</li>
                          <li class="select-option">재학</li>
                          <li class="select-option">수료</li>
                        </ul>                      
                      </div>
                    </td>
                    <td class="table-col cursor">
                      <label class="table-file__label">
                        <input id="education-attachedFile" name="education-attachedFilePath" type="file" class="table-file">
                        <input id="education-attachedFilePath" type="hidden">
                        첨부하기
                        <!-- 파일올렸을때 
                          <span class="table-file__name">증명서.png</span> 
                        //파일올렸을때 -->
                      </label>
                    </td>
                  </tr>
                </tbody>
              </table>
              <button type="button" class="table-add__btn" onclick="getEducation()">추가하기</button>
            </div>
          </div>
          <div class="member-cell">
            <div class="member-group">
              <div class="member-label">자격사항</div>
              <!-- 자격사항 테이블은 member-table에 member-table--02 클래스 추가 -->
              <table class="member-table member-table--02">
                <thead class="member-table__thead">
                    <tr>
                      <th style="width: 194px;">발행처</th>
                      <th style="width: 482px;">자격이름</th>
                      <th style="width: 159px;">증명서 사본</th>
                    </tr>
                </thead>
                <tbody class="member-table__body">
                  <tr class="table-row">
                    <td class="table-col">
                      <input id="publisher" name="publisher" type="text" class="tabel-form__control" placeholder="발행처">
                    </td>
                    <td class="table-col">  
                      <input id="licenseTitle" name="licenseTitle" type="text" class="tabel-form__control" placeholder="자격이름">
                    </td>
                    <td class="table-col">
                      <label class="table-file__label">
                        <input type="file" class="table-file">
                        첨부하기
                        <!-- 파일올렸을때 
                          <span class="table-file__name">증명서.png</span> 
                        //파일올렸을때 -->
                      </label>
                    </td>
                  </tr>
                  <tr class="table-row">
                  <td class="table-col">
                      <input id="issuance" name="issuance" type="text" class="tabel-form__control" placeholder="발행처">
                    </td>
                    <td class="table-col">  
                      <input id="licenseTitle" name="licenseTitle" type="text" class="tabel-form__control" placeholder="자격이름">
                    </td>
                    <td class="table-col">
                      <label class="table-file__label">
                        <input type="file" class="table-file">
                        <!-- 파일올렸을때 -->
                        <span class="table-file__name">증명서.png</span>
                      </label>
                    </td>
                  </tr>
                </tbody>
              </table>
              <button type="button" class="table-add__btn">추가하기</button>
            </div>
          </div>
          <div class="member-cell">
            <div class="member-group">
              <div class="member-label">경력사항</div>
              <p class="member-s__text li-h-21 mg-t-11">
                -심리, 상담, 임상과 관련된 경력만 입력해주세요.<br>
                -증명서 사본은 수련수첩,경력증명서, 임상경력 증명서 등을 제출할 수 있습니다.<br>
                -프로필에 노출을 원하지 않는 경력은 회원가입 승인 후 상담사로 황동을 시작하기 전에 삭제할 수 있습니다.<br>
              </p>
              <div class="form-group__blue">
                <div class="form-group__label">상담경력</div>
                <div class="form-group__item">
                  <div class="form-group__data">
                    <input id="career" name="" type="career" class="form-control" placeholder="예) 3년이상, 6개월 이상">
                  </div>
                  <p class="form-group-text">* 입력하지 않는 경우, 프로필에 공란으로 표시됩니다.</p>
                </div>
              </div>
              <!-- 경력사항 테이블은 member-table에 member-table--03 클래스 추가 -->
              <table class="member-table member-table--03">
                <thead class="member-table__thead">
                    <tr>
                      <th style="width: 97px;">구분</th>
                      <th style="width: 217px;">기관/회사</th>
                      <th style="width: 124px;">근무형태</th>
                      <th style="width: 287px;">담당업무</th>
                      <th style="width: 110px;">증명서 사본</th>
                    </tr>
                </thead>
                <tbody class="member-table__body">
                  <tr class="table-row">
                    <td class="table-col no-padding">
                      <div class="select-box">
                        <button class="select-box__label">선택<span class="icon select-down-icon"></span></button>
                        <!-- select-option__list에 acitve 클래스 붙으면 활성화 -->
                        <ul class="select-option__list">
                          <li class="select-option">선택</li>
                          <li class="select-option" value="현재 근무지">현재 근무지</li>
                          <li class="select-option" value="이전 근무지">이전 근무지</li>
                        </ul>                      
                      </div>
                    </td>
                    <td class="table-col">
                      <input type="text" class="tabel-form__control" placeholder="기관검색">
                    </td>
                    <td class="table-col no-padding">
                      <div class="select-box">
                        <button class="select-box__label">근무형태 <span class="icon select-down-icon"></span></button>
                        <!-- select-option__list에 acitve 클래스 붙으면 활성화 -->
                        <ul class="select-option__list">
                          <li class="select-option">근무형태</li>
                          <li class="select-option" value="풀타임">풀타임</li>
                          <li class="select-option" value="파트타임">파트타임</li>
                        </ul>                      
                      </div>
                    </td>
                    <td class="table-col">
                      <input type="text" class="tabel-form__control" placeholder="담당업무">
                    </td>
                    <td class="table-col">
                      <label class="table-file__label">
                        <input type="file" class="table-file">
                        첨부하기
                        <!-- 파일올렸을때 
                          <span class="table-file__name">증명서.png</span> 
                        //파일올렸을때 -->
                      </label>
                    </td>
                  </tr>
                  <tr class="table-row">
                    <td class="table-col no-padding">
                      <div class="select-box">
                        <button class="select-box__label">이전 근무지<span class="icon select-down-icon"></span></button>
                        <!-- select-option__list에 acitve 클래스 붙으면 활성화 -->
                        <ul class="select-option__list">
                          <li class="select-option">선택</li>
                          <li class="select-option">현재 근무지</li>
                          <li class="select-option">이전 근무지</li>
                        </ul>                      
                      </div>
                    </td>
                    <td class="table-col">
                      <input type="text" class="tabel-form__control" placeholder="기관검색">
                    </td>
                    <td class="table-col no-padding">
                      <div class="select-box">
                        <button class="select-box__label">풀타임 <span class="icon select-down-icon"></span></button>
                        <!-- select-option__list에 acitve 클래스 붙으면 활성화 -->
                        <ul class="select-option__list">
                          <li class="select-option">근무형태</li>
                          <li class="select-option">풀타임</li>
                          <li class="select-option">파트타임</li>
                        </ul>                      
                      </div>
                    </td>
                    <td class="table-col">
                      <input type="text" class="tabel-form__control" placeholder="담당업무">
                    </td>
                    <td class="table-col">
                      <label class="table-file__label">
                        <input type="file" class="table-file">
                        <!-- 파일올렸을때 -->
                          <span class="table-file__name">증명서.png</span> 
                      </label>
                    </td>
                  </tr>
                </tbody>
              </table>
              <button type="button" class="table-add__btn">추가하기</button>
            </div>
          </div>
          <label class="label-checkbox member mg-t-53">
            <input type="checkbox" class="form-checkbox">
            <span class="icon check-off-round"></span>
            <em>(필수)</em> 입력한 정보는 모두 사실이며, 추후 사실이 아님이 확인되는 경우 즉각 상담활동이 중지됨을 확인하였습니다.
          </label>
          <div class="member-bt__btns-wrap mg-t-43 gap-38">
            <a href="javascript:submitForm()"><button type="button" class="member-bt__btn wd-320 save">저장하기</button></a>
            <a href="javascript:submitForm()"><button type="button" class="member-bt__btn wd-320">승인요청</button></a>
          </div>
        </div>
      </div>
    </div>
</form>
<script>
    function submitForm() {
        //$("#nextStepForm").submit();
    }

    // 학력사항
    function getEducation () {
      var issuance = $('#issuance').val();
      var schoolName = $('#schoolName').val();
      var department = $('#department').val();
      var major = $('#major').val();
      var graduation = $('#graduationInfo').text();
      var attachedFile = '';

      var result = {
        'degree':degree, 
        'schoolName':schoolName, 
        'department':department, 
        'major':major, 
        'graduation':graduation,
        'attachedFile':attachedFile,
      };

      return result;
    }

    // 자격사항
    function getQualification (){
      var degree = $('#educationInfo').text();
      var schoolName = $('#schoolName').val();
      var department = $('#department').val();
      var major = $('#major').val();
      var graduation = $('#graduationInfo').text();
      var attachedFile = '';

      var result = {
        'degree':degree, 
        'schoolName':schoolName, 
        'department':department, 
        'major':major, 
        'graduation':graduation,
        'attachedFile':attachedFile,
      };

      return result;
    }

    // 파일 업로드
    $('input[name="education-attachedFilePath"]').change(function(){
        if($("education-attachedFile").val() === ""){
            // 파일 취소
            cancel();
        } else {
            save();
        }
    });

    function save() {
      
        const imageInput = $("#education-attachedFile")[0];
        const formData = new FormData();
        formData.append("file", imageInput.files[0]);
        formData.append("oldFilePath", $("#education-attachedFilePath").val());

        $.ajax({
            type:"POST",
            url: "/fileUpload",
            processData: false,
            contentType: false,
            data: formData,
            async: false,
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success: function(json){
                var data = JSON.parse(json);
                if ( data.status === "success" ) {
                    $("#education-attachedFilePath").val(data.filePath);
                    alert("path = "+data.filePath);
                } else {
                    alert(data.message);
                }
            },
            err: function(err){
                console.log("err:", err)
            }
        });
        alert('save')
    }
    function cancel() {
        alert('cancel')
    }
    

</script>
@include('advisor/common/footer')    
@include('advisor/common/end')