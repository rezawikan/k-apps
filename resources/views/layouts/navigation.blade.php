<nav class="navbar-default navbar-static-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
      <li class="nav-header">
        <div class="dropdown profile-element">
          <span>
            <img alt="image" class="img-circle" src="{{ asset('img/profile_small.jpg')}}" />
          </span>
          <span class="clear">
            <span class="block m-t-xs">
              <strong class="font-bold" style="color:white;">{{ Auth::user()->full_name }} </strong>
            </span>
            {{-- <span class="text-muted text-xs block">Art Director </span> --}}
          </span>
          <ul class="dropdown-menu animated fadeInRight m-t-xs">
            <li><a href="profile.html">Profile</a></li>
            <li><a href="contacts.html">Contacts</a></li>
            <li><a href="mailbox.html">Mailbox</a></li>
            <li class="divider"></li>
            <li><a href="login.html">Logout</a></li>
          </ul>
        </div>
        <div class="logo-element">
          IN+
        </div>
      </li>
      <li class="{{ isActiveRoute('dashboard') }}">
        <a href="{{ route('default') }}" title="Dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
      </li>
      <li class="{{ isActiveRoute('k-feedback') }}">
        <a href="{{ route('k-feedback.index') }}" title="K-Feedback"><i class="fa fa-comments"></i> <span class="nav-label">K-Feedback</span></a>
      </li>
      <li class="{{ isActiveRoute('impact-tracker') }}">
        <a href="{{ route('impact-tracker.index') }}" title="Impact Tracker"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Impact Tracker</span></a>
      </li>
      @can('manage project')
      <li class="{{ isActiveRoute(['manage/officer','manage/distribution-target','manage/funding-type','manage/price-type','manage/project-type','manage/technology','manage/technology-type']) }}">
        <a href="#"><i class="fa fa-shopping-cart"></i><span class="nav-label">Manage</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
          <li class="{{ isActiveRoute('manage/funding-type') }}"><a href="{{ route('funding-type.index') }}" title="Funding Type">Funding Type</a></li>
        </ul>
        <ul class="nav nav-second-level collapse">
          <li class="{{ isActiveRoute('manage/distribution-target') }}"><a href="{{ route('distribution-target.index') }}" title="Distribution Target">Distribution Target</a></li>
        </ul>
        @can('hide')
        <ul class="nav nav-second-level collapse">
          <li class="{{ isActiveRoute('manage/officer') }}"><a href="{{ route('officer.index') }}" title="Officer">Officer</a></li>
        </ul>
        @endcan
        <ul class="nav nav-second-level collapse">
          <li class="{{ isActiveRoute('manage/price-type') }}"><a href="{{ route('price-type.index') }}" title="Price Type">Price Type</a></li>
        </ul>
        <ul class="nav nav-second-level collapse">
          <li class="{{ isActiveRoute('manage/project-type') }}"><a href="{{ route('project-type.index') }}" title="Project Type">Project Type</a></li>
        </ul>
        <ul class="nav nav-second-level collapse">
          <li class="{{ isActiveRoute('manage/technology') }}"><a href="{{ route('technology.index') }}" title="Technology">Technology</a></li>
        </ul>
        <ul class="nav nav-second-level collapse">
          <li class="{{ isActiveRoute('manage/technology-type') }}"><a href="{{ route('technology-type.index') }}" title="Technology Type">Technology Type</a></li>
        </ul>
      </li>
    @endcan
      <li class="{{ isActiveRoute('travel') }}">
        <a href="{{ route('travel.index') }}" title="Travel"><i class="fa fa-plane"></i> <span class="nav-label">Travel</span></a>
      </li>
      <li class="{{ isActiveRoute('procurement-and-advance') }}">
        <a href="{{ route('procurement-and-advance.index') }}" title="Procurement and Advance"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Procurement and Advance</span></a>
      </li>
      <li class="{{ isActiveRoute('financial-and-legal') }}">
        <a href="{{ route('financial-and-legal.index') }}" title="Finance and Legal"><i class="fa fa fa-money"></i> <span class="nav-label">Finance and Legal</span></a>
      </li>
      <li class="{{ isActiveRoute('k-policies') }}">
        <a href="{{ route('k-policies.index') }}" title="K-Policies"><i class="fa fa-cogs"></i> <span class="nav-label">K-Policies</span></a>
      </li>
      <li class="{{ isActiveRoute('human-resources') }}">
        <a href="{{ route('human-resources.index') }}" title="Human Resources"><i class="fa fa-users"></i> <span class="nav-label">Human Resources</span></a>
      </li>
      <li class="{{ isActiveRoute('comms-assets') }}">
        <a href="{{ route('comms-assets.index') }}" title="Comms Assets"><i class="fa fa-picture-o"></i> <span class="nav-label">Comms Assets</span></a>
      </li>
      <li class="{{ isActiveRoute('users') }}">
        <a href="{{ route('users.index') }}" title="K-Feedback"><i class="fa fa-comments"></i> <span class="nav-label">Users</span></a>
      </li>
      @can('view log')
      <li class="{{ isActiveRoute('log') }}">
        <a href="{{ route('log.index') }}" title="Log"><i class="fa fa-history"></i> <span class="nav-label">Log</span></a>
      </li>
      @endcan
    </ul>
  </div>
</nav>
