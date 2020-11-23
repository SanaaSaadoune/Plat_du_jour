<?php 
include '../Model/DataBase.php';

    $nom = $prenom = $num = $adresse ="";
    $Success ="";


        // $dateDay=date("2020-11-22");
        // $dateDay = date('Y-m-d', strtotime($dateDay. ' + 1 days'));

        $stmt2 = $db->prepare("SELECT id_plat, image_plat, p1.nom_plat, p2.nom_plat , prix_plat FROM plat as
        p1, plat_du_jour as p2 WHERE p1.nom_plat = p2.nom_plat ");
        $stmt2->execute(array());
        $plats = $stmt2->fetch();
        $id_plat = $plats->id_plat;
        $nom_plat = $plats->nom_plat;
        $prix_plat = $plats->prix_plat;
        $image_plat = $plats->image_plat;
    

        //Effectuer une commande
    	if(isset($_POST['Commander'])){
            $nom = $_POST['nom'];
            $prenom  = $_POST['prenom'];
            $num = $_POST['num'];
            $adresse = $_POST['adresse']; 
            
            $stmt = $db->prepare("INSERT INTO client ( nom, prenom, numero, adresse) VALUES (?,?, ?,?)");
            $stmt->execute(array($nom, $prenom, $num, $adresse ));

            $stmt1 = $db->prepare("SELECT MAX(id_client) AS id_client FROM client");
            $stmt1->execute(array());
            $client = $stmt1->fetch();
            $id_client=  $client->id_client;


            $stmt3 = $db->prepare("INSERT INTO commande ( id_plat, id_client, date_com) VALUES (?, ?,?)");
            $stmt3->execute(array($id_plat, $id_client,date("Y-m-d H:i:s")));

            
            $Success ="<br> <br> <div class='alert alert-success' role='alert'> Commande bien effectuée ! </div>" .
            header('refresh:2;url=Home.php');

            require_once('../phpmailer/PHPMailerAutoload.php');

            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = '465';
            $mail->isHTML();
            $mail->Username = 'sanaasaadoune11@gmail.com';
            $mail->Password = '*******';
            $mail->SetFrom('no-reply@sanaa.com');
            $mail->Subject = 'Order';
            $mail->Body = '<h1 align=center>'.$_POST['nom'].' '.$_POST['prenom'].', num : '.$_POST['num'].', plat : '.$_POST['nom_plat'].', l\'adresse : '.$_POST['adresse'].'</h1>';
            $mail->AddAddress('1sanaasaadoune@gmail.com');
  
            $mail->Send();
      
        }   

