@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "title" => "인근 상담 센터",
])
<section id="container" class="page-body gray">
    <div class="page-contents">
        <div class="store-list-wrap">
            <div class="sort-tab">
                <div class="horizontal-swiper-scoller">
                    <div class="scoller-inner">
                        <div class="scoller-list">
                            <!--actived클래스 추가시 활성화 -->
                           <!--                          <button type="button" class="btn-sort-tab actived">거리순</button> -->
                            <button type="button" class="btn-sort-tab">이름순</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="store-list">
                <!-- 내용이 있을 때 -->
                @if(count($center) > 0)
                <div class="store-item-group">
                    @foreach($center as $centerRow)
                    <div class="card-item card-store">
                        <div class="item-info">
                            <div class="item-name">{{$centerRow->title}}</div>
                            <div class="item-address">{{$centerRow->addr1}} {{$centerRow->addr2}}</div>
                            <div class="item-btns">
                                <a href="tel:{{$centerRow->tel}}" class="btn-ui">전화하기</a>
                                <a href="{{$centerRow->siteUrl}}" target="_blank" class="btn-ui">사이트 방문하기</a>
                            </div>
                        </div>
                        <div class="item-thumb">
                            <div class="thumb-wrap">
                                <div class="thumb"><img src="{{URL::asset('/storage/image/thumb/'.$centerRow->thumImage)}}" alt=""/></div>
                                <div class="distance">--</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                    <div class="none-list-data">내용이 없습니다.</div>
                @endif
            </div>

        </div>
    </div>
</section>
@include('/mobile/common/savePopup')
@include('/mobile/common/end')

