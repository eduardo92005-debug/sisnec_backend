import AppForm from '../app-components/Form/AppForm';

Vue.component('veiculo-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                p__fisicas_id:  '' ,
                p__juridicas_id:  '' ,
                
            }
        }
    }

});