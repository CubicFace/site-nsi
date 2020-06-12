<v-dialog v-model="contactEnabled" max-width="600px">
    <v-card>
        <v-toolbar flat>
            <v-btn icon text>
                <v-icon @click="contactEnabled=false">mdi-close</v-icon>
            </v-btn>
        </v-toolbar>
        <v-card-title>Contact</v-card-title>
        <v-card-text>Vous pouvez contacter le prof par e-mail ou vous rendre sur le site de Saint-Charles!</v-card-text>
        <div class="d-flex flex-lg-row flex-md-row flex-column  justify-space-around py-5 align-center">
            <v-btn class="mb-lg-0 mb-md-0 mb-2" max-width="300px" href="https://scharles.net">Site de Saint-Charles</v-btn>
            <v-btn class="mt-lg-0 mt-md-0 mt-2" max-width="300px" href="mailto:thedjplays.gaming@gmail.com">Envoyer un e-mail au prof</v-btn>
        </div>
        <v-divider></v-divider>
        <v-card-title>Se connecter au site</v-card-title>
        <v-card-text>Vous pouvez vous connecter à un espace personnel sur le site afin de pouvoir interargir avec celui-ci!</v-card-text>
        <div class="d-flex flex-lg-row flex-md-row flex-column  justify-space-around py-5 align-center">
            <v-btn class="mb-lg-0 mb-md-0 mb-2" max-width="300px" @click.stop="logIn=!logIn">Se connecter / S'inscrire</v-btn>
        </div>

        <?php include "login.php" ?>

    </v-card>
</v-dialog>