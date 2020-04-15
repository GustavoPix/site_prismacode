(function Pagina(){
    async function Update()
    {

        await SendAdmin.sendContent("titulo","contato",document.getElementById("titulo").value);
        await SendAdmin.sendContent("email","contato",document.getElementById("email").value);
        await SendAdmin.sendContent("instagram","contato",document.getElementById("instagram").value);
        await SendAdmin.sendContent("facebook","contato",document.getElementById("facebook").value);
        window.location.reload();
    }
    

    window.Pagina = {
        update:Update
    }
})();