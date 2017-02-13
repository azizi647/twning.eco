@extends('adminpanel.panel')

@section('body')
    <link rel="stylesheet" href="{{ asset('public/lightbox2/css/lightbox.min.css') }}">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Partners
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/{{ url(LaravelLocalization::setLocale().'/twadm') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/{{ url(LaravelLocalization::setLocale().'/twadm/partners') }}">Partners</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit page</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ url(LaravelLocalization::setLocale().'/twadm/partners/').'/'.$partners[0]->partner_id }}" method="Post" enctype="multipart/form-data">
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
                  

               <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-pills" role="tablist" id="langtab">
                  <li role="presentation" class="active"><a href="#az" aria-controls="az" role="tab" data-toggle="tab">az</a></li>
                  <li role="presentation"><a href="#en" aria-controls="en" role="tab" data-toggle="tab">en</a></li>
                </ul>
                <hr/>
                <!-- Tab panes -->
                <div class="tab-content">
                @foreach($partners as $partner)
                  <div role="tabpanel" class="tab-pane active" id="{{ $partner->lang }}">
                      <!-- form commponents begin -->
                      <div class="form-group">
                        <label for="inputtitle_az" class="col-sm-2 control-label">title {{ $partner->lang }}</label>
                        <div class="col-sm-10">
                          <input type="text" name="title_{{ $partner->lang }}" class="form-control" id="inputtitle_{{ $partner->lang }}"  value="{{ $partner->title }}" placeholder="title {{ $partner->lang }}">
                        </div>
                      </div>
                      <!-- form commponents end -->

                  </div>
                @endforeach
                </div>
                <hr/>
                <div class="form-group">
                      <label for="inputordering" class="col-sm-2 control-label">Visibility</label>
                      <div class="col-sm-10">
                          <!-- radio -->
                          <div class="radio">
                              <label>
                                  <input type="radio" value="0" name="status" id="status1" value="option1" @if($partners[0]->status == 0) checked @endif >
                                  Deactive
                              </label>
                              <label>
                                  <input type="radio" value="1" name="status" id="status2" value="option2" @if($partners[0]->status == 1) checked @endif >
                                  Active
                              </label>
                          </div>
                      </div>
                  </div>
                <hr/>
                <div class="form-group">
                      <label for="inputordering_az" class="col-sm-2 control-label">Ordering</label>
                      <div class="col-sm-10">
                          <input type="number"  name="order" value="{{ $partners[0]->partner_id }}" class="form-control" id="inputordering" placeholder="ordering">
                      </div>
                  </div>
                <hr/>
                <div class="form-group">
                     
                  <label for="InputImg" class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-10">

                      <input type="hidden" name="filename" value="{{ $partners[0]->image }}">
                      <a href="{{ asset('public/images/partnergallery/'.$partners[0]->image ) }}" data-lightbox="image-{{ $partners[0]->partner_id}}">
                          <img src="{{ asset('public/images/partnergallery/'.$partners[0]->image )}}" class="img-responsive img-thumbnail" style="height: 100px" alt="">
                      </a>

                  </div>
                </div>
                <hr />
                <div class="form-group">
                  <label for="Menu_image" class="col-sm-2 control-label">Partner Image</label>
                  <div class="col-sm-10">
                      <div class="btn btn-default btn-file">
                          <i class="fa fa-paperclip"></i> Upload Page Image
                          <input type="file" name="file" class="form-control" id="Menu_image">
                      </div>
                      <p class="help-block">only jpg, png Max. 10MB</p>
                  </div>
              </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">

                <input type="hidden" name="_method" value="PUT">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <a href="/twadm/partners" class="btn btn-default">Cancel</a>
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

<script src="{{ asset('public/lightbox2/js/lightbox.min.js') }}" type="text/javascript" ></script>




  @stop