<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;

class ApiController extends Controller
{
	use Helpers;
    
	public function show()
	{

		return 'hello';
	}
 
}
