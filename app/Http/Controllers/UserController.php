<?php

namespace App\Http\Controllers;

use App\Recipientlist;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Supportslist;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Session::get('login')){
            return redirect('/');
        }
        $document = Recipientlist::count();
        $documentSuccess = Recipientlist::where('status', 1)->count();
        $support = Supportslist::count();
        
        // $document = '18065';
        // $documentSuccess = '11047';
        // $support = '320';

        return view('index', compact('document','documentSuccess','support'));
    }

    public function createAdmin(){
        return view('addadmin');
    }

    public function loginPage(){
        return view('login');
    }

    public function applicants()
    {
        if(!Session::get('login')){
            return redirect('/');
        }
        $document = Recipientlist::orderBy('id', 'desc')->paginate(50);
        
        
        return view('applicants', compact('document'));
    }
    
     public function applicantsSortBystatusDesc($page)
    {
        if(!Session::get('login')){
            return redirect('/');
        }
        $document = Recipientlist::orderBy('status', 'desc')->paginate(50);
        
        return redirect('applicants?page='.$page)->with( ['document' => $document] ); 
        
        //return view('applicants', compact('document'));
    }
    
    public function applicantsSortBystatusAsc($page)
    {
        if(!Session::get('login')){
            return redirect('/');
        }
        $document = Recipientlist::orderBy('status', 'asc')->paginate(50);
        
        
        //return view('applicants', compact('document'));
        return redirect('applicants?page='.$page)->with( ['document' => $document] ); 
        
    }

    public function volunteer()
    {
        if(!Session::get('login')){
            return redirect('/');
        }
        $document = Supportslist::paginate(50);
        return view('volunteer', compact('document'));
        
    }

    public function admin()
    {
        if(!Session::get('login')){
            return redirect('/');
        }
        $document = User::all();
        return view('admin', compact('document'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        
        $user = new User;
        $user->user_id = $request->user_id;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->mobile = $request->mobile;
        $user->podobi = $request->podobi;
        $user->kormostol = $request->kormostol;
        $user->save();

        return redirect()->route('admin');
    }

    public function Login(Request $request){
        
        $document = User::where('user_id', $request->user_id )->first();
        if(empty($document)){
            //return response()->json(['error'=>"true",'msg'=>"Invalid User ID"]);
            return redirect('/');
        }
        if(Hash::check($request->password,$document->password)){

            Session::put('user_id',$request->user_id );
            Session::put('login',TRUE);

            return redirect()->route('index');
        }else{
            return redirect('/');
        }
    }

    public function PasswordResetGet(){
        return view('passwordreset');
    }

    public function PasswordResetPost(Request $request){
        $document = User::where('user_id', Session::get('user_id') )->first();
        if(Hash::check($request->old,$document->password)){
            User::where('user_id', Session::get('user_id') )->update([
                'password'=> Hash::make($request->new),
            ]);
            return Redirect::back()->withErrors(['Password Updated']);
        }else{
            return Redirect::back()->withErrors(['Password Not Matched']);
        }
        return $request;
    }

    public function signOut(){
        Session::put('login',FALSE);
        return redirect('/');

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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
