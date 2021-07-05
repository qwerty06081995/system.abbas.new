@extends("la.layouts.app")

@section("contentheader_title", "Overheads")
@section("contentheader_description", "Overheads listing")
@section("section", "Overheads")
@section("sub_section", "Listing")
@section("htmlheader_title", "Overheads Listing")

@section("headerElems")
@la_access("Overheads", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Overhead</button>
@endla_access
@endsection

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

<div class="box box-success">
	<!--<div class="box-header"></div>-->
	<div class="box-body">
		<table id="example1" class="table table-bordered">
		<thead>
		<tr class="success">
			@foreach( $listing_cols as $col )
			<th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
			@endforeach
			@if($show_actions)
			<th>Actions</th>
			@endif
		</tr>
		</thead>
		<tbody>
			
		</tbody>
		</table>
	</div>
</div>

@la_access("Overheads", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Overhead</h4>
			</div>
			{!! Form::open(['action' => 'LA\OverheadsController@store', 'id' => 'overhead-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
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
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				{!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endla_access

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
$(function () {
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/overhead_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#overhead-add-form").validate({
		
	});
});
</script>
@endpush
