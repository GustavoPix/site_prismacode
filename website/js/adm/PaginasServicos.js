(function Pagina(){
    async function Update()
    {

        await SendAdmin.sendContent("titulo","servicos",document.getElementById("titulo").value);
        window.location.reload();
    }
    

    window.Pagina = {
        update:Update
    }
})();