const vm_servicos = new Vue({
    el: "#servicosOferecidos",
    data: {
        servicoSelecionado: 0
    },
    methods: {
        selectService(i) {
            this.servicoSelecionado = this.servicoSelecionado == i ? 0 : i;
        }
    }
});