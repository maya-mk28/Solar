<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\My_order;
use App\Models\Order;
use App\Models\Order_type_user;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function make_order(OrderRequest $request)
    {
//        return response()->json('asd');
        $data = $request->validated();
        // $data['user_id'] = $request->user_id;

        $data['user_id'] = auth()->user()->id;
        if($request->order_type_id == 1)
        {
            $data['devices'] = $request->devices;
            $order = Order::create($data);
            return response()->json($data);
        }
        ///////////////////////////////////////////////////
        if($request->order_type_id == 2)
        {
            $data['board_image'] = $request->board_image->store($request->name . '_image' , 'public');
             $data['battary_image'] = $request->battary_image->store($request->name . '_image' , 'public');
              $data['inverter_image'] = $request->inverter_image->store($request->name . '_image' , 'public');
               $data['setup_image'] = $request->setup_image->store($request->name . '_image' , 'public');
             $data['isBase'] = $request->isBase;
                $data['isNet'] = $request->isNet;
            $order = Order::create($data);
            return response()->json($data);
        }
        //////////////////////////////////////////////////
        if($request->order_type_id > 2)
        {
            
             $data['image'] = $request->image->store($request->name . '_image' , 'public');
            $order = Order::create($data);
            return response()->json($data);
        }
    }


    public function get_all_orders()
    {
        $data = Order::all();
        return response()->json($data);
    }

    public function get_my_orders_as_admin()
    {
//        $data = OrderResource::collection(My_order::with('order')->where('user_id' , auth()->user()->id)->get());
          return OrderResource::collection(My_order::with('order', 'user')->where('user_id' , auth()->user()->id)->get());
//        return response()->json($data);
    }
    
    
    public function admin_orders()
    {
      $admin_id = auth()->user()->id;

// Get an array of order_type_id values where user_id matches
$type = Order_type_user::where('user_id', $admin_id)->pluck('order_type_id')->toArray();

$orders = Order::whereIn('order_type_id', $type)->get();

return response()->json($orders);
    }
    
    
    

    public function get_my_orders_as_user()
    {
        $data = Order::where('user_id' , auth()->user()->id)->get();
        return response()->json($data);
    }

    public function give_order(Request $request , $id)
    {
        $data = Order::where('id' , $id)->first();
        $user = User::where('id' , $request->user_id)->first();
        $data->send()->create([
//            'order_id' => $id,
            'user_id' => $request->user_id,
        ]);

        return response()->json('given to '.$user->name);
    }
}
