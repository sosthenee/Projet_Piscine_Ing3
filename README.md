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
  A -> la création d'un item  prend  en compte l'id du user
    -> state = waiting
  ! -> la page n'est pas sécurisé (accès public)  function display


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
  ! -> refaire tous les tests blindage au moment de la validation du récapitulatif
  ! -> la page n'est pas sécurisé (accès public)  function index

Achat/SellType & Category
    Recherche OK
  ! -> pour category lorsque on regarde un prix on ne regarde plus les achats immédiats 
