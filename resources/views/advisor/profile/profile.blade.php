@include('advisor/common/header')
    <div id="container" class="white">
      <div class="profile-cont">
        <div class="profile-inner">
          <div class="profile-wrapper">
            <div class="porfile-row-1">
              <div class="profile-row__photo">
                <img src="../advisorAssets/assets/images/user-profile.jpg" alt="" class="profile-row__img">
              </div>
              <div class="profile-row__name">{{$advisorProfile['advisorName']}} 상담사</div>
              <div class="profile-row__center">{{$advisorProfile->centerName}}</div>
              <a href="/advisor/profile/profileUpdate" class="profile-row__link">프로필 수정하기 <span class="icon link-more-icon"></span></a>
            </div>
            <div class="porfile-row-2">
              <div class="profile-col">
                <div class="profile-col__heading">자기소개</div>
                <div class="profile-col__content">
                  <p class="introduce-oneline">{{$advisorProfile['briefIntroduction']}}</p>
                  <p class="introduce__desc">
                  {{$advisorProfile['detailedDescription']}}
                  </p>
                </div>
              </div>
              <div class="profile-col">
                <div class="profile-col__heading">학력사항</div>
                <div class="profile-col__content">
                  <p class="profile-col__set">설정된 학력사항입니다.</p>
                  <div class="profile-col__data-cell">
                    @foreach($getAdvisorEducationInfo as $list)
                    <p class="profile-col__data">∙ {{$list['school']}} {{$list['major']}} {{$list['degree']}}</p>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="profile-col">
                <div class="profile-col__heading">경력사항</div>
                <div class="profile-col__content">
                  <p class="profile-col__set">설정된 경력사항입니다.</p>
                  <div class="profile-col__data-cell">
                      @foreach($advisorCareerInfo as $advisorCareerInfoRow)
                    <p class="profile-col__data">∙ {{$advisorCareerInfoRow->companyName}}</p>
                      @endforeach

                  </div>
                </div>
              </div>
            </div>
            <div class="porfile-row-3">
              <!-- 22.12.30 수정 -->
              <div class="profile-col">
                <div class="profile-col__heading">나의 상담지수</div>
                <div class="profile-col__content flex">
                  <div class="profile-star__left">
                    <div class="profile-star__wrap">
                      <div class="profile-star__icon">
                        <div class="star-icon__cell">
                            <span class="star-icon__value" style="width: {{($advisorProfile->rating == 0)?0:sprintf('%0.1f',($advisorProfile->rating/$advisorProfile->ratingCount)/5*100)}}%;"></span>
                        </div>
                      </div>
                      <div class="profile-star__value">
                        <div class="profile-star__num">{{($advisorProfile->rating == 0)?0:sprintf('%0.1f', ($advisorProfile->rating/$advisorProfile->ratingCount))}}</div>
                        <span>평균점수</span>
                      </div>
                    </div>
                  </div>
                  <div class="profile-star__right">
                    <div class="star-group__data">
                      <div class="star-group__item">
                        <div class="star-icon__cell">
                          <span class="star-icon__value" style="width: 100%;"></span>
                        </div>
                        <div class="star-group__value">
                          <div class="star-group__unit">5점</div>
                          <div class="star-group__num">({{number_format($rating5)}})</div>
                        </div>
                      </div>
                      <div class="star-group__item">
                        <div class="star-icon__cell">
                          <span class="star-icon__value" style="width: 80%;"></span>
                        </div>
                        <div class="star-group__value">
                          <div class="star-group__unit">4점</div>
                          <div class="star-group__num">({{number_format($rating4)}})</div>
                        </div>
                      </div>
                      <div class="star-group__item">
                        <div class="star-icon__cell">
                          <span class="star-icon__value" style="width: 60%;"></span>
                        </div>
                        <div class="star-group__value">
                          <div class="star-group__unit">3점</div>
                          <div class="star-group__num">({{number_format($rating3)}})</div>
                        </div>
                      </div>
                      <div class="star-group__item">
                        <div class="star-icon__cell">
                          <span class="star-icon__value" style="width: 40%;"></span>
                        </div>
                        <div class="star-group__value">
                          <div class="star-group__unit">2점</div>
                          <div class="star-group__num">({{number_format($rating2)}})</div>
                        </div>
                      </div>
                      <div class="star-group__item" >
                        <div class="star-icon__cell">
                          <span class="star-icon__value" style="width: 20%;"></span>
                        </div>
                        <div class="star-group__value">
                          <div class="star-group__unit">1점</div>
                          <div class="star-group__num">({{number_format($rating1)}})</div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <!-- //22.12.30 수정 -->
              <div class="profile-col">
                <div class="profile-col__heading">자격사항</div>
                <div class="profile-col__content">
                  <p class="profile-col__set">설정된 자격사항입니다.</p>
                  <div class="profile-col__data-cell">
                    @foreach($getAdvisorQualificationInfo as $list)
                    <p class="profile-col__data">∙ {{$list['issuingAgency']}} {{$list['certificateName']}}</p>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
          <a href="#" class="member-out__btn">회원탈퇴 <span class="icon link-more-icon"></span></a>
        </div>
      </div>
    </div> <!-- container end-->
    @include('advisor/common/footer')
    @include('advisor/common/end')
