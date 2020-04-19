(function Login(){

    async function Login()
    {
        formData = new FormData();
        formData.append("email",document.getElementById('login_email').value);
        formData.append("password",document.getElementById('login_password').value);
        await axios.post(`${GlobalConfigs.hostApi}/api/login`,formData)
        .then(r => {
            if(r.data.success)
            {
                window.location = "./paginas/home";
            }
            else
            {
                window.location.reload();
            }
        })
        .catch(r => {
            alert("Erro");
            debugger
        })
    }

    window.Login = {
        login:Login
    }
})();