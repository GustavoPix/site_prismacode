(function Pagina(){
    var toDelete = [];
    async function Update(id)
    {

        
        formData = new FormData();
        formData.append("title",document.getElementById(`title_${id}`).value);
        formData.append("text",document.getElementById(`text_${id}`).value);
        formData.append("id",id);
        await axios.post(`${GlobalConfigs.hostApi}/api/adm/updateProcesso`,formData)
        .then(r => {
            
        })
        .catch(r => {
            alert("Erro");
            debugger
        })
        window.location.reload();
    }
    async function Adicionar()
    {
        formData = new FormData();
        formData.append("title",document.getElementById(`title_new`).value);
        formData.append("text",document.getElementById(`text_new`).value);
        
        await axios.post(`${GlobalConfigs.hostApi}/api/adm/processo`,formData)
        .then(r => {
        })
        .catch(r => {
            alert("Erro");
            debugger
        })
        window.location.reload();
    }
    async function Delete(id)
    {
        formData = new FormData();
        formData.append("id",id);
        
        await axios.post(`${GlobalConfigs.hostApi}/api/adm/processo/delete`,formData)
        .then(r => {
        })
        .catch(r => {
            alert("Erro");
            debugger
        })
        window.location.reload();
    }
    
    

    window.Pagina = {
        update:Update,
        adicionar:Adicionar,
        delete:Delete
    }
})();