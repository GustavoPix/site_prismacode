(function Pagina(){
    async function Update()
    {

        await SendAdmin.sendContent("titulo","projetos",document.getElementById("titulo").value);
        await SendAdmin.sendContent("sobre","projetos",document.getElementById("sobre").value);
        window.location.reload();
    }
    

    window.Pagina = {
        update:Update
    }
})();