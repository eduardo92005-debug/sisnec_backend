@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.p-juridica.actions.edit', ['name' => $pJuridica->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <p-juridica-form
                :action="'{{ $pJuridica->resource_url }}'"
                :data="{{ $pJuridica->toJson() }}"
                :pessoas="{{$pessoas->toJson()}}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.p-juridica.actions.edit', ['name' => $pJuridica->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.p-juridica.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </p-juridica-form>

        </div>
    
</div>

@endsection