new Vue({
    el:'#main',
    vuetify: new Vuetify(),
    data:{
        drawerEnabled:false,
        drawerItems:[
            {title: 'Acceuil', icon:'mdi-home'},
            {title: 'Classes', icon:'mdi-teach'},
            {title: 'Contact', icon:'mdi-clipboard-user-outline'}
        ]
    }
})