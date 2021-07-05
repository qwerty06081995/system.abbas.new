@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/orders') }}">Order</a> :
@endsection
@section("contentheader_description", $order->$view_col)
@section("section", "Orders")
@section("section_url", url(config('laraadmin.adminRoute') . '/orders'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Orders Edit : ".$order->$view_col)

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
				{!! Form::model($order, ['route' => [config('laraadmin.adminRoute') . '.orders.update', $order->id ], 'method'=>'PUT', 'id' => 'order-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'order_code')
					@la_input($module, 'from_name')
					@la_input($module, 'from_company')
					@la_input($module, 'from_city')
					@la_input($module, 'from_address')
					@la_input($module, 'to_name')
					@la_input($module, 'to_company')
					@la_input($module, 'to_city')
					@la_input($module, 'to_address')
					@la_input($module, 'to_phone')
					@la_input($module, 'from_phone')
					@la_input($module, 'date_s')
					@la_input($module, 'date_e')
					@la_input($module, 'type')
					@la_input($module, 'speed')
					@la_input($module, 'payment')
					@la_input($module, 'payment_type')
					@la_input($module, 'comment')
					@la_input($module, 'status')
					@la_input($module, 'courier_id')
					@la_input($module, 'overhead_id')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/orders') }}">Cancel</a></button>
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
	$("#order-edit-form").validate({
		
	});
});
</script>
@endpush
