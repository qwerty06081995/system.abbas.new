@extends("la.layouts.app")

@section("contentheader_title", "Склад")
@section("contentheader_description", "Список заявок")
@section("section", "Склад")
@section("sub_section", "Список заявок")
@section("htmlheader_title", "Склад")

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
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Код</th>
                    <th>Отправитель</th>
                    <th>Адрес</th>
                    <th>Детали заявки</th>
                    <th>Дата</th>
                    <th>Примечания</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($orders) && !empty($orders) && count($orders) != 0)
                    @foreach($orders as $order)
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
                                <a href="{{route('la.store.show', $order->id)}}" class="btn btn-danger">Сверить</a>
                            </td>
                        </tr>
                    @endforeach
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
