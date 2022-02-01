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
}
