<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Account::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->password = hash('SHA-512',$request->password);
        User::create($request->only(['nama','email','password']));
        return Account::insert($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Account::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return Account::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Account::destroy($id);
    }

    // public function getToken(Request $request){
    //     $name = $request->nama;
    //     $email = $request->email;
    //     $password = hash('SHA-512',$request->password);
    //     $user = User::where('name',$name)
    //                         ->where('email',$email)
    //                         ->where('password',$password)
    //                         ->first();
    // }
}
