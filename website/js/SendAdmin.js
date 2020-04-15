(function SendAdmin(){
    async function SendContent(name,pagina,text)
    {
        formData = new FormData();
        formData.append("name",name);
        formData.append("pagina",pagina);
        formData.append("text",text);
        await axios.post(`${GlobalConfigs.hostApi}/api/adm/updateContent`,formData)
        .then(r => {})
        .catch(r => {
            alert("Erro");
            debugger
        })
    }

    window.SendAdmin = {
        sendContent:SendContent
    }
})();