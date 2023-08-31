<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Cart;

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

            $user=auth()->user();

            $count=cart::where('phone',$user->phone)->count();

            return view('user.home',compact('data','count'));
        }

        $data=product::where('title', 'like', '%'.$search.'%')->get();

        return view('user.home',compact('data'));
    }

    public function addcart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user=auth()->user();

            $product=product::find($id);

            $cart=new cart;

            $cart->name=$user->name;

            $cart->phone=$user->phone;

            $cart->address=$user->address;

            $cart->product_title=$product->title;

            $cart->price=$product->price;

            $cart->quantity=$request->quantity;

            $cart->save();

            return redirect()->back()->with('message', 'product added sucessfully');
        }
        else
        {
            return redirect('login');
        }
    }
}
