vm_vagas_main = new Vue({
    el: "#listVagasHome",
    data: {
        vagas: []
    },
    methods: {
        fetchVagas() {
            let parans = {
                params: {
                    "ordened": false,
                    "limit": 3,
                    "filterPlano": true
                }
            }
            axios.get(`${globalConfigs.hostApi}/vagas`, parans)
                .then(r => this.vagas = r.data)
                .catch(r => console.log(r));
        }
    },
    created() {
        console.log("vagas_main say hello!");
        this.fetchVagas();
    }
});