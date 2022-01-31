<!-- Extends template page-->

@extends('layouts.app')

<!-- Specify content -->
@section('content')

     




<div style="margin-left: 20px;">
    
    <h3>&nbsp;Add Pets</h3>

</div>

<form action="{{route('roles.add_role_create')}}" method="post" >
    {{csrf_field()}}
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">

        <!-- Alert message (start) -->
        @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class') }}">
            {{ Session::get('message') }}
        </div>
        @endif
        <!-- Alert message (end) -->
        
        <tbody>
        <table class="table" >
            {{-- Name --}}
            <label class="control-label col-md-6 col-sm-6 col-xs-12" for="role">Name<span
                class="required"></span></label>            
            <input id="role" class="form-control col-md-6 col-sm-6 col-xs-12" name="name" placeholder="Enter Name"
                required="required" type="text">
            <br>
            {{-- Pet Name --}}
            <label class="control-label col-md-6 col-sm-6 col-xs-12" for="role">Pet Name<span
                class="required"></span></label>            
            <input id="role" class="form-control col-md-6 col-sm-6 col-xs-12" name="name" placeholder="Enter Pet Name"
                required="required" type="text">
            <br>

            {{-- Species --}}
            <label class="control-label col-md-6 col-sm-6 col-xs-12" for="role">Species<span
                class="required"></span></label><br>              
            {{-- <input id="role" class="form-control col-md-6 col-sm-6 col-xs-12" name="species" placeholder="Enter Species"
                required="required" type="text"> --}}

                @foreach($species as $species)
                {{-- @php dd ($species) @endphp                 --}}
                <input  type="radio" id="{{ $species->id }}" value="{{ $species->id }}" name="pets[]" >                                    
                {{ $species->name}}   <br>      
                    
                @endforeach



            {{-- Dob --}}
            <br>
            <label class="control-label col-md-6 col-sm-6 col-xs-12" for="role">Date of Birth<span class="required"></span></label>
            <input id="role" class="form-control col-md-6 col-sm-6 col-xs-12" name="role_name" placeholder="Select date"
                required="required" type="date">               
         

            

            
            <div class="control-label col-md-12 col-sm-12 col-xs-12" style="margin-left:40% ;margin-top: 5px">
                <input type="submit" name="submit" value='Submit' class='btn btn-success'>
            </div>


            
                
            </tbody>
        </table>
            
    </div>
</div>
</form>

@stop
