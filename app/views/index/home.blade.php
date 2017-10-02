@extends('layouts.master')

<?php 
	 $settings = AdminSettings::first();
	 $userAuth = Auth::user(); 
	 
	 // TEAMS Membership Check
	   if( Auth::check() && Auth::user()->type_account == 3 ) {
	   	
		$_dateNow   = date('Y-m-d G:i:s');
		   	
		$teamMembershipStatus = DB::table('paypal_payments_teams')
		->where('user_id', Auth::user()->id)
		->where('expire','>',$_dateNow)
		->where('payment_status', '=', 'Completed')
		->orderBy('id', 'desc')
		->first(); 
	   }
	 
 ?>

@section('jumbotron')

@if( !Auth::check())
 <div class="jumbotron index-header">
      <div class="container wrap-jumbotron">
        <h1 class="w_text">{{Lang::get('misc.welcome_title')}}</h1>
        <p class="subtitle">{{Lang::get('misc.welcome_subtitle')}}</p>
      
      @if( $settings->registration_active == '1' )  
        <p><a href="{{ URL::to('/join') }}" class="btn btn-lg btn-success no-shadow btn-join">{{Lang::get('misc.join_home')}}</a></p>
      @endif
      </div>
    </div>
    @endif
@stop

@section('content') 
     	
<!-- Col MD -->
<div class="col-md-12">	
	
	@if(  Auth::check() 
	&& !isset( $teamMembershipStatus ) 
	&& Auth::user()->type_account == 3 
	&& Auth::user()->team_free == 0
	&& $settings->team_free == 'off'
	)
	<div class="alert alert-warning btn-sm margin-zero text-center" role="alert">
		  	 	{{Lang::get('misc.membership_expired_teams')}} <a href="{{URL::to('renew/membership')}}" class="btn btn-success btn-xs">{{Lang::get('misc.renewed_for_one_year')}}</a>
		  	 </div>
		  	 @endif
	
			@if (Session::has('success_verify'))
			<div class="alert alert-success btn-lg text-center" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            		{{ Session::get('success_verify')}}
            		</div>
            	@endif
            	
            	@if (Session::has('welcome'))
			<div class="alert alert-success btn-lg text-center" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            		{{ Session::get('welcome')}}
            		</div>
            	@endif
            	
@if( $data->count() != 0 )
		
	@include('includes.nav-pills')

@endif
	
	@include('includes.shots')
	
	@if( Auth::check() && $data->count() == 0 )
	
	<div class="no-following-yet">
		<h2 class="margin-top-none text-center">- {{ Lang::get('misc.no_following_user') }} -</h2>
	    <h5 class="btn-block text-center">{{ Lang::get('misc.suggest_following') }}</h5>
	    <span class="btn-block text-center">
	    	<a href="{{ URL::to('latest') }}" class="btn btn-sm btn-success shadow-inset">{{ Lang::get('misc.explore') }} <i class="fa fa-search"></i></a>
	    	<a href="{{ URL::to('designers') }}" class="btn btn-sm btn-danger shadow-inset">{{ Lang::get('misc.designers') }} <i class="icon-user"></i></a>
	    </span>
	 </div>
	 
	@elseif( !Auth::check() && $data->count() == 0 )
	
	<div class="btn-block text-center">
	    	<i class="icon-quill ico-no-result"></i>
	    </div>
	    
	<div class="no-following-yet">
			<h2 class="margin-top-none text-center">- {{ Lang::get('misc.no_shots_published') }} -</h2>
		</div>
	  	
	@endif
	
</div><!-- /COL MD -->
@stop


