@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/overheads') }}">Overhead</a> :
@endsection
@section("contentheader_description", $overhead->$view_col)
@section("section", "Overheads")
@section("section_url", url(config('laraadmin.adminRoute') . '/overheads'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Overheads Edit : ".$overhead->$view_col)

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
				{!! Form::model($overhead, ['route' => [config('laraadmin.adminRoute') . '.overheads.update', $overhead->id ], 'method'=>'PUT', 'id' => 'overhead-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'overhead_code')
					@la_input($module, 'from_name')
					@la_input($module, 'from_company')
					@la_input($module, 'from_city')
					@la_input($module, 'from_address')
					@la_input($module, 'to_name')
					@la_input($module, 'from_phone')
					@la_input($module, 'to_company')
					@la_input($module, 'to_city')
					@la_input($module, 'to_address')
					@la_input($module, 'to_phone')
					@la_input($module, 'date_s')
					@la_input($module, 'date_e')
					@la_input($module, 'type')
					@la_input($module, 'speed')
					@la_input($module, 'payment')
					@la_input($module, 'payment_type')
					@la_input($module, 'comment')
					@la_input($module, 'total_mass')
					@la_input($module, 'volume')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/overheads') }}">Cancel</a></button>
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
	$("#overhead-edit-form").validate({
		
	});
});
</script>
@endpush
