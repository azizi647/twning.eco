@extends('adminpanel.panel')

@section('body')
    <link rel="stylesheet" href="{{ asset('lightbox2/css/lightbox.min.css') }}">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Menu
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(LaravelLocalization::setLocale().'/twadm') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url(LaravelLocalization::setLocale().'/twadm/menus') }}"></i> Menu</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        
        <div class="col-md-1"></div>
        <!-- right column -->
        <div class="col-md-10">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Menu</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ url(LaravelLocalization::setLocale().'/twadm/menus').'/'.$menus[0]->menu_id }}" method="Post"  enctype="multipart/form-data">
              <div class="box-body">

                    <div><!-- error olanda  -->
                      @if (count($errors) > 0)
                        <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                      @endif
                    </div>

                  <div class="flash-message">
                      @if(Session::has('alert-success'))
                      <p class="alert alert-success">{{ Session::get('alert-success') }}
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                      @endif
                  </div> <!-- end .flash-message -->

                    <div class="form-group">
                        <label for="inputtype" class="col-sm-2 control-label">position</label>
                        <div class="col-sm-10">
                          <select name="type" id="inputtype" class="form-control">
                            <option value="">menu position ...</option>
                            <option @if($menus[0]->type == 'top') selected @endif value="top">Header Menu</option>
                            <option @if($menus[0]->type == 'left') selected @endif value="left">Content Menu</option>
                            <option  @if($menus[0]->type == 'bottom') selected @endif value="bottom">Footer Menu</option>
                          </select>
                        </div>
                    </div>

                  <div class="form-group">
                      <label for="parent" class="col-sm-2 control-label">menu type</label>
                      <div class="col-sm-10">
                          <select name="parent" id="parent" class="form-control">
                              <option value="0">parent menu...</option>
                              @foreach($menutypes as $menutype)
                                  <option @if($menus[0]->parent == $menutype->menu_id) selected @endif value="{{$menutype->menu_id}}">{{$menutype->title}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>

                    <div class="form-group">
                        <label for="inputordering_az" class="col-sm-2 control-label">ordering</label>
                        <div class="col-sm-10">
                          <input type="text"  name="order" value="{{ $menus[0]->order }}" class="form-control" id="inputordering" placeholder="ordering">
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="inputordering" class="col-sm-2 control-label">visibility</label>
                      <div class="col-sm-10"> 
                        <!-- radio -->
                          <div class="radio">
                            <label>
                              <input type="radio" value="1" name="status" id="status2" value="option2" @if($menus[0]->status == '1') checked @endif>
                              Active menu
                            </label>
                            <label>
                              <input type="radio" value="0" name="status" id="status1" value="option1" @if($menus[0]->status == '0') checked @endif>
                              Deactive menu
                            </label>
                          </div>
                      </div>
                    </div>

               <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified" role="tablist" id="langtab">
                  <li role="presentation" class="active"><a href="#az" aria-controls="az" role="tab" data-toggle="tab">az</a></li>
                  <li role="presentation"><a href="#en" aria-controls="en" role="tab" data-toggle="tab">en</a></li>
                </ul>
              
                <br>
              
                <!-- Tab panes -->
                <div class="tab-content">

                @foreach($menus as $menu)
                  <div role="tabpanel" class="tab-pane active" id="{{ $menu->lang }}">
                            
                      <div class="form-group">
                        <label for="inputtitle_{{ $menu->lang }}" class="col-sm-2 control-label">title {{ $menu->lang }}</label>
                        <div class="col-sm-10">
                          <input type="text" name="title_{{ $menu->lang }}" class="form-control" id="inputtitle_{{ $menu->lang }}"  value="{{ $menu->title }}" placeholder="title {{ $menu->lang }}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputdescription{{ $menu->lang }}" class="col-sm-2 control-label">description {{ $menu->lang }}</label>
                        <div class="col-sm-10">
                          <input type="text" name="description_{{ $menu->lang }}" class="form-control"  value="{{ $menu->description }}" id="inputdescription{{ $menu->lang }}" placeholder="description {{ $menu->lang }}">
                        </div>
                      </div>

                  </div>
                @endforeach

                </div>

                <hr />

              </div>
              <!-- /.box-body -->
              <div class="box-footer">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="PUT">
                <a href="/twadm/menus" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
    
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<script type="text/javascript">
    $(document).ready(function(){
        $('#langtab  a:last').tab('show');
    
    });
</script>

<script src="{{ asset('public/lightbox2/js/lightbox.min.js') }}" type="text/javascript" ></script>

  @stop