(function Pagina(){
    async function Read(id)
    {

        
        formData = new FormData();
        formData.append("id",id);
        
        await axios.post(`${GlobalConfigs.hostApi}/api/adm/projeto/marcarlida`,formData)
        .then(r => {
            window.location.reload();
        })
        .catch(r => {
            alert("Erro");
            debugger
        })
    }
    window.Pagina = {
        read:Read
    }
})();