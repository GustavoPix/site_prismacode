const vm_newProjectForm = new Vue({
    el: "#newProjectForm",
    data: {
        menuOpen: false,
        page: 0,
        nome: "",
        email: "",
        telefone: "",
        empresa: "",
        tipo_projeto: "",
        mensagem: "",
        files: 0,
        errorPage1: "",
        errorPage2: ""
    },
    methods: {
        open() {
            this.menuOpen = true;
        },
        activeFileChange() {
            FilesHome.fileInputChanged();
        },
        setFilesQta(qta) {
            this.files = qta;
        },
        nextPage() {
            if (this.page == 0) {
                if (!this.nome) {
                    this.errorPage1 = "Por favor digite o seu nome.";
                }
                else if (!this.email) {
                    this.errorPage1 = "Por favor digite o seu e-mail.";
                }
                else {
                    this.errorPage1 = "";
                    this.page++;
                }

            }
            else if (this.page == 1) {
                if (!this.tipo_projeto) {
                    this.errorPage2 = "Escolha o tipo de projeto que gostaria de fazer."
                }
                else if (!this.mensagem) {
                    this.errorPage2 = "Descreva um pouco sobre o seu projeto."
                }
                else {
                    this.page++;
                    let formData  = new FormData();

                    formData.append('nome',this.nome);
                    formData.append('email',this.email);
                    formData.append('telefone',this.telefone);
                    formData.append('empresa',this.empresa);
                    formData.append('pretencao_projeto',this.tipo_projeto);
                    formData.append('mensagem',this.mensagem);

                    let files = FilesHome.getFiles();

                    for(let i = 0; i < files.length; i++)
                    {
                        formData.append('userfile[]',files[i]);
                    }

                    axios.post(`${globalConfigs.hostApi}/api/message_project`,formData)
                    .then(r => {
                        if(r.data.success)
                        {
                            this.errorPage2 = "";
                            this.page++;
                        }
                        else
                        {
                            this.page--;
                            this.errorPage2 = r.data;
                        }
                    })
                    .catch(r => {
                        this.page--;
                        this.errorPage2 = r;
                    });
                }
            }
        }
    },
    filters: {
        fil_files(qta) {
            return qta > 0 ? (qta > 1 ? `${qta} arquivos selecionados` : FilesHome.getFirsmNameFile()) : "Nenhum arquivo selecionado";
        }
    }
});

(function FilesHome() {

    let files = [];

    let typesAccepts = [
        "doc",
        "pdf",
        "txt",
        "jpg",
        "png"
    ]

    function SetFiles(_files) {
        files = [];
        for (let i = 0; i < _files.length; i++) {
            let name = _files[i].name.split('.');
            let extension = name[name.length - 1];
            if (typesAccepts.find(t => t == extension.toLowerCase())) {
                files.push(_files[i]);
            }
        }

        vm_newProjectForm.setFilesQta(files.length);
    }

    function GetFilesQta() {
        return files.length;
    }
    function GetFirsmNameFile() {
        return files[0].name;
    }
    function GetFiles()
    {
        return files;
    }

    function FileInputChanged() {
        let $input = document.getElementById('file_project');
        SetFiles($input.files);
    }


    window.FilesHome = {
        fileInputChanged: FileInputChanged,
        getFilesQta: GetFilesQta,
        getFirsmNameFile: GetFirsmNameFile,
        getFiles:GetFiles
    }
})();