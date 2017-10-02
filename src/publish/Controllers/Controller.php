<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
if (trait_exists('Illuminate\Foundation\Validation\HelperValidatesRequests')) 
{
    trait CallValidatesRequests 
    {
        use \Illuminate\Foundation\Validation\HelperValidatesRequests;
    }
}else{
    trait CallValidatesRequests{
    	use ValidatesRequests;
    }
}

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, CallValidatesRequests;
<<<<<<< HEAD
}
=======
}

>>>>>>> e583357dbc48701e61c1e44a3cb1aea28ffdcbca
