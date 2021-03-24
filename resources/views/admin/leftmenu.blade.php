<div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{route('admin.dashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>Dashboard</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset("/backend/images/avatar.jpg")}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Xin chào</span>
                <h2>{{ $user['name'] }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('manageruser',['model'=>'User'])}}">Quản lý thành viên</a></li>
                      <li><a href="{{route('managerticket',['model'=>'Ticket'])}}">Quản lý vé</a></li>
                      <li><a href="{{route('managervehicles',['model'=>'Vehicles'])}}">Quản lý xe</a></li>
                    </ul>
                  </li>
    
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons --
            <!-- /menu footer buttons -->
          </div>