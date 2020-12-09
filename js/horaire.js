$(function() {
    $( ".maclasse" ).click(function() {
        var id = $(this).data('id');
        var description = $(this).data('description');
        $description= "aucune information supplémentaire";

            afficherPopupInformationAutoFermant($description);

    });
});


/*
pour le formulaire
 */
$(function () {

    $('#monformulaire :input:first').focus();

});

$(function() {
    $( "#boutonEnvoi" ).click(function() {
        afficherPopupConfirmationSubmit("Les infos saisies sont elles correctes ?",)
    });
});

$(function() {
    $( "td" ).click(function() {

        // ici, $(this) représente la balise <td> sur laquelle l'usager a cliqué
        var id = $(this).data('id');
        var description = $(this).data('description');

    });
});


