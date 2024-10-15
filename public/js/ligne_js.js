function envoyerFormulaire() {
    var selectProduit = document.getElementsByName('nom_produit')[0],
        selectLigne = document.getElementsByName('nom_ligne')[0],
        dateProduction = document.getElementById("date_production"),
        qltProduit = document.getElementById("qlt_produit"),
        msg=document.getElementById('msg'),
        msg1=document.getElementById('msg1'),
        msg2=document.getElementById('msg2'),
        msg2=document.getElementById('msg3');

     if (selectLigne.value === '#') {
        msg.innerHTML='veuillez choisi une ligne';
        msg.style.color='red';
        event.preventDefault();
    } else {
        msg.innerHTML='';
    }

    if (dateProduction.value === "") {
        msg1.innerHTML='veuillez entrer une date';
        msg1.style.color='red';
        event.preventDefault();
    }
    else{
        msg1.innerHTML='';
    }

    if (selectProduit.value === '#') {
        msg2.innerHTML='veuillez choisi un produit';
        msg2.style.color='red';
        event.preventDefault();
    } else {
        msg2.innerHTML='';
    }

    if (qltProduit.value === '#') {
        msg3.innerHTML='veuillez choisi une qualite';
        msg3.style.color='red';
        event.preventDefault();
    } else {
        msg3.innerHTML='';
    }

    if(selectLigne.value != '#' && selectProduit.value != '#' && dateProduction.value != "" && qltProduction.value != ""){
       document.getElementById('mon_formulaire').submit();
    }
}




//liste des produits
document.addEventListener("DOMContentLoaded", function() {
    const nom_produit = document.querySelector("#nom_produit");
    const qlt_produit = document.querySelector("#qlt_produit");

    nom_produit.addEventListener("change", function() {
        const produit = this.value;
        qlt_produit.innerHTML = "";
        if (produit === "map") {
            const options = ["tarik", "ism", "ttt", "iii"];
            options.forEach(function(opt) {
                const option = document.createElement("option");
                option.value = opt;
                option.textContent = opt;
                qlt_produit.appendChild(option);
            });
        } else if (produit === "dap") {
            const options = ["a", "b", "c", "d"];
            options.forEach(function(opt) {
                const option = document.createElement("option");
                option.value = opt;
                option.textContent = opt;
                qlt_produit.appendChild(option);
            });
        } else if (produit === "tsp") {
            const options = ["tsp"];
            options.forEach(function(opt) {
                const option = document.createElement("option");
                option.value = opt;
                option.textContent = opt;
                qlt_produit.appendChild(option);
            });
        } else if (produit === "npk") {
            const options = ["x", "y", "z"];
            options.forEach(function(opt) {
                const option = document.createElement("option");
                option.value = opt;
                option.textContent = opt;
                qlt_produit.appendChild(option);
            });
        }
    });
});