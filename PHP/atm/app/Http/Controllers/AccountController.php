<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function add_account(Request $request){
        $validator = Validator::make($request->all(), [
            'account_number' => 'required|numeric|integer|min:0|unique:App\Models\User,account_id',
            'password' => 'required|string',
            'name' => 'required|string',
            'balance' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return back()->with('modal_id', 'add_account')->withErrors($validator)->withInput();
        }

        $validator->validate();

        User::create([
            'account_id' => $request->account_number,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'balance' => $request->balance,
            'is_admin' => 0,
        ]);

        return back();
    }

    public function update_account(String $locale, User $user, Request $request){
        $validator = Validator::make($request->all(), [
            'account_number' => "required|numeric|integer|min:0|unique:users,account_id,$user->id",
            'password' => 'nullable|string',
            'name' => 'required|string',
            'balance' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return back()->with('modal_id', 'update_account_' . $user->id)->withErrors($validator)->withInput();
        }

        $validator->validate();

        $user->account_id = $request->account_number;
        $user->password = $request->password ? Hash::make($request->password) : $user->password;
        $user->name = $request->name;
        $user->balance = $request->balance;

        if ($user->isDirty()){
            $user->save();
        }

        return back();
    }

    public function remove_account(String $locale, User $user, Request $request){
        $user->delete();
        return back();
    }
}
