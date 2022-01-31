<!-- Extends template page -->
@extends('layouts.app')

<!-- Specify content -->
@section('content')

<h3>Add User</h3>

<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">

        <!-- Alert message (start) -->
        @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class') }}">
            {{ Session::get('message') }}
        </div>
        @endif
        <!-- Alert message (end) -->

        <div class="actionbutton">

            <a class='btn btn-info float-right' href="{{route('subjects')}}">List</a>

        </div>

        <form action="{{route('subjects.store')}}" method="post" id="subjectForm">
            {{csrf_field()}}


            <label class="control-label col-md-6 col-sm-6 col-xs-12" for="name">Username <span
                class="required">*</span></label>
            <div class="col-md-6 col-sm-12 col-xs-12">
            <input id="name" class="form-control col-md-12 col-xs-12" name="name" placeholder="Enter Username"
                required="required" type="text">

            @if ($errors->has('name'))
            <span class="errormsg">{{ $errors->first('name') }}</span>
            @endif
        </div>

        
            <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>         

            
            
                <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
           


            




    </div>

    
        <br>
        <div class="col-md-6 col-sm-12 col-xs-12">
            @foreach($roles as $roles)
                <input  type="checkbox" id="{{ $roles->id }}" value="{{ $roles->id }}" name="roles[]">                    
                {{ $roles->name}}   <br>
            @endforeach
        
        <br>
        <label  for="description">Description</label>        
            <textarea name='description' id='description' class='form-control'
                placeholder="Enter description"></textarea>

            @if ($errors->has('description'))
            <span class="errormsg">{{ $errors->first('description') }}</span>
            @endif
        </div>
    
        <div class="control-label col-md-12 col-sm-12 col-xs-12" style="margin-left:40% ;margin-top: 5px">
            <input type="submit" name="submit" value='Submit' class='btn btn-success'>
        </div>

        <script>
            if(submit)

        </script>
        
    

    </form>


</div>

@stop
