<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pessoa.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'required|email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.pessoa.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pessoa.columns.nome') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}" id="nome" name="nome" placeholder="{{ trans('admin.pessoa.columns.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('telefone_1'), 'has-success': fields.telefone_1 && fields.telefone_1.valid }">
    <label for="telefone_1" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pessoa.columns.telefone_1') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.telefone_1" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('telefone_1'), 'form-control-success': fields.telefone_1 && fields.telefone_1.valid}" id="telefone_1" name="telefone_1" placeholder="{{ trans('admin.pessoa.columns.telefone_1') }}">
        <div v-if="errors.has('telefone_1')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('telefone_1') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('telefone_2'), 'has-success': fields.telefone_2 && fields.telefone_2.valid }">
    <label for="telefone_2" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pessoa.columns.telefone_2') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.telefone_2" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('telefone_2'), 'form-control-success': fields.telefone_2 && fields.telefone_2.valid}" id="telefone_2" name="telefone_2" placeholder="{{ trans('admin.pessoa.columns.telefone_2') }}">
        <div v-if="errors.has('telefone_2')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('telefone_2') }}</div>
    </div>
</div>


