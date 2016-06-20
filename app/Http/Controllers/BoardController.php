<?php

namespace App\Http\Controllers;

use App\Board;
use App\Helpers\TajoHelpers;
use App\Tag;
use App\Term;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\ResponseFactory;


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
	    $type = '';
	    $title = '';
	    if($request->is('portfolio')){
		    $type = 'portfolio';
			$title = 'Portfolio';
	    }

	    else if($request->is('board')){
		    $type = 'board';
		    $title = 'Board';
	    }

	    $boards = Board::where('board_name', $type)->orderBy('board_id', 'desc')->paginate(4);

	    return view('materialize.board.list', compact('boards', 'title', 'type'));
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
		    FileUploadController::thumbnailUpload($request->file('thumbnail'), $board->board_id);
	    }

	    if($request->has('startDate') && $request->has('endDate')){

			$term = new Term;
		    $term->board_id = $board->board_id;
		    $term->start_date = $request->input('startDate_submit');
		    $term->end_date = $request->input('endDate_submit');
		    $term->save();
	    }
	    if($request->has('tags')){
		    $tags = explode(',', trim($request->input('tags')));

		    foreach($tags as $myTag){
			    Tag::firstOrCreate(['board_id'=>$board->board_id, 'tag_name'=>strtolower(trim($myTag))]);
			}
	    }
	    return redirect(route($board->board_name.'.index'));

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
		if(\Request::has('page'))
	        $page = \Request::input('page');
	    else
		    $page = 1;

	    $board = Board::find($id);

	    $type = $board->board_name;
	    if($type == 'portfolio')
		    $term = Board::find($id)->terms()->first();

	    $tags = Board::find($id)->tags()->getResults();

		return view('materialize.board.view', compact('board', 'type', 'term', 'tags', 'page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    if(\Request::has('page'))
		    $page = \Request::input('page');
	    else
		    $page = 1;

	    $board = Board::find($id);
        $terms = Board::find($id)->terms()->getResults();
	    $tags = Board::find($id)->tags()->getResults();
	    $cnt = $tags->count();
	    $tag_text = '';
	    $i = 0;
	    foreach($tags as $tag){
			$tag_text .= $tag->tag_name;
		    if(++$i != $cnt)
			    $tag_text .= ", ";
	    }
		$type = $board->board_name;
	    return view('materialize.board.edit', compact('board', 'terms', 'tag_text', 'type', 'page'));
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
//	    return $request->all();
	    if($request->has('page'))
		    $page = $request->input('page');
	    else
		    $page = 1;

	    $board = Board::findOrFail($id);
	    $board->title = $request->input('title');
	    $board->content = $request->input('content');
		$board->save();
		$type = $board->board_name;

	    if($request->has('startDate_submit') && $request->has('endDate_submit')){
		    $term = Term::where('board_id', $id)->first();
		    $term->start_date = $request->input('startDate_submit');
		    $term->end_date = $request->input('endDate_submit');
		    $term->save();
	    }
	    else{
		    Term::where('board_id', $id)->delete();

	    }

	    if($request->has('tags')){
		    $input_tags = explode(',', preg_replace("/\s| /", "", $request->input('tags')));
			$save_tags = Tag::where('board_id', $id)->pluck('tag_name')->all();

		    $insert_tags = TajoHelpers::compareCollection($input_tags, $save_tags, 'insert');
		    $delete_tags = TajoHelpers::compareCollection($input_tags, $save_tags, 'delete');

		    foreach ($delete_tags as $tag){
				Tag::where(['board_id'=>$id, 'tag_name'=>$tag])->delete();
		    }
		    foreach ($insert_tags as $tag){
			    Tag::firstOrCreate(['board_id'=>$id, 'tag_name'=>strtolower(trim($tag))]);
		    }

	    }

	    return redirect(route($board->board_name.'.show', $id)."?page=".$page);
	    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $board = Board::findOrFail($id);
	    $type = $board->board_name;
	    if(!(\Auth::check()))
		    return redirect(route($type.'.index'));

	    $user = \Request::user();
	    if($user->id != 1)
		    return redirect(route($type.'.index'));
	    $board->delete();

	    return redirect(route($type.'.index'));

    }
}
