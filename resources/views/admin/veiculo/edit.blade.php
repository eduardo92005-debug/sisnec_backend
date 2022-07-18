@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.veiculo.actions.edit', ['name' => $veiculo->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <veiculo-form
                :action="'{{ $veiculo->resource_url }}'"
                :data="{{ $veiculo->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.veiculo.actions.edit', ['name' => $veiculo->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.veiculo.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </veiculo-form>

        </div>
    
</div>

@endsection