SELECT
    IF (
        SUBSTRING(
            (
                SELECT
                    username
                FROM
                    users
                WHERE
                    username = 'boralex'
            ),
            1,
            1
        ) = 'b',
        SLEEP (5),
        "RIEN"
    );