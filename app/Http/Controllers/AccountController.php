<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\AccountRegistrar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Contracts\Auth\Guard;

/**
 * Class AccountController
 * @package App\Http\Controllers
 */
class AccountController extends Controller {

	use AuthenticatesAndRegistersUsers;

	protected $redirectPath = "/account";

	public function __construct(Guard $auth, AccountRegistrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		parent::__construct();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(!Auth::check())
			return view('account.login');


		$orders = auth::user()->orders()->with('Items','Items.Product','Items.Product.images')->orderBy('created_at', 'asc')->limit(3)->get();

		return view('account.account',compact('orders'));
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
     */
	public function login(Request $request)
	{
		if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){

		}

		return redirect()->back();
	}

	public function register(Request $request){

		$validator = $this->registrar->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		$this->auth->login($this->registrar->create($request->all()));
	}
	/**
	 *
     */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

}
