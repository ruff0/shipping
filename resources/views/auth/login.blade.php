@extends('layouts.login')
@section('content')
            <div class="container content_middle">
                <!-- Block Login Row 1-->
                
                <div class="row">
                    <!-- Container Form-->
                    <div class="col-xs-5 center-block vertical-align-login-form">
                        <p class="text-center"><img src="{{url('public/shippingtemplate/images/acl-logo.png') }}"/></p>
                        <div class="inner-login">
                            <!-- Sign in heading -->
                            <div class="row">
                                <div class="col-xs-12 header-page">
                                    <h3>
                                        <div class="pvcombank-title-circle">
                                            <div class="pvcombank-title-circle-inner"><i class="fa fa-group fa-lg"></i></div>
                                        </div>
                                         Login
                                    </h3>
                                </div>
                            </div>            
                                
                            <!-- Sign in Form Start -->
                            <form class="form-signin" role="form" method="POST" action="{{ url('/login') }}">
                                {!! csrf_field() !!}
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}" required>
                                    <div class="col-xs-12">
                                        <!-- form input  -->
                                        <div class="right-inner-addon">
                                         @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>    
                                                </span>
                                            @endif
                                            <i class="fa fa-user fa-lg"></i>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}">                                                                           
                                        </div>                                
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="col-xs-12">
                                        <!-- form input  -->
                                        <div class="right-inner-addon">
                                          @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>    
                                                </span>
                                            @endif
                                            <i class="fa fa-lock fa-lg"></i>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="{{ old('password') }}">
                                              
                                        </div>                                
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 text-right">
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-long-arrow-right"></i> Login</button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- End Sign In area -->
                    </div><!-- End Container Form-->
                </div><!-- End Block Login Row 1-->
            </div>
@endsection
