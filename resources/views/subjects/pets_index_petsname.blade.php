<!-- Extends template page-->

@extends('layouts.app')


<!-- Script -->
@section('script')
<script>
    $(document).ready( function () {
    $('#example').DataTable({
        serverSide: true,
        ajax: {
            'url': 'pets_datatable_petsname',
            'type': 'POST',
            'data':{_token:"{{ csrf_token()}}"},
        },
        columns:[
            {"data":"Id"},
            {"data":"Name"},            
            {"data":"Action"},               
        ],
    });
} );
</script>
@endsection

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

        <table id=example >
            <thead>
                <tr>
                    {{-- <th width='20%'>ID</th> --}}
                    <th width='25%'>ID</th>            
                    <th width='25%'>Name</th> 
                    <th width='25%'>Action</th> 
                    
                                    
                </tr>
            </thead>
            
            <tbody>
                
            {{-- @foreach($pets as $pets)
            @php 
            // dd ($pets);
             @endphp
                <tr>                  
                    <td>                        
                        {{ $pets->id }}                        
                    </td>
                    <td>                    
                        {{ $pets->name }}                      
                    </td>    
                    <td>
                        <!-- Edit -->                        
                        <a style="" href="" class="btn btn-sm btn-info">Edit</a>
                        <!-- Delete -->
                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                    </td>           
                </tr>
                
            @endforeach --}}
         
            </tbody>
        </table>
            
    </div>
</div>
@endsection
