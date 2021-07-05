<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('la-assets/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Онлайн</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        @if(LAConfigs::getByKey('sidebar_search'))
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
	                <input type="text" name="q" class="form-control" placeholder="Поиск..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        @endif
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Модули</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ url(config('laraadmin.adminRoute')) }}"><i class='fa fa-home'></i> <span>Панель управления</span></a></li>
            <?php
            $menuItems = Dwij\Laraadmin\Models\Menu::where("parent", 0)->orderBy('hierarchy', 'asc')->get();
            $role_name = Auth::user()->roles()->get()->first()->name;
            //dd(Auth::user()->roles()->get()->first()->name);
                    //dd($menuItems);
            ?>
            <li><a href="{{ route('la.contract')}}"><i class='fa fa-file-archive-o'></i> <span>Договоры</span></a></li>
            <li><a href="{{ route('la.evaluate')}}"><i class='fa fa-calculator'></i> <span>Группа расчета</span></a></li>
            @php

            @endphp
            @if($role_name === "SUPER_ADMIN")
                @foreach ($menuItems as $menu)
                    @if($menu->type == "module")
                        <?php
                        $temp_module_obj = Module::get($menu->name);
                        ?>
                        @if(isset($module->id) && $module->name == $menu->name)
                            <?php echo LAHelper::print_menu($menu ,true); ?>
                        @else
                            <?php echo LAHelper::print_menu($menu); ?>
                        @endif
                    @else
                        <?php echo LAHelper::print_menu($menu); ?>
                    @endif
                @endforeach
            @elseif($role_name === "MODERATOR")
                <?php echo LAHelper::print_menu($menuItems[0] ,true); ?>
            @elseif($role_name === "OPERATOR")
                <?php echo LAHelper::print_menu($menuItems[10] ,true); ?>
            @elseif($role_name === "COURIER")
                <?php
                    echo LAHelper::print_menu($menuItems[1] ,true);
                    echo LAHelper::print_menu($menuItems[2] ,true);
                ?>
            @elseif($role_name === "STORE")
                <?php echo LAHelper::print_menu($menuItems[3] ,true); ?>
            @endif


            <!-- LAMenus -->
            
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
