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
    clickable : true,
  },
})

//커스텀 셀렉트박스

function customSelectControl() {

  const customSelectBox = document.querySelectorAll('.select-box');
  const customSelectBtn = document.querySelectorAll('.select-box__label');
  const allCustomSelectOtionBox = document.querySelectorAll('.select-option__list');


  customSelectBtn.forEach((selectBtn) => {

    selectBtn.addEventListener('click', () => {
      
      const selectOptionBtn = selectBtn.nextElementSibling;
      const selectOption = [...selectOptionBtn.children];

      //다른 옵션박스 닫기
      allCustomSelectOtionBox.forEach((item) => {
        item.classList.remove('active');
      })

      //옵션박스열기
      selectOptionBtn.classList.add('active');
      
      selectOption.forEach((optionValue) => {
        optionValue.addEventListener('click', () => {
          selectBtn.innerHTML = `${optionValue.innerHTML}<span class="icon select-down-icon"></span>`
          selectOptionBtn.classList.remove('active');
        })
      })
    })
  })

  // 셀렉트박스외 클릭시 닫히기
if (customSelectBox.length != 0 ) {
  window.addEventListener('click', (e) => {
    if ( [...allCustomSelectOtionBox].includes(e.target.parentElement) || [...customSelectBox].includes(e.target.parentElement) ) {
    } else {
      allCustomSelectOtionBox.forEach((item) => {
            item.classList.remove('active');
      })
    }
  })
}
}

customSelectControl();


// 테이블 박스 추가하기
//23.01.19 수정
const tableAddBtn = document.querySelectorAll('.table-add__btn');

tableAddBtn.forEach((addBtn) => {

  addBtn.addEventListener('click', () => {

    const targetTable = addBtn.previousElementSibling.previousElementSibling;
    const targetTableTr = targetTable.querySelector('.member-table__body');
    
    const tableTr = document.createElement('tr');
    tableTr.classList.add('table-row');

    if (targetTable.classList.contains('member-table--01')) {

      const table01Content = `<td class="table-col no-padding"><div class="select-box"><button class="select-box__label">선택<span class="icon select-down-icon"></span></button><ul class="select-option__list"><li class="select-option">선택</li><li class="select-option">학사</li><li class="select-option">석사</li><li class="select-option">박사</li></ul></div></td><td class="table-col"><input type="text"class="tabel-form__control"placeholder="학교명"></td><td class="table-col"><input type="text"class="tabel-form__control"placeholder="학과명"></td><td class="table-col"><input type="text"class="tabel-form__control"placeholder="전공"></td><td class="table-col no-padding"><div class="select-box"><button class="select-box__label">선택<span class="icon select-down-icon"></span></button><ul class="select-option__list"><li class="select-option">선택</li><li class="select-option">졸업</li><li class="select-option">재학</li><li class="select-option">수료</li></ul></div></td><td class="table-col cursor"><label class="table-file__label"><input type="file"class="table-file">첨부하기</label></td><td class="table-col"><button class="table-delete__btn"><span class="icon table-delete-icon"></span></button></td>` 
      tableTr.innerHTML = table01Content;

      targetTableTr.appendChild(tableTr);
      
    } else if(targetTable.classList.contains('member-table--02')) {

      const table02Content = `<td class="table-col"><input type="text" class="tabel-form__control" placeholder="발행처"></td><td class="table-col"><input type="text" class="tabel-form__control" placeholder="자격이름"></td><td class="table-col"><label class="table-file__label"><input type="file" class="table-file"> 첨부하기</label></td><td class="table-col"><button class="table-delete__btn"><span class="icon table-delete-icon"></span></button></td>`;
      tableTr.innerHTML = table02Content;

      targetTableTr.appendChild(tableTr);
    } else if (targetTable.classList.contains('member-table--03')) {

      const table03Content = '<td class="table-col no-padding"><div class="select-box"><button class="select-box__label">선택<span class="icon select-down-icon"></span></button><ul class="select-option__list"><li class="select-option">선택</li><li class="select-option">현재 근무지</li><li class="select-option">이전 근무지</li></ul></div></td><td class="table-col"><input type="text" class="tabel-form__control" placeholder="기관검색"></td><td class="table-col no-padding"><div class="select-box"><button class="select-box__label">근무형태 <span class="icon select-down-icon"></span></button><ul class="select-option__list"><li class="select-option">근무형태</li><li class="select-option">풀타임</li><li class="select-option">파트타임</li></ul></div></td><td class="table-col"><input type="text" class="tabel-form__control" placeholder="담당업무"></td><td class="table-col"><label class="table-file__label"><input type="file" class="table-file"> 첨부하기</label></td><td class="table-col"><button class="table-delete__btn"><span class="icon table-delete-icon"></span></button></td>';

      tableTr.innerHTML = table03Content;
      targetTableTr.appendChild(tableTr);
    }

    customSelectControl();
  })

})
//23.01.19 수정 끝



// 상담상세페이지 그림 확대
  const detailItemPlusBtn = document.querySelectorAll('.detail-item__btn.plus');
  const layerPopImg = document.querySelector('.layer-img');

  detailItemPlusBtn.forEach((plusBtn, btnIdx) => {

    plusBtn.addEventListener('click', () => {

      // img src 속성가져오기
      const imgEle = plusBtn.parentElement.parentElement.children[0];
      const imgSrc = imgEle.getAttribute('src');
      

      layerPopImg.setAttribute('src', imgSrc);
      pop.open('detailImagePop');
    })

  })

//감정 그래프 버튼 동작
/* 23.01.02 삭제
const emotionOrder1Btns = document.querySelectorAll('.counselor-edit__emotion .emotion-stauts.order-01 .emotion-status__btn')
const emotionOrder2Btns = document.querySelectorAll('.counselor-edit__emotion .emotion-stauts.order-02 .emotion-status__btn')
const emotionOrder3Btns = document.querySelectorAll('.counselor-edit__emotion .emotion-stauts.order-03 .emotion-status__btn')
const emotionRefreshBtn = document.querySelector('.emotion-refresh__btn');
const emotionStauts = document.querySelectorAll('.counselor-edit__emotion .emotion-stauts')

emotionOrder1Btns.forEach((item, idx) => {
  item.addEventListener('click', () => {
    item.parentElement.parentElement.classList.remove(`step-1`)
    item.parentElement.parentElement.classList.remove(`step-2`)
    item.parentElement.parentElement.classList.remove(`step-3`)
    item.parentElement.parentElement.classList.remove(`step-4`)
    item.parentElement.parentElement.classList.add(`step-${idx+1}`);
    item.parentElement.parentElement.nextElementSibling.innerHTML = `${idx+1}단계`;

  })
})

emotionOrder2Btns.forEach((item, idx) => {
  item.addEventListener('click', () => {
    item.parentElement.parentElement.classList.remove(`step-1`)
    item.parentElement.parentElement.classList.remove(`step-2`)
    item.parentElement.parentElement.classList.remove(`step-3`)
    item.parentElement.parentElement.classList.remove(`step-4`)
    item.parentElement.parentElement.classList.add(`step-${idx+1}`);
    item.parentElement.parentElement.nextElementSibling.innerHTML = `${idx+1}단계`;
  })
})

emotionOrder3Btns.forEach((item, idx) => {
  item.addEventListener('click', () => {
    item.parentElement.parentElement.classList.remove(`step-1`)
    item.parentElement.parentElement.classList.remove(`step-2`)
    item.parentElement.parentElement.classList.remove(`step-3`)
    item.parentElement.parentElement.classList.remove(`step-4`)
    item.parentElement.parentElement.classList.add(`step-${idx+1}`);
    item.parentElement.parentElement.nextElementSibling.innerHTML = `${idx+1}단계`;
  })
})

//감정그래프 초기화

if(emotionRefreshBtn) {
  emotionRefreshBtn.addEventListener('click', () => {
    emotionStauts.forEach((item) => {
      item.classList.remove('step-1')
      item.classList.remove('step-2')
      item.classList.remove('step-3')
      item.classList.remove('step-4')
      item.classList.add('step-1')
      item.nextElementSibling.innerHTML = `1단계`;
    })
  })
} */



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
// 회원가입 이용약관, 개인정보 수집 팝업

const serviceCheckBox = document.querySelector('.serviceAgree');
const policyCheckBox = document.querySelector('.policyAgree');
const serviceCheckBtn = document.querySelector('.policy-pop__btn.service');
const policyCheckBtn = document.querySelector('.policy-pop__btn.policy')


if (serviceCheckBox) {
  serviceCheckBox.addEventListener('click', () => {

    if(serviceCheckBox.checked == true) {
      pop.open('serviceAgreeCheck');
    } else {
      serviceCheckBox.checked = false;
    }
    serviceCheckBox.checked = false;

    serviceCheckBtn.addEventListener('click', (e) => {
      serviceCheckBox.checked = true;
      pop.close();
    })
  })


  policyCheckBox.addEventListener('click', () => {

    if(policyCheckBox.checked == true) {
      pop.open('policyAgreeCheck');
    } else {
      policyCheckBox.checked = false;
    }
    policyCheckBox.checked = false;

    policyCheckBtn.addEventListener('click', (e) => {
      policyCheckBox.checked = true;
      pop.close();
    })
  })
  
}

// 공감, 반대 원형그래프
/* 23.01.02 삭제
const myLikeNum = document.querySelector('.my-like__num');

function arcDegCalc() {

  // 숫자가져오기
  // 현재 my-like__num에 적힌 숫자를 가져와 각도로 변환해서(100%일떄 360도 기준) 그래프 그리고 있습니다..
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
} */

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