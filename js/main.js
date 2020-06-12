app = new Vue({
    el: '#main',
    vuetify: new Vuetify(),
    data: {
        test: 'klnsdoksndklvsfn',
        nonBool: false,
        darkMode: false,
        drawerEnabled: false,
        contactEnabled: false,
        logIn: false,
        signUp: false,
        carouselItems: [{
            src: "https://www.scharles.net/wp-content/uploads/2018/01/IMG_7276-e1520330263441.jpg"
        }, ],
        carouselPlaceholder: [
            "red", "pink", "blue", "cyan", "indigo", "purple", "indigo darken-3", "blue darken-4", "green", "lime darken-2", "yellow darken-4", "amber darken-4"
        ],

        formModels: {
            loginValid: false,
            loginLoading: false,
            regValid: false,
            regLoading: false,
            loginEmail: '',
            loginPassword: '',
            regEmail: '',
            regPassword: '',
            regName: '',
            statusSheet: false,
            sheetTitle: '',
            sheetMsg: '',
        },
        formRules: {
            email: [
                v => /[a-z0-9]+([-+._][a-z0-9]+){0,2}@.*?(\.(a(?:[cdefgilmnoqrstuwxz]|ero|(?:rp|si)a)|b(?:[abdefghijmnorstvwyz]iz)|c(?:[acdfghiklmnoruvxyz]|at|o(?:m|op))|d[ejkmoz]|e(?:[ceghrstu]|du)|f[ijkmor]|g(?:[abdefghilmnpqrstuwy]|ov)|h[kmnrtu]|i(?:[delmnoqrst]|n(?:fo|t))|j(?:[emop]|obs)|k[eghimnprwyz]|l[abcikrstuvy]|m(?:[acdeghklmnopqrstuvwxyz]|il|obi|useum)|n(?:[acefgilopruz]|ame|et)|o(?:m|rg)|p(?:[aefghklmnrstwy]|ro)|qa|r[eosuw]|s[abcdeghijklmnortuvyz]|t(?:[cdfghjklmnoprtvwz]|(?:rav)?el)|u[agkmsyz]|v[aceginu]|w[fs]|y[etu]|z[amw])\b){1,2}/.test(v) || 'Format e-mail invalide.'
            ],
            password: [
                v => v.length >= 5 || 'Le mot de passe doit contenir au moins 5 caractères'
            ],
            name: [
                v => v.length <= 100 || "Le nom est trop long",
                v => v.length >= 5 || "Le nom est trop court",
                v => /[A-Za-zÀ-ȕ0-9_ ]{5,100}/.test(v) || "Caractère invalide."
            ],
            loginPassword: [
                v => v.length > 0 || "Ce champ est requis."
            ]
        }

    },
    methods: {
        regValidate: function () {},
        loginValidate: function () {
            this.$data.formModels.loginLoading = true
            loginData = {
                "action": "login",
                "email": this.$data.formModels.loginEmail,
                "password": this.$data.formModels.loginPassword
            }
            if (this.$refs.loginForm.validate()) {
                var request = new XMLHttpRequest();
                request.open("POST", "api/loginApi", true);
                request.setRequestHeader("Content-Type", "application/json");
                request.onreadystatechange = function () {
                    if (request.readyState === 4) {
                        var response = JSON.parse(request.responseText);
                        switch (request.status) {
                            case 200:
                                app.$data.formModels.sheetTitle = "Vous êtes connecté!";
                                app.$data.formModels.sheetMsg = `Bienvenue ${response.name}`;
                                break;

                            case 400:
                                app.$data.formModels.sheetTitle = "Erreur (400: Bad request)";
                                app.$data.formModels.sheetMsg = `Erreur syntaxique de la requête. Message: '${response.status}'`;
                                break;

                            case 403:
                                app.$data.formModels.sheetTitle = "Erreur (403: Forbidden)";
                                app.$data.formModels.sheetMsg = "L'addresse e-mail ou le mot de passe entré est incorrect.";
                                break;

                            case 405:
                                app.$data.formModels.sheetTitle = "Erreur (405: Method Not Allowed)";
                                app.$data.formModels.sheetMsg = `La méthode de la requête n'est pas acceptée. Message: '${response.status}'`;
                                break;

                            default:
                                this.$data.formModels.sheetTitle = `Erreur (${request.status}: ${request.statusText})`
                                this.$data.formModels.sheetMsg = "Erreur inconnue.";

                                break;
                        };
                        app.$data.formModels.loginLoading = false
                        app.$data.formModels.statusSheet = true
                    };
                };
                var data = JSON.stringify(loginData);
                request.send(data);

            }
        }

    }
})

setInterval(function () {
    app.$vuetify.theme.dark = app.darkMode;
})

setInterval(function () {
    if (app.$vuetify.theme.isDark) {
        document.getElementById("header").style.backgroundColor = "#2e2d2d";
        document.getElementsByClassName('front-title')[0].style.color = "#ffffff";
    } else {
        document.getElementById("header").style.backgroundColor = "#f2f2f2";
        document.getElementsByClassName('front-title')[0].style.color = "#000000";
    };
});

original_title = document.title

setInterval(function () {
    if (app.contactEnabled) {
        document.title = "NSI | Saint-Charles || Contact / Se connecter"
    } else {
        document.title = original_title
    }
})