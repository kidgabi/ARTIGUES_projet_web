<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SGTF - Modification Tournoi</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<?php include ("connexion_bd.php");?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Accueil</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
					<li>
                        <a href="a_propos.php">À propos</a>
                    </li>
                    <li>
                        <a href="modif_tournoi.php">Modifier Tournoi</a>
                    </li>
					 <li>
                        <a href="suppression.php">Supprimer Tournoi</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
               <p> Rempli les champs à modifier </p>
			   <?php
			   //on recupere les données du tournoi à modifier
				   $id_tournoi=$_POST['choix_id_tournoi'];
				  
					$req=$db->prepare('select nom_tournoi, date_tournoi, rue_tournoi, cp_tournoi, ville_tournoi, console_tournoi, nb_joueurs_max, mdp_tournoi from tournoi where id_tournoi=:id_tournoi');
					$req->execute(array( 'id_tournoi'=>$id_tournoi));
					$ligne=$req->fetch();
					$nom_tournoi=$ligne['nom_tournoi'];
					$date_tournoi=$ligne['date_tournoi'];
					$rue_tournoi=$ligne['rue_tournoi'];
					$cp_tournoi=$ligne['cp_tournoi'];
					$ville_tournoi=$ligne['ville_tournoi'];
					$console_tournoi=$ligne['console_tournoi'];
					$nb_joueurs_max=$ligne['nb_joueurs_max'];
					$mdp_tournoi=$ligne['mdp_tournoi'];
			   ?>
			   
			   <!-- on crée un formulaire prérempli avec les données du tournoi à modifier -->
			   <form method="post" action="cible2_mod_tournoi.php">
			   <input type="hidden" name="id_tournoi" value="<?php echo $id_tournoi ?>" /> <!-- on crée un input caché afin de récupérer l'id du tournoi et de le transmettre à la page suivante -->
					<fieldset>
						<legend> Tournoi </legend>
							<p>
							<p>Nom <input type="text" name="nom_tournoi" placeholder="<?php echo $nom_tournoi ?>" />     Date <input type="datetime-local" name="date_tournoi" value="<?php echo $date_tournoi ?>" /></p>
							<p>Adresse <input type="text" name="rue_tournoi" placeholder="<?php echo $rue_tournoi ?>" />   Code Postal <input type="text" name="cp_tournoi" placeholder="<?php echo $cp_tournoi ?>" />   Ville <input type="text" name="ville_tournoi" placeholder="<?php echo $ville_tournoi ?>" /> </p>
							<p>Console <select name="console_tournoi" >
											<option value="Xbox 360" <?php if ("Xbox 360"==$console_tournoi) {echo 'selected';} ?> >Xbox 360</option>
											<option value="PS3" <?php if ("PS3"==$console_tournoi) {echo 'selected';} ?> >PS3</option>
											<option value="Xbox One" <?php if ("Xbox One"==$console_tournoi) {echo 'selected';} ?> >Xbox One</option>
											<option value="PS4" <?php if ("PS4"==$console_tournoi) {echo 'selected';} ?> >PS4</option>
										</select> 
						   Nombre de joueurs maximum <input type="number" min=2 name="nb_joueurs_max" placeholder="<?php echo $nb_joueurs_max ?>" /></p>
						   <p>Mot de passe <input type="password" name="mdp_tournoi" placeholder="<?php echo $mdp_tournoi ?>" />
					</fieldset>
					</br>
				<input type="submit" value="Valider" />
				</form>
			
			
	
	</div>
</body>

	

	
	
	

               
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	

</body>

<footer>
<div class="col-lg-12 text-center">
		<ul class="list-unstyled">
		</br>
                    <li>Par Gabriel Artigues, IG3, 2015 </li>
                </ul>
				</div>
	
</footer>

</html>