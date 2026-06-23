CREATE OR REPLACE VIEW dpo_get_users_view AS
SELECT id, username, email, is_active, is_verified
FROM users;


/*
* J'ai créé une vue appelée dpo_get_users_view en fait c'était dto que je voulais écrire
* Il s'agit d'une vue que qui permet de récupérer uniquement quelques items d'un enregistrement
* dans la table users.
*/


CREATE OR REPLACE VIEW dto_get_users_with_password_view AS
SELECT id, username, email, is_active, is_verified, password_hash
FROM users;

/*
La vue ci-dessus permet de récupéer quelques informatiques dans l'objectif de comparer les hash 
entre ce qu'un utilisateur soumettrait et le hashé en base et si tout va bien de permettre
à l'utilisateur de récupéer le reste des données de la vue 
*/

CREATE OR REPLACE VIEW verified_profiles_count AS SELECT COUNT(*) FROM `users` WHERE is_verified = TRUE;