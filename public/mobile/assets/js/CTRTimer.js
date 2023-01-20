var timerInterval = null;
var timeCount = 0;
var timeStatus = "ready";
function timer() {
    if (timeStatus === "disabled") {
        return false;
    }
    if ( timerInterval == null ) {
        timeStatus = "complete";
        $("#timerBox").removeClass("disabled");

        $("#drawButton").removeClass("ready");
        $("#drawButton").removeClass("complete");
        $("#drawButton").removeClass("disabled");
        $("#drawButton").addClass("complete");
        $("#drawButton").text("그리기 완료");

        timerInterval = setInterval(function (){
            timeCount++;
            setTimeText();
        },1000);
    } else {
        paintingCompleteTimer();
        clearInterval(timerInterval);
        timerInterval = null;
    }
}
function paintingCompleteTimer() {
    timeStatus = "disabled";

    $("#drawButton").removeClass("ready");
    $("#drawButton").removeClass("complete");
    $("#drawButton").removeClass("disabled");
    $("#drawButton").addClass("disabled");
    $("#questionForm").removeClass("disabled");

    checkQuestionsTimer();
}
function clearTimer() {

    timeStatus = "ready";
    $("#cardBox").removeClass("valid-error");
    $("#timerBox").addClass("disabled");
    $("#questionForm").addClass("disabled");

    $("#drawButton").removeClass("ready");
    $("#drawButton").removeClass("complete");
    $("#drawButton").removeClass("disabled");
    $("#drawButton").addClass("ready");
    $("#drawButton").text("그리기 시작");

    $("#timerText").text("00:00");
    $(".hiddenTimer").val("");

    clearFrom();

    timeCount = 0;
    if ( timerInterval != null ) {
        clearInterval(timerInterval);
        timerInterval = null;
    }
}
function setTimeText() {
    var min = parseInt(timeCount/60);
    var sec = parseInt(timeCount%60);

    var timeText = min.toString().padStart(2,'0')+":"+sec.toString().padStart(2,'0');
    $("#timerText").text(timeText);
    $(".hiddenTimer").val(timeText);
}
