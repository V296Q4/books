<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

//This is a basic empty request class. It always returns true for authorization, and returns an empty array for its rulesets
//This means that all input is accepted by this request - it is not checked before being handed off to the controller

class PlaygroundRequest extends Request {

	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
		];
	}

}
