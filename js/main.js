app=new Vue({
    el:'#main',
    vuetify: new Vuetify(),
    data:{
        darkMode:false,
        drawerEnabled:false,
        contactEnabled:false,
        logIn:false,
        signUp:false,
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