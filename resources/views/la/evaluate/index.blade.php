@extends("la.layouts.app")

@section("contentheader_title", "Группа расчета")
@section("contentheader_description", "Панель расчета")
@section("section", "Группа расчета")
@section("sub_section", "Панель")
@section("htmlheader_title", "Группы расчета")

@section("headerElems")

@endsection
<style>
</style>
@section("main-content")
<div class="box box-info">
    <div class="box-header">
        <h4 class="box-title">
            Группа расчета
        </h4>
    </div>
    <div class="box-body" id="lara-kanban">

    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
@endpush

@push('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

@endpush
