<div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="{{asset("/backend/images/avatar.jpg")}}" alt="">{{ $user['name'] }}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown" style="margin-top: 22px;">
                      <a class="dropdown-item" href="{{route('admin.logout')}}">Đăng xuất</a>
                    </div>
                  </li>
                </ul>
              </nav>