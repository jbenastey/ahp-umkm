<aside id="main-sidebar" class="dt-sidebar">
    <div class="dt-sidebar__container">

        <!-- Sidebar Navigation -->
        <ul class="dt-side-nav">

            <!-- Menu Header -->
            <li class="dt-side-nav__item dt-side-nav__header">
                <span class="dt-side-nav__text">menu</span>
            </li>
            <!-- /menu header -->

            <!-- Menu Item -->
            <li class="dt-side-nav__item @if(request()->is('home')) open @endif">
                <a href="{{url('home')}}" class="dt-side-nav__link" title="Widgets"> <i
                        class="icon icon-dashboard icon-fw icon-lg"></i>
                    <span class="dt-side-nav__text">Dashboard</span> </a>
            </li>
            <li class="dt-side-nav__item @if(request()->is('master/*')) open @endif">
                <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Dashboard">
                    <i class="icon icon-settings icon-fw icon-lg"></i> <span class="dt-side-nav__text">Data Master</span> </a>

                <!-- Sub-menu -->
                <ul class="dt-side-nav__sub-menu" style="@if(request()->is('master')) display:block @endif">
                    <li class="dt-side-nav__item">
                        <a href="{{url('master')}}" class="dt-side-nav__link" title="CRM">
                            <span class="dt-side-nav__text"> <i class="icon icon-chart-pie"></i>Data Kriteria</span> </a>
                    </li>
                </ul>
                <!-- /sub-menu -->

            </li>
            <li class="dt-side-nav__item @if(request()->is('kuesioner')) open @endif">
                <a href="{{url('kuesioner')}}" class="dt-side-nav__link" title="Task Manager"> <i
                        class="icon icon-forms-advanced icon-fw icon-lg"></i>
                    <span class="dt-side-nav__text">Data Kuesioner</span> </a>
            </li>
            <li class="dt-side-nav__item @if(request()->is('ahp')) open @endif">
                <a href="{{url('ahp')}}" class="dt-side-nav__link" title="Task Manager"> <i
                        class="icon icon-chart-line icon-fw icon-lg"></i>
                    <span class="dt-side-nav__text">Analisa AHP</span> </a>
            </li>

        </ul>
        <!-- /sidebar navigation -->

    </div>
</aside>
