<?php

try {
    $database = new PDO('mysql:host=localhost;dbname=twitter', 'root', '');
    if (isset($_POST['user']) && !empty($_POST['user'])) {
        $user = $_POST['user'];




        $request = $database->prepare(
            'SELECT id FROM users WHERE pseudo = :pseudo'
        );
        $request->execute([
            'pseudo' => $user
        ]);
        $userId = $request->fetchColumn();


        $request = $database->prepare(
            'DELETE FROM tweets WHERE author_id = :user_id'

        );

        $request->execute([
            'user_id' => $userId,

        ]);
    } else {
        throw new Exception("User doesn\'t exist");
    }

    header('Location:http://localhost/?user=' . $user);
    exit();
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}













