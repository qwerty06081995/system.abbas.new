@extends("la.layouts.app")

@section("contentheader_title", "Договоры")
@section("contentheader_description", "Панель договоров")
@section("section", "Договор")
@section("sub_section", "панель")
@section("htmlheader_title", "Договоры")

@section("headerElems")

@endsection
<style>
    #lara-kanban{
        display: flex;
    }
    #lara-kanban .box{
        margin-right: 5px;
        border: 1px solid #eeeeee
    }
    .kanban-item{
        width: 100%;
    }
    .kanban-box .box-body{
        display: flex;
        flex-direction: column;
        height: 500px;
        overflow-y: scroll;
    }
    .kanban-item{
        border: 1px solid #b8c7ce;
        margin-bottom: 5px;
    }
    .kanban-item h5{
        padding: 5px;
        background: #dff0d8;
        margin: 0;
    }
    .kanban-item ul{
        list-style: none;
        padding-left: 5px;
        width: 100%;
    }
    .kanban-item ul li{
        display: flex;
    }
    .kanban-item ul li span{
        display: block;
        width: 50%;
    }
</style>
@section("main-content")
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
    <div class="box box-info">
        <div class="box-header">
            <h4 class="box-title">
                Список договоров
            </h4>
            <div class="box-tools">
{{--                <div class="box-search">--}}
{{--                    <input type="text">--}}
{{--                    <label for=""></label>                    --}}
{{--                </div>--}}
                <div class="box-add">
                    <button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="box-body" id="lara-kanban">
            <div class="box box-warning kanban-box">
                <div class="box-header alert-warning">
                    <h3 class="box-title">Новый договор</h3>
                </div>
                <div class="box-body new-contact connectedSortable" data="Новый">
                    @if(isset($contracts))
                        @foreach($contracts as $contract)
                            @if($contract->status == "Новый")
                                <div class="kanban-item" data="@php echo $contract->id;@endphp">
                                    <h5>@php echo "# ".$contract->code;@endphp</h5>
                                    <ul>
                                        <li>
                                            <span>Компания:</span>
                                            <span>@php echo $contract->company_name;@endphp</span>
                                        </li>
                                        <li>
                                            <span>План:</span>
                                            <span>@php echo $contract->plan;@endphp</span>
                                        </li>
                                        <li>
                                            <span>Цена:</span>
                                            <span>@php echo $contract->price;@endphp</span>
                                        </li>
                                        <li>
                                            <span>Стоимость:</span>
                                            <span>@php echo $contract->pure_price;@endphp</span>
                                        </li>
                                        <li>
                                            <span>Масса:</span>
                                            <span>@php echo $contract->mass;@endphp</span>
                                        </li>
                                        <li>
                                            <span>Куда:</span>
                                            <span>
                                                @php
                                                    echo \App\Models\City::where('id', $contract->to_city+1)->get()->first()->city_name;
                                                @endphp
                                            </span>
                                        </li>
                                        <li>
                                            <span>Примечание:</span>
                                            <span>@php echo $contract->description;@endphp</span>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="box box-info kanban-box">
                <div class="box-header alert-info">
                    <h3 class="box-title">В процессе</h3>
                </div>
                <div class="box-body inProcess-contact connectedSortable" data="В процессе">
                    @if(isset($contracts))
                        @foreach($contracts as $contract)
                            @if($contract->status == "В процессе")
                                <div class="kanban-item" data="@php echo $contract->id;@endphp">
                                    <h5>@php echo "# ".$contract->code;@endphp</h5>
                                    <ul>
                                        <li>
                                            <span>Компания:</span>
                                            <span>@php echo $contract->company_name;@endphp</span>
                                        </li>
                                        <li>
                                            <span>План:</span>
                                            <span>@php echo $contract->plan;@endphp</span>
                                        </li>
                                        <li>
                                            <span>Цена:</span>
                                            <span>@php echo $contract->price;@endphp</span>
                                        </li>
                                        <li>
                                            <span>Стоимость:</span>
                                            <span>@php echo $contract->pure_price;@endphp</span>
                                        </li>
                                        <li>
                                            <span>Масса:</span>
                                            <span>@php echo $contract->mass;@endphp</span>
                                        </li>
                                        <li>
                                            <span>Куда:</span>
                                            <span>
                                                @php
                                                    echo \App\Models\City::where('id', $contract->to_city+1)->get()->first()->city_name;
                                                @endphp
                                            </span>
                                        </li>
                                        <li>
                                            <span>Примечание:</span>
                                            <span>@php echo $contract->description;@endphp</span>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="box box-success kanban-box">
                <div class="box-header alert-error">
                    <h3 class="box-title">Отклонен</h3>
                </div>
                <div class="box-body canceled-contact connectedSortable" data="Отклонен">
                    @if(isset($contracts))
                        @foreach($contracts as $contract)
                            @if($contract->status == "Отклонен")
                                <div class="kanban-item" data="@php echo $contract->id;@endphp">
                                    <h5>@php echo "# ".$contract->code;@endphp</h5>
                                    <ul>
                                        <li>
                                            <span>Компания:</span>
                                            <span>@php echo $contract->company_name;@endphp</span>
                                        </li>
                                        <li>
                                            <span>План:</span>
                                            <span>@php echo $contract->plan;@endphp</span>
                                        </li>
                                        <li>
                                            <span>Цена:</span>
                                            <span>@php echo $contract->price;@endphp</span>
                                        </li>
                                        <li>
                                            <span>Стоимость:</span>
                                            <span>@php echo $contract->pure_price;@endphp</span>
                                        </li>
                                        <li>
                                            <span>Масса:</span>
                                            <span>@php echo $contract->mass;@endphp</span>
                                        </li>
                                        <li>
                                            <span>Куда:</span>
                                            <span>
                                                @php
                                                    echo \App\Models\City::where('id', $contract->to_city+1)->get()->first()->city_name;
                                                @endphp
                                            </span>
                                        </li>
                                        <li>
                                            <span>Примечание:</span>
                                            <span>@php echo $contract->description;@endphp</span>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="box box-danger kanban-box">
                <div class="box-header alert-success">
                    <h3 class="box-title">Завершен</h3>
                </div>
                <div class="box-body finished-contact connectedSortable" data="Завершен">
                    @if(isset($contracts))
                        @foreach($contracts as $contract)
                            @if($contract->status == "Завершен")
                                <div class="kanban-item" data="@php echo $contract->id;@endphp">
                                    <h5>@php echo "# ".$contract->code;@endphp</h5>
                                    <ul>
                                        <li>
                                            <span>Компания:</span>
                                            <span>@php echo $contract->company_name;@endphp</span>
                                        </li>
                                        <li>
                                            <span>План:</span>
                                            <span>@php echo $contract->plan;@endphp</span>
                                        </li>
                                        <li>
                                            <span>Цена:</span>
                                            <span>@php echo $contract->price;@endphp</span>
                                        </li>
                                        <li>
                                            <span>Стоимость:</span>
                                            <span>@php echo $contract->pure_price;@endphp</span>
                                        </li>
                                        <li>
                                            <span>Масса:</span>
                                            <span>@php echo $contract->mass;@endphp</span>
                                        </li>
                                        <li>
                                            <span>Куда:</span>
                                            <span>
                                                @php
                                                    echo \App\Models\City::where('id', $contract->to_city+1)->get()->first()->city_name;
                                                @endphp
                                            </span>
                                        </li>
                                        <li>
                                            <span>Примечание:</span>
                                            <span>@php echo $contract->description;@endphp</span>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Добавить договор</h4>
                </div>
                {!! Form::open(['action' => 'LA\ContractController@add', 'id' => 'contract-add-form']) !!}
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="company_name">Имя компаний</label>
                            <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Имя компаний">
                        </div>
                        <div class="form-group">
                            <label for="plan">Тарифный план</label>
                            <select name="plan" id="plan" class="form-control">
                                <option value="Экспресс">Экспресс</option>
                                <option value="Стандарт">Стандарт</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="to_city">Выберите город отправление</label>
                            <select class="form-control" name="to_city" id="to_city">
                                <optgroup label="1-ая Зона">
                                    <option value="0">Нур-Султан</option>
                                    <option value="1">Караганда</option>
                                    <option value="2">Петропавловск</option>
                                    <option value="3">Павлодар</option>
                                    <option value="4">Костанай</option>
                                    <option value="5">Кокшетау</option>
                                    <option value="6">Усть-Каменегорск</option>
                                    <option value="7">Семей</option>
                                    <option value="8">Кызылорда</option>
                                    <option value="9">Шымкент</option>
                                    <option value="10">Тараз</option>
                                    <option value="11">Атырау</option>
                                    <option value="12">Актау</option>
                                    <option value="13">Актобе</option>
                                    <option value="14">Уральск</option>
                                    <option value="15">Талдыкорган</option>
                                </optgroup>
                                <optgroup label="2-ая Зона">
                                    <option value="16">Аксай</option>
                                    <option value="17">Балхаш</option>
                                    <option value="18">Жанаозен</option>
                                    <option value="19">Екибастуз</option>
                                    <option value="20">Аксу</option>
                                    <option value="21">Риддер</option>
                                    <option value="22">Рудный</option>
                                    <option value="23">Жезказган</option>
                                    <option value="24">Сатбаев</option>
                                    <option value="25">Темиртау</option>
                                    <option value="26">Туркестан</option>
                                    <option value="27">Талгар</option>
                                    <option value="28">Каскелен</option>
                                </optgroup>
                                <optgroup label="3-я зона">
                                    <option value="99">Другое</option>
                                </optgroup>
                                <optgroup label="0-ая зона">
                                    <option value="100">Алматы</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mass">Масса</label>
                            <input type="text" class="form-control" name="mass" id="mass" placeholder="Введите массу">
                        </div>
                        <div class="form-group">
                            <label for="price">Цена тарифа</label>
                            <input type="text" class="form-control" name="price" id="price" placeholder="Введите цену">
                        </div>
                        <div class="form-group">
                            <label for="pure_price">Объявленная стоимость</label>
                            <input type="text" class="form-control" name="pure_price" id="pure_price" placeholder="Введите стоимость">
                        </div>
                        <div class="form-group">
                            <label for="description">Примечание</label>
                            <input type="text" class="form-control" name="description" id="description" placeholder="Введите примечание">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    {!! Form::submit( 'Отправить', ['class'=>'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script>
        let modal = $("#AddModal2");
        let currentColumn;
        $('.kanban-box .box-body').sortable({
            connectWith:".connectedSortable",
            receive: function(event, ui){
                let data = ui.item[0];
                let parentData = $(this)[0];
                //currentColumn = $('.ui-sortable');//.sortable("cancel");
                console.log($(parentData).attr('data'));
                let status = $(parentData).attr('data');
                let contract_id = $(data).attr('data');
                console.log($(data).attr('data'));
                $.ajax({
                    url: "{{route('la.contract.change')}}",
                    type: "get",
                    header: {
                        'X-CSRF-Token': '{{ csrf_token() }}'
                    },
                    data: {status: status, contract_id: contract_id},
                    success: function(data) {
                        console.log(data);
                    },
                    error:function(data){
                        console.log(data);
                    }
                });


            }
        }).disableSelection();

    </script>
@endpush
