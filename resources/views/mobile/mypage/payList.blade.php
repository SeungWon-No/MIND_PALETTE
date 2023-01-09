@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "title" => "상담 결제내역"
])
<section id="container" class="page-body gray">
    <div class="page-contents">
        <div class="mypage-wrap">
            <!-- 내용이 있을 때 -->
            @if(count($counseling) > 0)
                <div class="card-use-group">
                    @foreach($counseling as $counselingRow)
                        <div class="card-item card-use">
                            <div class="item-info">
                                <div class="item-date">{{$counselingRow->createDate}}</div>
                                <div class="item-name">HTP 상담검사</div>
                                <div class="item-card-num">한시적 무료</div>
                            </div>
                            <div class="item-price"><strong>0</strong> 원</div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="none-list-data">내용이 없습니다.</div>
            @endif
        </div>
    </div>
</section>
@include('/mobile/common/end')

