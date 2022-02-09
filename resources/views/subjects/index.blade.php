<!-- Extends template page-->

@extends('layouts.app')

<!-- Script -->
@section('script')
<script>
    $(document).ready( function () {
    $('#example').DataTable({
        serverSide: true,
        ajax: {
            'url': 'subjects',
            'type': 'POST',
            
            'data':{_token:"{{ csrf_token()}}"},
        },
        columns:[
            {"data":"Name"},
            {"data":"Email"},            
            {"data":"Roles"},
            {"data":"Description"},
            {"data":"Pet_Names"},
            {"data":"Species"},
            {"data":"Dob"},
            {"data":"Actions"},


            // <th width='10%'>Name</th>
            //         <th width='10%'>Email</th>
            //         <th width='10%'>Roles</th>                
            //         <th width='10%'>Description</th>
            //         <th width='10%'>Pet Names</th>  
            //         <th width='10%'>Species</th> 
            //         <th width='10%'>Dob</th>                     
            //         <th width='10%'>Actions</th>           
        ],
    });
} );
</script>
@endsection
@section('content')



<div style="margin-left: 20px;">
    
    <h3>&nbsp;User List</h3>
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
           
        <div class='actionbutton'>                        
            <a class='btn btn-info float-right' href="{{route('subjects.create')}}" style="margin-right: ">Add User</a>                        
        </div>

        <div class='actionbutton'>                        
            <a class='btn btn-info float-right' href="{{route('roles.role')}}" style="margin-right: ">User Role</a>                        
        </div>

        <div class='actionbutton'>                        
            <a class='btn btn-info float-right' href="{{route('pets')}}" style="margin-right: ">Pets</a>                        
        </div>


        <table id=example >
            <thead>
                <tr>
                    <th width='10%'>Name</th>
                    <th width='10%'>Email</th>
                    <th width='10%'>Roles</th>                
                    <th width='10%'>Description</th>
                    <th width='10%'>Pet Names</th>  
                    <th width='10%'>Species</th> 
                    <th width='10%'>Dob</th>                     
                    <th width='10%'>Actions</th>          
                
                </tr>
            </thead>
            <tbody>
            {{-- @foreach($subjects as $subject)
                <tr>                     
                    <td>{{ $subject->name }}</td>
                    

                    <td>{{ $subject->email }}</td>

                   
                    <td>
                    @foreach ($subject->roles as $role)
                        
                       - {{ $role->name}}   <br>
                    @endforeach

                    
                    </td>

                    <td>{{ $subject->description }}</td>                        
                    
                   
                    <td>
                        @foreach ($subject->pets as $pets)                        
                        - {{ $pets->names->name}}   <br>                        
                        @endforeach
                    </td>
                    <td>
                        @foreach ($subject->pets as $pets)                        
                        - {{ $pets->species->name}}   <br>
                        @endforeach
                    </td>
                        
                    <td>
                        @foreach ($subject->pets as $pets)                        
                        - {{ $pets->dob}}   <br>
                        @endforeach
                    </td>
                    <td>
                                              
                        <a style="" href="{{ route('subjects.edit',[$subject->id]) }}" class="btn btn-sm btn-info">Edit</a>
                   
                        <a href="{{ route('subjects.delete',$subject->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                <tr>
                     <thead>
                    <th width='20%'>Pet Names</th>  
                    <th width='20%'>Species</th> 
                    <th width='20%'>Dob</th>  
                    </thead>
                    
                    <tbody>
                    
                    <td>
                        @foreach ($subject->pets as $pets)                        
                        - {{ $pets->names->name}}   <br>                        
                        @endforeach
                    </td>
                    <td>
                        @foreach ($subject->pets as $pets)                        
                        - {{ $pets->species->name}}   <br>
                        @endforeach
                    </td>
                        
                    <td>
                        @foreach ($subject->pets as $pets)                        
                        - {{ $pets->dob}}   <br>
                        @endforeach
                    </td>
                    
                    </tbody>
                         

                    
                </tr>
                <tr>
               
                </tr>
                
            @endforeach --}}
            </tbody>
        </table>


        
            
    </div>
</div>
@endsection
