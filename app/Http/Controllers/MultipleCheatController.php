<?php namespace App\Http\Controllers;

use DB;
use Request;
use View;
use Log;

class MultipleCheatController extends Controller {

	public function __construct(){
		$this->middleware('guest');
	}

	public function index(){
		$bookIds = array(590,610,615, 503, 100, 900, 700, 800);
		$viewReturn = View::make('MultipleCheat')->with(
			['bookIds' => $bookIds]
		);
		

		return $viewReturn;
	}

}
