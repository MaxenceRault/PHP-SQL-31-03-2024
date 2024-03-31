<?php 

$user = isset($_GET['user']) ? $_GET['user'] : 'Utilisateur inconnu';

$message = isset($_GET[ 'message' ])?$_GET["message"]:"";


try  {
    $database = new PDO('mysql:host=localhost;dbname=twitter','root','');

    $request = $database->prepare(
        'SELECT tweets.message,users.pseudo FROM tweets LEFT JOIN users ON users.id = tweets.author_id'
    );
    $request->execute();
    
    $tweets = $request->fetchAll(PDO::FETCH_ASSOC);
    


    require_once 'index.html.php';
} catch(Exception $e) {
    die("Erreur de connexion à la base de données");
}

