let impRegioes = document.getElementById('inpRegiao');
let inpTerritorio = document.getElementById('inpTerritorio');

impRegioes.addEventListener('change', function(){
    if (impRegioes.value != 0) {
        $.ajax({
            url: "/northwind/public/territory_all",
            method: "GET",
            data: { codigo: impRegioes.value }
        }).done(function(territorios){            
            inpTerritorio.innerHTML = territorios;

            inpTerritorio.disabled = false;
        });
    } else {
        inpTerritorio.innerHTML = null;
        inpTerritorio.disabled = true;
    }
});
