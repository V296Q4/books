<?php namespace App\Http\Controllers;

use DB;
use Request;
use View;

class SearchController extends Controller{
	
	public function __construct(){
		$this->middleware('guest');
	}
	
	public function Search() {
		$input = Request::input('input');  
		if ($input == "" || $input == null){
			//echo "<p>Not a valid input.</p>"; 
			$viewReturn = View::make('SearchResults');
		}
		else{
			$attributeList = DB::connection('alexdb')->select('SELECT * FROM Attributes');

			$table = '<table class="table table-striped"><thead><tr><th>Id</th><th>Title</th><th>Author</th><th>Year Printed</th></tr></thead><tbody>';
			
			$result = array();
			
			$maxResultCount = 100;//temporary, until search pages are implemented
			$currentResultCount = 0;
			$alreadyListedIds = array();
			
		    foreach($attributeList as $attribute){
				
				$selectString = "SELECT * FROM Books WHERE " . $attribute['columnName'] . " LIKE '%" . $input . "%'";
				$queryResults = DB::connection('alexdb')->select($selectString);
				foreach($queryResults as $bookResult){
					$currentResultCount ++;
					if($currentResultCount < $maxResultCount){
						if(!in_array($bookResult['id'], $alreadyListedIds)){
							$bookUrl = '/book/' . $bookResult['id'];
							$table .= '<tr><td>' . $bookResult['id'] . '</td><td><a href="' . $bookUrl . '">' . $bookResult['title'] . '</a></td><td>' . $bookResult['authorGivenNames'] . 
								' ' . $bookResult['authorSurnames'] . '</td><td>' . $bookResult['printDate'] . '</td></tr>';
							$alreadyListedIds[] = $bookResult['id'];
							//TODO: is printDate the year it came out, or the year the physical copy was printed?
						}
					}
				}

			}
			$table .= '</tbody></table>';
		
			$viewReturn = View::make('SearchResult')->with([
				'searchString' => $input,
				'table' => $table,
				'resultCount' => $currentResultCount
			]);
			
		}
		
		return $viewReturn;
	}
}
