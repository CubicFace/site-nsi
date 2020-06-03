app=new Vue({
    el:'#main',
    vuetify: new Vuetify(),
    data:{
        darkMode:false,
        drawerEnabled:false,
        contactEnabled:false,
        logIn:false,
        signUp:false,
        carouselItems:[
            {src:"https://www.scharles.net/wp-content/uploads/2018/01/IMG_7276-e1520330263441.jpg"},
        ],
        carouselPlaceholder:[
            "red","pink","blue","cyan","indigo","purple"
        ]
    }
})

setInterval(function(){
    app.$vuetify.theme.dark=app.darkMode
})

setInterval(function(){
    if(app.$vuetify.theme.isDark){
        document.getElementById("header").style.backgroundColor="#2e2d2d";
        document.getElementsByClassName('front-title')[0].style.color="#ffffff";
    }
    else{
        document.getElementById("header").style.backgroundColor="#f2f2f2";
        document.getElementsByClassName('front-title')[0].style.color="#000000";
    };
});

original_title=document.title

setInterval(function(){
    if(app.contactEnabled){
        document.title="NSI | Saint-Charles || Contact / Se connecter"
    }
    else{
        document.title=original_title
    }
})