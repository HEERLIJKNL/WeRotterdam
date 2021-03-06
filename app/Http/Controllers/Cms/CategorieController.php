<?php namespace App\Http\Controllers\Cms;

use App\categorie;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

/**
 * Class CategorieController
 * @package App\Http\Controllers\Cms
 */
class CategorieController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = categorie::all();
		return view('cms.categories.categories',compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cms.categories.edit');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$categorie = new categorie();
		$categorie->fill($request->all());
		$categorie->slug = $request->name;
		$categorie->save();

		return redirect()->action('Cms\CategorieController@index');
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
		$categorie = categorie::find($id);
		return view('cms.categories.edit',compact('categorie'));
	}


	/**
	 * @param Request $request
     */
	public function update($id, Request $request)
	{
		$categorie = categorie::find($id);
		$categorie->fill($request->all());
		$categorie->slug = $request->name;
		$categorie->save();

		return redirect()->action('Cms\CategorieController@index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		categorie::destroy($id);

		return redirect()->back();
	}

}
