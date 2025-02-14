<?php
namespace app\http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\http\Request;


class loginControllers extends Controller
{
    public function index()
    {
        return view('login.index',[
            'title' => 'login',
            'active' => 'login'
        ]);
    }
}
?>