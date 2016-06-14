<?php

namespace App\Http\Controllers;

use App\UploadFile;
use Illuminate\Http\Request;

use App\Http\Requests;

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

    public function imageUpload(Request $request){
	    return $request->all();
//
//        if(!$request->hasFile('upload')){
//            return json_encode(["uploaded" => 0]);
//        }
//        $destinationPath = "uploadedFile/image"; // 업로드 될 위치
//        $extension = $request->file('upload')->getClientOriginalExtension(); // 파일 확장자
//        $realFileName = $request->file('upload')->getClientOriginalName(); // 파일 이름
//        $fileName = sha1(time().time()).".".$extension;
//        $request->file('upload')->move($destinationPath, $fileName);
//        $url = asset($destinationPath).'/'.$fileName;
//
//	    $this->_insertDatabase($request->get('board_name'), $destinationPath, $fileName);
//
//	    return json_encode(["uploaded" => 1, "fileName" => $fileName, "url" => $url]);

    }

	private function _insertDatabase($board_name, $destination, $fileName){
		$upload_files = new UploadFile;

		$upload_files->board_name = $board_name;
		$upload_files->file_loaction = $destination;
		$upload_files->file_name = $fileName;
		$upload_files->save();
	}
}
