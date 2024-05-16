<?php

namespace App\Http\Controllers;
use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   public function index()
   {

       return view('admin.dashboard');
   }
   public function create(){

        return view ('admin.dashboard');

//       if(Auth::id()){
//           $userType =Auth()->user()->usertype;
//           if($userType=='user'){
//               return view('dashboard');
//           }
//           elseif ($userType=='admin'){
//               return view('admin');
//           }
//           else{
//               return redirect()->back();
//           }
//       }

}
}
