(function Pagina(){
    async function Update()
    {

        await SendAdmin.sendContent("o que fazemos","website",document.getElementById("o_que_fazemos").value);
        await SendAdmin.sendContent("o projeto","website",document.getElementById("o_projeto").value);
        window.location.reload();
    }
    

    window.Pagina = {
        update:Update
    }
})();