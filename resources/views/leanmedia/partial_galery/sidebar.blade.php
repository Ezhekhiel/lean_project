<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="dist/img/AdminLTELogo v1.png" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Parkland Indonesia 2</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        {{-- ===========================General Apps=========================== --}}
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-header">General Apps</li>
            <li class="nav-item has-treeview">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Tracking Order System
                            <i class="fas fa-angle-left right"></i>
                        </p>
                </a>
                    <ul class="nav nav-treeview">
                    @guest
                        @if (Route::has('register'))
                            <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Daily Balance</p>
                                        </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                    <p>Tracking PO</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Report Production</p>
                                </a>
                            </li>
                        @endif
                        @else
                            @if (Auth::user()->role=="mLean")
                                <li class="nav-item">
                                    <a href="/daily_balance" class="nav-link">
                                @elseif(Auth::user()->role=="admin")
                                <li class="nav-item">
                                    <a href="/daily_balance" class="nav-link">
                                @else
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                            @endif
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Daily Balance</p>
                                    </a>
                                </li>
                            @if (Auth::user()->role=="mLean")
                                <li class="nav-item">
                                    <a href="/tracking_po" class="nav-link">
                                @elseif(Auth::user()->role=="admin")
                                    <li class="nav-item">
                                        <a href="/tracking_po" class="nav-link">
                                @else
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                            @endif
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tracking PO</p>
                                    </a>
                                </li>
                            @if (Auth::user()->role=="mLean")
                                <li class="nav-item">
                                    <a href="/report_cell" class="nav-link">
                                @elseif(Auth::user()->role=="admin")
                                    <li class="nav-item">
                                        <a href="/report_cell" class="nav-link">
                                @else
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                            @endif
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Report Production</p>
                                    </a>
                                </li>
                    @endguest
                    </ul>
            </li>
            @guest
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-check"></i>
                            <p>Audit</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-calendar-check"></i>
                            <p>Event</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-unlock-alt"></i>
                            <p>Problem Solving</p>
                        </a>
                    </li>
                @endif
                @else
                    @if (Auth::user()->role=="mLean")
                        <li class="nav-item">
                            <a href="http://10.2.11.11/event_project/index.php/admin/event_audit" class="nav-link">
                        @elseif(Auth::user()->role=="admin")
                            <li class="nav-item">
                                <a href="http://10.2.11.11/event_project/index.php/admin/event_audit" class="nav-link">
                        @else
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                    @endif
                                <i class="nav-icon fas fa-user-check"></i>
                                <p>Audit</p>
                            </a>
                        </li>
                    @if (Auth::user()->role=="mLean")
                        <li class="nav-item">
                            <a href="http://10.2.11.11/event_project/index.php/admin/event_audit" class="nav-link">
                        @elseif(Auth::user()->role=="admin")
                            <li class="nav-item">
                                <a href="http://10.2.11.11/event_project/index.php/admin/event_audit" class="nav-link">
                        @else
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                    @endif
                                <i class="nav-icon fas fa-calendar-check"></i>
                                <p>Event</p>
                            </a>
                        </li>
                    @if (Auth::user()->role=="mLean")
                        <li class="nav-item">
                            <a href="http://10.2.11.11/problem_solving/index.php/admin/ps" class="nav-link">
                        @elseif(Auth::user()->role=="admin")
                            <li class="nav-item">
                                <a href="http://10.2.11.11/problem_solving/index.php/admin/ps" class="nav-link">
                        @else
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                    @endif
                                <i class="nav-icon fas fa-unlock-alt"></i>
                                <p>Problem Solving</p>
                            </a>
                        </li>
            @endguest
        </ul>
        {{-- ===========================/General Apps=========================== --}}
        {{-- ===========================LEAN=========================== --}}
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-header">Lean</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>ERC
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @guest
                            @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Progress ERC</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Summary ERC</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data ERC</p>
                                        </a>
                                    </li>
                            @endif
                            @else
                                @if (Auth::user()->role=="mLean")
                                    <li class="nav-item">
                                        <a href="http://10.2.11.11:8080/erc" class="nav-link">
                                @elseif(Auth::user()->role=="admin")
                                    <li class="nav-item">
                                        <a href="http://10.2.11.11:8080/erc" class="nav-link">
                                @else
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                @endif
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Progress ERC</p>
                                        </a>
                                    </li>
                                @if (Auth::user()->role=="mLean")
                                    <li class="nav-item">
                                        <a href="http://10.2.11.11:8080/erc/summary2019" class="nav-link">
                                @elseif(Auth::user()->role=="admin")
                                    <li class="nav-item">
                                        <a href="http://10.2.11.11:8080/erc/summary2019" class="nav-link">
                                @else
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                @endif
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Summary ERC</p>
                                        </a>
                                    </li>
                                @if (Auth::user()->role=="mLean")
                                    <li class="nav-item">
                                        <a href="http://10.2.11.11:8080/erc/data2019" class="nav-link">
                                @elseif(Auth::user()->role=="admin")
                                    <li class="nav-item">
                                        <a href="http://10.2.11.11:8080/erc/data2019" class="nav-link">
                                @else
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                @endif
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data ERC</p>
                                        </a>
                                    </li>
                        @endguest
                    </ul>
                </li>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>
                        Machinery
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                    <ul class="nav nav-treeview">
                    @guest
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Machine</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/fixed-footer.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Downtime Record</p>
                                </a>
                            </li>
                        @endif
                        @else
                            @if (Auth::user()->role=="mLean")
                                <li class="nav-item">
                                    <a href="http://10.2.11.11/machine/index.php/office/machine/list_machine" class="nav-link">
                            @elseif(Auth::user()->role=="admin")
                                <li class="nav-item">
                                    <a href="http://10.2.11.11/machine/index.php/office/machine/list_machine" class="nav-link">
                            @else
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                            @endif
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Machine</p>
                                    </a>
                                </li>
                            @if (Auth::user()->role=="mLean")
                                <li class="nav-item">
                                    <a href="http://10.2.11.11/machine/index.php/office/machine/list_downtime" class="nav-link">
                            @elseif(Auth::user()->role=="admin")
                                <li class="nav-item">
                                    <a href="http://10.2.11.11/machine/index.php/office/machine/list_downtime" class="nav-link">
                            @else
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                            @endif
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Downtime Record</p>
                                    </a>
                                </li>
                    @endguest
                    </ul>
            </li>
            <li class="nav-item">
                @guest
                    @if (Route::has('register'))
                        <a href="pages/widgets.html" class="nav-link">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>6s</p>
                        </a>
                    @endif
                    @else
                        @if (Auth::user()->role=="mLean")
                            <a href="http://10.2.11.11/auditfactory/index.php/audit/pwi2/" class="nav-link">
                        @elseif(Auth::user()->role=="admin")
                            <a href="http://10.2.11.11/auditfactory/index.php/audit/pwi2/" class="nav-link">
                        @else
                            <a href="#" class="nav-link">
                        @endif
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>6s</p>
                            </a>
                        </li>
                @endguest
            </li>
        </ul>
        {{-- ===========================/LEAN=========================== --}}
        {{-- ===========================QIP=========================== --}}
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-header">QIP</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-check-circle"></i>
                        <p>
                            Pokayoke
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                        <ul class="nav nav-treeview">
                        @guest
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Summary Pokayoke</p>
                                    </a>
                                </li>
                            @endif
                            @else
                                @if (Auth::user()->role=="mLean")
                                <li class="nav-item">
                                    <a href="http://10.2.11.11/IOT_Project/index.php/admin/pokayoke" class="nav-link">
                                @elseif(Auth::user()->role=="admin")
                                <li class="nav-item">
                                    <a href="http://10.2.11.11/IOT_Project/index.php/admin/pokayoke" class="nav-link">
                                @else
                                    <a href="#" class="nav-link">
                                @endif
                                        <i class="nav-icon fas fa-tasks"></i>
                                        <p>Summary Pokayoke</p>
                                    </a>
                                </li>
                        @endguest
                        </ul>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-check-circle"></i>
                            <p>Roving
                                <i class="fas fa-angle-left right"></i>
                            </p>
                    </a>
                        <ul class="nav nav-treeview">
                        @guest
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Summary Roving Checklist</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Checklist Roving</p>
                                    </a>
                                </li>
                            @endif
                            @else
                            @if (Auth::user()->role=="mLean")
                                <li class="nav-item">
                                    <a href="/roving_report" class="nav-link">
                                @elseif(Auth::user()->role=="admin")
                                <li class="nav-item">
                                    <a href="/roving_report" class="nav-link">
                                @else
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                            @endif
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Summary Roving</p>
                                    </a>
                                </li>
                            @if (Auth::user()->role=="mLean")
                                <li class="nav-item">
                                    <a href="/rovinglist" class="nav-link">
                                @elseif(Auth::user()->role=="admin")
                                <li class="nav-item">
                                    <a href="/rovinglist" class="nav-link">
                                @else
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                            @endif
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Checklist Roving</p>
                                    </a>
                                </li>
                        @endguest
                        </ul>
            </li>
        </ul>
        {{-- ===========================/QIP=========================== --}}
        {{-- ===========================CR=========================== --}}
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-header">CR</li>
                <li class="nav-item has-treeview">
                    @guest
                        @if (Route::has('register'))
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-paperclip"></i>
                                <p>CR Corner</p>
                            </a>
                        @endif
                        @else
                            @if (Auth::user()->role=="mLean")
                                    <a href="http://10.2.11.11/cr/index.php/admin/cr" class="nav-link">
                                @elseif(Auth::user()->role=="admin")
                                    <a href="http://10.2.11.11/cr/index.php/admin/cr" class="nav-link">
                                @else
                                    <a href="#" class="nav-link">
                            @endif
                                        <i class="nav-icon fas fa-paperclip"></i>
                                        <p>CR Corner</p>
                                    </a>
                    @endguest
                </li>
            </li>
        </ul>
        {{-- ===========================/CR=========================== --}}
        {{-- ===========================Development=========================== --}}
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-header">Development</li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-project-diagram"></i>
                        <p>
                            DFX
                            <i class="fas fa-angle-left right"></i>
                        </p>
                </a>
                    <ul class="nav nav-treeview">
                        @guest
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Summary DFX</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data DFX</p>
                                    </a>
                                </li>
                            @endif
                            @else
                               @if (Auth::user()->role=="mLean")
                                    <li class="nav-item">
                                        <a href="http://10.2.11.11:8080/dfx/summary2019" class="nav-link">
                                @elseif(Auth::user()->role=="admin")
                                    <li class="nav-item">
                                        <a href="http://10.2.11.11:8080/dfx/summary2019" class="nav-link">
                                @else
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                @endif
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Summary DFX</p>
                                        </a>
                                    </li>
                                @if (Auth::user()->role=="mLean")
                                    <li class="nav-item">
                                        <a href="http://10.2.11.11:8080/dfx/data2019" class="nav-link">
                                @elseif(Auth::user()->role=="admin")
                                    <li class="nav-item">
                                        <a href="http://10.2.11.11:8080/dfx/data2019" class="nav-link">
                                @else
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                @endif
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data DFX</p>
                                        </a>
                                    </li>
                        @endguest
                    </ul>
        </ul>
        {{-- ===========================Development=========================== --}}
        {{-- ===========================Just Admin=========================== --}}
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            @guest
            @if (Route::has('register'))
            @endif
                @else
                    @if (Auth::user()->role=="admin")
                        <li class="nav-header">Management Account</li>
                        <li class="nav-item has-treeview">
                            <a href="/list_account" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Lihat List Account
                                    </p>
                            </a>
                    @endif
            @endguest
        </ul>
        {{-- ===========================Development=========================== --}}
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
