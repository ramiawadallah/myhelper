@extends('layouts.admin')
@section('title') {{ trans('lang.languages') }}  @endsection
@section('menu') {!! getBreadcrumbs('language')->create !!}  @endsection
@section('content')

{!! bsForm::start(['route'=>'store_langs']) !!}

    <div class="col-xs-12">
		{!!bsForm::text('name') !!}
    	{!!bsForm::text('code') !!}
	
	    <div class="form-group">
	    	<label>{{ trans('lang.direction') }}</label>
			<div data-toggle="buttons">
				<label class="btn btn-lg btn-block btn-info "><input tabindex="8" class="icheck-11" type="radio" id="minimal-radio-2-11" value="ltr" name="direction">{{ trans('lang.ltr') }}</label>
				<label class="btn btn-lg btn-block btn-info "><input tabindex="8" class="icheck-11" type="radio" id="minimal-radio-2-11" value="rtl" name="direction">{{ trans('lang.rtl') }}</label>
			
			    <label class="btn btn-primary btn-block btn-lg">
					<input type="checkbox" name="default" value="1" autocomplete="off">
					{{ trans('lang.default') }}
					<span class="glyphicon glyphicon-ok"></span>
				</label>
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#myModal">
				  {{ trans('lang.select_flug') }}
				</button>
			</div>
		</div>
  	</div>


	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">{{ trans('lang.select_flug') }}</h4>
	      </div>
	      <div class="modal-body ">

	      <table class="">
	        <tbody>
	            <tr>
	            	<div class="form-group">
			        <div data-toggle="buttons">
						<?php $i = 0; ?>
						@foreach (flugs() as $flug)
							<?php $i++; ?>

								<label class="btn flug_btn btn-circle"><input type="radio"  name="flug" value="{{ $flug['file'] }}"><img src="{{ $flug['url'] }}" /></label>
							@if ($i==13)
							<?php $i = 0; ?>
							@endif
						@endforeach
					 </div>
			       </div>
		        </tr>
		     </tbody>
			</table>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('lang.continue') }}</button>
	      </div>
	    </div>
	  </div>
	</div>

   
	<div class="col-xs-12">
		<button type="submit" class="btn btn-lg btn-success btn-block">{{ trans('lang.save')}}</button>
    </div>
    <br>

@endsection