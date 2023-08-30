<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\search;

class HomeController extends Controller
{
    public function redirect(){
        $usertype=Auth::user()->usertype;

        if($usertype=='1')
        {
            return view('admin.home');
        }

        else
        {
            $data = product::paginate(3);

            return view('user.home',compact('data'));
        }
    }

    public function index()
    {

        if(Auth::id())
        {
            return redirect('redirect');
        }
        else
        {
            $data = product::paginate(3);

            return view('user.home',compact('data'));
        }
    }

    public function search(Request $request)
    {
        $search=$request->search;
        if($search=='')
        {
            $data = product::paginate(3);

            return view('user.home',compact('data'));
        }

        $data=product::where('title', 'like', '%'.$search.'%')->get();

        return view('user.home',compact('data'));
    }
}
