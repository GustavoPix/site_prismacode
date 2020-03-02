const vm_contactForm = new Vue({
    el: "#contactForm",
    data: {
        nome: "",
        email: "",
        mensagem: "",
        error: "",
        page: 0
    },
    methods: {
        nextPage() {
            if (this.page == 0) {
                if (!this.nome) {
                    this.error = "Por favor digite o seu nome.";
                }
                else if (!this.email) {
                    this.error = "Por favor digite o seu e-mail.";
                }
                else if (!this.mensagem) {
                    this.error = "Por favor digite uma mesnagem.";
                }
                else {
                    this.page++;
                    let formData  = new FormData();

                    formData.append('nome',this.nome);
                    formData.append('email',this.email);
                    formData.append('mensagem',this.mensagem);

                    axios.post(`${globalConfigs.hostApi}/api/message`,formData)
                    .then(r => {
                        if(r.data.success)
                        {
                            this.error = "";
                            this.page++;
                        }
                        else
                        {
                            this.page--;
                            this.error = r.data;
                        }
                    })
                    .catch(r => {
                        this.page--;
                        this.error = r;
                    });
                }
            }
        }
    }
});