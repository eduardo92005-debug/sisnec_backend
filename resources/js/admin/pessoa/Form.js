import AppForm from '../app-components/Form/AppForm';

Vue.component('pessoa-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                email:  '' ,
                nome:  '' ,
                telefone_1:  '' ,
                telefone_2:  '' ,
                
            }
        }
    }

});