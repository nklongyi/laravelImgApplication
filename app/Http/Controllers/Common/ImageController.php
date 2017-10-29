<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{

    /**单图上传
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sigleupload(Request $request){

        if(!$request->hasFile('fengmiantu')){
            exit('上传文件为空！');
        }

        $file = $request->file("fengmiantu");
        //上传7牛云
        $ret =  qiniu_upload($file);

        return response()->json(['status'=>'200','data'=>$ret]);
    }

    /**多图上传
     * @param Request $request
     */
    public function multiFileUpload(Request $request){
        $imgInfoArray = array();
        $files = $request->file('content');
        if (!$request->hasFile('content')){
            exit('上传文件为空！');
        }
        if($request->hasFile('content')){
            foreach ($request->file('content') as $file){
                $ret =  qiniu_upload($file);
                array_push($imgInfoArray,$ret);
            }
        }
        //将所有图片数据写入数据库

        return response()->json(['status'=>'200','data'=>$imgInfoArray]);
    }
}
