@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

             

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('global.app_dashboard')</span>
                </a>
            </li>

            
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('global.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('permission_access')
                <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.permissions.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('global.permissions.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('role_access')
                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('global.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('global.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('engagement_access')
            <li class="{{ $request->segment(2) == 'engagements' ? 'active' : '' }}">
                <a href="{{ route('admin.engagements.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('global.engagements.title')</span>
                </a>
            </li>
            @endcan
            

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-line-chart"></i>
                    <span class="title">Generated Reports</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                   <li class="{{ $request->is('/reports/fans') }}">
                        <a href="{{ url('/admin/reports/fans') }}">
                            <i class="fa fa-line-chart"></i>
                            <span class="title">Fans</span>
                        </a>
                    </li>   <li class="{{ $request->is('/reports/engagements') }}">
                        <a href="{{ url('/admin/reports/engagements') }}">
                            <i class="fa fa-line-chart"></i>
                            <span class="title">Engagements</span>
                        </a>
                    </li>   <li class="{{ $request->is('/reports/reactions') }}">
                        <a href="{{ url('/admin/reports/reactions') }}">
                            <i class="fa fa-line-chart"></i>
                            <span class="title">Reactions</span>
                        </a>
                    </li>   <li class="{{ $request->is('/reports/comments') }}">
                        <a href="{{ url('/admin/reports/comments') }}">
                            <i class="fa fa-line-chart"></i>
                            <span class="title">Comments</span>
                        </a>
                    </li>   <li class="{{ $request->is('/reports/shares') }}">
                        <a href="{{ url('/admin/reports/shares') }}">
                            <i class="fa fa-line-chart"></i>
                            <span class="title">Shares</span>
                        </a>
                    </li>
                </ul>
            </li>

            



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('global.app_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('global.app_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

