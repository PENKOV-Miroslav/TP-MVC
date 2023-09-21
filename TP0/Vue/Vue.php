<?php
function afficherAccueil() {
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<title>Accueil</title>';

    echo '<link rel="stylesheet" type="text/css" href="Contenu/style.css">';
    echo '</head>';
    echo '<body>';
    echo '<h1>Accueil</h1>';
    // Contenu de la page d'accueil
    echo'<div class="accueil-container">';
    echo '<a href="index.php?action=equipe_create">Créer une équipe</a><br>';
    echo '<br>';
    echo '<a href="index.php?action=ligue_create">Créer une ligue</a><br>';
    echo '<br>';
    echo '<a href="index.php?action=joueur_create">Créer un joueur</a><br>';
    echo '<br>';
    echo '<a href="index.php?action=membre_create">Lier un Joueur à une Equipe</a><br>';
    echo'</div>';
    echo '<br>';
    echo '</body>';
    echo '</html>';
}

function afficherFormulaireEquipe() {
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<title>Créer une équipe</title>';
    echo '<link rel="stylesheet" type="text/css" href="Contenu/style.css">';
    echo '</head>';
    echo '<body>';
    echo '<h1>Créer une équipe</h1>';
    echo '<form method="post">';
    echo 'Nom de l\'équipe : <input type="text" name="nom"><br>';
    echo 'Nom du président : <input type="text" name="president"><br>';
    echo 'L\'Identifiant de la Ligue : <input type="text" name="idligue"><br>';
    echo '<input type="submit" value="Créer">';
    echo '</form>';
    echo '<br>';
    echo '<a href="index.php?action=equipe_liste">Liste des équipes</a><br>';
    echo '</body>';
    echo '</html>';
}

function afficherListeEquipes($equipes) {
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<title>Liste des équipes</title>';
    echo '<link rel="stylesheet" type="text/css" href="Contenu/style.css">';
    echo '</head>';
    echo '<body>';
    echo '<h1>Liste des équipes</h1>';
    echo '<ul>';
    foreach ($equipes as $equipe) {
        echo '<li>' . $equipe['Nom'] . ' (Président : ' . $equipe['President'] . ')</li>';
    }
    echo '</ul>';
    echo '</body>';
    echo '</html>';
}

function afficherFormulaireLigue() {
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<title>Créer une ligue</title>';
    echo '<link rel="stylesheet" type="text/css" href="Contenu/style.css">';
    echo '</head>';
    echo '<body>';
    echo '<h1>Créer une ligue</h1>';
    echo '<form method="post">';
    echo 'Nom de la ligue : <input type="text" name="region"><br>';
    echo '<input type="submit" value="Créer">';
    echo '</form>';
    echo '<br>';
    echo '<a href="index.php?action=ligue_liste">Liste des Ligues</a><br>';
    echo '</body>';
    echo '</html>';
}

function afficherListeLigues($ligues) {
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<title>Liste des ligues</title>';
    echo '<link rel="stylesheet" type="text/css" href="Contenu/style.css">';
    echo '</head>';
    echo '<body>';
    echo '<h1>Liste des ligues</h1>';
    echo '<ul>';
    foreach ($ligues as $ligue) {
        echo '<li>' . $ligue['Region'] . '</li>';
    }
    echo '</ul>';
    echo '</body>';
    echo '</html>';
}

function afficherFormulaireJoueur() {
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<title>Créer un joueur</title>';
    echo '<link rel="stylesheet" type="text/css" href="Contenu/style.css">';
    echo '</head>';
    echo '<body>';
    echo '<h1>Créer un joueur</h1>';
    echo '<form method="post">';
    echo 'Nom du joueur : <input type="text" name="nom"><br>';
    echo 'Prénom du joueur : <input type="text" name="prenom"><br>';
    echo 'Date de naissance : <input type="text" name="date_naissance"><br>';
    echo '<input type="submit" value="Créer">';
    echo '</form>';
    echo '<br>';
    echo '<a href="index.php?action=joueur_liste">Liste des joueurs</a><br>';
    echo '</body>';
    echo '</html>';
}

function afficherListeJoueurs($joueurs) {
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<title>Liste des joueurs</title>';

    echo '<link rel="stylesheet" type="text/css" href="Contenu/style.css">';
    echo '</head>';
    echo '<body>';
    echo '<h1>Liste des joueurs</h1>';
    echo '<ul>';
    foreach ($joueurs as $joueur) {
        echo '<li>' . $joueur['Nom'] . ' ' . $joueur['Prenom'] . ' (Date de naissance : ' . $joueur['DateNaissance'] . ')</li>';
    }
    echo '</ul>';
    echo '</body>';
    echo '</html>';
}

function afficherFormulaireMembre() {
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<title>Lier des Membres</title>';

    echo '<link rel="stylesheet" type="text/css" href="Contenu/style.css">';
    echo '</head>';
    echo '<body>';
    echo '<h1>Créer un membre</h1>';
    echo '<form method="post">';
    echo 'ID du joueur : <input type="text" name="id_joueur"><br>';
    echo 'ID de l\'équipe : <input type="text" name="id_equipe"><br>';
    echo '<input type="submit" value="Créer">';
    echo '</form>';
    echo '<br>';
    echo '<a href="index.php?action=membre_liste">Liste des membres</a><br>';
    echo '</body>';
    echo '</html>';
}

function afficherListeMembres($membres) {
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<title>Liste des joueurs</title>';

    echo '<link rel="stylesheet" type="text/css" href="Contenu/style.css">';
    echo '</head>';
    echo '<body>';
    echo '<h1>Liste des membres</h1>';
    echo '<ul>';
    foreach ($membres as $membre) {
        echo '<li>ID du joueur : ' . $membre['ID_joueur'] . ', ID de l\'équipe : ' . $membre['ID_equipe'] . '</li>';
    }
    echo '</ul>';
    echo '</body>';
    echo '</html>';
}


?>
