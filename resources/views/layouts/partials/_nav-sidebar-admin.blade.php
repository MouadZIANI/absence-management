<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">

        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">

            <li class="sidebar-toggler-wrapper hide">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                    <span></span>
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <li class="sidebar-search-wrapper">
            </li>
            <li class="nav-item {!! Request::is('admin/sales-history') || Request::is('admin/rentals-history') ? "active open" : "" !!}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Tableau de bord</span>
                    <span class=" arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {!! Request::is('admin/sales-history') ? "active" : "" !!}">
                        <a href="{{ route('sales-history') }}" class="nav-link ">
                            <i class="icon-eye"></i>
                            <span class="title">Gestion des ventes</span>
                        </a>
                    </li>
                    <li class="nav-item {!! Request::is('admin/rentals-history') ? "active" : "" !!}">
                        <a href="{{ route('rentals-history') }}" class="nav-link ">
                            <i class="fa fa-edit"></i>
                            <span class="title">Gestion des locations</span>
                        </a>
                    </li>
                    <li class="nav-item {!! Request::is('admin/maitenance') ? "active" : "" !!}">
                        <a href="{{ route('maitenance.index') }}" class="nav-link ">
                            <i class="fa fa-edit"></i>
                            <span class="title">Gestion des entretiens</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {!! Request::is('admin/bikes/*') || Request::is('admin/bikes') || Request::is('admin/stock-bikes/*') || Request::is('admin/stock-bikes') || Request::is('admin/bike-transactions') ? "active" : "" !!}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-bicycle"></i>
                    <span class="title">Gestion des vélos</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item"><a href="{{ route('bikes.index') }}" class="nav-link">Liste des vélos</a></li>
                    <li class="nav-item {{ Request::is('admin/bikes/create') ? "active" : "" }}"><a href="{{ route('bikes.create') }}" class="nav-link">Nouveau vélo</a></li>
                    <li class="nav-item"><a href="{{ route('bike-transactions.index') }}" class="nav-link">Nouvelle vente</a></li>
                    <li class="nav-item"><a href="{{ route('bike-transactions.index',['transaction'=>'rent']) }}" class="nav-link">Nouvelle Location</a></li>
                    <li class="nav-item"><a href="{{ route('stock-bikes.index') }}" class="nav-link">Stock des vélos</a></li>
                </ul>
            </li>
            <li class="nav-item {!! Request::is('admin/accessories') || Request::is('admin/accessories/*') || Request::is('admin/stock-accessories/*') || Request::is('admin/stock-accessories') || Request::is('admin/accessory-transactions')  ? "active" : "" !!}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-diamond"></i>
                    <span class="title">Gestion des Accessoires</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item"><a href="{{ route('accessories.index') }}" class="nav-link">Liste des accessoires</a></li>
                    <li class="nav-item"><a href="{{ route('accessories.create') }}" class="nav-link">Nouveau accessoire</a></li>
                    <li class="nav-item"><a href="{{ route('accessory-transactions.index') }}" class="nav-link">Nouvelle vente </a></li>
                    <li class="nav-item"><a href="{{ route('accessory-transactions.index', ['transaction'=>'rent']) }}" class="nav-link">Nouvelle Location</a></li>
                    <li class="nav-item"><a href="{{ route('stock-accessories.index') }}" class="nav-link">Stock des accessoires</a></li>
                </ul>
            </li>
            <li class="nav-item {!! Request::is('admin/components') || Request::is('admin/components/*') || Request::is('admin/stock-components/*') || Request::is('admin/stock-components') || Request::is('admin/component-transactions')  ? "active" : "" !!}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cubes"></i>
                    <span class="title">Gestion des Composants</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item"><a href="{{ route('components.index') }}" class="nav-link">Liste des composants</a></li>
                  <li class="nav-item"><a href="{{ route('components.create') }}" class="nav-link">Nouveau composant</a></li>
                  <li class="nav-item"><a href="{{ route('component-transactions.index') }}" class="nav-link">Nouveau vente</a></li>
                  <li class="nav-item"><a href="{{ route('component-transactions.index', ['transaction'=>'rent']) }}" class="nav-link">Nouveau Location</a></li>
                  <li class="nav-item"><a href="#" class="nav-link">Nouvelle entretien</a></li>
                  <li class="nav-item"><a href="{{ route('stock-components.index') }}" class="nav-link">Stock des composants</a></li>
                </ul>
            </li>
            <li class="nav-item {!! Request::is('admin/bike-categories/*') || Request::is('admin/bike-categories') || Request::is('admin/element-categories') || Request::is('admin/element-categories/*') ? "active" : "" !!}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-group"></i>
                    <span class="title">Gestion des Catégories</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item"><a href="{{ route('bike-categories.index') }}" class="nav-link">Vélos</a></li>
                  <li class="nav-item"><a href="{{ route('element-categories.index') }}" class="nav-link">Accessoires & composants</a></li>
                </ul>
            </li>
            <li class="nav-item {!! Request::is('admin/type-bikes/*') || Request::is('admin/type-bikes') || Request::is('admin/type-elements/*') || Request::is('admin/type-elements') || Request::is('admin/customer-types/*') || Request::is('admin/customer-types') ? "active" : "" !!}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-group"></i>
                    <span class="title">Gestion des Types</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item"><a href="{{ route('type-bikes.index') }}" class="nav-link">Vélos</a></li>
                  <li class="nav-item"><a href="{{ route('type-elements.index') }}" class="nav-link">Accessoires & composants</a></li>
                  <li class="nav-item"><a href="{{ route('customer-types.index') }}" class="nav-link">Clients</a></li>
                </ul>
            </li>
            <li class="nav-item {!! Request::is('admin/customers/*') || Request::is('admin/customers') ? "active" : "" !!}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title">Gestion des clients</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item"><a href="{{ route('customers.index') }}" class="nav-link">Liste des clients</a></li>
                  <li class="nav-item"><a href="{{ route('customers.create') }}" class="nav-link">Nouveau client</a></li>
                </ul>
            </li>
            <li class="nav-item {!! Request::is('admin/users') || Request::is('admin/users/*') ? "active" : "" !!}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-group"></i>
                    <span class="title">Gestion des Utilisateurs</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link">Liste des utilisateurs</a></li>
                  <li class="nav-item"><a href="{{ route('users.create') }}" class="nav-link">Nouveau utilisateur</a></li>
                </ul>
            </li>
            <li class="nav-item {!! Request::is('admin/status') || Request::is('admin/status/*') || Request::is('admin/brands') || Request::is('admin/brands/*') || Request::is('admin/settings/*') || Request::is('admin/settings') ? "active" : "" !!}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class=" fa fa-gears"></i>
                    <span class="title">Autres Configurations</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ Request::is('admin/brands') ? "active" : "" }}">
                        <a href=" {{ route('brands.index') }} " class="nav-link">Marques des produits</a></li>
                    <li class="nav-item {{ Request::is('admin/status') ? "active" : "" }}">
                        <a href="{{ route('status.index') }}" class="nav-link">Statut de produit </a></li>
                    <li class="nav-item">
                        <a href="{{ route('settings.index') }}" class="nav-link">Paramétrages </a></li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR