<?php namespace App\Http\Controllers;

//Don't forget to include these if you use them
use DB;
use Request;
use View;
use App\Http\Requests\PlaygroundRequest;
use Log;

//Don't forget to change the classname here when you make a new controller based off this one, or Laravel will return an error
class PlaygroundController extends Controller {

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
		Log::info('test');
		//Start connection to the alexdb (the default database set up in database.config file), select * from the PlayGround table in descending ID order
		$result = DB::connection('alexdb')->select('SELECT * FROM PlayGround ORDER BY id DESC');
		//Make a string variable with Bootstrap HTML table headers
		$table = '<table class="table table-striped"><thead><tr><th>Book Name</th><th>Book Hash</th><th>ISBN</th><th>Submitted By</th></tr></thead><tbody>';
		foreach($result as $row){
			//Iterate through the each row in result, and grab the the data from each of the 4 columns in the MySQL table. Append this as another row in the HTML table
			$table .= '<tr><td>' . $row['bookName'] . '</td><td>' . $row['bookHash'] . '</td><td>' . $row['isbn'] . '</td><td>' . $row['submittedBy'] . '</td></tr>';
		}
		$table .= '</tbody></table>';
		$ip = Request::ip();

		$viewReturn = View::make('PlayGround')->with([
			'ClientIP' => $ip,
			'table' => $table
		]);
		
		return $viewReturn;
	}
	
	/**
	 * Called when someone submits the form on the homepage
	 *
	 * @return View (or in this case, redirect)
	 */
	public function submit(PlaygroundRequest $request)
	{
		//Form submission creates a PlaygroundRequest object $request. Get the form field named 'title' from the $request, and trim it to fit in the MySQL database if necessary (max 1020 characters)
		$title = mb_strimwidth($request->get('title'), 0, 1020, "");
		//Get an MD5 hash of the title
		$hash = md5($title);
		//Get a random 9 digit integer
		$isbn = rand(100000000,999999999);
		//Get the Client IP
		$ip = Request::ip();
		Log::info('submitted name:'.$title);
		//Connect to the alexdb database, and insert into the table a new record with the title, hash, isbn, and IP of the client that submitted the form
		DB::connection('alexdb')->insert('INSERT INTO PlayGround (bookName, bookHash, isbn, submittedBy) VALUES (?, ?, ?, ?)', [$title, $hash, $isbn, $ip]);
		
		//redirect to the root again (http://159.203.31.237), thus invoking the index() method
		return redirect('/');
	}

}
