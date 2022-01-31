<?php

namespace App\Http\Controllers;

use App\Pets;
use App\Pets_names;
use App\Species;
use Illuminate\Http\Request;

class PetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = Pets::select('id','dob','user_id','species_id' ,'pet_names',)->get(); 
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
        $pets = Species::select('id','name',)->get();  
		return view('subjects.pets_index_users')->with('pets',$pets);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $pets = Pets::select('dob','user_id','species_id','name_id')->get();  
        $species = Species::select('id','name',)->get();  
        

        return view('subjects.pets_add')->with('species',$species);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
