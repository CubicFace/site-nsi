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
                                    <v-card max-width="600px" class="mb-3">
                                        <v-card-title class="elevation-12">Se connecter</v-card-title>
                                    </v-card>
                                    <v-card max-width="600px" class="mt-3">
                                        <v-card-title class="elevation-12">S'inscrire</v-card-title>
                                    </v-card>
                                </div>
                            </v-card>

                        </v-dialog>