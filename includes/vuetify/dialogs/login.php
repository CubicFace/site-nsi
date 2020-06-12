<v-dialog
                        fullscreen
                        v-model="logIn"
                        
                        transition="dialog-bottom-transition"
                        >
                            <v-card tile>
                                <v-toolbar
                                
                                :flat="darkMode"
                                >
                                    <v-btn
                                    icon
                                    @click="logIn=false">
                                        <v-icon>mdi-close</v-icon>
                                    </v-btn>
                                    <v-toolbar-title>Se connecter / S'inscrire</v-toolbar-title>
                                </v-toolbar>
                                <div class="d-flex flex-column my-6 align-center justify-space-around">
                                    <v-card min-width="350px" max-width="400px" class="mb-3 elevation-12">
                                        <v-card-title>Se connecter</v-card-title>
                                            <v-form ref="loginForm" v-model="formModels.loginValid" class="mx-5">
                                                <v-text-field
                                                v-model="formModels.loginEmail"
                                                :rules="formRules.email"
                                                label="E-mail"
                                                type="email"
                                                required
                                                ></v-text-field>
                                                <v-text-field
                                                v-model="formModels.loginPassword"
                                                label="Mot de passe"
                                                type="password"
                                                required
                                                ></v-text-field>
                                            </v-form>
                                    </v-card>
                                    <v-card max-width="360px" class="mt-3 elevation-12">
                                        <v-card-title>S'inscrire</v-card-title>
                                    </v-card>
                                </div>
                            </v-card>

                        </v-dialog>