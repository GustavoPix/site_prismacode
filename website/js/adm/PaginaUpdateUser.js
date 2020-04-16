(function Pagina(){
    async function Update(id)
    {

        
        formData = new FormData();
        formData.append("name",document.getElementById("name").value);
        formData.append("sobre",document.getElementById("sobre").value);
        formData.append("linkedin",document.getElementById("linkedin").value);
        formData.append("github",document.getElementById("github").value);
        formData.append("id",id);
        
        await axios.post(`${GlobalConfigs.hostApi}/api/adm/updateUser`,formData)
        .then(r => {
            window.location.reload();
        })
        .catch(r => {
            alert("Erro");
            debugger
        })
    }
    async function Adicionar()
    {

        
        formData = new FormData();
        formData.append("name",document.getElementById("name").value);
        formData.append("sobre",document.getElementById("sobre").value);
        formData.append("linkedin",document.getElementById("linkedin").value);
        formData.append("github",document.getElementById("github").value);
        
        await axios.post(`${GlobalConfigs.hostApi}/api/adm/addUser`,formData)
        .then(r => {
            window.location.reload();
        })
        .catch(r => {
            alert("Erro");
            debugger
        })
    }
    

    window.Pagina = {
        update:Update,
        adicionar:Adicionar
    }
})();