import AppForm from '../app-components/Form/AppForm';

Vue.component('p-fisica-form', {
    mixins: [AppForm],
    props: [
        'pessoas'
    ],
    data: function() {
        return {
            form: {
                cpf:  '' ,
                pessoa_id:  '' ,
                pessoa: '',
            }
        }
    },
});