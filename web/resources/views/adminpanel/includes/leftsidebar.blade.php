 
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!--  Sidebar user panel  -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('public/adminassets/dist/img/logo.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>TW Admin</p>
        <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('cms_words.online') }}</a>
      </div>
    </div>
    <!--  End Sidebar user panel  -->
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">{{ trans('cms_words.main_navigation') }}</li>
      <li class="{{ Request::is(LaravelLocalization::setLocale().'/twadm') ? 'active' : '' }}" >
        <a href="{{ url('/twadm') }}"><i class="fa fa-tachometer"></i> <span>{{ trans('cms_words.dashboard') }}</span></a>
      </li>
      <li class="treeview {{ Request::is(LaravelLocalization::setLocale().'/twadm/users') ? 'active' : '' }}">
        <a href="#"><i class="fa fa-user"></i>  <span>{{ trans('cms_words.users') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/twadm/users/create') }}""><i class="fa fa-circle-o text-green"></i> {{ trans('cms_words.add_user') }}</a></li>
          <li><a href="{{ url('/twadm/users') }}""><i class="fa fa-circle-o text-red"></i> {{ trans('cms_words.all_users') }}</a></li>
        </ul>
      </li>
      {{--<li class="{{ Request::is(LaravelLocalization::setLocale().'/twadm/roles') ? 'active' : '' }} treeview" >--}}
        {{--<a href="#"><i class="fa fa-unlock-alt"></i> <span>{{ trans('cms_words.roles') }}</span> <i class="fa fa-angle-left pull-right"></i></a>--}}
        {{--<ul class="treeview-menu">--}}
          {{--<li><a href="{{ url('/twadm/roles/create') }}"><i class="fa fa-circle-o text-green"></i> {{ trans('cms_words.add_role') }}</a></li>--}}
          {{--<li><a href="{{ url('/twadm/roles') }}"><i class="fa fa-circle-o text-red"></i> {{ trans('cms_words.all_roles') }}</a></li>--}}
        {{--</ul>--}}
      {{--</li>--}}
      <li class="{{ Request::is(LaravelLocalization::setLocale().'/twadm/menus') ? 'active' : '' }} treview" >
        <a href="#"><i class="fa fa-book"></i> <span>{{ trans('cms_words.menus') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/twadm/menus/create') }}"><i class="fa fa-circle-o text-green"></i> {{ trans('cms_words.add_menu') }} </a></li>
          <li><a href="{{ url('/twadm/menus') }}"><i class="fa fa-circle-o text-red"></i> {{ trans('cms_words.all_menus') }}</a></li>
        </ul>
      </li>
      <li class="{{ Request::is(LaravelLocalization::setLocale().'/twadm/pages') ? 'active' : '' }} treeview" >
        <a href="#"><i class="fa fa-file-text-o"></i> <span>{{ trans('cms_words.pages') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/twadm/pages/create') }}"><i class="fa fa-circle-o text-green"></i> {{ trans('cms_words.add_pages') }} </a></li>
          <li><a href="{{ url('/twadm/pages') }}"><i class="fa fa-circle-o text-red"></i> {{ trans('cms_words.all_pages') }}</a></li>
        </ul>
      </li>
      <li class="{{ Request::is(LaravelLocalization::setLocale().'/twadm/partners') ? 'active' : '' }} treview" >
        <a href="#"><i class="fa fa-book"></i> <span>{{ trans('cms_words.partners') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/twadm/partners/create') }}"><i class="fa fa-circle-o text-green"></i> {{ trans('cms_words.add_partner') }} </a></li>
          <li><a href="{{ url('/twadm/partners') }}"><i class="fa fa-circle-o text-red"></i> {{ trans('cms_words.all_partners') }}</a></li>
        </ul>
      </li>

      <li class="{{ Request::is(LaravelLocalization::setLocale().'/twadm/translations') ? 'active' : '' }}" >
        <a href="{{ url('/twadm/translations') }}"><i class="fa fa-language"></i> <span>{{ trans('cms_words.translation') }}</span></a>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-cogs"></i> <span>{{ trans('cms_words.settings') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/twadm/settings') }}"><i class="fa fa-laptop"></i> {{ trans('cms_words.site_settings') }}</a></li>
          <li><a href="{{ url('/twadm/cleancache') }}"><i class="fa fa-edit"></i> Clean Cache</a></li>

        </ul>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
