<?php namespace App\Http\Controllers;

use DB;
use Request;
use View;

class OutputController extends Controller {

	public function __construct(){
		$this->middleware('guest');
	}

	public function Output(Request $request){
		$bookIds = Request::input('bookIds');
		
		if(count($bookIds) > 0){
			if(count($bookIds) == 1){
				if(count($bookIds) == 1){
					$returnUrl = $bookIds;
					$bookIds = array($bookIds);
				}
			}
			else{
				$returnUrl = '/';
			}
			foreach($bookIds as $bookId){
				$bookResult = DB::connection('alexdb')->select('SELECT * FROM Books WHERE id = ?', [$bookId]);
				if($bookResult != null){
					$authorGivenNames = explode(" ", $bookResult[0]['authorGivenNames']);
					$authorSurnames = explode(" ", $bookResult[0]['authorSurnames']);
					$title = $bookResult[0]['title'];
					$edition = $bookResult[0]['edition'];
					//$volume = $bookResult[0]['volume'];
					$city = $bookResult[0]['placesOfPublication'];//TODO: what does places of publication mean?
					$publisher = $bookResult[0]['publisher'];
					$year = $bookResult[0]['printDate'];
					$series = $bookResult[0]['series'];
					
					$tempString = ''; 
					
					//TODO: on book input, if first name count and last name count don't match, throw an error? TISWHWIDDIMW
					//TODO: This is hardcoded in because we don't have templates yet.  Update code when templates are implemented.
					if($authorSurnames != null){
						$tempString .= $authorSurnames[0];
						if($authorGivenNames == null){
							$tempString .= '. ';
						}
					}
					if($authorGivenNames != null){
						$tempString .= ', ' . $authorGivenNames[0] . '. ';

					}
					if($title != null){
						$tempString .= '<i>' . $title . '</i>. ';
					}
					if($edition != null){
						$tempString .= $edition . ' ed. ';
					}
					//if($volume != null){
					//	$tempString .= 'Vol. ' . $volume . '. ';
					//}
					if($city != null){
						$tempString .= $city . ': '; 
					}
					if($publisher != null){
						if($year != null){
							$tempString .= $publisher . ', ' . $year . '. ';
						}
						else{
							$tempString .= $publisher . '. ';
						}
					}
					
					if($series != null){//should be capped by 3 characters according to mla
						$tempString .= $series . '.';
					}
					$outputList[] = $tempString;
				}
				else{
					//$outputList[] = 'Invalid Id ' . $bookId;
				}
			}
		}
		else{
			$outputList[] = "Invalid Id Listhaha." . $bookIds;
		}
		
		$viewReturn = View::make('OutputView')->with(compact(['outputList', 'returnUrl']));

		return $viewReturn;
	}

}
