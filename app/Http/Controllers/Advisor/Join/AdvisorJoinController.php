<?php
namespace App\Http\Controllers\Advisor\Join;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvisorJoinController extends Controller{
    public function index(Request $request)
    {
        return view("/advisor/join/basicInformation");
    }

    public function show()
    {
        return view("/advisor/join/consultationInformation");
    }
}
?>
