@extends('adminpanel.panel')

@section('body')

<link rel="stylesheet" href="{{ asset('public/lightbox2/css/lightbox.min.css') }}">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Gallery
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/{{ LaravelLocalization::setLocale() }}/cms"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="/{{ LaravelLocalization::setLocale() }}/cms/gallery">Gallery</a></li>
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
            <h3 class="box-title">Edit Galley</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal" action="{{ url(LaravelLocalization::setLocale().'/cms/gallery/').'/'.$galleries[0]->gallery_id }}" method="Post" enctype="multipart/form-data">
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
                  <label for="inputordering" class="col-sm-2 control-label">ordering</label>
                  <div class="col-sm-10">
                    <input type="text"  name="ordering" value="{{ $galleries[0]->ordering }}" class="form-control" id="inputordering" placeholder="ordering">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputordering" class="col-sm-2 control-label">STATUS</label>
                  <div class="col-sm-10"> 
                    <!-- radio -->
                    <div class="radio">
                      <label>
                        <input type="radio" value="0" name="status" id="status1" value="option1" @if($galleries[0]->status == 0) checked @endif>
                        Deactive
                      </label>
                      <label>
                        <input type="radio" value="1" name="status" id="status2" value="option2" @if($galleries[0]->status == 1) checked @endif>
                        Active
                      </label>
                    </div>
                  </div>
                </div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified" role="tablist" id="langtab">
                  <li role="presentation" class="active"><a href="#az" aria-controls="az" role="tab" data-toggle="tab">az</a></li>
                  <li role="presentation"><a href="#ru" aria-controls="ru" role="tab" data-toggle="tab">ru</a></li>
                  <li role="presentation"><a href="#en" aria-controls="en" role="tab" data-toggle="tab">en</a></li>
                </ul>
                <br>
                <!-- Tab panes -->
                <div class="tab-content">

                  <!-- lang   -->

                  @foreach($galleries as $gallery)
                  <div role="tabpanel" class="tab-pane active" id="{{ $gallery->lang }}">

                    <!-- form commponents begin -->
                    <div class="form-group">
                      <label for="inputtitle_az" class="col-sm-2 control-label">title</label>
                      <div class="col-sm-10">
                        <input type="text" name="title_{{ $gallery->lang }}" class="form-control" id="inputtitle_{{ $gallery->lang }}"  value="{{ $gallery->title }}" placeholder="title {{ $gallery->lang }}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputdescription_{{ $gallery->lang }}" class="col-sm-2 control-label">description</label>
                      <div class="col-sm-10">
                        <input type="text" name="description_{{ $gallery->lang }}" class="form-control"  value="{{ $gallery->description }}" id="inputdescription_{{ $gallery->lang }}" placeholder="description {{ $gallery->lang }}">
                      </div>
                    </div>
                    <!-- form commponents end -->

                  </div>
                  @endforeach
                  <!-- lang  end -->
                </div>

                    <div class="form-group">
                      <label for="InputImg" class="col-sm-2 control-label">Image</label>
                      <div class="col-sm-10">

                        <input type="hidden" name="filename" value="{{ $galleries[0]->file }}">
                        <a href="{{ asset('public/images/gallery/'.$galleries[0]->file )}}" data-lightbox="image-{{ $gallery->gallery_id}}"> 
                          <img src="{{ asset('public/images/gallery/'.$galleries[0]->file )}}" class="img-responsive img-thumbnail" style="height: 100px" alt="">
                        </a>                          

                      </div>
                    </div>

                    <div class="form-group">
                      <label for="InputFile" class="col-sm-2 control-label">Image input</label>
                      <div class="col-sm-10">
                        <input type="file" name="file" class="form-control" id="InputFile">
                        <p class="help-block">only jpg, png support.</p>
                      </div>
                    </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">

                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <a href="/cms/gallery" class="btn btn-default">Cancel</a>
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

  <script  type="text/javascript">


    $(document).ready(function(){
      $('#langtab  a:last').tab('show');

    });

  </script>


  <script src="{{ asset('public/lightbox2/js/lightbox.min.js') }}" type="text/javascript" ></script>

  @stop