<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;

use App\User;
use App\Roles;
use App\Species;
    
class SubjectsController extends Controller
{
	public function index(){

		$subjects = User::select('id','name','email','description',)->get();  
        $roles = Roles::select('id','name')->get();
        

		return view('subjects.index')->with('subjects',$subjects)->with('roles',$roles);
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

    public function subjects_datatable(Request $request)
    {           
        $column = array(
            0=>'Name',
            1=>'Email',            
            2=>'Roles',          
            3=>'Description',
            4=>'Pets',            
            5=>'Actions',

            
        );        
        $limit = $request->input('length');
        $start = $request->input('start');
        $search = $request->input('search.value');
        $order = $column[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');
        $draw = $request->input('draw');

        // $data = $pets = Pets::select('id','dob','user_id','species_id','name_id',); 
        $data = $subjects = User::select('id','name','email','description',);      
        
        $totalData = $data->count();
        $totalFiltered = $totalData;

        if (isset($search)) {               
            $data->orWhere('name','LIKE',"%{$search}%");
            $data->orWhere('email','LIKE',"%{$search}%");
            $data->orWhere('description','LIKE',"%{$search}%");
            

            $roles = Roles::orwhere('name','LIKE',"%{$search}%")->get();
            foreach($roles as $roles){
                $data->orwhere('name','LIKE',"%{$roles->name}%");
            } 
            $totalFiltered = $data->count();
        }

        if (isset($dropdown)) {      
                  
            $data->orWhere('role','LIKE',"%{$dropdown}%");
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

        foreach ($data as $subject) {

            $nestedData['Name']=$subject->name;
            $nestedData['Email']=$subject->email; 
            $nestedData['Description']=$subject->description;
            $arr1=[];
            foreach ($subject->roles as $role){
                $arr1[]=$role->name;
            }            
            $nestedData['Roles']=$arr1;  
            $arr2=[];
            foreach ($subject->pets as $pets){             
                $arr2[]=[$pets->names->name,$pets->dob,$pets->species->name]; 
            }
            $nestedData['Pets']=$arr2;
            $nestedData['Actions']="
            <a style='' href='{{ route('subjects.edit',[$subject->id]) }}' class='btn btn-sm btn-info'>Edit</a>      
            <a href='{{ route('subjects.delete',$subject->id) }}' class='btn btn-sm btn-danger'>Delete</a>
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
