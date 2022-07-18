import AppForm from '../app-components/Form/AppForm';

Vue.component('p-juridica-form', {
    mixins: [AppForm],
    props: [
        'pessoas'
    ],
    data: function() {
        return {
            form: {
                cnpj:  '' ,
                nome_fantasia:  '' ,
                inscricao_estadual:  '' ,
                razao_social:  '' ,
                pessoa:  '' ,
                
            }
        }
    }

});