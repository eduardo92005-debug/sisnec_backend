<div class="form-group row align-items-center" :class="{'has-danger': errors.has('p__fisicas_id'), 'has-success': fields.p__fisicas_id && fields.p__fisicas_id.valid }">
    <label for="p__fisicas_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.veiculo.columns.p__fisicas_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.p__fisicas_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('p__fisicas_id'), 'form-control-success': fields.p__fisicas_id && fields.p__fisicas_id.valid}" id="p__fisicas_id" name="p__fisicas_id" placeholder="{{ trans('admin.veiculo.columns.p__fisicas_id') }}">
        <div v-if="errors.has('p__fisicas_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('p__fisicas_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('p__juridicas_id'), 'has-success': fields.p__juridicas_id && fields.p__juridicas_id.valid }">
    <label for="p__juridicas_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.veiculo.columns.p__juridicas_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.p__juridicas_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('p__juridicas_id'), 'form-control-success': fields.p__juridicas_id && fields.p__juridicas_id.valid}" id="p__juridicas_id" name="p__juridicas_id" placeholder="{{ trans('admin.veiculo.columns.p__juridicas_id') }}">
        <div v-if="errors.has('p__juridicas_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('p__juridicas_id') }}</div>
    </div>
</div>


