@include('advisor/common/header')
    <div id="container" class="white">
      <div class="profile-cont">
        <div class="profile-inner">
          <div class="profile-wrapper">
            <div class="porfile-row-1">
              <div class="profile-row__photo">
                <img src="../advisorAssets/assets/images/user-profile.jpg" alt="" class="profile-row__img">
              </div>
              <div class="profile-row__name">김아무 상담사</div>
              <div class="profile-row__center">사랑마음 상담센터</div>
              <a href="#" class="profile-row__link">프로필 수정하기 <span class="icon link-more-icon"></span></a>
            </div>
            <div class="porfile-row-2">
              <div class="profile-col">
                <div class="profile-col__heading">자기소개</div>
                <div class="profile-col__content">
                  <p class="introduce-oneline">따듯한 마음을 전합니다.</p>
                  <p class="introduce__desc">
                    아이의 전문적인 상담이 필요하신가요? 아이만을 위한 ‘개인적인 공간'에서 편안하게 고민을 털어 놓아주세요.꽁꽁 사매고 있던 짐을 나눠드릴 수<br> 있는 시간들이 되실거라 기대합니다.
                  </p>
                </div>
              </div>
              <div class="profile-col">
                <div class="profile-col__heading">학력사항</div>
                <div class="profile-col__content">
                  <p class="profile-col__set">설정된 학력사항입니다.</p>
                  <div class="profile-col__data-cell">
                    <p class="profile-col__data">∙ 서*대학교 의학 학사</p>
                    <p class="profile-col__data">∙ 서*대 대학원 의학 석사</p>
                    <p class="profile-col__data">∙ 現 사랑 마음 상담센터 전문의</p>
                  </div>
                </div>
              </div>
              <div class="profile-col">
                <div class="profile-col__heading">기타사항</div>
                <div class="profile-col__content">
                  <p class="profile-col__set">설정된 기타사항입니다.</p>
                  <div class="profile-col__data-cell">
                    <p class="profile-col__data">∙ 서*대학교 의학 학사</p>
                    <p class="profile-col__data">∙ 서*대 대학원 의학 석사</p>
                    <p class="profile-col__data">∙ 現 사랑 마음 상담센터 전문의</p>
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
                            <span class="star-icon__value" style="width: 90%;"></span>
                        </div>
                      </div>
                      <div class="profile-star__value">
                        <div class="profile-star__num">4.5</div>
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
                          <div class="star-group__num">(64)</div>
                        </div>
                      </div>
                      <div class="star-group__item">
                        <div class="star-icon__cell">
                          <span class="star-icon__value" style="width: 80%;"></span>
                        </div>
                        <div class="star-group__value">
                          <div class="star-group__unit">4점</div>
                          <div class="star-group__num">(30)</div>
                        </div>
                      </div>
                      <div class="star-group__item">
                        <div class="star-icon__cell">
                          <span class="star-icon__value" style="width: 60%;"></span>
                        </div>
                        <div class="star-group__value">
                          <div class="star-group__unit">3점</div>
                          <div class="star-group__num">(10)</div>
                        </div>
                      </div>
                      <div class="star-group__item">
                        <div class="star-icon__cell">
                          <span class="star-icon__value" style="width: 40%;"></span>
                        </div>
                        <div class="star-group__value">
                          <div class="star-group__unit">2점</div>
                          <div class="star-group__num">(8)</div>
                        </div>
                      </div>
                      <div class="star-group__item" >
                        <div class="star-icon__cell">
                          <span class="star-icon__value" style="width: 20%;"></span>
                        </div>
                        <div class="star-group__value">
                          <div class="star-group__unit">1점</div>
                          <div class="star-group__num">(3)</div>
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
                    <p class="profile-col__data">∙ 서*대학교 의학 학사</p>
                    <p class="profile-col__data">∙ 서*대 대학원 의학 석사</p>
                    <p class="profile-col__data">∙ 現 사랑 마음 상담센터 전문의</p>
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