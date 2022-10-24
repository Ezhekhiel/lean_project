<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo v1.png') }}" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Parkland Indonesia 2</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- ===========================General Apps=========================== --}}
                    <li class="nav-header">General Apps</li>
                        <li class="nav-item has-treeview">
                            <li class="nav-item">
                                <a href="{{url('/event')}}" class="nav-link">
                                    <i class="nav-icon fab fa-elementor"></i>
                                        <p>
                                            Event
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('/event')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Input Event</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('/event/manage')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Manage Event</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('/event/list_event')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>List Event</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </li>
                        <li class="nav-item has-treeview">
                            <li class="nav-item">
                                <a href="{{url('/coming_soon')}}" class="nav-link">
                                    <i class="nav-icon fas fa-chart-line"></i>
                                    <p>
                                        Tracking Order System
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('/coming_soon')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Daily Balance</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/coming_soon')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tracking PO</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/report_cell')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Report Production</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </li>
                {{-- ===========================/General Apps=========================== --}}
        {{-- ===========================LEAN=========================== --}}
            <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-header">LEAN</li>
                    {{-- SI Completion --}}
                        <li class="nav-item has-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa-shoe_newbalance"></i>
                                    <p>SI Completion
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('/SI')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/SI/form_input')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Input Data</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </li>
                    {{-- erc --}}
                        <li class="nav-item has-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chart-line"></i>
                                    <p>ERC
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('/erc')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Progress ERC</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('sumERC')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Summary ERC</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('erc/dataERC')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data ERC</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </li>
                    {{-- machine --}}
                        {{-- <li class="nav-item has-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-cogs"></i>
                                    <p>Machinery
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('/machine')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>List Machine</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/machine/downtime')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Downtime Record</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/machine/list_moving')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>List Moving Machine</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </li> --}}
                    {{-- 6s audit --}}
                        <li class="nav-item has-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-check-square"></i>
                                    <p>
                                        6S Audit
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('/audit')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>6s Checklist</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/audit/manage_index')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>6s Manage</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/audit/report')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Report 6S</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/audit/register/auditor')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Register Auditor 6s</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </li>
                    {{-- ie database --}}
                        <li class="nav-item has-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fas fa-atlas"></i>
                                    <p>
                                        IE Database
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('Ie_base/man_separation')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>MTM Study</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('ie_base/cs')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Computer Stitching</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('Ie_base/area')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Area</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('ie_base/tos/index')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>TOS</p>
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Offline
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item has-treeview" style="padding-left: 10%">
                                                <a href="{{url('ie_base/offline')}}" class="nav-link">
                                                    <i class="fas fa-database"></i>
                                                    <p>
                                                        Data
                                                    </p>
                                                </a>
                                            </li>
                                            <li class="nav-item has-treeview" style="padding-left: 10%">
                                                <a href="{{url('ie_base/offline/input')}}" class="nav-link">
                                                    <i class="fas fa-keyboard"></i>
                                                    <p>
                                                        Input
                                                    </p>
                                                </a>
                                            </li>
                                            <li class="nav-item has-treeview" style="padding-left: 10%">
                                                <a href="{{url('ie_base/offline/edit')}}" class="nav-link">
                                                    <i class="fas fa-pen-square"></i>
                                                    <p>
                                                        Edit
                                                    </p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li> --}}
                                </ul>
                            </li>
                        </li>
                    {{-- SOP --}}
                        <li class="nav-item has-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-images"></i>
                                    <p>Lean Media
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('/leanmedia/concept')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Concept SOP</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('/leanmedia/index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Input SOP</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('/leanmedia/index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Input OIB</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </li>
        {{-- ===========================/LEAN=========================== --}}
        {{-- ===========================QIP=========================== --}}
                <li class="nav-header">QIP</li>
                    {{-- pokayoke --}}
                        <li class="nav-item has-treeview">
                            <li class="nav-item">
                                <a href="{{url('/Pokayoke')}}" class="nav-link">
                                    <i class="nav-icon fas fa-light fa-puzzle-piece"></i>
                                    <p>
                                        Pokayoke
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('/Pokayoke')}}" class="nav-link">
                                            <i class="nav-icon fas fa-tasks"></i>
                                            <p>Summary Pokayoke</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('/Pokayoke/input')}}" class="nav-link">
                                            <i class="nav-icon fas fa-pencil-alt"></i>
                                            <p>Input Pokayoke</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </li>
                    {{-- RFT --}}
                        <li class="nav-item has-treeview">
                            <li class="nav-item">
                                <a href="{{url('/Pokayoke')}}" class="nav-link">
                                    <i class="nav-icon fas fa-thin fa-hourglass"></i>
                                    <p>
                                        RFT
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('/RFT')}}" class="nav-link">
                                            <i class="nav-icon fas fa-tasks"></i>
                                            <p>RFT Data</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('/RFT/showChart')}}" class="nav-link">
                                            <i class="nav-icon fas fa-chart-line"></i>
                                            <p>Chart RFT</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </li>
                    {{-- Roving --}}
                        <li class="nav-item has-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-thin fa-check-double"></i>
                                        <p>Roving
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('/roving_report')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Summary Roving</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/rovinglist')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Checklist Roving</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </li>
                    {{-- Problem Solving--}}
                        <li class="nav-item has-treeview">
                            <li class="nav-item">
                                <a href="{{url('/Problem_solving/index')}}" class="nav-link">
                                    <i class="nav-icon fas fa-brain"></i>
                                    <p>
                                        Problem Solving
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('/Problem_solving/index')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>DMAIC</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/tdr')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>TDR <i>(Total Defect Rate)</i></p>
                                        </a>
                                    </li>
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                8D
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item has-treeview" style="padding-left: 10%">
                                                <a href="{{url('/8D/CAR')}}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>
                                                        CAR
                                                    </p>
                                                </a>
                                            </li>
                                            <li class="nav-item has-treeview" style="padding-left: 10%">
                                                <a href="{{url('/QIR')}}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>
                                                        QIR
                                                    </p>
                                                </a>
                                            </li>
                                            <li class="nav-item has-treeview" style="padding-left: 10%">
                                                <a href="{{url('#')}}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>
                                                        Input
                                                    </p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </li>
                {{-- ===========================/QIP=========================== --}}
                {{-- ===========================CR=========================== --}}
                    <li class="nav-header">CR</li>
                    <li class="nav-item has-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-head-side-mask"></i>
                                    <p>Covid Corner
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{url('/coming_soon')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Input Covid Corner</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/Covid_corner/cover')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Content</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </li>
        {{-- ===========================/CR=========================== --}}
        {{-- ===========================Development=========================== --}}
            <li class="nav-header">Development</li>
                <li class="nav-item has-treeview">
                    <a href="{{url('/dfx')}}" class="nav-link">
                        <i class="nav-icon fas fa-project-diagram"></i>
                            <p>
                                DFX
                                <i class="fas fa-angle-left right"></i>
                            </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/dfx')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Summary DFX</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{URL('/dfx/input')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Input DFX</p>
                            </a>
                        </li>
                    </ul>
                </li>
        {{-- ===========================Development=========================== --}}
        {{-- ===========================Recruitments=========================== --}}
            <li class="nav-header">Employee</li>
            <li class="nav-item has-treeview">
                <a href="{{url('/employee')}}" class="nav-link">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>
                        Recruitments
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{url('/recruitment/input')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Input Recruitments</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{URL('/recruitment/test_index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Test Recruitment</p>
                        </a>
                    </li>
                </ul>
            </li>
        {{-- ===========================Recruitments=========================== --}}
        {{-- ===========================Belajar API=========================== --}}
            <li class="nav-header">API</li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            API-List
                            <i class="fas fa-angle-left right"></i>
                        </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{url('/api-movie')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Movie</p>
                        </a>
                    </li>
                </ul>
            </li>
        {{-- ===========================Recruitments=========================== --}}
        <li class="nav-header">Employees</li>
            <li class="nav-item has-treeview">
                <a href="{{url('/register')}}" class="nav-link">
                    <i class="fa fa-plus-square nav-icon"></i> 
                    <p>
                        Register Account
                    </p>
                </a>
            </li>
        </li>
        {{-- ===========================Just Admin=========================== --}}
            <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
                @guest
                    @if (Route::has('register'))
                    @endif
                    @else
                        @if (Auth::user()->role_id=="1")
                            <li class="nav-header">Management Account</li>
                                <li class="nav-item has-treeview">
                                    <a href="{{url('/list_account')}}" class="nav-link">
                                        <i class="nav-icon fas fa-user"></i>
                                            <p>
                                                Lihat List Account
                                            </p>
                                    </a>
                                </li>
                            </li>
                        @endif
                @endguest
        {{-- ===========================Just Admin=========================== --}}
        {{-- ===========================Just Admin=========================== --}}
            <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
                  @guest
                    @if (Route::has('register'))
                  @endif
                  @else
                      @if (Auth::user()->role_id=="1")
                          <li class="nav-header">Employees</li>
                              <li class="nav-item has-treeview">
                                  <a href="{{url('/employees')}}" class="nav-link">
                                      <i class="nav-icon fas fa-user"></i>
                                          <p>
                                              List Employees
                                          </p>
                                  </a>
                              </li>
                              <li class="nav-item has-treeview">
                                <a href="{{url('/reqruitment')}}" class="nav-link">
                                    <i class="nav-icon fas fa-user-plus"></i>
                                        <p>
                                            Reqruitment
                                        </p>
                                    </a>
                              </li>
                          </li>
                      @endif
              @endguest
          </ul>
      {{-- ===========================Just Admin=========================== --}}
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
