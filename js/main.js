app=new Vue({
    el:'#main',
    vuetify: new Vuetify(),
    data:{
        darkMode:false,
        drawerEnabled:false,
        contactEnabled:false,
        logIn:false,
        signIn:false,
    }
})

setInterval(function(){
    if(app.darkMode){
        document.getElementById("header").style.backgroundColor="#2e2d2d";
        document.body.style.color="#ffffff";
    }
    else{
        document.getElementById("header").style.backgroundColor="#f2f2f2";
        document.body.style.color="#000000";
    }
})