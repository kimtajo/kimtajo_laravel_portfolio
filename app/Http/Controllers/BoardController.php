<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;

use App\Http\Requests;


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
        //
	    $vaildation = \Validator::make($request->all(), [
		    'board_name'=>'required',
		    'title'=>'required',
		    'content'=>'required',
	    ]);
		$redirectURL = $request->get('redirect_url');

	    return redirect($redirectURL)->withInput()->withErrors($vaildation);
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
