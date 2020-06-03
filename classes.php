<!DOCTYPE html>
<html lang="fr">
    
    <head>
        
        <title>NSI | Saint-Charles || Nos Classes</title>
        <?php include "includes/head.html"?>
    </head>
    


    <body>
        <div id="main">
            <v-app >

                <?php include "includes/header.html" ?>

            <!-- Il faut trouvé je pense des img pour illustrer un peu la page d'accueil -->

                <?php include "includes/vuetify/nav-drawer.html" ?>
                
                <?php include "includes/vuetify/dialogs/contact.php" ?>

                <?php include "includes/footer.html" ?>
            </v-app>
        </div>

    </body>
    <?php include "includes/vuetify/js.html" ?>
    <?php
    if(isset($_GET['dark']) && $_GET['dark']==true){
        echo "<script>app.darkMode=true</script>";
    }
    ?>
</html>