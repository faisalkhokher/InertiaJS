<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $posts = Post::all();
        $user->createAsStripeCustomer();
        return view('stripe_subscription', compact('user', 'posts'));
    }

    public function singleSubs($id)
    {
        $plan = Post::where('id',$id)->first();
        $intent = auth()->user()->createSetupIntent();
        return view('single-subs', compact('plan','intent'));
    }


        /**
     * Write code on Method
     *
     * @return response()
     */
    public function subscription(Request $request)
    {
        // dd($request->all());
        $plan = Post::find($request->plan);
  
        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_number)->create($request->token);
  
       return redirect()->back()->with('success','OK');
    }
}
