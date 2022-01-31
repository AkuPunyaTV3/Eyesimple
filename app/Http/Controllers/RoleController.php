<?php

namespace App\Http\Controllers;

use App\Roles;
use App\User;
use Illuminate\Http\Request;



use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    //Role
    public function index(){

		$roles = Roles::select('id','name',)->get();        
		return view('subjects.role')->with('roles',$roles);
	}

    //Add role
    public function create(){
		       
		return view('subjects.add_role');
	}

    public function store(Request $request){	

        $data = $request->except('_method','_token','submit');     
        // User::create($data);
        // User::insert($data)
        
        

        // $baru = Roles::create($data);  
        $data= Roles::create($data);  
            
        // dd ($data);
            
            // $baru->roles()->sync($data['user']);  
        if(
            
            // $baru
            
            $request->create($data)
            ){
            // $baru->users()->sync($data['user']);  
            Session::flash('message', 'Added Successfully!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('roles.role');
        }else{
            Session::flash('message', 'Data not saved!');
            Session::flash('alert-class', 'alert-danger');
        }
        return Back();
	}

    public function edit($id)
    {
        $roles = Roles::find($id);        
        return view('subjects.edit_role')->with('roles',$roles);
    }
    
    public function update(Request $request, $id)
    {
        $data = $request->except('_method','_token','submit');
        //  dd ($data);        
        $record = Roles::find($id);
        
        if($record->update($data)){          
            Session::flash('message', 'Update successfully!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('roles.role');
        }else{
            Session::flash('message', 'Data not updated!');
            Session::flash('alert-class', 'alert-danger');
        }            
        return Back()->withInput();
    }
    
    public function destroy(Roles $id)
    {
        // $id = Roles::find($id);   
        
        $id->users()->sync([]);         
        $id->delete();
        // Roles::destroy($id);

            


        Session::flash('message', 'Delete successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('roles.role');
    }
}
