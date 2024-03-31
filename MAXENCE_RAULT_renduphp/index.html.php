<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">


</head>

<body>

    <div class="header">
        <div class="logo"  style="color:white">X</div>
        <div class="menu">
            <a href="#">For you</a>
            <a href="#">Q</a>
            <a href="#">Explore</a>
            <a href="#">Notifications</a>
            <a href="#">Messages</a>
            <a href="#">...</a>
        </div>
    </div>

    <div class="content">
        <div class="sidebar">
            <div class="user-profile">
                <!-- Add user profile picture and information here -->
            </div>
            <div class="menu-list">
                <h3>Your account</h3>

                <img src="Image/Compte.jpg" alt="Compte" width="50%" />
                <!-- Vider le cache  du navigateur si le css ne fonctionne pas  -->
                <?php if (!empty($user)): ?>
                    <h3>@
                        <?= $user ?>
                    </h3>
                <?php endif; ?>

            </div>
        </div>
        <div class="container">

            <section class="feed">
                <form id="tweetForm" action="action.php" method="POST">
                    <?php if (!empty($user)): ?>
                        <input type="hidden" name="user" value="<?= $user ?>">
                    <?php endif; ?>
                    
                    <textarea placeholder="Ça tweet quoi ?" name="message"></textarea>
                    <button type="submit">Poster</button>
                </form>
                <ul>
                    <!-- Créer une boucle avec des li pour chaque skills, si acquis j'affiche une classe success sinon danger.

            La valeur de mon LI doit etre le nom de la compétence. -->
                </ul>
                <div class="tweets">
                    <!-- Les tweets seront ajoutés ici -->

                    <?php foreach ($tweets as $tweet): ?>

                        <div class="tweet">
                            <h1>
                                <?= $tweet['pseudo'] ?>
                            </h1>
                            <form action="delete.php" class="delete" method="post">
                                <?php if (!empty($user)): ?>
                                    <input type="hidden" name="user" value="<?= $user ?>">
                                <?php endif; ?>

                                <?php if (!empty($user) && $tweet['pseudo'] == $user): ?>
                                    <button type="submit"   >Supprimer</button>
                                <?php endif; ?>
                            </form>
                            <li>
                                
                                <?= $tweet['message'] ?>
                            </li>


                        </div>


                    <?php endforeach; ?>





                </div>
            </section>
        </div>



</body>

</html>