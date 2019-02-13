<div id="fondNav">
    <div class="row"><div class="large-12 columns">
        <nav class="top-bar">
            <ul class="title-area">
                <!-- Title Area 
                <li class="name">
                    <h1><a href="index.php">Accueil</a></h1>
                </li>-->
                <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
            </ul>
			
            
        <section class="top-bar-section">
    <!-- Right Nav Section -->
	<?php 
	if (utilisateur_est_connecte()) {
	    $id_utilisateur = $_SESSION['id'] ;
		$login = $_SESSION['login'] ;
		switch ($login) {
			case "v" : 	echo "<ul class='left'>
						<li><a href='index.php'>Espace Visiteur</a></li>
						<li><a href='index.php?module=visiteur&amp;action=afficher_profil&amp;id=$id_utilisateur'>Afficher profil</a></li>
						<li><a href='index.php?module=visiteur&amp;action=modifier_profil&amp;id=$id_utilisateur'>Modifier profil</a></li>
						<li><a href='index.php?module=gestionFrais&amp;action=infos_ficheFrais&amp;id=$id_utilisateur'>Mes fiches de frais</a></li>
						<li><a href='index.php?module=gestionFrais&amp;action=ajout_ficheFrais&amp;id=$id_utilisateur'>Ajouter un frais</a></li>
						<li><a href='index.php?module=gestionFrais&amp;action=consultEtatFicheFrais&amp;id=$id_utilisateur'>Etat des fiches de frais</a></li>
						<li><a href='index.php?module=visiteurs&amp;action=deconnexion'>D&eacute;connexion</a></li>
						</ul>";
						break;
			case "c" : 	echo "<ul class='left'>
						<li><a href='index.php'>Espace Comptable</a></li>
						<li><a href='index.php?module=visiteurs&amp;action=afficher_profil&amp;id=$id_utilisateur'>Afficher profil</a></li>
						<li><a href='index.php?module=visiteurs&amp;action=modifier_profil&amp;id=$id_utilisateur'>Modifier profil</a></li>
						<li><a href='index.php?module=gestFrais&amp;action=test_Frm&amp;id=$id_utilisateur'>Consultation et validation des fiche de frais</a></li>
						<li><a href='index.php?module=gestFrais&amp;action=consultEtatFicheFraisCompt&amp;id=$id_utilisateur'>Gestion des fiche de Frais</a></li>
						<li><a href='index.php?module=visiteurs&amp;action=deconnexion'>D&eacute;connexion</a></li>
						</ul>";
						break;
						
			case "a" : 	echo "<ul class='left'>
						<li><a href='index.php'>Espace Administrateur</a></li>
						<li><a href='index.php?module=visiteurs&amp;action=afficher_profil&amp;id=$id_utilisateur'>Afficher profil</a></li>
						<li><a href='index.php?module=visiteurs&amp;action=modifier_profil&amp;id=$id_utilisateur'>Modifier profil</a></li>
						<li><a href='index.php?module=visiteurs&amp;action=deconnexion'>D&eacute;connexion</a></li>
						</ul>";
						break;
	        default :   echo "<ul class='left'>
			            <li>Espace privé</li>
						</ul>";
						break;
		}
	} else {
		// 22/01/2016
		echo "<ul>
			<li><a href='index.php'>Accueil</a></li>
			<li class='left'><a href='index.php?module=vitrine&amp;action=afficher_domaineEtude'>Domaine d'etude</a></li>
			<li class='left'><a href='index.php?module=vitrine&amp;action=afficher_presentation'>Qui sommes-nous?</a></li>
			<li class='left'><a href='index.php?module=vitrine&amp;action=afficher_lieu'>En France</a></li>";
        echo "
			<li class='right'><a href='index.php?module=visiteurs&amp;action=inscription'>Inscription</a></li>
			<li class='right'><a href='index.php?module=visiteurs&amp;action=connexion'>Connexion</a></li>
		</ul>";
	}
	?>
    </section>
	

		</nav>
    </div>
	
</div>
</div>
