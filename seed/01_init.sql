START TRANSACTION;
CREATE TABLE
    IF NOT EXISTS users (
        id CHAR(36) DEFAULT (UUID ()),
        username VARCHAR(30) NOT NULL UNIQUE,
        email VARCHAR(30) NOT NULL UNIQUE,
        password_hash TEXT NOT NULL,
        role ENUM ('admin', 'user', 'moderator') NOT NULL DEFAULT 'user',
        is_active BOOLEAN NOT NULL DEFAULT TRUE,
        is_verified BOOLEAN NOT NULL DEFAULT FALSE,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        last_login_at DATETIME NULL,
        PRIMARY KEY (id)
    );
CREATE TABLE
    IF NOT EXISTS accounts (
        id CHAR(36) DEFAULT (UUID ()),
        user_id CHAR(36) NOT NULL,
        account_type VARCHAR(50) NOT NULL DEFAULT 'checking',
        balance DECIMAL(15, 2) NOT NULL DEFAULT 0.00,
        currency CHAR(3) NOT NULL DEFAULT 'EUR',
        is_active BOOLEAN NOT NULL DEFAULT TRUE,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        CONSTRAINT fk_accounts_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE RESTRICT
    );
COMMIT;
