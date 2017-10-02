<!-- panel-default -->
	<div class="panel panel-default">
			<div class="panel-body padding-top padding-top-zero padding-right-zero padding-left-zero">
				    					
				<div style="background: url({{ URL::asset('public/cover').'/'.Auth::user()->cover }}) no-repeat center center #0088E2; background-size: cover;" class="cover-wall"></div>
				
			<div class="media media-visible pd-right">
				  <a href="{{ URL::to('@') }}{{ Auth::user()->username }}" class="btn-block photo-card-live myprofile">
				    <img class="border-image-profile img-circle photo-card" alt="Image" src="{{ URL::asset('public/avatar').'/'.Auth::user()->avatar }}" width="80" height="80">
				  </a>
				  <div class="media-body">
				    <h4 class="user-name-profile-card btn-block  text-center">
				    	<a class="myprofile" href="{{ URL::to('@') }}{{ Auth::user()->username }}">
				    		<span class="none-overflow">{{ e( Auth::user()->name ) }}</span>
				    		</a>
					</h4>
				  </div>
				</div>
		
	    		<ul class="nav list-inline nav-pills btn-block nav-user-profile-wall">
	    			<li><a href="{{ URL::to('@') }}{{ Auth::user()->username }}">{{ Lang::get('misc.shots') }} <small class="btn-block sm-btn-size counter-sm">{{ Helper::formatNumber( User::totalShots( Auth::user()->id ) ) }}</small></a></li>
	    			<li><a href="{{ URL::to('@') }}{{ Auth::user()->username }}/followers">{{ Lang::get('users.followers') }} <small class="btn-block sm-btn-size counter-sm">{{ Helper::formatNumber( User::totalFollowers( Auth::user()->id ) ) }}</small></a></li>
	    			<li><a href="{{ URL::to('@') }}{{ Auth::user()->username }}/following">{{ Lang::get('users.following') }} <small class="btn-block sm-btn-size counter-sm">{{ Helper::formatNumber( User::totalFollowing( Auth::user()->id ) ) }}</small></a></li>
	    			</ul>
	    		
			</div><!-- Panel Body -->
	</div><!-- panel-default -->