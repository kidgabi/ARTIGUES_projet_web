<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SGTF - Créer Tournoi</title>

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
			
               
					
			<!-- on crée un formulaire pour l'orga -->
				<form action="cible_orga.php" method="post">
					<fieldset>
						<legend> Tournoi </legend>
						<p>
						<p>Nom <input type="text" name="nom_tournoi" autofocus required/>     Date <input type="datetime-local" name="date_tournoi" required/></p>
						<p>Adresse <input type="text" name="rue_tournoi" required/>   Code Postal <input type="text" name="cp_tournoi" required/>   Ville <input type="text" name="ville_tournoi" required/> </p>
						<p>Console <select name="console_tournoi" required >
										<option value="Xbox 360">Xbox 360</option>
										<option value="PS3">PS3</option>
										<option value="Xbox One">Xbox One</option>
										<option value="PS4">PS4</option>
									</select> 
						Nombre de joueurs maximum <input type="number" min=2 name="nb_joueurs_max" required/></p>
					</fieldset>
					</p>
					</br>
					<p>
					<fieldset>
						<legend> Organisateur </legend>
						<p> Nom <input type="text" name="nom_orga" required/>  Prénom <input type="text" name="prenom_orga" required/> </p>
						<p> E-mail <input type="email" name="mail_orga" required/> N°Téléphone <input type="tel" name="tel_orga" required/></p>
						</p>
					</fieldset>
					</br>
					<input type="submit" value="Valider" />
				</form>
				</br>
				</br>
               
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