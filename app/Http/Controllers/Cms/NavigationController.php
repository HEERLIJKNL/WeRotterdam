<?php namespace App\Http\Controllers\Cms;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\NavigationItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class NavigationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$NavigationItems = NavigationItem::all();
		return view('cms.navigation.navigation',compact('NavigationItems'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$NavigationItem = new NavigationItem;
		return view('cms.navigation.edit',compact('NavigationItem'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$NavigationItem = NavigationItem::create($request->all());
		$NavigationItem->save();

		return Redirect::route("admin.navigation.index");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$NavigationItem = NavigationItem::find($id);
		return view('cms.navigation.edit',compact('NavigationItem'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		$NavigationItem = NavigationItem::find($id);
		$NavigationItem->fill($request->all());
		$NavigationItem->save();

		return Redirect::route("admin.navigation.index");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function activate($id)
	{
		$NavigationItem = NavigationItem::find($id);
		$NavigationItem->active = 1;
		$NavigationItem->save();

		return Redirect::route("admin.navigation.index");
	}

	public function deactivate($id){
		$NavigationItem = NavigationItem::find($id);
		$NavigationItem->active = 0;
		$NavigationItem->save();

		return Redirect::route("admin.navigation.index");
	}

}
