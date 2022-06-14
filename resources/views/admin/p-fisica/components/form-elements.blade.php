<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cpf'), 'has-success': fields.cpf && fields.cpf.valid }">
    <label for="cpf" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.p-fisica.columns.cpf') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cpf" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cpf'), 'form-control-success': fields.cpf && fields.cpf.valid}" id="cpf" name="cpf" placeholder="{{ trans('admin.p-fisica.columns.cpf') }}">
        <div v-if="errors.has('cpf')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cpf') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('pessoa_id'), 'has-success': fields.pessoa_id && fields.pessoa_id.valid }">
    <label for="pessoa_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.p-fisica.columns.pessoa_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.pessoa_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('pessoa_id'), 'form-control-success': fields.pessoa_id && fields.pessoa_id.valid}" id="pessoa_id" name="pessoa_id" placeholder="{{ trans('admin.p-fisica.columns.pessoa_id') }}">
        <div v-if="errors.has('pessoa_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('pessoa_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('pessoa_id'), 'has-success': this.fields.pessoa_id && this.fields.pessoa_id.valid }">
    <label for="pessoa_id"
           class="col-form-label text-center col-md-4 col-lg-3">{{ trans('admin.post.columns.pessoa_id') }}</label>
    <div class="col-md-8 col-lg-9">

        <multiselect
        v-model="form.pessoa"
        :options="pessoas"
        :multiple="false"
        track-by="id"
        label="nome"
        tag-placeholder="{{ __('Select Pessoa') }}"
        placeholder="{{ __('Select Pessoa') }}">
        </multiselect>

        <div v-if="errors.has('pessoa_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('pessoa_id') }}
        </div>
    </div>
</div>


