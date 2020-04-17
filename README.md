"# Projet_Piscine_Ing3" 



Création d'un item avec photos et/ou vidéo
    -> blindage des champs title, description catégory et type de vente
    -> blindage sur la valeur des dates
  ! -> absence de blindage sur la présence des champs de date et prix
  ! -> la création d'un item ne prend pas en compte l'id du user
  ! -> la page n'est pas sécurisé (accès public)

Affichage de tous les items
  ! -> ne prend pas en compte la disponibilité de l'article (date et déjà vendu)

Affichage d'un item pour achat
    -> affichage en carrousel des images
    -> affichage des vidéos en dessous
    -> ajout panier OK
  ! -> blindage du prix qui doit être supérieur ou égale (! devrait être strictement supèrieur pour les enchères)

Affichage du Panier
    -> Affichage de tous les élèments du panier
    -> Blindage du button validation si : 2 items identiques | prix proposé < prix actuelle
    -> Button delete OK
  ! -> Button Modif NO
  ! -> Ne prend pas en compte l'ID Utilisateur

  
