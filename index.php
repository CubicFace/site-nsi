<!DOCTYPE html>
<html lang="fr">
    
    <head>
        
        <title>NSI | Saint-Charles</title>
        <?php include "includes/head.html"?>
    </head>
    <body>
        <div id="main">
            <v-app >

                <?php include "includes/header.html" ?>

                <v-carousel
                cycle
                height="450px"
                show-arrows
                show-arrows-on-hover
                >
                    <v-carousel-item
                    v-for="item in carouselItems"
                    :src="item.src"
                    >
                    </v-carousel-item>
                    <v-carousel-item
                    v-for="color in carouselPlaceholder"
                    >
                        <v-sheet
                        :color="color"
                        height="100%"
                        >
                            <v-row
                            class="fill-height"
                            align="center"
                            justify="center"
                            >
                                <div class="display-3">Insérer image</div>
                            </v-row>
                        </v-sheet>

                    </v-carousel-item>
                </v-carousel>
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