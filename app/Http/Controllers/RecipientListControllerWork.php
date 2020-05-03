<?php

namespace App\Http\Controllers;

use App\Recipientlist;
use App\Supportslist;
use Illuminate\Http\Request;
use App\Imports\ImportUsers;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\User;

class RecipientListControllerWork extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = new Recipientlist;
        $user->name = $request->name;
        $user->father = $request->father;
        $user->mother = $request->mother;
        $user->mobile = $request->mobile;
        $user->national_id = $request->national_id;
        $user->occupation = $request->occupation;
        $user->family_member = $request->family_member;
        $user->monthly_income = $request->monthly_income;
        $user->jela = $request->jela;
        $user->upojela = $request->upojela;
        $user->word = $request->word;
        $user->village = $request->village;

        $user->house_no = $request->house_no;
        $user->easy_way = $request->easy_way;
        $user->comment = $request->comment;
        $user->status = $request->status;
        $user->user_id = $request->user_id;
        $user->permanent_address = $request->permanent_address;
        $save = $user->save();
        
        if($save){
            return response()->json(['error'=>false,'msg'=>'Successfully Placed Your Request']);
        }else{
            return response()->json(['error'=>true,'msg'=>'Problem In Creating Data']);
        }
    }
    
    public function search(Request $request){
        $document = Recipientlist::where('user_id', $request->id_or_no )->paginate(20);
        return view('applicants', compact('document')); 
    }

    public function importData(Request $request)
    {

           $data =Excel::import(new ImportUsers,request()->file('select_file'));
           
           return back()->with('success', 'Excel Data Imported successfully.');
    }

    public function getRecipientByUniqueId(Request $request){
        $document = Recipientlist::where('user_id', $request->unique_id )->first();
        if(empty($document)){
            return response()->json(['error'=>true,'msg'=>'Unique Id Not Matched']);
        }
        return response()->json(['error'=>false,'msg'=>'Successfully Get Data','data'=>$document]);
    }

    public function updateRecipientByUniqueId(Request $request){

        $support = Supportslist::where('id', $request->id )->first();

        $document = Recipientlist::where('user_id', $request->unique_id )->update([
            'status'=> 1,
            'volunteer'=>$support->name,
            'given_date'=>Carbon::now()
        ]);
        
        if(empty($document)){
            return response()->json(['error'=>true,'msg'=>'Unique Id Not Matched']);
        }
        return response()->json(['error'=>false,'msg'=>'Successfully Confirmed']);
    }

    public function checkAllApprovedOrDelete(Request $request){

        $checked = $request->chkbox;
        if($request->selected == "approved"){
                for($i=0;$i<count($checked);$i++){
                    $document = Recipientlist::where('user_id', $checked[$i] )->update([
                    'status'=> 2
            ]);
            
            }
        return redirect('applicants?page='.$request->page); 
        }elseif($request->selected == "delete"){
            for($i=0;$i<count($checked);$i++){
                $document = Recipientlist::where('user_id', $checked[$i] )->delete();
            }
            return redirect('applicants?page='.$request->page); 
        }elseif($request->selected == "delivered"){
            for($i=0;$i<count($checked);$i++){
                $document = Recipientlist::where('user_id', $checked[$i] )->update([
            'status'=> 1,
            'volunteer'=>'admin',
            'given_date'=>Carbon::now()
        ]);
            }
            return redirect('applicants?page='.$request->page); 
        }
}

    public function getPorishonkanValue(Request $request){
        $documentPending = Recipientlist::count();
        $documentSuccess = Recipientlist::where('status', 1)->count();
        
        // $document = '18065';
        // $documentSuccess = '11047';
        // $support = '320';
        
        // $documentPending = '18065';
        // $documentSuccess = '11047';

        return response()->json(['error'=>false,'total'=>$documentPending,'success'=>$documentSuccess]);
    }

    public function approved($id,$page){
        $document = Recipientlist::where('user_id', $id )->update([
            'status'=> 1
    ]);
    return redirect('applicants?page='.$page); 
    }

    public function delete($id,$page){
        $document = Recipientlist::where('user_id', $id )->delete();;
        return redirect('applicants?page='.$page); 
    }
    
    public function deleteSupport($id,$page){
        $document = Supportslist::where('user_id', $id )->delete();;
        return redirect('volunteer?page='.$page); 
    }
    
    public function deleteAdmin($id){
        $document = User::where('user_id', $id )->delete();;
        return redirect('admin'); 
    }
    
    public function sortUsingHelpDate(Request $request){
        $date= Carbon::parse($request->help_date);
        $document = Recipientlist::whereDate('given_date', '=', $date)->paginate(2);
        return view('applicants', compact('document','date'));
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
     * @param  \App\Recipientlist  $recipientlist
     * @return \Illuminate\Http\Response
     */
    public function show(Recipientlist $recipientlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipientlist  $recipientlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipientlist $recipientlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipientlist  $recipientlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipientlist $recipientlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipientlist  $recipientlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipientlist $recipientlist)
    {
        //
    }
}
