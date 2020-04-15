(function Pagina(){
    async function Update()
    {

        await SendAdmin.sendContent("titulo","sobre",document.getElementById("titulo").value);
        await SendAdmin.sendContent("objetivo","sobre",document.getElementById("objetivo").value);
        window.location.reload();
    }
    

    window.Pagina = {
        update:Update
    }
})();