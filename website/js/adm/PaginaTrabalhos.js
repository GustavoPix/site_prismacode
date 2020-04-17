(function Pagina(){
    var toDelete = [];
    async function Update(id)
    {

        
        formData = new FormData();
        formData.append("name",document.getElementById("name").value);
        formData.append("tipo",document.getElementById("tipo").value);
        formData.append("site",document.getElementById("site").value);
        formData.append("projeto",document.getElementById("projeto").value);
        formData.append("features",document.getElementById("features").value);
        formData.append("solucao",document.getElementById("solucao").value);
        formData.append("resultado",document.getElementById("resultado").value);
        formData.append("id",id);
        await axios.post(`${GlobalConfigs.hostApi}/api/adm/updateTrabalho`,formData)
        .then(r => {
            
        })
        .catch(r => {
            alert("Erro");
            debugger
        })
        var tecnologias = document.getElementById("tecnologias").value.split(',');
        for(var i = 0; i < tecnologias.length; i++)
        {
            if(tecnologias[i].trim() != "")
            {
                await AddTecnologia(tecnologias[i].trim(),id);
            }
        }
        for(var i = 0; i < toDelete.length; i++)
        {
            if(toDelete[i] != "")
            {
                await RemoveTecnologia(toDelete[i]);
            }
        }
        window.location.reload();
    }
    async function AddTecnologia(tecnologia,idServico)
    {
        formData = new FormData();
        formData.append("name",tecnologia);
        formData.append("projeto",idServico);
        
        await axios.post(`${GlobalConfigs.hostApi}/api/adm/tecnologiaTrabalho`,formData)
        .then(r => {
        })
        .catch(r => {
            alert("Erro");
            debugger
        })
    }
    async function RemoveTecnologia(tecnologia)
    {
        formData = new FormData();
        formData.append("id",tecnologia);
        
        await axios.post(`${GlobalConfigs.hostApi}/api/adm/tecnologiaTrabalho/delete`,formData)
        .then(r => {
        })
        .catch(r => {
            alert("Erro");
            debugger
        })
    }
    function pushDelete(id)
    {
        toDelete.push(id);
        document.getElementById(`tecnologia_${id}`).innerHTML = "";
    }




    async function Adicionar()
    {

        
        formData = new FormData();
        formData.append("name",document.getElementById("name").value);
        formData.append("tipo",document.getElementById("tipo").value);
        formData.append("site",document.getElementById("site").value);
        formData.append("projeto",document.getElementById("projeto").value);
        formData.append("features",document.getElementById("features").value);
        formData.append("solucao",document.getElementById("solucao").value);
        formData.append("resultado",document.getElementById("resultado").value);
        
        var result = 0;
        await axios.post(`${GlobalConfigs.hostApi}/api/adm/trabalho`,formData)
        .then(r => {
            debugger
            result = r.data[0].id;
        })
        .catch(r => {
            alert("Erro");
            debugger
        })
        var tecnologias = document.getElementById("tecnologias").value.split(',');
        for(var i = 0; i < tecnologias.length; i++)
        {
            if(tecnologias[i].trim() != "")
            {
                await AddTecnologia(tecnologias[i].trim(),result);
            }
        }
        window.location.reload();
    }
    

    window.Pagina = {
        update:Update,
        adicionar:Adicionar,
        pushDelete:pushDelete
    }
})();