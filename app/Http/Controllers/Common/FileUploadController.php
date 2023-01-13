<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class FileUploadController extends Controller
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
                $fileOriginName = $request->file('file')->getClientOriginalName();
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
                $data["fileName"] = $fileOriginName;
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
        $data = array(
            "status" => "fail",
            "message" => "",
            "filePath" => "",
        );
        try {
            if($request->hasFile('file')) {
                $path = public_path().'/image/origin';
                $pathThumb = public_path().'/image/thumb';
                if(!Storage::exists($path)){
                    Storage::disk('local')->makeDirectory('/public/image/origin');
                }
                if(!Storage::exists($pathThumb)){
                    Storage::disk('local')->makeDirectory('/public/image/thumb');
                }

                if ($request->oldFilePath !== "") {
                    Storage::delete('public'."/image/origin/".$request->oldFilePath);
                    Storage::delete('public'."/image/thumb/".$request->oldFilePath);
                }

                $file = $request->file('file');
                $random = mt_rand(1, 100);

                $fileFormat = explode(".",$file->getClientOriginalName());
                $fileName = time().$random.".".$fileFormat[count($fileFormat)-1];

                Image::make($file->getRealPath())->widen(500, function ($constraint) {
                    $constraint->upsize();
                })->save(storage_path("app/public/image/thumb/".$fileName), 65);

                Image::make($file->getRealPath())->save(storage_path("app/public/image/origin/".$fileName), 100);

                $data["status"] = "success";
                $data["message"] = "성공";
                $data["filePath"] = $fileName;
            } else {
                $data["message"] = "첨부 파일을 찾을 수 없습니다.";
            }
        } catch (\Exception $e) {
            $data["message"] = "처리오류".$e;
        }

        return json_encode($data);
    }
}
