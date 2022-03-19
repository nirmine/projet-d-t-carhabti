function validation_radio(champradio)
{
   
    for( var i=0;i<champradio.length;i++)
    {
        if (champradio[i].selected)
        {
            alert("Hello");
            return true;
            
        }

    }
   
      
}

function recherche(champradio,champtext)   //validation de formulaire de recherche multi critère des voitures et client
{
    if(!(validation_radio(champradio)) || (champtext.value==""))
    {
        alert("vous devrez saisir toutes les données");
        return false ;
    }

    
    return true;
}

function disponible3(d1,d2,model,marque) //validation de disponibilité entre deux dates pour marque donné
{

    if(!(model.value=="") || !(marque.value==""))
    {
        if((compare_d(d1,d2)))
    {
       return true; 
    }
    }
    alert("ilya des champs vides ");
    
    return false; 
   /* if(model.value=="")
    {
        alert("vérifier les données");
        return false;
    }
    if(marque.value=="")
    {
        alert("vérifier les données");
        return false;
    }
    if(d1.value=="")
    {
        alert("vérifier les données");
        return false;
    }
    if(d2.value=="")
    {
        alert("vérifier les données");
        return false;
    }
    if(!(compare_d(d1,d2)))
    {
        alert("vérifier les données");
        return false;
    }
    return true; */
}
function affiche(v1,v2,v3,v4)
{

    if(v3.value=="")
    {
        alert("vérifier les données");
        return false;
    }
    if(v4.value=="")
    {
        alert("vérifier les données");
        return false;
    }
    if(!(verif_pos(v1.value)) || (v1.value<100) || (v1.value>999))
    {
        alert("vérifier vos données");
        return false;
    }
    if(!(verif_pos(v2.value)) || (v2.value<1000) || (v2.value>9999))
    {
        alert("vérifier vos données");
        return false;
    }
    return true;
}

function verif_pos(num)   //verifier si une entrée est un entier et et positif
{
    var c= parseInt(num);
    if(c>0)
    {
       
        return true ; 
       
    }
   alert("Vérifier vos données les nombres doivent etre positfs ");
   return false;
}
function disponible2(d1,d2)  //validation de disponiblité entre deux dates
{
    console.log('disponible2');
    c1=d1.value;
    c2=d2.value;
    if(!(compare_d(d1,d2)))
    {
        return true;
    }
    else
    {
    alert(" ilya des champs vides ");
    return false;} 

}

function sup_voit(v1,v2,v3) //validation de formulaire de suppression d'une voiture 
{
    console.log("supprimer");
  
    /*if(!(empty(v1)) && !(empty(v2)) && !(empty(v3)) )
    {
            if((c1.length==3)&&(c2.length==4))
            {
                return true ; 
            }
    }
    alert(" vérifier les données ");
    return false ;*/
    if(!(verif_pos(v1.value)) ||(v1.value<100) || (v1.value>1000) )
    {
        alert("vérifier la série de votre voiture");
        return false;
    }
    if(!(verif_pos(v2.value)) ||(v2.value<1000) || (v2.value>10000) )
    {
        alert("vérifier l'enregistement de votre voiture");
        return false;
    }
    if(v3.value=="")
    {
        alert("vueillez spécifiez la marque de la voiture");
        return false;
    }
    return true;
}

function modif_v(v1,v2)  //validation des données du formulaire de modification des données d'une voiture
{
  /*  if(verif_pos(v1) && verif_pos(v2) && validation_radio(v3) && !(empty(v4)))
    {
        return true;
    }
    alert("donnée érroné");
    console.log("modif_v");
    return false; */
    if((!(verif_pos(v1)))||(v2.value<10)||(v2.value>999))
    {
        alert("le numéro de série de la voiture doit etre un nombre positif");
        return false;
    }
    if((!(verif_pos(v2)))||(v2.value<1)||(v2.value>9999))
    {
        alert("le numéro d'enregistrement de la voiture doit etre un nombre positif entre 1 et 9999");
        return false;
    }
   
    
    return true;
}
function repare_v(v1,v2,v3,v4,v5,v6)  //validation de formulaires d'ajout des pièces à réparer 
{
    sr=parseInt(v1);
    en=parseInt(v2);
   /* if(!(empty(v1)) && !(empty(v2)) && !(empty(v3)) && !(empty(v6)))
    {
        if(validation_radio(v4) && validation_radio(v5) && verif_pos(sr) && verif_pos(en))
        {
            return true;
        }
    }
    alert("vérifier les informations");
    console.log("repare_v")
    return false;*/
    if(v1=="")
    {
        alert("Vérifier les informations");
        return false;
    }
    if(v2=="")
    {
        alert("Vérifier les informations");
        return false;
    }
    if(v3=="")
    {
        alert("Vérifier les informations");
        return false;
    }
    if(v6=="")
    {
        alert("Vérifier les informations");
        return false;
    }
    if(!(validation_radio(v4)))
    {
        alert("vérifier les informations");
        return false;
    }
    if(!(validation_radio(v5)))
    {
        alert("vérifier les informations");
        return false;
    }
    if(!(verif_pos(sr)))
    {
        alert("vérifier les informations");
        return false;
    }
    if(!(verif_pos(en)))
    {
        alert("vérifier les informations");
        return false;
    }
    return true;
}
function valid_rech(v1,v2)   //validation de recherche des clients 
{
    if(!(validation_radio(v1.value)) || (v2.value=="") )
    {
        alert("Vérifier les données");
   
        return false;
    }

    return true;

}
function valid_panne(v1,v2,v3)
{
    
   var c2=v2.split('/');
    var bool=new Array();
    for(var i=0; i< c2.length ; i++)
    {
            bool[i]=/^[a-zA-Z]+$/.test(c2[i]);
            
    }
  /*  if((verif_pos(v1)) && (verif_pos(v3)) && !(empty(v2)))
    {
        if(!(bool.includes("false")))
        {
        return true;
        }
    }
    alert("Vérifier les données ");*/
    if(!(verif_pos(v1)))
    {
        alert("Vérifier les données ");
        return false;
    }
    if(!(verif_pos(v3)))
    {
        alert("Vérifier les données ");
        return false;
    }
    if(v2=="")
    {
        alert("Vérifier les données");
        return false;
    }
    if(bool.includes("false"))
    {
        alert("Vérifier les données");
        return false;   
    }
    return true;
}
function etat(v1,v2,v3,v4,v5,v6,v7,v8,v9,v10,v11,v12,v13) //validation des données de form trouvé dans etatDesLieux.php
{
    alert("etat");
    var c1=parseInt(v1.value);
   /* if((valid_panne(v3.value,v4.value,v5.value)) && (valid_panne(v6.value,v7.value,v8.value))  )
    {
        if((validation_radio(v2.value)) && (validation_radio(v12.value))  )
        {
            if((validation_radio(v13.value)) && (valid_panne(v9.value,v10.value,v11.value)))
            {
                if(verif_pos(c1))
                {
                    return true ;
                }
            }
        }
    }
    alert("vérifiez les données s'il vous plait ");
    return false; */
    if(!(valid_panne(v3.value,v4.value,v5.value)))
    {
        alert("verifier les données");
        return false;
    }
    if(!(valid_panne(v6.value,v7.value,v8.value)))
    {
        alert("verifier les données");
        return false;
    }
    if(!((validation_radio(v2.value))))
    {
        alert("vérifier les données");
        return false;
    }
    if(!(validation_radio(v12.value)))
    {
        alert("vérifier les données");
        return false;
    }
    if(!(validation_radio(v13.value)))
    {
        alert("vérifier les données");
        return false;
    }
    if(!(valid_panne(v9.value,v10.value,v11.value)))
    {
        alert("vérifier les données");
        return false;
    }
    if(!(verif_pos(c1)))
    {
        alert("vérifier les données");
        return false;
    }
    return true;
}
function validation_champMail (ChampMail)
		{
		    if(ChampMail.value=="")
		    {
                       alert("Vous devez saisir une adresse mail valide, ce champ est obligatoire !");
                       return false;
                    }
					
                    aux1=ChampMail.value.lastIndexOf("@");
                    Login=ChampMail.value.substring(0,aux1);
                    aux2=ChampMail.value.lastIndexOf(".");
                    Extension=ChampMail.value.substring(aux2+1,ChampMail.length);
                    Domaine=ChampMail.value.substring(aux1+1,aux2);
                    
                    /* un login doit toujours avoir plus de 2 caractères */
                    if(Login.length<=2)
                    {
		       alert("Ceci n'est pas une adresse mail valide !");
                       return false;
                    }
                
                    /* un domaine doit toujours avoir plus de 1 caractère */
                    if(Domaine.length<=1)
                    {
                       alert("Ceci n'est pas une adresse mail valide !");
                       return false;
                    }

		    /* une extension doit toujours avoir 2 ou 3 caractères */
                    if((Extension.length<2)||(Extension.length>3))
                    {
                       alert("Ceci n'est pas une adresse mail valide !");
                       return false;
                    }
		    
                    return true;                    	    
		}

function ajout_fonct(v1,v2,v3,v4,v5,v6)
{
   /* if(!(empty(v1)) && !(empty(v2)))
    {
        if(!(empty(v4)) && !(empty(v6)))
        {
            if(verif_pos(v3) && verif_pos(v5))
            {
                return true ;
            }
        }
    }
    alert("Vérifier les données");
    return false; */
    var c= v3.value;
    if(v1.value=="")
    {
        alert(" Champ Nom vide");
        return false;
    }
    if(v2.value=="")
    {
        alert(" Champ Prénom vide");
        return false;
    }
    if(v6.value=="")
    {
        alert(" Champ mot de passe vide");
        return false;
    }
    if(v4.value=="")
    {
        alert(" Champ adresse vide");
        return false;
    }
    if(!(verif_pos(v3.value)) )
    {
        alert("Numéro de Carte d'identité nationale invalid");
        return false;
    }
    if(!(verif_pos(v5.value)))
    {
        alert(" Vérifier le numéro de télèphone");
        return false;
    }
    return true;
}
function rechFonct(v1,v2,v3)
{
    if(v1.value="") 
    {
        alert("vérifier les données");
        return false;
    }
    if(v2.value="") 
    {
        alert("vérifier les données");
        return false;
    }
    if(!(verif_pos(v3.value)))
    {
        alert("vérifier les données");
        return false;
    }
    return true;
}
function ajout_client(v1,v2,v3,v4,v5,v6,v7)
{
    if(!(verif_pos(v1.value)))
    {
        alert("vérifier les données");
        return false;
    }
    if(!(verif_pos(v2.value)))
    {
        alert("vérifier les données");
        return false;
    }
    if(v3.value=="")
    {
        alert("vérifier les données");
        return false;
    }
    if(v4.value=="")
    {
        alert("vérifier les données");
        return false;
    }
    if(!(validation_radio(v5.value)))
    {
        alert("vérifier les données");
        return false;
    }
    if(!(verif_pos(v6.value)))
    {
        alert("vérifier les données");
        return false;
    }
    if(!(validation_champMail(v7)))
    {
        alert("vérifier les données ");
        return false;
    }
    return true;
}
function modifRes(v1,v2,v3,v4,v5,v6,v7,v8,v9,v10,v11,v12,v13,v14)
{
    if(!(verif_pos(v1.value)) || (v1.value<100) || (v1.value>999))
    {
        alert("vérifier les données");
        return false;
    }
    if(!(verif_pos(v2.value)) || (v2.value<1000) || (v2.value>9999))
    {
        alert("vérifier les données");
        return false;
    }
    if(!(verif_pos(v3.value)))
    {
        alert("vérifier les données");
        return false;
    }
    if(!(verif_pos(v9.value)))
    {
        alert("vérifier les données");
        return false;
    }
    if(!(validation_radio(v7.value)))
    {
        alert("vérifier les données");
        return false;  
    }
    if(!(validation_radio(v8.value)))
    {
        alert("vérifier les données");
        return false; 
    }
    if(!(verif_pos(v12.value)))
    {
        alert("vérifier les données");
        return false;  
    }
    if(!(verif_pos(v11.value)))
    {
        alert("vérifier les données");
        return false;
    }
    if(!(verif_pos(v14.value)))
    {
        alert("vérifier les données");
        return false;
    }
    if(v10.value=="")
    {
        alert("vérifier les données");
        return false;
    }
    if(v13.value=="")
    {
        alert("vérifier les données");
        return false;
    }
    if(!(compare(v4,v5)))
    {
        alert("vérifier les données");
        return false; 
    }
    if(!(compare(v6,v4)))
    {
        alert("vérifier les données");
        return false;
    }
    return true;

}
function nouvRes(v1,v2,v3,v4,v5,v7,v8,v9,v10)
{
    var c2=v4.split('/');
    var bool=new Array();
    for(var i=0; i< c2.length ; i++)
    {
            bool[i]=/^[a-zA-Z]+$/.test(c2[i]);
            
    }
    if(!(verif_pos(v1.value)))
    {
        alert("vérifier les données");
        return false;
    }
    if(!(verif_pos(v2.value)))
    {
        alert("vérifier les données");
        return false;
    }
    if(!(verif_pos(v3.value)))
    {
        alert("vérifier les données");
        return false;
    }
    if(!(verif_pos(v5.value)))
    {
        alert("vérifier les données");
        return false;
    }
    if(!(validation_radio(v7.value)))
    {
        alert("vérifier les données");
        return false;
    }
    if(!(verif_pos(v8.value)))
    {
        alert("vérifier les données");
        return false;
    }
    if(!(validation_radio(v9.value)))
    {
        alert("vérifier les données");
        return false;
    }
    if(!(verif_pos(v10.value)))
    {
        alert("vérifier les données");
        return false;
    }
    if(bool.includes("false"))
    {
        alert("Vérifier les données");
        return false;   
    }
    return true;
}