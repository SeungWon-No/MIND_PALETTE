@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => true,
    "title" => "우울"
])
<script>
    function pageClose(){
        // location.href = '/';
    }
</script>
<section id="container" class="page-body">
<div class="page-contents">
    <div class="advice-survey-write">
        <div class="basic-data-group">
            <div class="point-note actived">
                <div class="btn-point-note-nav"><em>실시 방법</em></div>
                <div class="point-note-desc"><div class="txt">아이의 상태를 3개 문장 중 하나에 표시합니다.<br>아이가 직접 답변을 선택하도록 해주세요.</div></div>
            </div>
        </div>
        <div class="basic-data-group">
            <div class="survey-group">
                @foreach($questions as $questionsRow)
                <div class="survey-items">
                    <div class="item-title">{!! $questionsRow->questions !!}</div>
                    <div class="item-data">
                        <div class="form-survey-check">
                            <div class="form-survey-vertical-inputs">
                                <label class="form-checkbox-buttons">
                                    <input type="radio" name="radio1">
                                    <em>{{$options[($questionsRow->questionsPK)][0]["content"]}}</em>
                                </label>
                                <label class="form-checkbox-buttons">
                                    <input type="radio" name="radio1">
                                    <em>{{$options[($questionsRow->questionsPK)][1]["content"]}}</em>
                                </label>
                                <label class="form-checkbox-buttons">
                                    <input type="radio" name="radio1">
                                    <em>{{$options[($questionsRow->questionsPK)][2]["content"]}}</em>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        <div class="page-bottom-ui"><a href="#" class="btn btn-orange btn-large-size btn-page-action">다음으로</a></div>
    </div>
</div>
</section>
@include('/mobile/common/end')

