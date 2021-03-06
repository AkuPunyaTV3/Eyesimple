<!-- Extends template page-->

@extends('layouts.app')

@section('script')
<script>
    $(document).ready( function () {
    $('#example').DataTable({
        serverSide: true,
        ajax: {
            'url': 'roles_datatable',
            'type': 'POST',
            'data':{_token:"{{ csrf_token()}}"},
        },
        columns:[
            {"data":"Roles"},
            {"data":"User"},            
            {"data":"Action"},               
        ],
    });
} );
</script>
@endsection
@section('content')


<div style="margin-left: 20px;">
    
    <h3>&nbsp;Role List</h3>

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
            <a class='btn btn-info float-right' href="{{route('roles.add_role')}}" style="margin-right: ">Add Role</a>                        
        </div>
        
        <table id="example" >
            <thead>
                <tr>

                    {{-- <th width='20%'>ID</th> --}}
                    <th width='20%'>Roles</th>            
                    <th width='25%'>User</th>   
                    <th width='25%'>Actions</th>   
                </tr>
            </thead>
            <tbody>
                {{-- @foreach($roles as $roles)
                <tr>       
                                   
                    <td>                    
                        {{ $roles->name }}                      
                    </td>             
                   
                    
                    <td>     @foreach ($roles->users as $subjects)
                        {{ $subjects->name }},                   
                        
                    @endforeach     
                    
                    </td>
                    
                                        
                    <td>
                        <!-- Edit -->
                        <a style="" href="{{ route('roles.edit',[$roles->id]) }}" class="btn btn-sm btn-info">Edit</a>
                        <!-- Delete -->
                        <a href="{{ route('roles.delete',$roles->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach --}}
            </tbody>
        </table>
            
    </div>
</div>
@endsection
