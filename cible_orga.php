<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SGTF - Tournoi créé</title>

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
               
					
				<p>
					<p>Merci <?php echo htmlspecialchars($_POST['prenom_orga']); ?> ! La création du tournoi "<?php echo htmlspecialchars($_POST['nom_tournoi']); ?>" pour le <?php echo htmlspecialchars($_POST['date_tournoi']); ?> a bien été prise en compte. Les joueurs peuvent désormais s'y inscrire !</p>
				</p>

				<?php
					
					$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					
						
					//insertion du formulaire de l'organisateur dans la base de données 
					$nom_orga=$_POST['nom_orga'];
					$prenom_orga=$_POST['prenom_orga'];
					$mail_orga=$_POST['mail_orga'];
					$tel_orga=$_POST['tel_orga'];
					$req_insert_orga = $db->prepare('INSERT INTO organisateur(nom_orga, prenom_orga, mail_orga, tel_orga) VALUES(:nom_orga, :prenom_orga, :mail_orga, :tel_orga)');
					$req_insert_orga->execute(array(
						'nom_orga' => $nom_orga,
						'prenom_orga' => $prenom_orga,
						'mail_orga' => $mail_orga,
						'tel_orga' => $tel_orga,
						));
					
					//on recupere l'id de l'orga qui vient d'être insérer
					$req=$db->prepare('select id_orga from organisateur where nom_orga=:nom_orga and mail_orga=:mail_orga');
					$req->execute(array(
						'nom_orga'=>$nom_orga,
						'mail_orga'=>$mail_orga
						));
					$ligne=$req->fetch();
					$id_orga=$ligne['id_orga'];
								
					
						
					//insertion du tournoi dans la bd
					$nom_tournoi=$_POST['nom_tournoi'];
					$date_tournoi=$_POST['date_tournoi'];
					$rue_tournoi=$_POST['rue_tournoi'];
					$cp_tournoi=$_POST['cp_tournoi'];
					$ville_tournoi=$_POST['ville_tournoi'];
					$console_tournoi=$_POST['console_tournoi'];
					$nb_joueurs_max=$_POST['nb_joueurs_max'];
						
					$req_insert_tournoi = $db -> prepare('INSERT INTO tournoi(nom_tournoi, date_tournoi, rue_tournoi, cp_tournoi, ville_tournoi, console_tournoi, nb_joueurs_max, id_orga) VALUES (:nom_tournoi, :date_tournoi, :rue_tournoi, :cp_tournoi, :ville_tournoi, :console_tournoi, :nb_joueurs_max, :id_orga)');
					$req_insert_tournoi -> execute(array(
						'nom_tournoi' => $nom_tournoi,
						'date_tournoi' =>$date_tournoi,
						'rue_tournoi'=>$rue_tournoi,
						'cp_tournoi'=>$cp_tournoi,
						'ville_tournoi'=>$ville_tournoi,
						'console_tournoi'=>$console_tournoi,
						'nb_joueurs_max'=>$nb_joueurs_max,
						'id_orga' =>$id_orga,
						));


				?>
                
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