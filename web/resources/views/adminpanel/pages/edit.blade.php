@extends('adminpanel.panel')

@section('body')
        <link rel="stylesheet" href="{{ asset('public/lightbox2/css/lightbox.min.css') }}">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pages
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/{{ url(LaravelLocalization::setLocale().'/twadm') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/{{ url(LaravelLocalization::setLocale().'/twadm/pages') }}">Pages</a></li>
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
            <form class="form-horizontal" action="{{ url(LaravelLocalization::setLocale().'/twadm/pages/').'/'.$pages[0]->page_id }}" method="Post" enctype="multipart/form-data">
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
                      <label for="menu_id" class="col-sm-2 control-label">Content of ... </label>
                      <div class="col-sm-10">
                          <select name="menu_id" id="menu_id" class="form-control">
                              <option value="0">select menu...</option>
                              @foreach($menutypes as $menutype)
                                  <option @if($pages[0]->menu_id == $menutype->menu_id) selected @endif value="{{$menutype->menu_id}}">{{$menutype->title}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>


                  <div class="form-group">
                      <label for="inputshow_index" class="col-sm-2 control-label">if news </label>
                      <div class="col-sm-10">
                          <div class="radio">
                              <label>
                                  <input type="radio" value="0" name="show_index" id="status1" value="option1" @if($pages[0]->show_index == 0)checked @endif >
                                  Show Menu
                              </label>
                              <label>
                                  <input type="radio" value="1" name="show_index" id="status2" value="option2" @if($pages[0]->show_index == 1)checked @endif >
                                  Show Index
                              </label>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="inputordering" class="col-sm-2 control-label">STATUS</label>
                    <div class="col-sm-10">
                      <!-- radio -->
                        <div class="radio">
                          <label>
                            <input type="radio" value="0" name="status" id="status1" value="option1" @if($pages[0]->status == 0) checked @endif >
                            Deactive
                          </label>
                          <label>
                            <input type="radio" value="1" name="status" id="status2" value="option2" @if($pages[0]->status == 1) checked @endif >
                            Active
                          </label>
                        </div>
                    </div>
                  </div>

               <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-pills" role="tablist" id="langtab">
                  <li role="presentation" class="active"><a href="#az" aria-controls="az" role="tab" data-toggle="tab">az</a></li>
                  <li role="presentation"><a href="#en" aria-controls="en" role="tab" data-toggle="tab">en</a></li>
                </ul>
                <br>

                <!-- Tab panes -->
                <div class="tab-content">

                @foreach($pages as $page)
                  <div role="tabpanel" class="tab-pane active" id="{{ $page->lang }}">
                      <!-- form commponents begin -->
                      <div class="form-group">
                        <label for="inputtitle_az" class="col-sm-2 control-label">title {{ $page->lang }}</label>
                        <div class="col-sm-10">
                          <input type="text" name="title_{{ $page->lang }}" class="form-control" id="inputtitle_{{ $page->lang }}"  value="{{ $page->title }}" placeholder="title {{ $page->lang }}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputsubtitle_{{ $page->lang }}" class="col-sm-2 control-label">subtitle {{ $page->lang }}</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="subtitle_{{ $page->lang }}" rows="3" placeholder="Enter ...">{{ $page->subtitle }}</textarea>
                        </div>
                      </div>


                       <div class="form-group">
                        <label for="description_{{ $page->lang }}" class="col-sm-2 control-label">Body {{ $page->lang }}</label>
                        <div class="col-sm-10">
                          <textarea id="description_{{ $page->lang }}" name="description_{{ $page->lang }}"  class="form-control" rows="10" cols="80">{{ $page->text }}</textarea>
                        </div>
                      </div>
                      <!-- form commponents end -->

                  </div>
                @endforeach

                </div>
              <div class="form-group">
                  <hr />
                  <label for="InputImg" class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-10">

                      <input type="hidden" name="filename" value="{{ $pages[0]->file }}">
                      <a href="{{ asset('public/images/pagegallery/'.$pages[0]->file ) }}" data-lightbox="image-{{ $pages[0]->menu_id}}">
                          <img src="{{ asset('public/images/pagegallery/'.$pages[0]->file )}}" class="img-responsive img-thumbnail" style="height: 100px" alt="">
                      </a>

                  </div>
              </div>
              <hr />

              <div class="form-group">

                  <label for="Menu_image" class="col-sm-2 control-label">Page Image</label>
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

                <a href="/twadm/pages" class="btn btn-default">Cancel</a>
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



<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script>

  $(document).ready(function(){
        $('#langtab  a:last').tab('show');
            CKEDITOR.replace('description_az');
            CKEDITOR.replace('description_en');
    });

</script>
<script src="{{ asset('public/lightbox2/js/lightbox.min.js') }}" type="text/javascript" ></script>




  @stop