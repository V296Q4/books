<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AttributeController extends Controller{
  public function show_all(){
    $attrs = DB::table('Attributes')->get();
    $data = array(
      'attrs' => $attrs
    );
    return view('allattrs', $data);
  }

  public function del($id){
    $rs = DB::table('Attributes')
      ->where('id', '=', $id)
      ->first();
    if(count($rs)<=0){
      echo 'Attribute with id '.$id.' does not exist.';
    }elseif(!$rs->editable){
      echo '<h3>Attribute with id '.$id.' is not editable.</h3>';
    }else{
      $columnName = $rs->columnName;
      DB::transaction(function() use ($id, $columnName){
        DB::table('Attributes')->where('id', '=', $id)->delete();
        DB::statement('ALTER TABLE Books DROP COLUMN '.$columnName);
      });
      echo '<h3>Attribute '.$rs->labelName.' is sucessfully dropped.</h3>';
    }
  }

  public function show_add(){
    return view('addattr');
  }

  public function add(Request $request){
   $labelName = $request->input('lname');
   $notes = $request->input('note');
   $editable = $request->has('editable');

   $rs = DB::table('Attributes')
    ->where('labelName', '=', $labelName)
    ->first();
   if(count($rs)>0){
    echo '<h3>Attribute '.$rs->labelName.' already exist.</h3>';
   }else{
      $rs = DB::table('Attributes')
        ->where('columnName', 'like', 'col%')
        ->orderBy('columnName', 'desc')
        ->first();
      if(count($rs)>0){
        $temp = (int)(substr($rs->columnName, -3));
        $temp++;
        $temp = str_pad($temp, 4, '0', STR_PAD_LEFT);
        $columnName = 'col'.$temp;
        DB::transaction(function() use ($labelName, $notes, $editable, $columnName){
          DB::table('Attributes')->insert(['columnName'=>$columnName, 'labelName'=>$labelName, 'notes'=>$notes, 'creator'=>'admin', 'editable'=>$editable]);
          DB::statement('ALTER TABLE Books ADD '.$columnName.' TEXT');
        });
        echo '<h3>Attribute '.$labelName.' is sucessfully added.</h3>';
      }else{
        $columnName = 'col0001';
        DB::transaction(function() use ($labelName, $notes, $editable, $columnName){
          DB::table('Attributes')->insert(['columnName'=>$columnName, 'labelName'=>$labelName, 'notes'=>$notes, 'creator'=>'admin', 'editable'=>$editable]);
          DB::statement('ALTER TABLE Books ADD '.$columnName.' TEXT');
        });
        echo '<h3>Attribute '.$labelName.' is sucessfully added.</h3>';
      }
   }
  }

  public function show_update($id){
    $rs = DB::table('Attributes')->where('id', '=', $id)->first();
	if($rs != null){
		$data = array('attr' => $rs);
	}
	else{
		$data = array();
	}

    return view('updateattr', $data);
  }

  public function do_update(Request $request){
    $id = $request->aid;
    $labelName = $request->lname;
    $notes = $request->note;
    $editable = $request->has('editable');

    $rs = DB::table('Attributes')
      ->where('labelName', '=', $labelName)
      ->first();

    if(count($rs)<=0){
      DB::table('Attributes')
        ->where('id', '=', $id)
        ->update(['labelName'=>$labelName, 'notes'=>$notes, 'editable'=>$editable]);
      echo '<h3> Attribute '.$labelName.' is sucessfully updated</h3>';
    }else{
      $id2 = $rs->id;
      if($id==$id2){
        DB::table('Attributes')
          ->where('id', '=', $id)
          ->update(['labelName'=>$labelName, 'notes'=>$notes, 'editable'=>$editable]);
        echo '<h3> Attribute '.$labelName.' is sucessfully updated</h3>';
      }else{
        echo '<h3>Label name '.$labelName.' is already exist. Choose another label name.</h3>';
      }
    }
  }
}