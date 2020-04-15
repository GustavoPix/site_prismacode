(function Pagina(){
    async function Update()
    {

        await SendAdmin.sendContent("titulo","home",document.getElementById("titulo").value);
        await SendAdmin.sendContent("sobre","home",document.getElementById("sobre").value);
        await SendAdmin.sendContent("solucoes","home",document.getElementById("solucoes").value);
        window.location.reload();
    }
    

    window.Pagina = {
        update:Update
    }
})();