@extends("la.layouts.app")
@php $order_info = $order; @endphp
@section("contentheader_title", "Заявка")
@section("contentheader_description", "Информация о заявке")
@section("section", "Заявка")
@section("sub_section", $order_info->order_code)
@section("htmlheader_title", "Информация о заявке")

@section("headerElems")
@endsection

@section("main-content")
<style>
    .container-fluid{
        padding: 0;
    }
    .from_info ul{
        display: flex;
        flex-direction: column;
    }
    .from_info ul li{
        display: flex;
    }
    .from_info ul li span{
        width: 20%;
    }
    .from_info ul li span.text-aqua{
        width: 80%;
    }
</style>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('message1'))
        <div class="alert alert-success">
            @php echo Session::get('message1') @endphp
        </div>
    @endif
    @if(Session::has('message2'))
        <div class="alert alert-error">
            @php echo Session::get('message2') @endphp
        </div>
    @endif
    <div class="box box-success">
        <!--<div class="box-header"></div>-->
        <div class="box-header">
            <h4 class="box-title">
                @php echo "Номер заявки: <b class='text-danger'>".$order->order_code."</b>"; @endphp
            </h4>
            <form action="{{route('la.store.check')}}" method="get">
                <div class="form-group">
                    <label for="overhead_code"></label>
                    <input type="text" id="overhead_code" name="overhead_code" class="form-control" placeholder="Введите номер накладного" autofocus>
                    <input type="hidden" name="order_id" value="@php echo $order->id; @endphp">
                </div>
            </form>
        </div>
        <div class="box-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="from_info">
                            <h4 class="box-title">Данные отправителя</h4>
                            @if(isset($order))
                                <ul class="list-group-item-success" style="list-style: none;">
                                    <li>
                                        <span>Имя:</span>
                                        <span class="text-aqua">@php echo $order->from_name; @endphp</span>
                                    </li>
                                    <li>
                                        <span>Компания:</span>
                                        <span class="text-aqua">@php echo $order->from_company; @endphp</span>
                                    </li>
                                    <li>
                                        <span>Адрес:</span>
                                        <span class="text-aqua">@php echo $order->from_city.", ".$order->from_address; @endphp</span>
                                    </li>
                                    <li>
                                        <span>Телефон:</span>
                                        <span class="text-aqua">@php echo $order->from_phone; @endphp</span>
                                    </li>
                                </ul>
                            @else
                                <ul class="list-group-item-success" style="list-style: none;">
                                    <li>
                                        <span>Имя:</span>
                                        <span></span>
                                    </li>
                                    <li>
                                        <span>Компания:</span>
                                        <span></span>
                                    </li>
                                    <li>
                                        <span>Адрес:</span>
                                        <span></span>
                                    </li>
                                    <li>
                                        <span>Телефон:</span>
                                        <span></span>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="from_info">
                            <h4 class="box-title">Данные получателя</h4>
                            @if(isset($order))
                                <ul class="list-group-item-danger" style="list-style: none;">
                                    <li>
                                        <span>Имя:</span>
                                        <span class="text-aqua">@php echo $order->to_name; @endphp</span>
                                    </li>
                                    <li>
                                        <span>Компания:</span>
                                        <span class="text-aqua">@php echo $order->to_company; @endphp</span>
                                    </li>
                                    <li>
                                        <span>Адрес:</span>
                                        <span class="text-aqua">
                                            @if($order->to_city != "")
                                                @php echo $order->to_city.", ".$order->to_address; @endphp
                                            @else
                                                @php echo ""; @endphp
                                            @endif
                                        </span>
                                    </li>
                                    <li>
                                        <span>Телефон:</span>
                                        <span class="text-aqua">@php echo $order->to_phone; @endphp</span>
                                    </li>
                                </ul>
                            @else
                                <ul class="list-group-item-danger" style="list-style: none;">
                                    <li>
                                        <span>Имя:</span>
                                        <span></span>
                                    </li>
                                    <li>
                                        <span>Компания:</span>
                                        <span></span>
                                    </li>
                                    <li>
                                        <span>Адрес:</span>
                                        <span></span>
                                    </li>
                                    <li>
                                        <span>Телефон:</span>
                                        <span></span>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Код</th>
                                    <th>Данные отправителя</th>
                                    <th>Данные получателя</th>
                                    <th>Детали накладной</th>
                                    <th>Дополнительно</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                    //dd($overheads);
                                //foreach ($overheads->get() as $overhead){
                                  //  echo $overhead->overhead_code;
                                //}
                            @endphp
                                @if(isset($overheads) && $overheads != null)
                                    @foreach($overheads->get() as $overhead)
                                        <tr>
                                            <td>@php echo $overhead->id; @endphp</td>
                                            <td>@php echo $overhead->overhead_code; @endphp</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a href="{{route('la.store.edit', ['id'=>$overhead->id])}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="success">
                                        <td colspan="6">Нету прикрепленного накладного</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <a href="#" class="btn btn-success btn-sm" id="eval">Отправить в группу расчета</a>
                    </div>
                </div>
            </div>
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
            $('#overhead_code').change(function(e){
                e.preventDefault();
                let data = location.href.split('/');
                let value = $(this).val();
                console.log(value);
                {{--if(value.length === 6){--}}
                {{--    $.ajax({--}}
                {{--        method: "get",--}}
                {{--        url: "{{ url(config('laraadmin.adminRoute') . '/store/check') }}",--}}
                {{--        data: { id: data[6], overhead_id: value },--}}
                {{--        success: function (res) {--}}
                {{--            let result = JSON.parse(res);--}}
                {{--            console.log(result['success']);--}}
                {{--            if(result['success'] === 1){--}}
                {{--                alert('В этом заявке прикреплен накладной с таким номером  -  ' + value);--}}
                {{--            }else if(result['success'] === 2){--}}
                {{--                alert('Накладной успешно создан');--}}
                {{--                location.reload();--}}
                {{--            }--}}
                {{--        }--}}
                {{--    })--}}
                {{--}--}}
            });

            $("#eval").click(function (e) {
                e.preventDefault();

            });

        });
    </script>
@endpush
