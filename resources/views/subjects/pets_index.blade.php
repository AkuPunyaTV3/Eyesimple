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
    <br><h3>&nbsp;Pets List</h3><br>
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
                    {{-- <th width='20%'>ID</th> --}}
                    <th width='20%'>Dob</th>            
                    <th width='20%'>User ID</th>   
                    <th width='20%'>Spesies ID</th>   
                    <th width='20%'>Names ID</th>   
                    <th width='20%'>Action</th>
                </tr>
            </thead>
            
            <tbody>
                
            @foreach($pets as $pets)
            
            @php 
            //  dd ($pets->users);
             @endphp
                <tr>                  
                    <td>                        
                        {{ $pets->dob }}                        
                    </td>
                    <td>               
                        
                        {{-- {{ $pets->users->name }}                       --}}
                    </td>

                    <td>                    
                        {{ $pets->species->name }}                      
                    </td>                   
                    <td>                   
                        {{-- {{ $pets->names->name }}                       --}}
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
