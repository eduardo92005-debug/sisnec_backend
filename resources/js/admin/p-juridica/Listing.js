import AppListing from '../app-components/Listing/AppListing';

Vue.component('p-juridica-listing', {
    mixins: [AppListing],
    data() {
        return {
            showPessoasFilter: false,
            pessoasMultiselect: {},
    
            filters: {
                pessoas: [],
            },
        }
    },
    watch: {
        showPessoasFilter: function (newVal, oldVal) {
            this.pessoasMultiselect = [];
        },
        pessoasMultiselect: function(newVal, oldVal) {
            this.filters.pessoas = newVal.map(function(object) { return object['key']; });
            this.filter('pessoas', this.filters.pessoas);
        }
    }
});