<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/pessoas') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.pessoa.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/enderecos') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.endereco.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/p-fisicas') }}"><i class="nav-icon icon-drop"></i> {{ trans('admin.p-fisica.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/p-juridicas') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.p-juridica.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/veiculos') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.veiculo.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/planos') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.plano.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
