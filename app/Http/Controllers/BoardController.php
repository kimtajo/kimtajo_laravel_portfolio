<?php

namespace App\Http\Controllers;

use App\Board;
use App\Tag;
use App\Term;
use Illuminate\Http\Request;

use App\Http\Requests;
use Mews\Purifier\Purifier;


class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
	    $search = '';
	    $title = '';
	    if($request->is('portfolio')){
		    $search = 'portfolio';
			$title = 'Portfolio';
	    }

	    else if($request->is('board')){
		    $search = 'board';
		    $title = 'Board';
	    }

	    $boards = Board::where('board_name', $search)->orderBy('updated_at', 'desc')->paginate(5);
	    
	    return view('materialize.board.list', compact('boards', 'title', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
	    $type = $request->get('type');

		return view('materialize.board.create', compact('type'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


		$board = new Board;
	    $board->title = $request->input('title');
	    $board->content = $request->input('content');
	    $board->board_name = $request->input('board_name');
	    $board->save();

	    if($request->hasFile('thumbnail')){
		    FileUploadController::thumbnailUpload($request->file('thumbnail'), $board->id);
	    }

	    if($request->has('startDate') && $request->has('endDate')){
			$term = new Term;
		    $term->board_id = $board->id;
		    $term->start_date = $request->input('startDate_submit');
		    $term->end_date = $request->input('endDate_submit');
		    $term->save();
	    }
	    if($request->has('tags')){
		    $tags = explode(',', trim($request->input('tags')));

		    foreach($tags as $myTag){
			    Tag::firstOrCreate(['board_id'=>$board->id, 'tag_name'=>strtolower(trim($myTag))]);

			}
	    }
	    return redirect(url($request->input('board_name')));

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
}
