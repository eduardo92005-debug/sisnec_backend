import AppForm from '../app-components/Form/AppForm';

Vue.component('endereco-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                bairro:  '' ,
                cep:  '' ,
                cidade:  '' ,
                complemento:  '' ,
                estado:  '' ,
                p__fisicas_id:  '' ,
                p__juridicas_id:  '' ,
                rua:  '' ,
                
            }
        }
    }

});