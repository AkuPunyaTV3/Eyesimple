<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;

use App\User;
use App\Roles;
    
class SubjectsController extends Controller
{
	public function index(){

		$subjects = User::select('id','name','email','description',)->get();    
        

		return view('subjects.index')->with('subjects',$subjects);
	}

    public function role(){
        
		$subjects = User::select('id','name','description',)->get();        
        $roles = Roles::select('id','role_name',)->get();        
		
		return view('subjects.role')->with('subjects',$subjects,$roles);
	}

    public function add_role(){

		$subjects = User::select('id','name','description',)->get();        
		return view('subjects.add_role')->with('subjects',$subjects);
	}

	public function create()
    {
        $roles = Roles::select('id','name',)->get();  

        return view('subjects.create')->with('roles',$roles);
    }

    public function store(Request $request)
    {
        
        $data = $request->except('_method','_token','submit');
        
        $validator = Validator::make($request->all(), [
           'name' => 'required|string|min:3',
            
           
        ]);
        

        // dd ($data);
        // if(json_encode($data['roles'])!=NULL)
        // {
        //     $data1 = json_encode($data['roles']);
        // echo json_encode($data1);
        // $data['roles']=$data1;
        // }    
        // dd ($data);

        if ($validator->fails()) {
            return redirect()->Back()->withInput()->withErrors($validator);
        }
        
        // $request->user()->fill([
        //     'password' => Hash::make($request->newPassword)
        // ])->save();
        
        // dd ($data['password']);
        

        //HASH
        $hashed = Hash::make($data['password']);
        $data['password']=$hashed;

        // $data['password']=Hash::make($data['password']);
        
        $baru = User::create($data);  
        // dd ($baru);
        if($baru){
            $baru->roles()->sync($data['roles']);            
            //User sync Role
            Session::flash('message', 'Added Successfully!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('subjects');
        }else{
            Session::flash('message', 'Data not saved!');
            Session::flash('alert-class', 'alert-danger');
        }
      
        return Back();
    }

    public function edit($id)
    {
        $subject = User::find($id);        
        $roles = Roles::select('id','name',)->get();  
        return view('subjects.edit')->with('subject',$subject)->with('roles',$roles);
    }

    public function update(Request $request,$id)
    {
        $data = $request->except('_method','_token','submit');
        // dd ($data);
        $validator = Validator::make($request->all(), [
           'name' => 'required|string|min:3',
           
        ]);

        if ($validator->fails()) {
            return redirect()->Back()->withInput()->withErrors($validator);
        }
        $record = User::find($id);   
         
        if($record->update($data)){
            $record->roles()->sync($data['roles']); 
            Session::flash('message', 'Update successfully!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('subjects');
        }else{
            Session::flash('message', 'Data not updated!');
            Session::flash('alert-class', 'alert-danger');
        }
            
        return Back()->withInput();
    }

    // Delete
    public function destroy($id)
    {
        $record = User::find($id);   
        $record->roles()->sync([]); 
        User::destroy($id);        

        Session::flash('message', 'Delete successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('subjects');
    }


    
}
