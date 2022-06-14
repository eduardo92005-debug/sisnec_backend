<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cnpj'), 'has-success': fields.cnpj && fields.cnpj.valid }">
    <label for="cnpj" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.p-juridica.columns.cnpj') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cnpj" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cnpj'), 'form-control-success': fields.cnpj && fields.cnpj.valid}" id="cnpj" name="cnpj" placeholder="{{ trans('admin.p-juridica.columns.cnpj') }}">
        <div v-if="errors.has('cnpj')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cnpj') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nome_fantasia'), 'has-success': fields.nome_fantasia && fields.nome_fantasia.valid }">
    <label for="nome_fantasia" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.p-juridica.columns.nome_fantasia') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome_fantasia" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nome_fantasia'), 'form-control-success': fields.nome_fantasia && fields.nome_fantasia.valid}" id="nome_fantasia" name="nome_fantasia" placeholder="{{ trans('admin.p-juridica.columns.nome_fantasia') }}">
        <div v-if="errors.has('nome_fantasia')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome_fantasia') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('inscricao_estadual'), 'has-success': fields.inscricao_estadual && fields.inscricao_estadual.valid }">
    <label for="inscricao_estadual" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.p-juridica.columns.inscricao_estadual') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.inscricao_estadual" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('inscricao_estadual'), 'form-control-success': fields.inscricao_estadual && fields.inscricao_estadual.valid}" id="inscricao_estadual" name="inscricao_estadual" placeholder="{{ trans('admin.p-juridica.columns.inscricao_estadual') }}">
        <div v-if="errors.has('inscricao_estadual')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('inscricao_estadual') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('razao_social'), 'has-success': fields.razao_social && fields.razao_social.valid }">
    <label for="razao_social" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.p-juridica.columns.razao_social') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.razao_social" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('razao_social'), 'form-control-success': fields.razao_social && fields.razao_social.valid}" id="razao_social" name="razao_social" placeholder="{{ trans('admin.p-juridica.columns.razao_social') }}">
        <div v-if="errors.has('razao_social')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('razao_social') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('pessoa_id'), 'has-success': fields.pessoa_id && fields.pessoa_id.valid }">
    <label for="pessoa_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.p-juridica.columns.pessoa_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.pessoa_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('pessoa_id'), 'form-control-success': fields.pessoa_id && fields.pessoa_id.valid}" id="pessoa_id" name="pessoa_id" placeholder="{{ trans('admin.p-juridica.columns.pessoa_id') }}">
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


