<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SGTF - Tournois Disponibles</title>

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
					$id_tournoi=$_POST['choix_id_tournoi']; //on recupere le tournoi choisi
				?>

				<!-- on affiche les données concernant le tournoi choisi -->
				<table id="tab" style ="text-align:center">
					<caption class="text-center policy2">Informations concernant le tournoi choisi :</caption>
						<colgroup>
							<col span="1" width="150"/>
							<col span="1" width="150"/>
							<col span="1" width="100"/>
							<col span="1" width="150"/>
							<col span="1" width="100"/>
							<col span="1" width="150"/>
							<col span="1" width="150"/>
							<col span="1" width="200"/>
							<col span="1" width="150"/>
						</colgroup>

					<thead style ="text-align:center">
						<tr>
							<th style ="text-align:center">Date</th>
							<th style ="text-align:center">Tournoi</th>
							<th style ="text-align:center">Console</th>
							<th style ="text-align:center">Adresse</th>
							<th style ="text-align:center">Code Postal</th>
							<th style ="text-align:center">Ville</th>
							<th style ="text-align:center">Organisateur :</th>
							<th style ="text-align:center">Nom</th>
							<th style ="text-align:center">Prénom</th>
							<th style ="text-align:center">E-mail</th>
							<th style ="text-align:center">Tél.</th>
						</tr>
					</thead>

					<tbody>
						<?php 
							$req = $db->prepare('select date_tournoi, nom_tournoi, rue_tournoi, ville_tournoi, cp_tournoi, console_tournoi, nom_orga, prenom_orga, mail_orga, tel_orga from tournoi, organisateur where tournoi.id_orga = organisateur.id_orga and id_tournoi=:id_tournoi');					
							$req->execute(array('id_tournoi'=>$id_tournoi));
							$donnees = $req->fetch();
						?>
						<tr>
							<td><?php echo ($donnees['date_tournoi']); ?></td>
							<td><?php echo ($donnees['nom_tournoi']); ?></td>
							<td><?php echo ($donnees['console_tournoi']); ?></td>
							<td><?php echo ($donnees['rue_tournoi']); ?></td>
							<td><?php echo ($donnees['cp_tournoi']); ?></td>
							<td><?php echo ($donnees['ville_tournoi']); ?></td>
							<td></td>
							<td><?php echo ($donnees['nom_orga']); ?></td>
							<td><?php echo ($donnees['prenom_orga']); ?></td>
							<td><?php echo ($donnees['mail_orga']); ?></td>
							<td><?php echo ($donnees['tel_orga']); ?></td>
						</tr>	

						
					</tbody>
				</table>
				</br>
				</br>
				<center> <!-- on affiche les joueurs participant au tournoi selectionner -->
					<table id="tab" style ="text-align:center">
						<caption class="text-center policy2">Voici les joueurs participant au tournoi :</caption>
							<colgroup>
								<col span="1" width="150"/>
								<col span="1" width="150"/>
								<col span="1" width="150"/>
								<col span="1" width="150"/>
							</colgroup>
	
						<thead style ="text-align:center">
							<tr>
								<th style ="text-align:center">Nom</th>
								<th style ="text-align:center">Prénom</th>
								<th style ="text-align:center">E-mail</th>
								<th style ="text-align:center">N°Tél.</th>
							</tr>
						</thead>

						<tbody>
							<?php 
								$req2 = $db->prepare('select nom_joueur, prenom_joueur, mail_joueur, tel_joueur from joueur, inscription where inscription.id_tournoi=:id_tournoi and inscription.id_joueur=joueur.id_joueur order by nom_joueur');					
								$req2->execute(array('id_tournoi'=>$id_tournoi));
								while ($donnees = $req2->fetch())
								{	
							?>
							<tr>
								<td><?php echo ($donnees['nom_joueur']); ?></td>
								<td><?php echo ($donnees['prenom_joueur']); ?></td>
								<td><?php echo ($donnees['mail_joueur']); ?></td>
								<td><?php echo ($donnees['tel_joueur']); ?></td>
							</tr>	
							<?php
								}
							?>
											
						</tbody>
					</table>
				</center>

                
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
		</br>
                    <li>Par Gabriel Artigues, IG3, 2015 </li>
                </ul>
				</div>
	
</footer>
</html>
