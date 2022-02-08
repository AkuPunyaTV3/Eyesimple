<?php

namespace App\Http\Controllers;


use App\User;
use App\Pets;
use App\Pets_names;
use App\Species;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class PetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = Pets::select('id','dob','user_id','species_id','name_id',)->get(); 
        // $species = Species::select('id','name',)->get();  
        // $users = User::select('id','name', 'email', 'password','description',)->get();  
		return view('subjects.pets_index')->with('pets',$pets);
    }

    public function index_petsname()
    {        
        $pets = Pets_names::select('id','name',)->get();         
		return view('subjects.pets_index_petsname')->with('pets',$pets);
    }

    public function index_species()
    {
        $pets = Species::select('id','name',)->get();  
        
		return view('subjects.pets_index_species')->with('pets',$pets);
    }

    public function index_users()
    {
        $pets = Pets::select('id','dob','user_id','species_id' ,'name_id',)->get();  
		return view('subjects.pets_index_users')->with('pets',$pets);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $species = Species::select('id','name',)->get();  
        $petsnames = Pets_names::select('id','name',)->get();  
        $users = User::select('id','name', 'email', 'password','description',)->get();  
        // dd ($users);
        return view('subjects.pets_add')->with('species',$species)->with('users',$users)->with('petsnames',$petsnames);
    }

    public function store(Request $request)
    {
        $data = $request->except('_method','_token','submit');          
        // dd ($data);
        $data= Pets::create($data);     
        if($request->create($data)){   
                       
            Session::flash('message', 'Added Successfully!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('pets');
        }else{
            Session::flash('message', 'Data not saved!');
            Session::flash('alert-class', 'alert-danger');
        }
        return Back();
    }

    //ADD species
    public function create_species()
    {
        $species = Species::select('id','name',)->get();  
        return view('subjects.pets_add_species')->with('species',$species);
    }

    public function store_species(Request $request)
    {
        $data = $request->except('_method','_token','submit');          
        $data= Species::create($data);     
        if($request->create($data)){            
            Session::flash('message', 'Added Successfully!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('species');
        }else{
            Session::flash('message', 'Data not saved!');
            Session::flash('alert-class', 'alert-danger');
        }
        return Back();
    }

    //ADD Petnames
    public function create_petnames()
    {
        $species = Pets_names::select('id','name',)->get();  
        return view('subjects.pets_add_petsname')->with('petsnames',$species);
    }

    public function store_petnames(Request $request)
    {
        $data = $request->except('_method','_token','submit');          
        $data= Pets_names::create($data);  
        dd ($data)   ;
        if($request->create($data)){            
            Session::flash('message', 'Added Successfully!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('species');
        }else{
            Session::flash('message', 'Data not saved!');
            Session::flash('alert-class', 'alert-danger');
        }
        return Back();
    }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pets_datatable(Request $request)
    {            
        $column = array(
            0=>'Dob',
            1=>'User_ID',
            2=>'Species_ID',
            3=>'Names_ID',
            4=>'Action',          
        );        
        $limit = $request->input('length');
        $start = $request->input('start');
        $search = $request->input('search.value');
        $order = $column[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');
        $draw = $request->input('draw');

        $data = $pets = Pets::select('id','dob','user_id','species_id','name_id',); 

        $totalData = $data->count();
        $totalFiltered = $totalData;

        if (isset($search)) {            
            $data->orWhere('species_id','LIKE',"%{$search}%");
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

        foreach ($data as $pets) {
            $nestedData['Dob']=$pets->dob;                                                  
            $nestedData['User_ID']=$pets->users->name;                                                                 
            $nestedData['Species_ID']=$pets->species->name;                                  
            $nestedData['Names_ID']=$pets->names->name;
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

    public function pets_datatable_species(Request $request)
    {           
        $column = array(
            0=>'Id',
            1=>'Name',            
            2=>'Action',          
        );        
        $limit = $request->input('length');
        $start = $request->input('start');
        $search = $request->input('search.value');
        $order = $column[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');
        $draw = $request->input('draw');

        // $data = $pets = Pets::select('id','dob','user_id','species_id','name_id',); 
        $data = $pets = Species::select('id','name',);         
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

        foreach ($data as $pets) {
            $nestedData['Id']=$pets->id;                                                  
            $nestedData['Name']=$pets->name;                                                                             
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

    public function pets_datatable_petsname(Request $request)
    {           
        $column = array(
            0=>'Id',
            1=>'Name',            
            2=>'Action',          
        );        
        $limit = $request->input('length');
        $start = $request->input('start');
        $search = $request->input('search.value');
        $order = $column[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');
        $draw = $request->input('draw');

        // $data = $pets = Pets::select('id','dob','user_id','species_id','name_id',); 
        $data = $pets = Pets_names::select('id','name',);         
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

        foreach ($data as $pets) {
            $nestedData['Id']=$pets->id;                                                  
            $nestedData['Name']=$pets->name;                                                                             
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
