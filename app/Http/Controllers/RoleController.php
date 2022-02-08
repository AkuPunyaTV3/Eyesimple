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

    public function roles_datatable(Request $request)
    {           
        $column = array(
            0=>'Roles',
            1=>'User',            
            2=>'Action',          
        );        
        $limit = $request->input('length');
        $start = $request->input('start');
        $search = $request->input('search.value');
        $order = $column[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');
        $draw = $request->input('draw');

        // $data = $pets = Pets::select('id','dob','user_id','species_id','name_id',); 
        $data = $roles = Roles::select('id','name',);         
        $totalData = $data->count();
        $totalFiltered = $totalData;

        if (isset($search)) {               
            $data->orWhere('name','LIKE',"%{$search}%");
            $totalFiltered = $data->count();
        }

        $data = $data->offset($start)
        ->limit($limit)
        ->get();

        $array = [];
        // foreach ($data as $item) {
        //     $array['customer'] = $transaction->user->first_name.' '.$transaction->user->last_name;
        //     $action = '';
        //     if () {
        //         $action .= '<a href="'.asset('storage/'.$file->file_location).'" download>Download</a>';
        //     }
        //     $array['action'] = $action;
        // }

        foreach ($data as $roles) {
            
            $nestedData['Roles']=$roles->name;   

            $count = 0;
            foreach ($roles->users as $subjects)
                    {
                        
                        $nestedData['User'][$count++]=$subjects->name;
                    }

            $nestedData['Action']="
            <a style='' href='' class='btn btn-sm btn-info'>Edit</a>                        
            <a href='' class='btn btn-sm btn-danger'>Delete</a>
            ";
            $array[]=$nestedData;       
        }
        // ini juga fix
        $json_data = [
            'draw' => intval($draw),
            'recordsTotal' => intval($totalData),
            'recordsFiltered' => intval($totalFiltered),
            'data' => $array,            
        ];
        // ini juga fix
        return json_encode($json_data);
    }
}
