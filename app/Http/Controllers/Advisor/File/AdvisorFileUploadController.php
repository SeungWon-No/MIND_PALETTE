<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvisorFileUploadController extends Controller
{
    public function fileUpload(Request $request)
    {
        $data = array(
            "status" => "fail",
            "message" => "",
            "filePath" => "",
        );
        try {
            if($request->hasFile('file')) {
                $path = public_path().'/file';
                if(!Storage::exists($path)){
                    Storage::disk('local')->makeDirectory('/public/file');
                }

                if ($request->oldFilePath !== "") {
                    Storage::delete('public'.$request->oldFilePath);
                }

                $file = $request->file('file')->store('public/file');
                $filePath = str_replace("public/","/",$file);

                $data["status"] = "success";
                $data["message"] = "성공";
                $data["filePath"] = $filePath;
            } else {
                $data["message"] = "첨부 파일을 찾을 수 없습니다.";
            }
        } catch (\Exception $e) {
            $data["message"] = "처리오류".$e;
        }

        return json_encode($data);
    }

    public function imageUpload(Request $request)
    {
        //
    }
}
