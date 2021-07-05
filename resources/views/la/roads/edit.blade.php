@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/roads') }}">Road</a> :
@endsection
@section("contentheader_description", $road->$view_col)
@section("section", "Roads")
@section("section_url", url(config('laraadmin.adminRoute') . '/roads'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Roads Edit : ".$road->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($road, ['route' => [config('laraadmin.adminRoute') . '.roads.update', $road->id ], 'method'=>'PUT', 'id' => 'road-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'road_name')
					@la_input($module, 'courier_name')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/roads') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#road-edit-form").validate({
		
	});
});
</script>
@endpush
