CREATE OR REPLACE VIEW dpo_get_users_view AS
SELECT id, username, email, is_active, is_verified
FROM users;

CREATE OR REPLACE VIEW dpo_get_users_with_password_view AS
SELECT id, username, email, is_active, is_verified, password_hash
FROM users;

CREATE OR REPLACE VIEW verified_profiles_count AS SELECT COUNT(*) FROM `users` WHERE is_verified = TRUE;