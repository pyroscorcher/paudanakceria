        <header class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-6">
                        <div class="header-left d-flex align-items-center">
                            <div class="menu-toggle-btn mr-15">
                                <button id="menu-toggle" class="main-btn btn-hover">
                                    <i class="lni lni-chevron-left me-2"></i> Menu
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-6">
                        <div class="header-right">
                            <!-- profile start -->
                            {{-- <div class="flex items-center">
                                <span class="font-bold text-xl tracking-wider">🎓 PPDB Admin Portal</span>
                            </div> --}}
                            <div class="flex items-center space-x-4">
                                <span>Halo, {{ Auth::guard('admins')->user()->nama_admin ?? 'Admin' }}</span>
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <div>
                                    <button type="submit" class="main-btn btn-hover">
                                        Keluar
                                    </button>
                                    </div>
                                </form>
                            </div>
                            <!-- profile end -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
