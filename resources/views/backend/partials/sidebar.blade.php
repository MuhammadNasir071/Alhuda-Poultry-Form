<!-- MENU SIDEBAR-->
@inject('request', 'Illuminate\Http\Request')
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{route('admin.dashboard')}}">
            <img src="{{asset('images/main_logo.png')}}" alt="Admin" />
        </a>
    </div>

    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class=" {{Route::currentRouteName() == 'admin.dashboard' ? 'active' : ''}}">
                    <a href="{{route('admin.dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                @if(Auth::user()->roles[0]['id'] == 1)
                <li class="{{($request->segment(2) == 'users' ? 'active' : '' )}}">
                    <a href="{{route('admin.users.index')}}">
                        <i class="fas fa-user"></i>User
                    </a>
                </li>
                @endif
                <li class="{{($request->segment(2) == 'clients' ? 'active' : '' )}}">
                    <a href="{{route('admin.clients.index')}}">
                        <i class="fas fa-users"></i>Client
                    </a>
                </li>

                <li class="{{($request->segment(2) == 'companies' ? 'active' : '' )}}">
                    <a href="{{route('admin.companies.index')}}">
                        <i class="fas fa-copy"></i>Companies
                    </a>
                </li>

                <li class="{{($request->segment(2) == 'mortalities' ? 'active': ($request->segment(2) == 'sheds' ? 'active' : ($request->segment(2) == 'expenses' ? 'active' : ($request->segment(2) == 'sales' ? 'active' : '' ))))}}">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-briefcase"></i>Sheds Details</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list" style="{{($request->segment(2) == 'mortalities' ? 'display:block': ($request->segment(2) == 'sheds' ? 'display:block' : ($request->segment(2) == 'expenses' ? 'display:block' : ($request->segment(2) == 'sales' ? 'display:block'  : ($request->segment(2) == 'feeds' ? 'display:block' : '' )))))}}" >
                        <li class="{{($request->segment(2) == 'sheds' ? 'active': '' )}}">
                            <a href="{{route('admin.sheds.index')}}"><i class="fas fa-angle-right"></i>Sheds</a>
                        </li>
                        <li class="{{($request->segment(2) == 'mortalities' ? 'active': '' )}}">
                            <a href="{{route('admin.mortalities.index')}}"><i class="fas fa-angle-right"></i>Mortality</a>
                        </li>
                        <li class="{{($request->segment(2) == 'feeds' ? 'active' : '' )}}">
                            <a href="{{route('admin.feeds.index')}}"><i class="fas fa-angle-right"></i>Feeds</a>
                        </li>
                        <li class="{{($request->segment(2) == 'expenses' ? 'active': '' )}}">
                            <a href="{{route('admin.expenses.index')}}"><i class="fas fa-angle-right"></i>Expenses</a>
                        </li>
                        <li class="{{($request->segment(2) == 'sales' ? 'active': '' )}}">
                            <a href="{{route('admin.sales.index')}}"><i class="fas fa-angle-right"></i>Sales</a>
                        </li>
                    </ul>
                </li>
                <li class="{{($request->segment(2) == 'expensetype' ? 'active' : '' )}}">
                    <a href="{{route('admin.expensetype.index')}}">
                        <i class="fas fa-snowflake-o"></i>Expense Type
                    </a>
                </li>
                @if(Auth::user()->roles[0]['id'] == 1)
                <li class="{{($request->segment(2) == 'reports' ? 'active': '')}}">
                    <a class="js-arrow" href="#">
                        <i class="zmdi zmdi-shopping-basket"></i>Reports</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list" style="{{($request->segment(2) == 'reports' ? 'display:block': '')}}" >
                        <li class="{{($request->segment(3) == 'mortality' ? 'active': '' )}}">
                            <a href="{{route('admin.mortality.weekly_report')}}"><i class="fas fa-angle-right"></i>Mortality Report</a>
                        </li>
                        <li class="{{($request->segment(3) == 'feeds' ? 'active': '' )}}">
                            <a href="{{route('admin.feeds.weekly_report')}}"><i class="fas fa-angle-right"></i>Feeds Report</a>
                        </li>
                        <li class="{{($request->segment(3) == 'sales' ? 'active': '' )}}">
                            <a href="{{route('admin.sales.total_report')}}"><i class="fas fa-angle-right"></i>Sales Report</a>
                        </li>
                        <li class="{{($request->segment(3) == 'expense' ? 'active': '' )}}">
                            <a href="{{route('admin.expense.weekly_report')}}"><i class="fas fa-angle-right"></i>Expense Report</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(Auth::user()->roles[0]['id'] == 1)
                <li class="{{($request->segment(2) == 'history' ? 'active': '')}}">
                    <a class="js-arrow" href="#">
                        <i class="zmdi zmdi-shopping-basket"></i>History</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list" style="{{($request->segment(2) == 'history' ? 'display:block': '')}}" >
                        <li class="{{($request->segment(3) == 'mortality' ? 'active': '' )}}">
                            <a href="{{route('admin.mortality.weekly_history')}}"><i class="fas fa-angle-right"></i>Mortality Report</a>
                        </li>
                        <li class="{{($request->segment(3) == 'feeds' ? 'active': '' )}}">
                            <a href="{{route('admin.feeds.weekly_history')}}"><i class="fas fa-angle-right"></i>Feeds Report</a>
                        </li>
                        <li class="{{($request->segment(3) == 'sales' ? 'active': '' )}}">
                            <a href="{{route('admin.sales.total_history')}}"><i class="fas fa-angle-right"></i>Sales Report</a>
                        </li>
                        <li class="{{($request->segment(3) == 'expense' ? 'active': '' )}}">
                            <a href="{{route('admin.expense.weekly_history')}}"><i class="fas fa-angle-right"></i>Expense Report</a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>

<!-- END MENU SIDEBAR-->
