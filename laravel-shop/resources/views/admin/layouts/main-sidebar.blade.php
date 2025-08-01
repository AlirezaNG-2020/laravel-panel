  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div>
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">حسام موسوی</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link active">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>
                  صفحات شروع
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link active">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>صفحه فعال</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>صفحه غیر فعال</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-header">ماژول محتوا</li>
            <li class="nav-item">
              <a href="{{ route('admin.content.category.index') }}" class="nav-link {{ request()->routeIs('admin.content.category.index') ? 'active' : '' }}">
                <i class="nav-icon fa fa-th"></i>
                <p>
                  دسته بندی
                  <span class="right badge badge-danger">جدید</span>
                </p>
              </a>
            </li>


            <li class="nav-item">
              <a href="{{ route('admin.content.post.index') }}" class="nav-link {{ request()->routeIs('admin.content.post.index') ? 'active' : '' }}">
                <i class="nav-icon fa fa-th"></i>
                <p>
                   پست ها
                  <span class="right badge badge-danger">جدید</span>
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>