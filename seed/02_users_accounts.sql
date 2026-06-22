START TRANSACTION;

INSERT INTO
    users (username, email, password_hash, role)
VALUES
    (
        'boralex',
        'boris@gmail.com',
        '$2y$10$4xY02nwvMDLlTq82kYXxku2q3m9wPQ2xKeBogXT8Tpj6Nv.qPW8V6',
        'admin'
    ),
    (
        'bibou',
        'caroline@gmail.com',
        '$2y$10$NMjL5Hi8rDN1Pa7XxARzqOAIuTLimxxIBZ/fd5em/niz7xJpxkV0a',
        'user'
    ),
    (
        'alexou',
        'alexandre@gmail.com',
        '$2y$10$1ULP52h90Q/woFH99Fjt4eLob40.uCSSvGxuY3zxZiQnTSWLbtx3u',
        'user'
    );

INSERT INTO
    accounts (user_id, balance)
VALUES
    (
        (
            SELECT
                id
            FROM
                users
            WHERE
                email = 'boris@gmail.com'
        ),
        200.00
    ),
    (
        (
            SELECT
                id
            FROM
                users
            WHERE
                email = 'caroline@gmail.com'
        ),
        1000.00
    ),
    (
        (
            SELECT
                id
            FROM
                users
            WHERE
                email = 'alexandre@gmail.com'
        ),
        400.00
    );

COMMIT;