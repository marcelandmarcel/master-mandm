<nav class="navbar navbar-toggleable-md navbar-light bg-faded fixed-top">    
  <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Marcel&marcel <img src="/storage/pages/logo.svg" height="30px" style="margin-top: -10px"></a>
  <div class="collapse navbar-collapse navbar-toggleable-xs" id="navbarNavDropdown">




          <ul class="navbar-nav" id="navid">
              <li class="{{ Request::is('/') ? 'active' : 'no' }}">
              <a class="nav-link" href="\">Home</a>
              </li>
              <li class="{{ Request::is('winebook*') ? 'active' : '' }}">
              <a class="nav-link" href="\winebook">Winebook</a>
              </li>
              <li class="{{ Request::is('events*') ? 'active' : '' }}">
              <a class="nav-link" href="\events">Tasting Events</a>
              </li>
              <li class="{{ Request::is('contact*') ? 'active' : '' }}">
              <a class="nav-link" href="\contact">Contact</a>
              </li>
              <li class="{{ Request::is('about*') ? 'active' : '' }}">
              <a class="nav-link" href="\about">About</a>
              </li>
          </ul>
          
          <!--<ul class="navbar-nav ml-auto">
              @if (Auth::check())
                @if(Auth::user()->avatar)
                  <a class="nav-link" href="\profile"><img src="{{Auth::user()->avatar}}" class="logged-img" height="30px"></a>
                @else
                  <a class="nav-link" href="\profile">{{Auth::user()->name}}</a>
                @endif
                <a class="nav-link" href="\reviews">Review a wine</a>
              @else
                <a class="nav-link" href="\login">Log in</a>
                <a class="nav-link" href="\register">Register</a>
              @endif

          </ul>-->

          <ul class="nav navbar-nav navbar-right ml-auto">
          @if (Auth::check())
            <li class="dropdown profile ml-auto">
                <a href="#" class="dropdown-toggle text-right" data-toggle="dropdown" role="button"
                   aria-expanded="false"><img src="{{ Auth::user()->avatar }}" class="profile-img"> 
                   <span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-animated dropdown-menu-right">
                    <li class="profile-img">
                        <img src="{{ Auth::user()->avatar }}" class="profile-img">
                        <div class="profile-body">
                            <h5>{{ Auth::user()->name }}</h5>
                            <h6>{{ Auth::user()->email }}</h6>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a class="nav-link" href="\reviews"><i class="voyager-wineglass"></i>Review a wine</a>
                    </li>
                    <li><a class="nav-link" href="\home"><i class="voyager-home"></i>Home</a></li>
                    <li><a class="nav-link" href="\profile"><i class="voyager-person"></i>Profile</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-block">
                                @if(isset($item['icon_class']) && !empty($item['icon_class']))
                                <i class="{!! $item['icon_class'] !!}"></i>
                                @endif
                                Log out
                            </button>
                        </form>
                    </li>
                </ul>
            </li>

            
          @else
            <a class="nav-link" href="\login">Log in</a>
            <a class="nav-link" href="\register">Register</a>
          @endif

        </ul>
</div>
</nav>

@push('scripts')

@endpush
