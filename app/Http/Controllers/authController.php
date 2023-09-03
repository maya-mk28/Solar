<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Maintanance;
use App\Models\Order_type_user;
use App\Models\Order_type;
use App\Models\User;
use App\Models\Gallary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function create_maintanance_type(Request $request)
    {
        $data['name'] = $request->name;
        $type = Maintanance::create($data);
        return response()->json($data);
    }

    public function get_maintanance_type()
    {
        $data = Maintanance::all();
        return response()->json($data);
    }
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        User::create($data);
        return response()->json($data);
    }
    
    public function get_all_types()
    {
        $data = Order_type::all();
        return response()->json($data);
    }
    
    public function add_order_type(Request $request)
    {
        $data['name'] = $request->name;
        $data['isMain'] = 1;
        Order_type::create($data);
         return response()->json($data);
    }
    
    public function get_maintanance_order_type()
    {
        $data = Order_type::where('isMain' , 1)->get();
          return response()->json($data);
    }
    

    public function create_admin(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['role'] = 'admin';
        $user = User::create($data);

        if($request->order_type_id)
        {
            for ($i=0; $i < count($request->order_type_id) ; $i++)
            {
                $user->type()->create([
                    'order_type_id' => $request->order_type_id[$i],
                ]);
            }
        }
        $message = [
            'message' => 'created',
            'data' => $user,
        ];
        return response()->json($message);

    }


    public function login(Request $request)
    {
        $filed = $request->validate([

            'phone' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('phone' , $request->phone)->first();
//        return response()->json($user);

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json('phone or password incorrect' , 422);
        }
        else {$token = $user->createToken('auth_token')->plainTextToken;
            $role = $user->role;

            $response = [
                'message' => 'logged in successfully',
                'token' => $token,
                'role'  => $role
            ];
            return response()->json($response);
        }
    }
    
    public function store_gallary(Request $request)
    {
        $data['name'] = $request->name;
        $data['image'] = $request->image->store($request->name . '_image' , 'public');
        $data['description'] = $request->description;
        
        Gallary::create($data);
        return response()->json($data);
    }
    
    public function get_gallary()
    {
        $data = Gallary::all();
        return response()->json($data);
    }
}
