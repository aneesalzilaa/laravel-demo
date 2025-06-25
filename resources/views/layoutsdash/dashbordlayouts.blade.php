<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/seodashlogo.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="{{ asset('assets/images/logos/logo-light.svg') }}" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                            <span class="hide-menu">Controler</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('create.contact') }}" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:layers-minimalistic-bold-duotone"
                                        class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Correspondence</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('aboutcontroller') }}" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:danger-circle-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">About controller</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('catogory') }}" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:layers-minimalistic-bold-duotone"
                                        class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">catogery controller</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('artwork') }}" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:layers-minimalistic-bold-duotone"
                                        class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">artwork controller</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('artwork.show') }}" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:layers-minimalistic-bold-duotone"
                                        class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu"> edit artwork controller</span>
                            </a>
                        </li>
                        @if (auth()->check()&& auth()->user()->status =='admin')
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('Users') }}" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:danger-circle-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Users</span>
                            </a>
                        </li>
                        @else
                        <span>
                            <iconify-icon icon="solar:danger-circle-bold-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">You are not admin</span>
                        @endif

                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-6"
                                class="fs-6"></iconify-icon>
                            <span class="hide-menu">AUTH</span>
                        </li>
                        @if (auth()->check() && auth()->user()->status === 'admin')
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('register') }}" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:user-plus-rounded-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Register</span>
                            </a>
                        </li>
                        @else
                        <span>
                            <iconify-icon icon="solar:user-plus-rounded-bold-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">You are not admin</span>
                    @endif

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav w-100">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                              <i class="ti ti-menu-2"></i>
                            </a>
                          </li>
                        <!-- أيقونة الجرس (تبقى على اليسار) -->
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                        </li>

                        <!-- صورة المستخدم (تمت إضافة ms-auto لدفعها إلى اليمين) -->
                        <li class="nav-item dropdown ms-auto">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt="User" width="35" height="35" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                <div class="message-body">
                                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                        <i class="ti ti-user fs-6"></i>
                                        <p class="mb-0 fs-3">{{ auth()->user()->name }}</p>
                                    </a>
                                    <a class="d-flex align-items-center gap-2 dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="ti ti-mail fs-6"></i>
                                        <p class="mb-0 fs-3">My Profile</p>
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}" class="btn btn-outline-primary mx-3 mt-2 d-block"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                            Logout
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>

                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                @yield('content')
            </div>
            <div class="container-fluid">
                <div class="py-6 px-6 text-center">
                    <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
                            class="pe-1 text-primary text-decoration-underline">AdminMart.com</a>Distributed by <a
                            href="https://themewagon.com/" target="_blank"
                            class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js') }}"></script>
</body>

</html>
