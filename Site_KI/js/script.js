

// function verifieNom(){
//     var regex = /[A-Za-z -']$/;
//     var valeur = document.getElementById('nom').value;

//     if( regex.test(valeur) && (valeur.length>=2)){
//         document.getElementById('nom').style.background ='#ccffcc';
//         document.getElementByID('NomSpan').style.display = "none";
//         return true;
//     }else{
//         // Style red
//         document.getElementById('nom').style.background ='orange';
//         // Show error prompt
//         document.getElementsByID('NomSpan').style.display = "block";
//         return false; 
//     }

// }

// function verifiePrenom(){
//     var regex = /[A-Za-z -']$/;
//     var id = 'prenom';
//     var valeur = document.getElementById(id).value.length;
    
//     if( valeur>=2){
//         document.getElementById(id).style.background ='#ccffcc';
//         document.getElementById('PrenomSpan').style.display = "none";
//         return true;
//     }else{
//         // Style red
//         document.getElementById(id).style.background ='orange';
//         // Show error prompt
//         document.getElementById('PrenomSpan').style.display = "block";
//         return false; 
//     }
        
// }

// function verifieAge(){
//     var id = 'age';
//     var valeur = document.getElementById(id).value;
//     var age = parseInt(valeur);
//     if( isNaN(age) || age<5 || age>140){
//         // Style red
//         document.getElementById(id).style.background ='orange';
//         // Show error prompt
//         document.getElementById('AgeSpan').style.display = "block";
//         return false;
//     }else{
//         document.getElementById(id).style.background ='#ccffcc';
//         document.getElementById('AgeSpan').style.display = "none";
//         return true;
//     }
        
// }

// function verifiePseudo(){
//     var id = 'pseudo';
//     var valeur = document.getElementById(id).value;
//     if( valeur.length>=4){
//         document.getElementById(id).style.background ='#ccffcc';
//         document.getElementById('PseudoSpan').style.display = "none";
//         return true;
//     }else{
//         // Style red
//         document.getElementById(id).style.background ='orange';
//         // Show error prompt
//         document.getElementById('PseudoSpan').style.display = "block";
//         return false;
//     }       
// }

// function verifieMdp(){
//     var id = 'mdp';
//     var valeur = document.getElementById(id).value;
//     if( valeur.length>=6){
//         document.getElementById(id).style.background ='#ccffcc';
//         document.getElementById('MdpSpan').style.display = "none";
//         return true;
//     }else{
//         // Style red
//         document.getElementById(id).style.background ='orange';
//         // Show error prompt
//         document.getElementById('MdpSpan').style.display = "block";
//         return false;
//     } 
// }

// function verifieCMdp(){
//     var id = 'cmdp';
//     var valeur = document.getElementById(id).value;
//     if( valeur.length>=6 && valeur == document.getElementById('mdp').value){
//         document.getElementById(id).style.background ='#ccffcc';
//         document.getElementById('CmdpSpan').style.display = "none";
//         return true;
//     }else{
//         // Style red
//         document.getElementById(id).style.background ='orange';
//         // Show error prompt
//         document.getElementById('CmdpSpan').style.display = "block";
//         return false;
//     } 
// }

// function verifiePays(){
//     var id = 'pays';

//     if( document.getElementById(id).selectedIndex !=0){
//         document.getElementById(id).style.background ='#ccffcc';
//         document.getElementById('PaysSpan').style.display = "none";
//         return true;
//     }else{
//         // Style red
//         document.getElementById(id).style.background ='orange';
//         // Show error prompt
//         document.getElementById('PaysSpan').style.display = "block";
//         return false;
//     } 
// }

// function verifieQuestion(){
//     if(document.getElementById('confirm').checked){
//         return true;
//     }
//     else{
//         document.getElementById('question').style.display = "block";
//         return false;
//     }
// }

// function verifieForm(){
//     var erreur = 0;
//     if(!verifieRadio()){
//         document.getElementById("RadioSpan").style.display="block";
//         erreur++;
    
//     }

//     if(!verifieNom()){
//         document.getElementById('NomSpan').style.display = "block";
//         erreur++;
//     }

//     if(!verifiePrenom()){
//         document.getElementById('PrenomSpan').style.display = "block";
//         erreur++;
//     }

//     if(!verifieAge()){
//         document.getElementById('AgeSpan').style.display = "block";
//         erreur++;
//     }

//     if(!verifiePseudo()){
//         document.getElementById('PseudoSpan').style.display = "block";
//         erreur++;
//     }

//     if(!verifieMdp()){
//         document.getElementById('MdpSpan').style.display = "block";
//         erreur++;
//     }

//     if(!verifieCMdp()){
//         document.getElementById('CmdpSpan').style.display = "block";
//         erreur++;
//     }

//     if(!verifiePays()){
//         document.getElementById('pays').style.display = "block";
//         erreur++;
//     }

//     if(!verifieQuestion()){
//         document.getElementById('question').style.display = "block";
//         erreur++;
//     }
    
//     if(erreur>0){
//         return false;
//     }
// }
// function verifieForm(){
//     var erreur = 0;
//     if(!verifieRadio()){
//         document.getElementById("RadioSpan").style.display="block";
//         erreur++;
    
//     }

//     if(!verifieNom()){
//         document.getElementById('NomSpan').style.display = "block";
//         erreur++;
//     }

//     if(!verifiePrenom()){
//         document.getElementById('PrenomSpan').style.display = "block";
//         erreur++;
//     }

//     if(!verifieAge()){
//         document.getElementById('AgeSpan').style.display = "block";
//         erreur++;
//     }

//     if(!verifiePseudo()){
//         document.getElementById('PseudoSpan').style.display = "block";
//         erreur++;
//     }

//     if(!verifieMdp()){
//         document.getElementById('MdpSpan').style.display = "block";
//         erreur++;
//     }

//     if(!verifieCMdp()){
//         document.getElementById('CmdpSpan').style.display = "block";
//         erreur++;
//     }

//     if(!verifiePays()){
//         document.getElementById('pays').style.display = "block";
//         erreur++;
//     }

//     if(!verifieQuestion()){
//         document.getElementById('question').style.display = "block";
//         erreur++;
//     }
    
//     if(erreur>0){
//         return false;
//     }
//     else{
//         return true;
//     }


// }






function verifieNom(){
  var regex = /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/;
  var valeur = document.getElementById("nom").value;
  document.getElementById("demo").innerHTML = valeur;

  if( regex.test(valeur) && (valeur.length>=2)){
      document.getElementById("nom").style.background ='#ccffcc';
      document.getElementById('NomSpan').style.display = "none";
      return true;
  }else{
      // Style red
      document.getElementById("nom").style.background ='orange';
      // Show error prompt
      document.getElementById('NomSpan').style.display = "block";
      return false; 
  }

}

function verifiePrenom(){
  var regex = /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/;
  var id = 'prenom';
  var valeur = document.getElementById(id).value;
  
  if( regex.test(valeur) && (valeur.length>=2)){
      document.getElementById(id).style.background ='#ccffcc';
      document.getElementById('PrenomSpan').style.display = "none";
      return true;
  }else{
      // Style red
      document.getElementById(id).style.background ='orange';
      // Show error prompt
      document.getElementById('PrenomSpan').style.display = "block";
      return false; 
  }
      
}

function verifieLieuExercice(){
  var regex = /[0-9]{1,3}(?:(?:[,. ]){1}[-a-zA-Zàâäéèêëïîôöùûüç]+)+$/;
  var id = 'lieu_exercice';
  var valeur = document.getElementById(id).value;
  
  if( regex.test(valeur) && (valeur.length>=5)){
      document.getElementById(id).style.background ='#ccffcc';
      document.getElementById('PrenomSpan').style.display = "none";
      return true;
  }else{
      // Style red
      document.getElementById(id).style.background ='orange';
      // Show error prompt
      document.getElementById('PrenomSpan').style.display = "block";
      return false; 
  }
      
}

function  verifieCodePostale(){
  var regex = /[0-9]$/;
  var id = 'code_postale';
  var valeur = document.getElementById(id).value;
  
  if( regex.test(valeur) && (valeur.length==5)){
      document.getElementById(id).style.background ='#ccffcc';
      document.getElementById('PrenomSpan').style.display = "none";
      return true;
  }else{
      // Style red
      document.getElementById(id).style.background ='orange';
      // Show error prompt
      document.getElementById('PrenomSpan').style.display = "block";
      return false; 
  }
}

function  verifieVille(){
  var regex = /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/;
  var id = 'ville';
  var valeur = document.getElementById(id).value;
  
  if( regex.test(valeur) && (valeur.length>=2)){
      document.getElementById(id).style.background ='#ccffcc';
      document.getElementById('PrenomSpan').style.display = "none";
      return true;
  }else{
      // Style red
      document.getElementById(id).style.background ='orange';
      // Show error prompt
      document.getElementById('PrenomSpan').style.display = "block";
      return false; 
  }
}

function verifieTel(){
  var regex = /^(0[1-68])(?:[ _.-]?(\d{2})){4}$/;
  var id = 'tel';
  var valeur = document.getElementById(id).value;
  
  if( regex.test(valeur) && (valeur.length==10)){
      document.getElementById(id).style.background ='#ccffcc';
      document.getElementById('PrenomSpan').style.display = "none";
      return true;
  }else{
      // Style red
      document.getElementById(id).style.background ='orange';
      // Show error prompt
      document.getElementById('PrenomSpan').style.display = "block";
      return false; 
  }
}

function verifieEmail(){
      var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
      var id = 'email';
      var valeur = document.getElementById(id).value;
      
      if( regex.test(valeur)){
          document.getElementById(id).style.background ='#ccffcc';
          document.getElementById('PrenomSpan').style.display = "none";
          return true;
      }else{
          // Style red
          document.getElementById(id).style.background ='orange';
          // Show error prompt
          document.getElementById('PrenomSpan').style.display = "block";
          return false; 
      }
}


document.getElementById('submit_div').disabled = true; 
// function verifieForm(){
        var verify="false";
        if(verifieNom()){
        if( verifiePrenom()){
            if(verifieLieuExercice()){
                if(verifieCodePostale()){
                    if(verifieVille()){
                        if(verifieTel()){
                            if(verifieEmail()){
                                document.getElementById('submit_div').disabled = false;
                                verify="true";
                            }
                        }
                    }
                }
            }
        }
        }

        if(verify =="false"){
        // $('#submit_div')
        // .html('<button class="btn btn-primary" type="submit" id="submit_button" disabled>Envoyer</button>');
        // document.getElementById().innerHTML = '<button class="btn btn-primary" type="submit" id="submit_button" disabled>Envoyer</button>';
        document.getElementById('submit_div').disabled = true; 
        }
// }

