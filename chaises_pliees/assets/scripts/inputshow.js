document.addEventListener('DOMContentLoaded', function() {
    var el = document.getElementById('date');
    var elt = document.getElementById('sujet');
    // Vérifier si la date est définie et différente de null
    if (el.value !== "") {
        elt.value = "precommande";
        document.getElementById('precommande').style.display = 'block';
    }
    // Ajouter un écouteur d'événement à l'élément date
    el.addEventListener('change', function() {
        // Si la date est sélectionnée, afficher le bloc precommande
        if (this.value !== "") {
            elt.value = "precommande";
            document.getElementById('precommande').style.display = 'block';
        } else {
            // Sinon, masquer le bloc precommande
            document.getElementById('precommande').style.display = 'none';
        }
    });
});