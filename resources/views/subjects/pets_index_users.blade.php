<!-- Extends template page-->

@extends('layouts.app')

<!-- Specify content -->
@section('content')



{{-- Tombol Tombol --}}
<div class='actionbutton'>    
    {{-- List --}}
    <a class='btn btn-info float-left' href="{{route('pets')}}" style="margin-right:5%; ">Pets</a>                                              
    <a class='btn btn-info float-left' href="{{route('petsname')}}" style="margin-right:5%; ">Petsname</a>                               
    <a class='btn btn-info float-left' href="{{route('species')}}" style="margin-right:5%; ">Species</a>                      
                      
    {{-- ADD --}}
    <a class='btn btn-info float-right' href="{{route('pets.create')}}" style="margin-right: ">Add Pets</a>                                               
    <a class='btn btn-info float-right' href="{{route('pets.create_species')}}" style="margin-right:5% ">Add Species</a>                        
    <a class='btn btn-info float-right' href="{{route('pets.create_petsname')}}" style="margin-right:5% ">Add Petsname</a>                        
</div>

{{-- JUDUL --}}
<div style="margin-left: 20px;">    
    <br><h3>&nbsp;Pets List (INDEX USER)</h3><br>
</div>
   
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">

        <!-- Alert message (start) -->
        @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class') }}">
            {{ Session::get('message') }}
        </div>
        @endif
        
        <!-- Alert message (end) -->
       
        <table class="table" >
            <thead>
                <tr>                    
                    <th width='20%'>User</th>            
                    <th width='20%'>Name</th>   
                    <th width='20%'>Spesies</th>   
                    <th width='20%'>DOB</th>  
                    <th width='20%'>Action</th> 
                </tr>
            </thead>
            
            <tbody>
                
            @foreach($pets as $pets1)
            @php 
            // dd ($pets);
             @endphp
                <tr>                  
                    <td>                        
                        {{ $pets1->dob }}                        
                    </td>
                    <td>                    
                        {{ $pets1->user_id }}                      
                    </td>

                    <td>                    
                        {{ $pets1->species_id }}                      
                    </td>                   
                    <td>                   
                        {{ $pets1->pet_names }}                      
                    </td>  
                    <td>
                        <!-- Edit -->                        
                        <a style="" href="" class="btn btn-sm btn-info">Edit</a>
                        <!-- Delete -->
                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                    </td>           
                </tr>
            @endforeach
            </tbody>
        </table>


        <div style="margin-left: 20px;">    
            <h3>&nbsp;Pets List (INDEX PETS)</h3>
        </div>
    
        <table class="table" >
            <thead>
                <tr>                    
                    <th width='20%'>Pets Name</th>            
                    <th width='20%'>Spesies</th>   
                    <th width='20%'>Users</th>   
                    <th width='20%'>DOB</th>
                    <th width='20%'>Action</th>   
                </tr>
            </thead>
            
            <tbody>                
            @foreach($pets as $pets2)            
                <tr>                  
                    <td>                        
                        {{ $pets2->dob }}                        
                    </td>
                    <td>                    
                        {{ $pets2->user_id }}                      
                    </td>
                    
                    <td>                    
                        {{ $pets2->species_id }}                      
                    </td>                   
                    <td>                   
                        {{ $pets2->pet_names }}                      
                    </td>    
                    <td>
                        <!-- Edit -->                        
                        <a style="" href="" class="btn btn-sm btn-info">Edit</a>
                        <!-- Delete -->
                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                    </td>  
                </tr>
            @endforeach
            </tbody>
        </table>


        
            
    </div>
</div>
@stop
