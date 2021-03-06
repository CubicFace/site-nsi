<v-dialog fullscreen v-model="logIn" transition="dialog-bottom-transition">
    <v-card tile class="align-center justify-center text-center">
        <v-toolbar :flat="darkMode">
            <v-btn icon @click="logIn=false">
                <v-icon>mdi-close</v-icon>
            </v-btn>
            <v-toolbar-title>Se connecter</v-toolbar-title>
        </v-toolbar>
        <div class="d-flex flex-column my-6 align-center justify-space-around">
            <v-card min-width="350px" max-width="400px" class="mb-3 elevation-12">
                <v-card-title>Se connecter</v-card-title>
                <v-form ref="loginForm" v-model="formModels.loginValid" class="mx-5 mb-5">
                    <v-text-field v-model="formModels.loginEmail" :rules="formRules.email" :disabled="formModels.loading" label="E-mail" type="email" required></v-text-field>
                    <v-text-field v-model="formModels.loginPassword" :rules="formRules.loginPassword" :disabled="formModels.loading" label="Mot de passe" type="password" required></v-text-field>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn :disabled="!formModels.loginValid || formModels.loading" depressed :loading="formModels.loading" color="light-blue" @click="loginValidate">Se connecter</v-btn>
                    </v-card-actions>
                </v-form>
            </v-card>
        </div>
        <v-btn text @click="register=true">Ou s'inscrire</v-btn>
    </v-card>

    <?php include "register.html"?>
    <?php include "loginStatus.html" ?>
</v-dialog>