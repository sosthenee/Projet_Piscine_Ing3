"# Projet_Piscine_Ing3" 

A signifie "à verifier"
! signifie "non fait/reste à faire"


Création d'un item avec photos et/ou vidéo
    -> blindage des champs title, description catégory et type de vente
    -> blindage sur la valeur des dates
    -> blindage sur la présence des champs de date et prix
    -> blindage à 80 % sur le type de vente (il faut selectionner au moins une fois une checkbox pour enlever le blindage)
    -> blindage dans le controller le type de vente
    => BLINDAGE COMPLET
  A -> la création d'un item  prend en compte l'id du user
    -> state = waiting
  DONE -> la page n'est pas sécurisé (accès public)  function display


Affichage de tous les items
  ! -> conditions d'affichage d'un item à vendre:
              * sold=0
              * admin_state=approuve
  !            * start_date < aujd
  !            * si enchère : end_date > aujd

Affichage d'un item pour achat
    -> affichage en carrousel des images
    -> affichage des vidéos en dessous
    -> ajout panier OK
    -> blindage du prix qui doit être supérieur

Affichage du Panier
    -> Affichage de tous les élèments du panier
  A -> Blindage du button validation si : 2 items identiques | prix proposé < prix actuel
  A -> Reste Blindage article déjà vendu

    -> Button delete OK
  ! -> Button Modif NO
  A -> Prend en compte l'ID Utilisateur
  G -> refaire tous les tests blindage au moment de la validation du récapitulatif
  ! -> la page n'est pas sécurisé (accès public)  function index

Achat/SellType & Category
    Recherche OK
  G -> pour category lorsque on regarde un prix on ne regarde plus les achats immédiats 

________________________________________________________
________________________________________________________

Reste à faire:
  
    


DONE -> valider l'achat d'une enchère

DONE -> afficher le sous total d'un panier

DONE  -> ne pas afficher les items si la date de début n'a pas commencé 
         (pour la date de fin auto grâce au cron except si aucune offre n'a été faite)

 /!\ -> Attention une enchère qui à 0 offre n'est pas actualisé, si personne ne l'achète avant la date limite elle reste présente.

DONE -> Envoie d'un mail


DONE page d'accueil vendeur

DONE -> AFFICHAGE ITEM POUR VENDEUR:
DONE -> Modification d'un item par le vendeur (ajout de photos suppression de photos)
        Il pourrait voir toutes les offres (refuser) des enchères et le NBR d'offres


DONE  -> Gestion des photos du vendeur (import)
DONE  -> Page d'un vendeur avec ses items pour client (avec photo de profil et image d'arrière plan)


  à vérifier
    -> Le process d'achat (items -> panier -> purchase -> mesCommandes -> valider ou refuser)
OK  -> Test Cron  
    -> le process de best offer

option:
   faire un ajout au panier plus dynamique 
