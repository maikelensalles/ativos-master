<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(Request $request, User $model)
    {
        $data = User::orderBy('id','DESC')->paginate(5);

        return view('users.index',compact('data'),)
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show(Request $request, User $model, $id)
    {
        $user = User::find($id);

        $data = User::find($id);

        return view('users.show',compact('user', 'data'),)
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
