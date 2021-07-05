@extends("la.layouts.app")

@section("contentheader_title", "Панель")
@section("contentheader_description", "Список заявок")
@section("section", "Заявки")
@section("sub_section", "Список")
@section("htmlheader_title", "Назначение курьеров")

@section("headerElems")

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
        <div class="box-header">
            <h4 class="box-title">Новые завки</h4>
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                <tr class="success">
                    <th>Код</th>
                    <th>Отправитель</th>
                    <th>Адрес</th>
                    <th>Детали заявки</th>
                    <th>Дата</th>
                    <th>Примечания</th>
                    <th>Курьер</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($orders1) && !empty($orders1) && count($orders1) != 0)
                    @foreach($orders1 as $order)
                        <tr class="success">
                            <td>
                                @php
                                    echo $order->order_code;
                                @endphp
                            </td>
                            <td>
                                @php
                                    echo $order->from_name;
                                @endphp
                            </td>
                            <td>
                                @php
                                    echo $order->from_city.",<br>";
                                    echo $order->from_address;
                                @endphp
                            </td>
                            <td>
                                @php
                                    echo "Тип: ".$order->type."<br>";
                                    echo "Скорость: ".$order->speed."<br>";
                                    echo "Оплата: ".$order->payment."<br>";
                                    echo "Тип оплаты: ".$order->payment_type."<br>";
                                @endphp
                            </td>
                            <td>
                                @php
                                    echo $order->date_s;
                                @endphp
                            </td>
                            <td>
                                @php
                                    echo $order->comment;
                                @endphp
                            </td>
                            <td>
                                @php
                                    echo $order->courier_id;
                                @endphp
                            </td>
                            <td>
                                <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#AddModal">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Назначить курьер</h4>
                                            </div>
                                            {!! Form::open(['action' => 'LA\CourierController@courier_appoint', 'id' => 'courier-appoint-form']) !!}
                                            <div class="modal-body">
                                                <div class="box-body">
                                                    <input type="hidden" name="order_id" value="@php echo $order->id;@endphp">
                                                    <div class="form-group">
                                                        <label for="courier_name">Курьер :</label>
                                                        @if(isset($couriers))
                                                            @php //dd($employees);@endphp
                                                            <select name="courier_name" id="courier_name" class="form-control">
                                                                @foreach($couriers as $employee)
                                                                    <option value="@php echo $employee['id']; @endphp">
                                                                        @php echo $employee['name']; @endphp
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                                {!! Form::submit( 'Назначить', ['class'=>'btn btn-success']) !!}
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                @else
                    <td colspan="7">Новых заявок нету</td>
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="box box-danger">
        <!--<div class="box-header"></div>-->
        <div class="box-header">
            <h4 class="box-title">Курьер назначен</h4>
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                <tr class="danger">
                    <th>Код</th>
                    <th>Отправитель</th>
                    <th>Адрес</th>
                    <th>Детали заявки</th>
                    <th>Дата</th>
                    <th>Примечания</th>
                    <th>Курьер</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($orders2) && !empty($orders2) && count($orders2) != 0)
                    @foreach($orders2 as $order)
                        <tr class="danger">
                            <td>
                                @php
                                    echo $order->order_code;
                                @endphp
                            </td>
                            <td>
                                @php
                                    echo $order->from_name;
                                @endphp
                            </td>
                            <td>
                                @php
                                    echo $order->from_city.",<br>";
                                    echo $order->from_address;
                                @endphp
                            </td>
                            <td>
                                @php
                                    echo "Тип: ".$order->type."<br>";
                                    echo "Скорость: ".$order->speed."<br>";
                                    echo "Оплата: ".$order->payment."<br>";
                                    echo "Тип оплаты: ".$order->payment_type."<br>";
                                @endphp
                            </td>
                            <td>
                                @php
                                    echo $order->date_s;
                                @endphp
                            </td>
                            <td>
                                @php
                                    echo $order->comment;
                                @endphp
                            </td>
                            <td>
                                @php
                                    echo \App\Models\Employee::where('id', $order->courier_id)->get()->first()->name;
                                @endphp
                            </td>
                        </tr>
                    @endforeach
                @else
                    <td colspan="7">Новых заявок нету</td>
                @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="box box-danger">
        <!--<div class="box-header"></div>-->
        <div class="box-header">
            <h4 class="box-title">Курьер назначен</h4>
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                <tr class="dark">
                    <th>Код</th>
                    <th>Отправитель</th>
                    <th>Адрес</th>
                    <th>Детали заявки</th>
                    <th>Дата</th>
                    <th>Примечания</th>
                    <th>Курьер</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($orders3) && !empty($orders3) && count($orders3) != 0)
                    @foreach($orders3 as $order)
                        <tr class="dark">
                            <td>
                                @php
                                    echo $order->order_code;
                                @endphp
                            </td>
                            <td>
                                @php
                                    echo $order->from_name;
                                @endphp
                            </td>
                            <td>
                                @php
                                    echo $order->from_city.",<br>";
                                    echo $order->from_address;
                                @endphp
                            </td>
                            <td>
                                @php
                                    echo "Тип: ".$order->type."<br>";
                                    echo "Скорость: ".$order->speed."<br>";
                                    echo "Оплата: ".$order->payment."<br>";
                                    echo "Тип оплаты: ".$order->payment_type."<br>";
                                @endphp
                            </td>
                            <td>
                                @php
                                    echo $order->date_s;
                                @endphp
                            </td>
                            <td>
                                @php
                                    echo $order->comment;
                                @endphp
                            </td>
                            <td>
                                @php
                                    echo \App\Models\Employee::where('id', $order->courier_id)->get()->first()->name;
                                @endphp
                            </td>
                        </tr>
                    @endforeach
                @else
                    <td colspan="7">Новых заявок нету</td>
                @endif
                </tbody>
            </table>
        </div>
    </div>


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
            ajax: "{{ url(config('laraadmin.adminRoute') . '/order_dt_ajax') }}",
            language: {
            lengthMenu: "_MENU_",
            search: "_INPUT_",
            searchPlaceholder: "Search"
            },
            @if($show_actions)
                columnDefs: [ { orderable: false, targets: [-1] }],
            @endif
            });
            $("#order-add-form").validate({

            });
        });
    </script>
@endpush
