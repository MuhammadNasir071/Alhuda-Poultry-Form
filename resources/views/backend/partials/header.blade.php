<!-- HEADER DESKTOP-->
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <form class="form-header" action="" method="POST">
                        <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                        <button class="au-btn--submit" disabled type="submit">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                    <div class="header-button">
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                <div class="image">
                                    <img src="{{!empty(auth()->user()->profile_picture) ? url('Uploads/user/'.auth()->user()->profile_picture) : asset('images/img_avatar3.png')}}" alt="John Doe" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#">{{ !empty(auth()->user()->full_name) ? auth()->user()->full_name : 'John doe'}}</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="{{!empty(auth()->user()->profile_picture) ? url('Uploads/user/'.auth()->user()->profile_picture) : asset('images/img_avatar3.png')}}" alt="John Doe" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#">{{ !empty(auth()->user()->full_name) ? auth()->user()->full_name : 'John doe'}}</a>
                                            </h5>
                                            <span class="email">{{ !empty(auth()->user()->email) ? auth()->user()->email : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="{{route('admin.view.profile', auth()->id())}}">
                                                <i class="zmdi zmdi-account"></i>Profile</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="{{route('admin.edit.profile', auth()->id())}}">
                                                <i class="zmdi zmdi-settings"></i>Setting</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<!-- HEADER DESKTOP-->
