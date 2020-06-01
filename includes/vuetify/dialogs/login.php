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
                                <div class="d-flex flex-column my-6 align-center">
                                    <v-card>
                                        <v-card-title max-width="600px" class="elevation-12">Se connecter</v-card-title>
                                    </v-card>
                                </div>
                            </v-card>

                        </v-dialog>