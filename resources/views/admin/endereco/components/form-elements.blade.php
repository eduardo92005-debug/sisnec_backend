<div class="form-group row align-items-center" :class="{'has-danger': errors.has('bairro'), 'has-success': fields.bairro && fields.bairro.valid }">
    <label for="bairro" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.endereco.columns.bairro') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.bairro" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('bairro'), 'form-control-success': fields.bairro && fields.bairro.valid}" id="bairro" name="bairro" placeholder="{{ trans('admin.endereco.columns.bairro') }}">
        <div v-if="errors.has('bairro')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bairro') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cep'), 'has-success': fields.cep && fields.cep.valid }">
    <label for="cep" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.endereco.columns.cep') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cep" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cep'), 'form-control-success': fields.cep && fields.cep.valid}" id="cep" name="cep" placeholder="{{ trans('admin.endereco.columns.cep') }}">
        <div v-if="errors.has('cep')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cep') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cidade'), 'has-success': fields.cidade && fields.cidade.valid }">
    <label for="cidade" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.endereco.columns.cidade') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cidade" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cidade'), 'form-control-success': fields.cidade && fields.cidade.valid}" id="cidade" name="cidade" placeholder="{{ trans('admin.endereco.columns.cidade') }}">
        <div v-if="errors.has('cidade')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cidade') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('complemento'), 'has-success': fields.complemento && fields.complemento.valid }">
    <label for="complemento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.endereco.columns.complemento') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.complemento" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('complemento'), 'form-control-success': fields.complemento && fields.complemento.valid}" id="complemento" name="complemento" placeholder="{{ trans('admin.endereco.columns.complemento') }}">
        <div v-if="errors.has('complemento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('complemento') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('estado'), 'has-success': fields.estado && fields.estado.valid }">
    <label for="estado" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.endereco.columns.estado') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.estado" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('estado'), 'form-control-success': fields.estado && fields.estado.valid}" id="estado" name="estado" placeholder="{{ trans('admin.endereco.columns.estado') }}">
        <div v-if="errors.has('estado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('estado') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('p__fisicas_id'), 'has-success': fields.p__fisicas_id && fields.p__fisicas_id.valid }">
    <label for="p__fisicas_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.endereco.columns.p__fisicas_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.p__fisicas_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('p__fisicas_id'), 'form-control-success': fields.p__fisicas_id && fields.p__fisicas_id.valid}" id="p__fisicas_id" name="p__fisicas_id" placeholder="{{ trans('admin.endereco.columns.p__fisicas_id') }}">
        <div v-if="errors.has('p__fisicas_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('p__fisicas_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('p__juridicas_id'), 'has-success': fields.p__juridicas_id && fields.p__juridicas_id.valid }">
    <label for="p__juridicas_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.endereco.columns.p__juridicas_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.p__juridicas_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('p__juridicas_id'), 'form-control-success': fields.p__juridicas_id && fields.p__juridicas_id.valid}" id="p__juridicas_id" name="p__juridicas_id" placeholder="{{ trans('admin.endereco.columns.p__juridicas_id') }}">
        <div v-if="errors.has('p__juridicas_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('p__juridicas_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('rua'), 'has-success': fields.rua && fields.rua.valid }">
    <label for="rua" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.endereco.columns.rua') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.rua" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('rua'), 'form-control-success': fields.rua && fields.rua.valid}" id="rua" name="rua" placeholder="{{ trans('admin.endereco.columns.rua') }}">
        <div v-if="errors.has('rua')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('rua') }}</div>
    </div>
</div>


