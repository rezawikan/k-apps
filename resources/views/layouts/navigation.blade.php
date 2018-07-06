<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
          <li class="nav-header">
              <div class="dropdown profile-element">
                  <span>
                    {{-- <img alt="image" class="img-circle" src="{{ asset('img/profile_small.jpg')}}" /> --}}
                  </span>
                  <span class="clear">
                    <span class="block m-t-xs">
                      <strong class="font-bold">{{ Auth::user()->email }}</strong>
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
                <a href="{{ route('default') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li class="{{ isActiveRoute('k-feedback') }}">
                <a href="{{ route('k-feedback.index') }}"><i class="fa fa-comments"></i> <span class="nav-label">K-Feedback</span></a>
            </li>
            <li class="{{ isActiveRoute('impact-tracker') }}">
                <a href="{{ route('impact-tracker.index') }}"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Impact Tracker</span></a>
            </li>
            <li class="{{ isActiveRoute(['manage/officer','manage/distribution-target','manage/funding-type','manage/price-type','manage/project-type','manage/technology','manage/technology-type']) }}">
                <a href="#"><i class="fa fa-shopping-cart"></i><span class="nav-label">Manage</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ isActiveRoute('manage/funding-type') }}"><a href="{{ route('funding-type.index') }}">Funding Type</a></li>
                </ul>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ isActiveRoute('manage/distribution-target') }}"><a href="{{ route('distribution-target.index') }}">Distribution Target</a></li>
                </ul>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ isActiveRoute('manage/officer') }}"><a href="{{ route('officer.index') }}">Officer</a></li>
                </ul>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ isActiveRoute('manage/price-type') }}"><a href="{{ route('price-type.index') }}">Price Type</a></li>
                </ul>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ isActiveRoute('manage/project-type') }}"><a href="{{ route('project-type.index') }}">Project Type</a></li>
                </ul>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ isActiveRoute('manage/technology') }}"><a href="{{ route('technology.index') }}">Technology</a></li>
                </ul>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ isActiveRoute('manage/technology-type') }}"><a href="{{ route('technology-type.index') }}">Technology Type</a></li>
                </ul>
            </li>
            <li class="{{ isActiveRoute('travel') }}">
                <a href="{{ route('travel.index') }}"><i class="fa fa-plane"></i> <span class="nav-label">Travel</span></a>
            </li>
            <li class="{{ isActiveRoute('procurement') }}">
                <a href="{{ route('procurement.index') }}"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Procurement & Advance</span></a>
            </li>
            <li class="{{ isActiveRoute('financial') }}">
                <a href="{{ route('financial.index') }}"><i class="fa fa fa-money"></i> <span class="nav-label">Financial</span></a>
            </li>
            <li class="{{ isActiveRoute('k-mrp') }}">
                <a href="{{ route('k-mrp.index') }}"><i class="fa fa-cogs"></i> <span class="nav-label">K-MRP</span></a>
            </li>
            <li class="{{ isActiveRoute('human-resources') }}">
                <a href="{{ route('human-resources.index') }}"><i class="fa fa-users"></i> <span class="nav-label">Human Resources</span></a>
            </li>
            <li class="{{ isActiveRoute('comms-assets') }}">
                <a href="{{ route('comms-assets.index') }}"><i class="fa fa-picture-o"></i> <span class="nav-label">Comms Assets</span></a>
            </li>
            {{-- <li class="{{ isActiveRoute(['master/products']) }}">
                <a href="#"><i class="fa fa-shopping-cart"></i><span class="nav-label">Products</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ isActiveRoute('master/products') }}"><a href="{{ url('master/products') }}">List of Tables</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">E-commerce</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="ecommerce_products_grid.html">Products grid</a></li>
                    <li><a href="ecommerce_product_list.html">Products list</a></li>
                    <li><a href="ecommerce_product.html">Product edit</a></li>
                    <li><a href="ecommerce_product_detail.html">Product detail</a></li>
                    <li><a href="ecommerce-cart.html">Cart</a></li>
                    <li><a href="ecommerce-orders.html">Orders</a></li>
                    <li><a href="ecommerce_payments.html">Credit Card form</a></li>
                </ul>
            </li> --}}
        </ul>

    </div>
</nav>
