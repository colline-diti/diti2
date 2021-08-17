@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
              
        <div class="col-md-6">
          
            <div class="user-photo text-center">
                <div class="img-container text-center">
                    <img width = "150px" height="150px" src="/assets/images/logo1.jpg" alt="DIT Business Informtion Center">
                </div>
                <div class="designation m-t-8 m-b-8 text-center">
                    <h2>DIT</h2>
                    <h4>Business Information Center</h4>
                </div> 
            </div>
            <div class="card border-success">
           
                <div class="card-header text-center">
                    <h5>Login</h5>                    
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="form-group row">                                 
                             
                            <div class="input-group col-md-12">
                                <span class="input-group-addon col-md-1 form-control color-dark"><i class="ti-user f-s-13"></i></span> 
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                         
                            <div class="input-group col-md-12">
                                <span class="input-group-addon col-md-1 form-control color-dark"><i class="ti-lock f-s-13"></i></span> 
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn col-md-12 btn-primary">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
