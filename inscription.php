<?php
$dossier = "stockimage";
$connexion;
if(isset( $_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['age']) && 
isset($_POST['date_de_naissance']) && isset($_POST['promotion']) && isset($_POST['annee_de_certification']) 
&& isset($_POST['numero']) && isset($_FILES['image'])){
       $nom = $_POST['nom'];
       $prenom = $_POST['prenom'];
       $email = $_POST['email'];
       $age = $_POST['age'];
       $date_de_naissance = $_POST['date_de_naissance'];
       $promotion = $_POST['promotion']; 
       $annee_de_certification = $_POST['annee_de_certification'];
       $numero = $_POST['numero'];

       try{
        $connexion = new PDO("mysql:host=localhost; dbname= tp_html_php", "root","");
        $connexion ->setAttributer(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $locationfile = strtolower($dossier.$nom.".".pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));
        if(move_uploaded_file($_FILES["image"]["tmp_name"],$locationfile)){
          $photo = "htpp://localhost/tp_HTML_CSS_JS_et_PHP".$locationfile;
          $query = $connexion->prepare(" INSERT INTO apprenants(id, nom,  prenom, date_de_naissance,  age,  annee_de_certification, 
          promotion, numero, email, matriculet, photo ) VALUES(:id, :nom, :prenom, :date_de_naissance, :age,  :annee_de_certification, 
          :promotion, :numero, :email, :matricule, :photo)");
          $matricule = $promotion.mt_rand(1111,9999);
          $id = null;
          $query->execute([
            ':id' =>$id,
            ':nom'=>$nom,
            ':prenom'=>$prenom,
            ':date_de_naissance'=>$date_de_naissance,
            ':age'=>$age,
            ':annee_de_certification'=>$annee_de_certification,
            ':promotion'=>$promotion,
            ':numero'=>$numero,
            ':email'=>$email,
            ':matricule'=>$matricule,
            ':photo'=>$photo
          ]);
          echo "Inscription reussie"
        }else{
          echo"Incorrect"
        }
       
       }catch(PDOExeption $e){
        echo"Pas de connexion".$e->getMessage();
        die();
       }
}
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//   $nom = $_POST['nom'];
//   $prenom = $_POST['prenom'];
//   $email = $_POST['email'];
//   $nom = $_POST['age'];
//   $prenom = $_POST['date_de_naissance'];
//   $email = $_POST['promotion']; 
//   $prenom = $_POST['annee_de_certification'];
//   $email = $_POST['numero'];
//   echo "Inscription réussie !";
//}
?>
