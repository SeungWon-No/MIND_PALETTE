//상담상세 슬라이더

const detailItemSlider = new Swiper('.detail-item__slider', {
  spaceBetween: 290,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
})

//대기상담 슬라이더

const stanbyCounsSlider = new Swiper('.sb-counseling__slider', {
  spaceBetween: 40,
  slidesPerView: 5,
  slidesPerGroup: 5,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.swiper-pagination',
  },
})


// 상삼상세페이지 슬라이더 - 그림 전환

const detailItemWrap = document.querySelector('.detail-item__wrap');
const detailItem = document.querySelectorAll('.detail-item');
const detailSliderWrap = document.querySelector('.detail-slider__wrap');
const detailSliderClose = document.querySelector('.detail-slider__close');


const detailItemDocumentBtn = document.querySelectorAll('.detail-item .detail-item__btn.doc'); 

detailItemDocumentBtn.forEach(function(docBtn, btnIdx) {
  docBtn.addEventListener('click', (e) => {

    detailItemWrap.classList.remove('active');
    detailSliderWrap.classList.add('active');

    detailItemSlider.slideTo(btnIdx, 0)
    detailItemSlider.update();

  })
})
if (detailSliderClose) {
  detailSliderClose.addEventListener('click', () => {
    detailItemWrap.classList.add('active');
    detailSliderWrap.classList.remove('active');
  })
} else {

}


// 상담상세 정보 탭 

const detailTabBtn = document.querySelectorAll('.detail-tab__btn');
const edtailTabContent = document.querySelectorAll('.content-cell');

detailTabBtn.forEach((tabBtn, tabBtnIdx) => {
  tabBtn.addEventListener('click', () => {

    //active클래스 지우기
    detailTabBtn.forEach((item, itemIdx) => {
      item.classList.remove('active')
      edtailTabContent[itemIdx].classList.remove('active');
    })

    //선택한 탭과 내용에만 클래스 active추가
    edtailTabContent[tabBtnIdx].classList.add('active');
    tabBtn.classList.add('active');
  })


})



//로그인 유지 체크 박스 팝업
const loginCheckBox = document.querySelector('.login-checkbox');
const loginCheckBoxAgree = document.querySelector('.login-check-agree');

if (loginCheckBox) {
  loginCheckBox.addEventListener('click', (e) => {

    if(loginCheckBox.checked == true) {
      pop.open('loginCheckBox');
    } else {
      loginCheckBox.checked = false;
    }
    loginCheckBox.checked = false;
  })
  loginCheckBoxAgree.addEventListener('click', (e) => {
    loginCheckBox.checked = true;
    pop.close();
  })

} else {
  
}

// 공감, 반대 원형그래프

const myLikeNum = document.querySelector('.my-like__num');

function arcDegCalc() {

  // 숫자가져오기
  const regex = /[^0-9]/g;

  let myLikeNumContent = myLikeNum.innerHTML.replace(regex, "");
  const myLikeNumResult = parseInt(myLikeNumContent);

  // 퍼센트 -> deg로 바꾸기
  let myLikeArcDeg = (360 * myLikeNumResult) / 100;

  // 캔버스 그리기
  const myPreferCanvas = document.querySelector('.my-prefer__canvas');
  const myPreferCtx = myPreferCanvas.getContext('2d');

  const center_x = myPreferCanvas.width / 2;
  const center_y = myPreferCanvas.height / 2;

  const grdRed = myPreferCtx.createLinearGradient(0, 0, 0, 78)
  grdRed.addColorStop(0, '#FFAEB8');
  grdRed.addColorStop(0.2, '#FFAEB8');
  grdRed.addColorStop(1, '#FF6C7E');

  const grdBlue = myPreferCtx.createLinearGradient(0, 0, 0, 78)
  grdBlue.addColorStop(0, '#D7E7FF');
  grdBlue.addColorStop(0.2, '#D7E7FF');
  grdBlue.addColorStop(1, '#71AAFF');


  // 공감 호
  myPreferCtx.beginPath();
  myPreferCtx.fillStyle = grdBlue;
  myPreferCtx.moveTo(center_x, center_y);
  myPreferCtx.arc(center_x, center_y, center_y, 0*Math.PI/180, myLikeArcDeg*Math.PI/180);
  myPreferCtx.closePath();
  myPreferCtx.fill();

  // 반대 호
  myPreferCtx.beginPath();
  myPreferCtx.fillStyle = grdRed;
  myPreferCtx.moveTo(center_x, center_y);
  myPreferCtx.arc(center_x, center_y, center_y, myLikeArcDeg*Math.PI/180, 360*Math.PI/180);
  myPreferCtx.closePath();
  myPreferCtx.fill();
}

if (myLikeNum) {
  arcDegCalc();
}

// 팝업

const pop = {

  element : null,
  elementArr: [],
  isActive : false,
  zIndex: 99999,

  //팝업 열기
  open : function( _id, _item ) {
    this.isActive = true;
    document.querySelector('html').classList.add('fix');
    this.element = document.querySelector('#' + _id);
    this.element.classList.add('active');
    this.element.style.zIndex = pop.zIndex;
  },


  //팝업 닫기
  close : function ( _item ) {
    this.isActive = false;
    document.querySelector('html').classList.remove('fix');
    this.element.classList.remove('active');
  },


  init : function(){
    //팝업 컨텐츠 외 영역 클릭시 닫기 이벤트
    document.addEventListener('click', (e) => {
      if(pop.isActive){
        if(e.target.parentNode.parentNode == pop.element){					
          pop.close();
        }
      }
    })
  },
}

pop.init();