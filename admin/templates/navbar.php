<div id="navbar" class="navbar navbar-default">   
    <div class="navbar-container" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>
        <button type="button" class="btn btn-success btn-sm m-t-5 waves-effect" data-toggle="modal" data-target="#ungvien_excel"><i class="zmdi zmdi-file-text"></i> Xuất Excel</button>
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    HỆ THỐNG QUẢN TRỊ
                </small>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">

                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <span class="user-info">
                            <small>Chào, <asp:Label ID="lbNguoiDangNhap" runat="server" Text=""></asp:Label></small>
                            <asp:Label ID="lbUsername" runat="server" Text=""></asp:Label>
                        </span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                       
                        <li>
                            <a href="index.php?ctl=Sys_users&act=doimatkhau&tabid=49">
                                <i class="ace-icon fa fa-user"></i>
                                Đổi mật khẩu
                            </a>
                        </li>

                        <li class="divider"></li>
                        
                        <li>
                            <a href="index.php?ctl=Account&act=doLogout">
                                <i class="ace-icon fa fa-power-off"></i>
                                Thoát
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    
    <!-- /.navbar-container -->
</div>
