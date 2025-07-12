<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return response()->json([
            'status' => 'successfully',
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->province = $request->province;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->save();
        return response()->json([
            'status' => 'Create user successfully ',
            'user' => $user
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message ' => 'Not Found user'], 404);
        }
        return response()->json([
            'status' => 'successfully',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => "Not found user "], 404);
        }
        $user->name = $request->name ?? $user->name;
        $user->email = $request->email ?? $user->email;
        $user->age = $request->age ?? $user->age;
        $user->gender = $request->gender ?? $user->gender;
        $user->province = $request->province ?? $user->province;
        $user->phone = $request->phone ?? $user->phone;
        $user->password = $request->password ?? $user->password;
        $user->save();
        return response()->json([
            'status' => 'Update user successfully',
            'user' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message ' => 'Not Found user'], 404);
        }
        $user->delete();
        return response()->json(['message' => 'Delete user succussfully '], 200);
    }
}
