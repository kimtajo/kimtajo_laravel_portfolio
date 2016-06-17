<?php

namespace App\Http\Controllers;

use App\Board;
use App\UploadFile;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $vaildation = \Validator::make($request->all(), [
//            'board_id'=>'required',
//            'file_location'=>'required',
//            'file_name'=>'required',
//        ]);
//        if()
        return $request->all();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public static function imageUpload(Request $request){


        if(!$request->hasFile('upload')){
            return json_encode(["uploaded" => 0]);
        }
        $destinationPath = "uploadedFile/image"; // 업로드 될 위치
        $extension = $request->file('upload')->getClientOriginalExtension(); // 파일 확장자

        $fileName = sha1(time().time()).".".$extension;
        $request->file('upload')->move($destinationPath, $fileName);
        $url = asset($destinationPath).'/'.$fileName;


	    return json_encode(["uploaded" => 1, "fileName" => $fileName, "url" => $url]);

    }
	public static function thumbnailUpload(UploadedFile $image, $board_id, $size = 700){

		$thumbnailPath = "uploadedFile/image/thumbnail/".$size; // 업로드 될 위치
//		$originalPath = public_path("uploadedFile/image/thumbnail/original"); // 업로드 될 위치
		$extension = $image->getClientOriginalExtension(); // 파일 확장자

		$fileName = sha1(time().time());
		$thumbnailName = $fileName."_".$size.".".$extension;
//		$originalName = $image->getClientOriginalName().".".$extension;
		if(!File::exists($thumbnailPath)){
			File::makeDirectory($thumbnailPath);
		}

//		if(!File::exists($originalPath)){
//			File::makeDirectory($originalPath);
//		}

		$thumbnail = Image::make($image->getRealPath());
		$thumbnailWidth = $thumbnail->width();
		$thumbnailHeight = $thumbnail->height();


		if($thumbnailWidth >= $thumbnailHeight && $thumbnailWidth >= $size){
			$thumbnail->resize($size, null, function ($constraint){
				$constraint->aspectRatio();
			})->save($thumbnailPath.'/'.$thumbnailName);
		}
		else if($thumbnailHeight >= $thumbnailHeight && $thumbnailHeight >= $size){
			$thumbnail->resize(null, $size, function ($constraint){
				$constraint->aspectRatio();
			})->save($thumbnailPath.'/'.$thumbnailName);
		}
		else {
			$thumbnail->save($thumbnailPath.'/'.$thumbnailName);
		}

//		Image::make($image->getRealPath())->resize(200, 300)->save($thumbnailPath.'/'.$thumbnailName);

//		$image->move($originalPath, $originalName);
		$url = asset($thumbnailPath).'/'.$thumbnailName;
		$board = new Board;
		$board->where('board_id', $board_id)->update(['thumbnail'=>$url]);
		echo $url;
		echo $thumbnailName;
		
	}

	private function _insertDatabase($board_name, $destination, $fileName){
		$upload_files = new UploadFile;

		$upload_files->board_name = $board_name;
		$upload_files->file_location = $destination;
		$upload_files->file_name = $fileName;
		$upload_files->save();
	}

}
