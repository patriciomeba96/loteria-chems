(async function () {
    "use strict";
    
    colocarTablero();
    
    window.onload=function(){
        document.getElementById("T1").onclick=frijol;
        document.getElementById("T2").onclick=frijol;
        document.getElementById("T3").onclick=frijol;
        document.getElementById("T4").onclick=frijol;
        document.getElementById("T5").onclick=frijol;
        document.getElementById("T6").onclick=frijol;
        document.getElementById("T7").onclick=frijol;
        document.getElementById("T8").onclick=frijol;
        document.getElementById("T9").onclick=frijol;
        document.getElementById("T10").onclick=frijol;
        document.getElementById("T11").onclick=frijol;
        document.getElementById("T12").onclick=frijol;
        document.getElementById("T13").onclick=frijol;
        document.getElementById("T14").onclick=frijol;
        document.getElementById("T15").onclick=frijol;
        document.getElementById("T16").onclick=frijol;
        document.getElementById("botonInicio").onclick=frijol; 
        document.getElementById("botonLoteria").onclick=frijol;
    }
    
})();

let puño = [];
var owo = 0;
var h = 0;

function colocarTablero(){
    let cartas = [];
    var carta;
    carta = getRandomInt(53) + 1;
    cartas[0] = carta;

    /* for(var i = 1; i < 16; i++){
        carta = getRandomInt(53) + 1;
        for(var c = 0; c < cartas.length; ){
            if(cartas[c] == carta ){
                carta = getRandomInt(53) + 1;
                c = 0;
            }else if(cartas[0] == carta){
                carta = getRandomInt(53) + 1;
                c = 0;
            }
            else{
                c++;
            }
        }
        cartas[i] = carta;    
    } */

    for(var i = 1; i < 16; i++){
        
        carta = getRandomInt(53) + 1;
        for(var c = 0; c < cartas.length; c++ ){
            if(cartas[c] == carta){   
                carta = getRandomInt(53) + 1; 
                c = 0;
            }                
        }
        cartas[i] = carta; 
        
    };

    for(var j = 0; j < 16; j++ ){
        var ingresa = document.getElementById("T"+(j+1));
        ingresa.src="img/"+cartas[j]+".jpg";
        ingresa.alt=cartas[j];
    }
    
};

async function correrMazo(){
    let mazo = [];
    
    var nueva;
    var ya = false;
    nueva = getRandomInt(53) + 1; 
    mazo[0] = nueva;
    

    for(var z = 1; z < 54; z++){
        
        nueva = getRandomInt(53) + 1;
        for(var y = 0; y < mazo.length; y++ ){
            if(mazo[y] == nueva){   
                nueva = getRandomInt(53) + 1; 
                y = 0;
            }                
        }
        mazo[z] = nueva; 
        
    };
   
    for( h = 0; h < 54; h++){
    
        var ingresa = document.getElementById("T");
        ingresa.src="img/"+mazo[h]+".jpg";
        console.log(mazo[h]);
        puño[h] = mazo[h];
        await sleep(5000);
    }
   ya = true;
   return ya;
    
};

function sleep(ms) {
    return new Promise(
      resolve => setTimeout(resolve, ms)
    );
};

function getRandomInt(max) {
    return Math.floor(Math.random() * Math.floor(max));
};

async function iniciar(){   
    correrMazo();
    var cambioBarra = document.getElementById('barra-animada');
    var cambioBoton = document.getElementById('botonInicio');

    document.getElementById("botonLoteria").style.display = 'block';
    document.getElementById("botonInicio").style.display = 'none';

    
    

    cambioBarra.className = 'prendido';
    

    await sleep(270000);

    
    cambioBarra.className = 'apagado';
};

function colocarFicha(xd){
    var tocada = document.getElementById("T"+xd);
    for(var p = 0; p < puño.length; p++){
        if(tocada.className == "gris"){
            
        }
        else if(tocada.alt == puño[p]){
            tocada.className = "gris";
            
            owo ++;
            document.getElementsByClassName("puntos")[0].innerHTML = (owo + " / 16");
            break;
        }
        else{
            
        }
    }
   // return 0;
};

function loteria(){
    if(owo == 16){
        
        document.getElementById("barra-animada").className = "apagado";
        alert("You Win");
        document.getElementById("T").src="img/stop.png";
        h = 100;
        
    }
};

