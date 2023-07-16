<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $car=Car::findOrFail($request->car_id);
        if(Auth::user()->id != $car->user_id){
            if(Order::where('car_id', $request->car_id)->where('user_id', Auth::user()->id)->get()->count()===0){
                Order::create([
                    'car_id'=>$request->car_id,
                    'user_id'=>Auth::user()->id,
                    'state'=>0
                ]);
                return back()->with('status', 'order-create');
            }else{
                return back()->with('status', 'order-exist');
            }
        }else{
            return back()->with('status', 'order-refuse');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orders=Order::where('user_id', $id)->get();
        $cars=Car::where('user_id', $id)->get();
        $car_id=Car::select('id')->where('user_id', $id)->get();
        $orders_user=Order::whereIn('car_id', $car_id)->get();
        // dd($orders_user);
        $i=1;
        return view('order.index',[
            'orders'=>$orders,
            'i'=>$i,
            'orders_user'=>$orders_user,
            'cars'=>$cars

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        if($request->reponse=="valid"){
            $state=1;
        }else{
            $state=2;
        }
        Order::where('id', $request->id)
             ->update([
                'state'=>$state
             ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
