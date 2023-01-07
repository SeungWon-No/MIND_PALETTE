<?php
namespace App\Http\Util;
class CounselingTemplate {
    public static array $depressionOption = [
        "questionRange" => [
            "step1" => [
                "offset" => 0,
                "limit" => 9,
            ],
            "step2" => [
                "offset" => 9,
                "limit" => 9,
            ],
            "step3" => [
                "offset" => 18,
                "limit" => 9,
            ]
        ],
        "1" => array (
            [ "content"=>"가끔 (0점)", "value"=> 0 ],
            [ "content"=>"자주 (1점)", "value"=> 1 ],
            [ "content"=>"항상 (2점)", "value"=> 2 ],
        ),
        "2" => array (
            [ "content"=>"되어갈 것이라고 생각한다 (0점)", "value"=> 0 ],
            [ "content"=>"되어갈지 확신할 수 없다 (1점)", "value"=> 1 ],
            [ "content"=>"되어가지 않는다 (2점)", "value"=> 2 ]
        ),
        "3" => array (
            [ "content"=>"웬만큼 한다 (0점)", "value"=> 0 ],
            [ "content"=>"잘못하는 경우가 많다 (1점)", "value"=> 1 ],
            [ "content"=>"모두 잘못한다 (2점)", "value"=> 2 ]
        ),
        "4" => array (
            [ "content"=>"많다 (0점)", "value"=> 0 ],
            [ "content"=>"더러 있다 (1점)", "value"=> 1 ],
            [ "content"=>"전혀 없다 (2점)", "value"=> 2 ],
        ),
        "5" => array (
            [ "content"=>"가끔 한다 (0점)", "value"=> 0 ],
            [ "content"=>"할 때가 많다 (1점)", "value"=> 1 ],
            [ "content"=>"언제나 한다 (2점)", "value"=> 2 ],
        ),
        "6" => array (
            [ "content"=>"일어나지 않을까 가끔씩 생각한다 (0점)", "value"=> 0 ],
            [ "content"=>"일어날까 걱정한다 (1점)", "value"=> 1 ],
            [ "content"=>"일어나리라는 것을 확신한다 (2점)", "value"=> 2 ],
        ),
        "7" => array (
            [ "content"=>"좋아한다 (0점)", "value"=> 0 ],
            [ "content"=>"좋아하지 않는다 (1점)", "value"=> 1 ],
            [ "content"=>"미워한다 (2점)", "value"=> 2 ],
        ),
        "8" => array (
            [ "content"=>"보통 내 탓이 아니다 (0점)", "value"=> 0 ],
            [ "content"=>"내 탓인 것이 많다 (1점)", "value"=> 1 ],
            [ "content"=>"모두 내 탓이다 (2점)", "value"=> 2 ],
        ),
        "9" => array (
            [ "content"=>"생각하지 않는다 (0점)", "value"=> 0 ],
            [ "content"=>"생각은 하지만 그렇게 하지는 않을 것이다 (1점)", "value"=> 1 ],
            [ "content"=>"하고 싶다 (2점)", "value"=> 2 ],
        ),
        "10" => array (
            [ "content"=>"때때로 든다 (0점)", "value"=> 0 ],
            [ "content"=>"많다 (1점)", "value"=> 1 ],
            [ "content"=>"매일 든다 (2점)", "value"=> 2 ],
        ),
        "11" => array (
            [ "content"=>"간혹 있다 (0점)", "value"=> 0 ],
            [ "content"=>"많다 (1점)", "value"=> 1 ],
            [ "content"=>"늘 있다 (2점)", "value"=> 2 ],
        ),
        "12" => array (
            [ "content"=>"좋다 (0점)", "value"=> 0 ],
            [ "content"=>"싫을 때가 있다 (1점)", "value"=> 1 ],
            [ "content"=>"싫다 (2점)", "value"=> 2 ],
        ),
        "13" => array (
            [ "content"=>"쉽게 내린다 (0점)", "value"=> 0 ],
            [ "content"=>"내리기가 어렵다 (1점)", "value"=> 1 ],
            [ "content"=>"쉽게 내릴 수가 없다 (2점)", "value"=> 2 ],
        ),
        "14" => array (
            [ "content"=>"괜찮게 생겼다 (0점)", "value"=> 0 ],
            [ "content"=>"못생긴 구석이 약간 있다 (1점)", "value"=> 1 ],
            [ "content"=>"못생겼다 (2점)", "value"=> 2 ],
        ),
        "15" => array (
            [ "content"=>"별로 어렵지 않게 해낼 수 있다 (0점)", "value"=> 0 ],
            [ "content"=>"해내려면 많이 노력해야만 한다 (1점)", "value"=> 1 ],
            [ "content"=>"해내려면 언제나 노력해야만 한다 (2점)", "value"=> 2 ],
        ),
        "16" => array (
            [ "content"=>"쉽다 (0점)", "value"=> 0 ],
            [ "content"=>"어려울 때가 많다 (1점)", "value"=> 1 ],
            [ "content"=>"매일 어렵다 (2점)", "value"=> 2 ],
        ),
        "17" => array (
            [ "content"=>"가끔 (0점)", "value"=> 0 ],
            [ "content"=>"자주 (1점)", "value"=> 1 ],
            [ "content"=>"언제나 (2점)", "value"=> 2 ],
        ),
        "18" => array (
            [ "content"=>"좋다 (0점)", "value"=> 0 ],
            [ "content"=>"없을 때가 많다 (1점)", "value"=> 1 ],
            [ "content"=>"없을 때가 대부분이다 (2점)", "value"=> 2 ],
        ),
        "19" => array (
            [ "content"=>"걱정하지 않는다 (0점)", "value"=> 0 ],
            [ "content"=>"걱정할 때가 많다 (1점)", "value"=> 1 ],
            [ "content"=>"항상 걱정한다 (2점)", "value"=> 2 ],
        ),
        "20" => array (
            [ "content"=>"가끔 (0점)", "value"=> 0 ],
            [ "content"=>"자주 (1점)", "value"=> 1 ],
            [ "content"=>"항상 (2점)", "value"=> 2 ],
        ),
        "21" => array (
            [ "content"=>"재미있을 때가 많다 (0점)", "value"=> 0 ],
            [ "content"=>"가끔씩 재미있다 (1점)", "value"=> 1 ],
            [ "content"=>"재미있었던 적이 없다 (2점)", "value"=> 2 ],
        ),
        "22" => array (
            [ "content"=>"많다 (0점)", "value"=> 0 ],
            [ "content"=>"좀 있지만 더 있었으면 한다 (1점)", "value"=> 1 ],
            [ "content"=>"하나도 없다 (2점)", "value"=> 2 ],
        ),
        "23" => array (
            [ "content"=>"괜찮다(0점)", "value"=> 0 ],
            [ "content"=>"예전처럼 좋지는 않다 (1점)", "value"=> 1 ],
            [ "content"=>"예전에는 좋았는데 요즘 뚝 떨어졌다 (2점)", "value"=> 2 ],
        ),
        "24" => array (
            [ "content"=>"착하다 (0점)", "value"=> 0 ],
            [ "content"=>"마음만 먹으면 착할 수가 있다 (1점)", "value"=> 1 ],
            [ "content"=>"절대로 착할 수가 없다 (2점)", "value"=> 2 ],
        ),
        "25" => array (
            [ "content"=>"분명히 있다 (0점)", "value"=> 0 ],
            [ "content"=>"있을 지 확실하지 않다 (1점)", "value"=> 1 ],
            [ "content"=>"아무도 없다 (2점)", "value"=> 2 ],
        ),
        "26" => array (
            [ "content"=>"대체로 한다 (0점)", "value"=> 0 ],
            [ "content"=>"제대로 하지 않는다 (1점)", "value"=> 1 ],
            [ "content"=>"절대로 하지 않는다 (2점)", "value"=> 2 ],
        ),
        "27" => array (
            [ "content"=>"사이좋게 지낸다 (0점)", "value"=> 0 ],
            [ "content"=>"잘 싸운다 (1점)", "value"=> 1 ],
            [ "content"=>"언제나 싸운다 (2점)", "value"=> 2 ],
        ),
    ];
    public static array $anxietyOption = [
        "questionRange" => [
            "step1" => [
                "offset" => 0,
                "limit" => 7,
            ],
            "step2" => [
                "offset" => 7,
                "limit" => 7,
            ],
            "step3" => [
                "offset" => 14,
                "limit" => 7,
            ]
        ],
    ];
    public static array $selfWorthOption = [
        "questionRange" => [
            "step1" => [
                "offset" => 0,
                "limit" => 5,
            ],
            "step2" => [
                "offset" => 5,
                "limit" => 5,
            ]
        ],
    ];

    public static function getTemperamentTestLevel($score) {
        $level = "";
        if ($score <= 32) {
            $level = "L";
        } else if ($score <= 64) {
            $level = "M";
        } else {
            $level = "H";
        }
        return $level;
    }
}
