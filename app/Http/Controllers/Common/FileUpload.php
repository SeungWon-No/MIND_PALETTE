<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class FileUpload extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if (!$request->hasFile('upload')) {
            return response()->json([
                'message' => '파일이 정상적으로 업로드되지 않았습니다'
            ], 400);
        }
        $uploadFile = $request->file('upload');
        if (!is_array($uploadFile)) {
            $uploadFile = [$uploadFile];
        }

        $path = public_path().'/image/editor';
        if(!Storage::exists($path)){
            Storage::disk('local')->makeDirectory('/public/image/editor');
        }

        $urls = [];
        $random = mt_rand(1, 100);
        foreach ($uploadFile as $index => $file) {
            $ext = $file->getClientOriginalName();

            $fileFormat = explode(".",$file->getClientOriginalName());
            $fileName = time().$random.$index.".".$fileFormat[count($fileFormat)-1];


            Image::make($file->getRealPath())->widen(1200, function ($constraint) {
                $constraint->upsize();
            })->save(storage_path("app/public/image/editor/".$fileName), 80);

            $urls[] = "/storage/image/editor/".$fileName;
        }

        return response()->json([
            'url' => $urls,
        ]);
    }
}
