<?php
namespace App\Http\Util;
class CounselingStatus {
    public static array $payCounselingWritingCode = [
        "306","307","308","309","310",
        "311","312","313","314","315",
        "316","317","318","319","320",
        "321","322","323","324"
    ];
    public static array $payCounselingStatus = [
        "write" => [
            "status" => "작성중",
            "class" => "gray",
        ],
        "matching" => [
            "status" => "상담사 매칭중",
            "class" => "red",
        ],
        "complete" => [
            "status" => "상담 완료",
            "class" => "gray",
        ],
    ];
    public static array $counselingStatus = [
        "290" => [
            "title" => "(우울)",
            "status" => "작성중",
            "class" => "gray",
        ],
        "291" => [
            "title" => "(우울)",
            "status" => "작성중",
            "class" => "gray",
        ],
        "292" => [
            "title" => "(우울)",
            "status" => "작성중",
            "class" => "gray",
        ],
        "349" => [
            "title" => "(우울)",
            "status" => "상담 완료",
            "class" => "silver",
        ],
        "295" => [
            "title" => "(불안)",
            "status" => "작성중",
            "class" => "gray",
        ],
        "296" => [
            "title" => "(불안)",
            "status" => "작성중",
            "class" => "gray",
        ],
        "297" => [
            "title" => "(불안)",
            "status" => "작성중",
            "class" => "gray",
        ],
        "350" => [
            "title" => "(불안)",
            "status" => "상담 완료",
            "class" => "silver",
        ],
        "298" => [
            "title" => "(자아존중감)",
            "status" => "작성중",
            "class" => "gray",
        ],
        "299" => [
            "title" => "(자아존중감)",
            "status" => "작성중",
            "class" => "gray",
        ],
        "351" => [
            "title" => "(자아존중감)",
            "status" => "상담 완료",
            "class" => "silver",
        ],
    ];
}
