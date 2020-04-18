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


Reste à faire:
  * Gestions des dates avec BDD
    -> ne pas afficher les items si on n'est pas dans les dates
    -> valider l'achat d'une enchère

  -> afficher le sous totale d'un panier
  -> modification d'un item par le vendeur (ajout de photos suppression de photo)
  -> envoie d'un mail
  -> gestion des photos du vendeur (import)
  -> affichages des items d'un vendeur (avec photo de profil et image d'arrière plan)

  à vérifier
    -> le process d'achat (items -> panier -> purchase -> mesCommandes -> valider ou refuser)
    -> le process de best offer