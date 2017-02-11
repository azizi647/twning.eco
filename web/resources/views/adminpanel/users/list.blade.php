@extends('adminpanel.panel')

@section('body')

        <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Users
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url(LaravelLocalization::setLocale().'/twadm')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Users</li>
    </ol>
  </section>


  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">All users Table</h3>
            <div class="box-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <div class="pull-right">
                  <a href="{{url(LaravelLocalization::setLocale().'/twadm/users/create')}}"  class="btn btn-info">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover table-bordered">
              <tr>
                <th>ID</th>
                <th>name</th>
                <th>email</th>
                <th>date</th>
                <th>action</th>
              </tr>
              @foreach($users as $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->created_at }}</td>
                  <td>
                    <div class="col-md-3">
                      <a  href="{{ url(LaravelLocalization::setLocale().'/twadm/users/').'/'.$user->id.'/edit'   }}" class="btn btn-default" >
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                      </a>
                    </div>
                    <div class="col-md-1">
                      <form action="{{ url(LaravelLocalization::setLocale().'/twadm/users/'.$user->id) }}" method="post" onsubmit="return confirm('Do you really want to submit the form?');"  >

                        <input type="hidden" name="_method" value="DELETE">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <button type="submit" class="btn btn-danger">
                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach

            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@stop