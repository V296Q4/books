<?php
namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;

public function search() {
    $cols = DB::table('Attributes')->get();
    $hist = array();
    $result = array();
    $input = Input::get('input');  
    if ($input == ""){
            echo "<p>Not a vaild input."; 
            exit; 
        }
    else{
      foreach($cols as $col){
      $temp = DB::table('Books')
          ->where($cols->columnName, 'like', '%'.$input.'%')
          ->get();
      foreach($temp as $t){
        foreach($hist as $h){
          if($h==$t->id){
            continue;
          }else{
            $hist[] = $t->id;
            $result[] = $t;
          }
        }
      }
    }
  }
      foreach($result as $r){
        echo $r.'<br />';
      }
}
?>
