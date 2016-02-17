<?php namespace App\Http\Controllers;

use DB;
use Request;
use View;
use Log;

class BookViewController extends Controller {

	public function __construct(){
		$this->middleware('guest');
	}

	public function index($bookId){
		$bookResult = DB::connection('alexdb')->select('SELECT * FROM Books WHERE id = ?', [$bookId]);
		if(count($bookResult) > 0){
			$table = '<table class="table table-striped"><thead><tr><th>Attribute</th><th>Content</th></tr></thead><tbody>';
			$attributeNames = DB::connection('alexdb')->select('SELECT * FROM Attributes');

			foreach($attributeNames as $row){
				$attributeValue = $bookResult[0][$row['columnName']];
				if($attributeValue != NULL){
					$table .= '<tr><td>' . $row['labelName'] . '</td><td>' . $attributeValue . '</td></tr>';

				}
			}

			$table .= '</tbody></table>';
			$viewReturn = View::make('BookView')->with([
				'bookTitle' => $bookResult[0]['title'],
				'table' => $table,
				'bookIds' => $bookResult[0]['id']
			]);
		}
		else{
			$viewReturn = View::make('BookView')->with([
				'bookTitle' => 'No book found with Id: ' . $bookId,
				'bookIds' => -1
			]);
		}

		return $viewReturn;
	}

}
