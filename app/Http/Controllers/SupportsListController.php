<?php

namespace App\Http\Controllers;

use App\Supportslist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SupportsListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('addsupport');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        
        $user = new Supportslist;
        $user->user_id = $request->user_id;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->mobile = $request->mobile;
        $user->father = $request->father;
        $user->mother = $request->mother;
        $user->national_id = $request->national_id;
        $user->occupation = $request->occupation;
        $user->current_address = $request->current_address;
        $user->permanent_address = $request->permanent_address;
        $user->status = 0;
        $user->save();

        return redirect()->route('volunteer');
    }

    public function Login(Request $request){
        $document = Supportslist::where('user_id', $request->name )->first();
        if(empty($document)){
            return response()->json(['error'=>"true",'msg'=>"Invalid User ID"]);
        }
        if(Hash::check($request->password,$document->password)){
            return response()->json(['error'=>"false",'id'=>$document->id]);
        }else{
            return response()->json(['error'=>"true",'msg'=>"Invalid Password"]);
        }
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supportslist  $supportslist
     * @return \Illuminate\Http\Response
     */
    public function show(Supportslist $supportslist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supportslist  $supportslist
     * @return \Illuminate\Http\Response
     */
    public function edit(Supportslist $supportslist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supportslist  $supportslist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supportslist $supportslist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supportslist  $supportslist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supportslist $supportslist)
    {
        //
    }
}
