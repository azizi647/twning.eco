@extends('adminpanel.panel')

@section('body')
  

  
    <!-- <script src="//code.jquery.com/jquery-1.11.0.min.js"></script> -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script src="{{ asset("public/adminassets/dist/js/rails.js") }}" >   </script>

    <style>
        a.status-1{
            font-weight: bold;
        }
    </style>
    <script>
        jQuery(document).ready(function($){

            $.ajaxSetup({
                beforeSend: function(xhr, settings) {
                    console.log('beforesend');
                    settings.data += "&_token=<?= csrf_token() ?>";
                }
            });

            $('.editable').editable().on('hidden', function(e, reason){
                var locale = $(this).data('locale');
                if(reason === 'save'){
                    $(this).removeClass('status-0').addClass('status-1');
                }
                if(reason === 'save' || reason === 'nochange') {
                    var $next = $(this).closest('tr').next().find('.editable.locale-'+locale);
                    setTimeout(function() {
                        $next.editable('show');
                    }, 300);
                }
            });

           $('.group-select').on('change', function(){
                var group = $(this).val();
                if (group) {
                    window.location.href = '{{ url(LaravelLocalization::setLocale().'/cms/translations/getView') }}/?group='+$(this).val();
                } else {
                    window.location.href = '{{ url(LaravelLocalization::setLocale().'/cms/translations') }}';
                }
            });

            
            $("a.delete-key").click(function(event){
                event.preventDefault();
                var row = $(this).closest('tr');
                var url = $(this).attr('href');

                var group = $(this).attr('delete-group');
                var key = $(this).attr('delete-key');

                $.post( url, {key: key,group: group}, function(data) {
                  if (data.status == 1) {
                    row.remove();
                  }
                });

            });

            $('.form-import').on('ajax:success', function (e, data) {
                $('div.success-import strong.counter').text(data.counter);
                $('div.success-import').slideDown();
            });

            $('.form-find').on('ajax:success', function (e, data) {
                $('div.success-find strong.counter').text(data.counter);
                $('div.success-find').slideDown();
            });

            $('.form-publish').on('ajax:success', function (e, data) {
                $('div.success-publish').slideDown();
            });

        })
    </script>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
      <section class="content-header">
      <h1>
        Translation
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/{{ LaravelLocalization::setLocale() }}/cms"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Translation</li>
      </ol>
    </section>


      <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="col-lg-12">
          <h1>Translation Manager</h1>  
          <div class="alert alert-success success-import" style="display:none;">
              <p>Done importing, processed <strong class="counter">N</strong> items! Reload this page to refresh the groups!</p>
          </div>
          <div class="alert alert-success success-find" style="display:none;">
              <p>Done searching for translations, found <strong class="counter">N</strong> items!</p>
          </div>
          <div class="alert alert-success success-publish" style="display:none;">
              <p>Done publishing the translations for group '<?= $group ?>'!</p>
          </div>
          <?php if(Session::has('successPublish')) : ?>
          <div class="alert alert-info">
              <?php echo Session::get('successPublish'); ?>
          </div>
          <?php endif; ?>

          <p>
          
           @if( !isset($group))
          <!--   <form class="form-inline form-import" action="{{ url(LaravelLocalization::setLocale().'/cms/translations/getView') }}"  method="POST" data-remote="true" role="form"> 
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <select name="replace" class="form-control">
                  <option value="0">Append new translations</option>
                  <option value="1">Replace existing translations</option>
              </select>
              <button type="submit" class="btn btn-success"  data-disable-with="Loading..">Import groups</button>
            </form> -->

            @endif

            <form class="form-inline pull-left form-publish" style="margin-right: 20px" method="POST"  action="{{ url(LaravelLocalization::setLocale().'/cms/translations/export') }}" >
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="group" value="{{ isset($group) ? $group : '*'}}">
                <button type="submit" class="btn btn-info" data-disable-with="Publishing.." >Export translations</button>
            </form> 

            <form class="form-inline form-publish" method="POST"  action="{{ url(LaravelLocalization::setLocale().'/cms/translations/import') }}" >
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="group" value="{{ isset($group) ? $group : '*'}}">
                <button type="submit" class="btn btn-info" data-disable-with="Publishing.." >Imports translations</button>
            </form>          

          </p>
          <form role="form">
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <div class="form-group">
                  <select name="group" id="group" class="form-control group-select">
                      <option value=""></option>}
                      option
                      <?php foreach($groups as $key => $value): ?>
                      <option value="<?= $key ?>"<?= $key == $group ? ' selected':'' ?>><?= $value ?></option>
                      <?php endforeach; ?>
                  </select>
              </div>
          </form>
          <?php if($group): ?>
    
          <!-- <form  method="POST"  role="form">
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <textarea class="form-control" rows="3" name="keys" placeholder="Add 1 key per line, without the group prefix"></textarea>
              <input type="submit" value="Add keys" class="btn btn-primary">
          </form>
 -->
          <h4>Total: <?= $numTranslations ?>, changed: <?= $numChanged ?></h4>
          <table class="table">
              <thead>
              <tr>
                  <th width="15%">Key</th>
                  <?php foreach($locales as $locale): ?>
                  <th><?= $locale ?></th>
                  <?php endforeach; ?>
                  <?php if($deleteEnabled): ?>
                  <th>&nbsp;</th>
                  <?php endif; ?>
              </tr>
              </thead>
              <tbody>

              <?php foreach($translations as $key => $translation): ?>
              <tr id="<?= $key ?>">
                  <td><?= $key ?></td>
                  <?php foreach($locales as $locale): ?>
                  <?php $t = isset($translation[$locale]) ? $translation[$locale] : null?>

                  <td>
                      <a href="#edit" class="editable status-<?= $t ? $t->status : 0 ?> locale-<?= $locale ?>" data-locale="<?= $locale ?>" data-name="<?= $locale . "|" . $key ?>" id="username" data-type="textarea" data-pk="<?= $t ? $t->id : 0 ?>" data-url="<?= $editUrl ?>" data-title="Enter translation"><?= $t ? htmlentities($t->value, ENT_QUOTES, 'UTF-8', false) : '' ?></a>
                  </td>
                  <?php endforeach; ?>
                  <?php if($deleteEnabled): ?>
                  <td>
                      <a href="{{ url(LaravelLocalization::setLocale().'/cms/translations/postDelete')}}" delete-key={{ $key  }} delete-group={{ $group }} class="delete-key" data-confirm="Are you sure you want to delete the translations for '<?= $key ?>?"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                  <?php endif; ?>
              </tr>
              <?php endforeach; ?>

              </tbody>
          </table>
          <?php else: ?>
          <p>Choose a group to display the group translations. If no groups are visisble, make sure you have run the migrations and imported the translations.</p>

          <?php endif; ?>

        </div>
      </div>
    </section>

</div>
@stop