DELIMITER $$

CREATE PROCEDURE IF NOT EXISTS get_user_id_by_email(
    IN p_email VARCHAR(30),
    OUT p_id CHAR(36)
)
BEGIN
    SELECT id INTO p_id
    FROM `users`
    WHERE email = p_email
    LIMIT 1;
END$$

CREATE PROCEDURE IF NOT EXISTS get_account_id_by_email(
    IN p_email VARCHAR(30),
    OUT p_id CHAR(36)
)
BEGIN
    SELECT a.id INTO p_id
    FROM `accounts` a
    JOIN `users` u ON u.id = a.user_id
    WHERE u.email = p_email
    LIMIT 1;
END$$

DELIMITER ;
