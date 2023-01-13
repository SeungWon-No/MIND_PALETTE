@include('advisor/common/header')
    <form name="profileUpdate" action="/advisor/profile" method="POST">
        @csrf
        <div id="container">
          <div class="member-cont">
            <div class="member-inner">
              <div class="member-heading">
                <h3 class="member-heading__tit">프로필 수정</h3>
                <div class="member-heading__note"><em>*</em>은 필수사항입니다.</div>
              </div>
              <div class="member-cell">
                <!-- 사진없을때
                <div class="member-group">
                  <div class="member-label">프로필사진<em>*</em></div>
                  <label class="profile-upload__label">
                    <input type="file" class="form-file">
                    사진올리기
                  </label>
                </div> -->
                <div class="member-group">
                  <div class="member-label">프로필사진<em>*</em></div>
                  <!-- 사진있을때 추가되는 부분 -->
                  <div class="upload-file__wrap">
                    <div class="upload-file__photo">
                      <img src="/assets/images/user-profile-01.jpg" alt="" class="upload-file__img">
                    </div>
                    <div class="upload-file__text">
                      <div class="upload-file">
                        현재사진:<span class="upload-file__name">프로필.png</span>
                      </div>
                      <p class="member-s__text">권장 사이즈와 사진 사이즈 다를 경우, 사진이 일부 잘리거나 변형 될 수 있습니다.</p>
                    </div>
                  </div>
                  <!--// 사진있을때 추가되는 부분 -->
                  <label class="profile-upload__label">
                    <input id="attachFile" type="file" class="form-file">
                    <input id="attachFilePath" type="hidden">
                    사진올리기
                  </label>
                </div>
                <!-- 22.12.30 수정 -->
                <div class="member-group mg-t-70">
                  <div class="member-label">기본정보<em>*</em></div>
                  <div class="form-group__blue">
                    <!-- form-control에 클래스 confirm추가시 비활성화 -->
                    <div class="form-group__label">이름</div>
                    <div class="form-group__item">
                      <div class="form-group__data">
                        <input type="text" class="form-control confirm" placeholder="변경 불가하니 정확히 입력해주세요." value="{{$advisorProfile ? $advisorProfile['advisorName'] : ''}}">
                      </div>
                      <p class="form-group-text">* 입력하지 않는 경우, 프로필에 공란으로 표시됩니다.</p>
                    </div>
                  </div>
                  <div class="form-group__blue">
                    <div class="form-group__label">휴대폰번호</div>
                    <div class="form-group__item">
                      <div class="form-group__data">
                        <input type="text" class="form-control confirm" placeholder="휴대폰번호 8자리를 입력하세요. (“-”제외)" value="{{$advisorProfile ? $advisorProfile['phone'] : '' }}">
                        <button class="form-control__btn wd-127">휴대폰번호 변경</button>
                      </div>
                      <p class="form-group-text">* 호칭을 선택해주세요.</p>
                    </div>
                  </div>
                  <div class="form-group__blue">
                    <div class="form-group__label">이메일</div>
                    <div class="form-group__item">
                      <div class="form-group__data">
                        <input type="email" class="form-control confirm" placeholder="입력" value="{{ $advisorProfile ? $advisorProfile['email'] : '' }}">
                      </div>
                      <p class="form-group-text">* 입력하지 않는 경우, 프로필에 공란으로 표시됩니다.</p>
                    </div>
                  </div>
                </div>
                <div class="member-group mg-t-63">
                  <div class="member-label">내소개</div>
                  <p class="member-s__text mg-t-19">-나는 어떤 상담사인지 소개해주세요.</p>
                  <div class="form-group__blue">
                    <div class="form-group__label">소속기관</div>
                    <div class="form-group__item">
                      <div class="form-group__data">
                        <input type="text" class="form-control" placeholder="기관검색">
                        <button type="button" class="form-control__btn">검색</button>
                      </div>
                      <p class="form-group-text">* 입력하지 않는 경우, 프로필에 공란으로 표시됩니다.</p>
                    </div>
                  </div>
                  <div class="form-group__blue">
                    <div class="form-group__label">한줄소개</div>
                    <div class="form-group__item">
                      <div class="form-group__data">
                        <input type="text" class="form-control" placeholder="자신을 소개해주세요." value="{{ $advisorProfile ? $advisorProfile['briefIntroduction'] : '' }}">
                      </div>
                      <p class="form-group-text">* 입력하지 않는 경우, 프로필에 공란으로 표시됩니다.</p>
                    </div>
                  </div>
                  <div class="form-group__blue">
                    <div class="form-group__label">상세소개</div>
                    <div class="form-group__item">
                      <div class="form-group__data">
                        <textarea class="form-textarea" placeholder="자신을 소개해주세요">{{ $advisorProfile ? $advisorProfile['detailedDescription'] : '' }}</textarea>
                      </div>
                      <p class="form-group-text">* 입력하지 않는 경우, 프로필에 공란으로 표시됩니다.</p>
                    </div>
                  </div>
                </div>
                <!-- //22.12.30 수정 -->
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
                    <input type="hidden" id="educationCount" name="educationCount" value="{{count($advisorEducationInfos)}}"/>
                      @php
                        $educationIndex = 1;
                      @endphp
                    <tbody class="member-table__body">
                        @foreach($advisorEducationInfos as $advisorEducationInfo)
                            <input type="hidden" id="educationPK{{$educationIndex}}" name="educationPK{{$educationIndex}}" value="{{$advisorEducationInfo->educationPK}}"/>
                            <input type="hidden" id="degree{{$educationIndex}}" name="degree{{$educationIndex}}" value="{{$advisorEducationInfo->degree}}"/>
                          <tr class="table-row">
                            <td class="table-col no-padding">
                              <div class="select-box">
                                <button class="select-box__label">{{$codeTitle[$advisorEducationInfo->degree]}} <span class="icon select-down-icon"></span></button>
                                <!-- select-option__list에 acitve 클래스 붙으면 활성화 -->
                                <ul class="select-option__list">
                                  <li class="select-option" onclick="changeDegree('{{$educationIndex}}','-1')">선택</li>
                                  <li class="select-option" onclick="changeDegree('{{$educationIndex}}','325')">학사</li>
                                  <li class="select-option" onclick="changeDegree('{{$educationIndex}}','326')">석사</li>
                                  <li class="select-option" onclick="changeDegree('{{$educationIndex}}','327')">박사</li>
                                </ul>
                              </div>
                            </td>
                            <td class="table-col">
                                <input id="schoolName{{$educationIndex}}" name="schoolName{{$educationIndex}}"
                                       value="{{$advisorEducationInfo->school}}"
                                       type="text" class="tabel-form__control" placeholder="학교명">
                            </td>
                            <td class="table-col">
                                <input id="department{{$educationIndex}}" name="department{{$educationIndex}}"
                                       value="{{$advisorEducationInfo->department}}"
                                       type="text" class="tabel-form__control" placeholder="학과명">
                            </td>
                            <td class="table-col">
                                <input id="major{{$educationIndex}}" name="major{{$educationIndex}}"
                                       value="{{$advisorEducationInfo->major}}"
                                       type="text" class="tabel-form__control" placeholder="전공">
                            </td>
                            <td class="table-col no-padding">
                              <div class="select-box">
                                  <input type="hidden" id="graduation{{$educationIndex}}" name="graduation{{$educationIndex}}" value="{{$advisorEducationInfo->graduationStatus}}"/>
                                <button class="select-box__label">{{$codeTitle[$advisorEducationInfo->graduationStatus]}} <span class="icon select-down-icon"></span></button>
                                <!-- select-option__list에 acitve 클래스 붙으면 활성화 -->
                                <ul class="select-option__list">
                                    <li class="select-option" onclick="changeGraduation('1','-1')">선택</li>
                                    <li class="select-option" onclick="changeGraduation('1','328')">졸업</li>
                                    <li class="select-option" onclick="changeGraduation('1','329')">재학</li>
                                    <li class="select-option" onclick="changeGraduation('1','330')">수료</li>
                                </ul>
                              </div>
                            </td>
                            <td class="table-col cursor">

                                <label id="" class="table-file__label">
                                    <input id="education" type="file" class="table-file attachedFilePath" data-index="{{$educationIndex}}">
                                    <span class="table-file__name" id="education-attachedDisplayName{{$educationIndex}}">{{$advisorEducationInfo->fileName}}</span>
                                    <input id="education-attachedFilePath{{$educationIndex}}"
                                           value="{{$advisorEducationInfo->certificateFilePath}}"
                                           name="education-attachedFilePath{{$educationIndex}}"
                                           type="hidden">
                                    <input id="education-attachedFileName{{$educationIndex}}"
                                           value="{{$advisorEducationInfo->fileName}}"
                                           name="education-attachedFileName{{$educationIndex}}"
                                           type="hidden">
                                </label>
                            </td>
                          </tr>
                            @php
                                $educationIndex++;
                            @endphp
                        @endforeach
                    </tbody>
                  </table>
                  <button id="btnEducation" type="button" class="table-add__btn">추가하기</button>
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
                          <input type="text" class="tabel-form__control" placeholder="발행처">
                        </td>
                        <td class="table-col">
                          <input type="text" class="tabel-form__control" placeholder="자격이름">
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
                          <input type="text" class="tabel-form__control" placeholder="발행처">
                        </td>
                        <td class="table-col">
                          <input type="text" class="tabel-form__control" placeholder="자격이름">
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
                        <input type="text" class="form-control" placeholder="예) 3년이상, 6개월 이상">
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
                            <button class="select-box__label">근무형태 <span class="icon select-down-icon"></span></button>
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
              <div class="member-bt__btns-wrap">
                <button onclick="validForm()" type="button" class="member-bt__btn">저장</button>
                <button type="button" class="member-bt__btn cancel">취소</button>
              </div>
            </div>
          </div>
        </div> <!-- container end-->
    </form>
<script>
    function validForm() {
        document.profileUpdate.submit();
    }
    let educationIndex = parseInt("{{count($advisorEducationInfos)}}");

    $("#btnEducation").on('click',function () {
        if (validEducation()) {
            $("#educationCount").val(educationIndex);
            const targetTable = this.previousElementSibling;
            const targetTableTr = targetTable.querySelector('.member-table__body');
            const tableTr = document.createElement('tr');
            tableTr.classList.add('table-row');
            const table01Content = `<td class="table-col no-padding">
                                  <div class="select-box">
                                      <input type="hidden" id="degree`+educationIndex+`" name="degree`+educationIndex+`" value="-1"/>
                                      <button class="select-box__label" type="button">선택 <span class="icon select-down-icon"></span></button>
                                      <ul class="select-option__list">
                                        <li class="select-option" onclick="changeDegree('`+educationIndex+`','-1')">선택</li>
                                        <li class="select-option" onclick="changeDegree('`+educationIndex+`','325')">학사</li>
                                        <li class="select-option" onclick="changeDegree('`+educationIndex+`','326')">석사</li>
                                        <li class="select-option" onclick="changeDegree('`+educationIndex+`','327')">박사</li>
                                      </ul>
                                  </div>
                              </td>
                              <td class="table-col">
                                <input id="schoolName`+educationIndex+`" name="schoolName`+educationIndex+`" type="text" class="tabel-form__control" placeholder="학교명">
                              </td>
                              <td class="table-col">
                                <input id="department`+educationIndex+`" name="department`+educationIndex+`" type="text" class="tabel-form__control" placeholder="학과명">
                              </td>
                              <td class="table-col">
                                <input id="major`+educationIndex+`" name="major`+educationIndex+`" type="text" class="tabel-form__control" placeholder="전공">
                              </td>
                              <td class="table-col no-padding">
                                  <div class="select-box">
                                      <input type="hidden" id="graduation`+educationIndex+`" name="graduation`+educationIndex+`" value="-1"/>
                                      <button class="select-box__label" type="button">선택 <span class="icon select-down-icon"></span></button>
                                      <ul class="select-option__list">
                                        <li class="select-option" onclick="changeGraduation('`+educationIndex+`','-1')">선택</li>
                                        <li class="select-option" onclick="changeGraduation('`+educationIndex+`','328')">졸업</li>
                                        <li class="select-option" onclick="changeGraduation('`+educationIndex+`','329')">재학</li>
                                        <li class="select-option" onclick="changeGraduation('`+educationIndex+`','330')">수료</li>
                                      </ul>
                                  </div>
                              </td>
                              <td class="table-col cursor">
                                  <label class="table-file__label">
                                      <input id="education" type="file" class="table-file attachedFilePath" data-index="`+educationIndex+`">
                                        <span class="table-file__name" id="education-attachedDisplayName`+educationIndex+`">첨부하기</span>
                                      <input id="education-attachedFilePath`+educationIndex+`" name="education-attachedFilePath`+educationIndex+`" type="hidden">

                                    <input id="education-attachedFileName`+educationIndex+`"
                                       name="education-attachedFileName`+educationIndex+`"
                                       type="hidden">
                                  </label>
                              </td>`;
            tableTr.innerHTML = table01Content;
            targetTableTr.appendChild(tableTr);
        }
    });


    function validEducation(){
        if (educationIndex == 0) {
            educationIndex++;
            return true;
        }
        var degree = $("#degree"+educationIndex).val();
        var schoolName = $("#schoolName"+educationIndex).val();
        var department = $("#department"+educationIndex).val();
        var major = $("#major"+educationIndex).val();
        var graduation = $("#graduation"+educationIndex).val();
        var educationAttachedFilePath = $("#education-attachedFilePath"+educationIndex).val();

        if (degree == -1) {
            $("#degree"+educationIndex).focus();
            alert('학위를 선택해주세요.');
            return false;
        }else if(schoolName == ''){
            $("#schoolName"+educationIndex).focus();
            alert('학교를 작성해주세요.');
            return false;
        }else if(department == ''){
            $("#department"+educationIndex).focus();
            alert('학과를 작성해주세요.');
            return false;
        }else if(major == ''){
            $("#major"+educationIndex).focus();
            alert('전공을 작성해주세요.');
            return false;
        }else if(graduation == -1){
            $("#graduation"+educationIndex).focus();
            alert('졸업여부를 선택해주세요.');
            return false;
        }else if(educationAttachedFilePath == ''){
            $("#graduation"+educationIndex).focus();
            alert('증명서 사본을 첨부해주세요.');
            return false;
        }else{
            educationIndex++;
            return true;
        }
    }

    function changeDegree(index,value) {
        $("#degree"+index).val(value);
    }
    // 졸업여부 selectBox
    function changeGraduation(index,value) {
        $("#graduation"+index).val(value);
    }
</script>
<script>
    $('input[name="filePath"]').change(function(){
        if($("#attachFile").val() === ""){
            // 파일 취소
            cancel();
        } else {
            imageSave();
        }
    });

    function imageSave() {
        const imageInput = $("#attachFile")[0];
        const formData = new FormData();
        formData.append("file", imageInput.files[0]);
        formData.append("oldFilePath", $("#attachFilePath").val());

        $.ajax({
            type:"POST",
            url: "/imageUpload",
            processData: false,
            contentType: false,
            data: formData,
            async: false,
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success: function(json){
                var data = JSON.parse(json);
                if ( data.status === "success" ) {
                    $("#attachFilePath").val(data.filePath);
                    uploadCompleted(data.filePath);
                } else {
                    alert(data.message);
                }
            },
            err: function(err){
                console.log("err:", err)
            }
        });
    }

    $(document).on('change','.table-file',function(){
        var type = this.id;
        if($(this).val() === ""){
            // 파일 취소
            cancel();
        } else {
            save(this, type);
        }
    });

    function cancel() {
        alert('파일 업로드 취소되었습니다.');
    }

    function save(imageObject, type) {
        const imageIndex = $(imageObject).data("index");
        const imageInput = $(imageObject)[0];
        const formData = new FormData();
        formData.append("file", imageInput.files[0]);
        formData.append("oldFilePath", $("#"+type+"-attachedFilePath"+imageIndex).val());

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
                    $("#"+type+"-attachedFilePath"+imageIndex).val(data.filePath);
                    $("#"+type+"-attachedFileName"+imageIndex).val(data.fileName);
                    $("#"+type+"-attachedDisplayName"+imageIndex).html(data.fileName);

                } else {
                    console.log(data.message);
                }
            },
            err: function(err){
                console.log("err:", err)
            }
        });
        $(imageObject).val("");
    }
</script>
    @include('advisor/common/footer')
    @include('advisor/common/end')

