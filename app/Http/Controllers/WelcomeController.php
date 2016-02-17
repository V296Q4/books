<?php namespace App\Http\Controllers;

//Don't forget to include these if you use them
use DB;
use Request;
use View;
use App\Http\Requests\PlaygroundRequest;
use Log;

//Don't forget to change the classname here when you make a new controller based off this one, or Laravel will return an error
class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Playground Controller
	|--------------------------------------------------------------------------
	This controller is merely to show some of the more commonly used parts of laravel and provide a basis for understanding how Laravel works.
	*/

	/**
	 * Create a new controller instance. There is no need to play with this at the moment, although the middleware helps control if a page is available to guests or only logged in users.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the homepage of the playground to people when they go to http://159.203.31.237
	 *
	 * @return View
	 */
	public function index()
	{
		Log::info('welcomecontroller');

		//Make a view using the PlayGround.blade.php template, and pass the $ip and $table variables to it with the names ClientIP and table
		$viewReturn = View::make('PlayGround')->with('ClientIP', $ip)->with('table', $table);
		return $viewReturn;
	}

	public function contact(){
		return 'contactme';
	}

}
