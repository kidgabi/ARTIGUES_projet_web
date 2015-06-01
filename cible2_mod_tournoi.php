<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SGTF - Tournoi Modifié</title>

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
               
			    
			  <?php 
				//on vérifie quel(s) champ(s) ont été rempli par l'orga pour pouvoir les modifier
				$id_tournoi=$_POST['id_tournoi'];
			   
			   if (strlen($_POST['nom_tournoi'])!=0) {
					$maj_nom_tournoi=$db->prepare('update tournoi set nom_tournoi=:nom_tournoi where id_tournoi =:id_tournoi ');
					$maj_nom_tournoi->execute(array( 'nom_tournoi'=>$_POST['nom_tournoi'], 'id_tournoi'=>$_POST['id_tournoi']));
				}
				
				if (strlen($_POST['date_tournoi'])!=0) {
					$maj_date_tournoi=$db->prepare('update tournoi set date_tournoi=:date_tournoi where id_tournoi =:id_tournoi ');
					$maj_date_tournoi->execute(array( 'date_tournoi'=>$_POST['date_tournoi'], 'id_tournoi'=>$_POST['id_tournoi']));
				}
				
				if (strlen($_POST['rue_tournoi'])!=0) {
					$maj_rue_tournoi=$db->prepare('update tournoi set rue_tournoi=:rue_tournoi where id_tournoi =:id_tournoi ');
					$maj_rue_tournoi->execute(array( 'rue_tournoi'=>$_POST['rue_tournoi'], 'id_tournoi'=>$_POST['id_tournoi']));
				}
				
				if (strlen($_POST['cp_tournoi'])!=0) {
					$maj_cp_tournoi=$db->prepare('update tournoi set cp_tournoi=:cp_tournoi where id_tournoi =:id_tournoi ');
					$maj_cp_tournoi->execute(array( 'cp_tournoi'=>$_POST['cp_tournoi'], 'id_tournoi'=>$_POST['id_tournoi']));
				}
				
				if (strlen($_POST['ville_tournoi'])!=0) {
					$maj_ville_tournoi=$db->prepare('update tournoi set ville_tournoi=:ville_tournoi where id_tournoi =:id_tournoi ');
					$maj_ville_tournoi->execute(array( 'ville_tournoi'=>$_POST['ville_tournoi'], 'id_tournoi'=>$_POST['id_tournoi']));
				}
				
				if (strlen($_POST['console_tournoi'])!=0) {
					$maj_console_tournoi=$db->prepare('update tournoi set console_tournoi=:console_tournoi where id_tournoi =:id_tournoi ');
					$maj_console_tournoi->execute(array( 'console_tournoi'=>$_POST['console_tournoi'], 'id_tournoi'=>$_POST['id_tournoi']));
				}
				
				if (strlen($_POST['nb_joueurs_max'])!=0) {
					$maj_nb_joueurs_max=$db->prepare('update tournoi set nb_joueurs_max=:nb_joueurs_max where id_tournoi =:id_tournoi ');
					$maj_nb_joueurs_max->execute(array( 'nb_joueurs_max'=>$_POST['nb_joueurs_max'], 'id_tournoi'=>$_POST['id_tournoi']));
				}
				
				if (strlen($_POST['mdp_tournoi'])!=0) {
					$maj_mdp_tournoi=$db->prepare('update tournoi set mdp_tournoi=:mdp_tournoi where id_tournoi =:id_tournoi ');
					$maj_mdp_tournoi->execute(array( 'mdp_tournoi'=>$_POST['mdp_tournoi'], 'id_tournoi'=>$_POST['id_tournoi']));
				}
			?>
			
			<p> Merci, ton tournoi vient d'être mis à jour </p>
			
	
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