SET GLOBAL event_scheduler = ON;

CREATE EVENT IF NOT EXISTS fidelity_income
    ON SCHEDULE EVERY 4 MINUTE
    DO
      UPDATE accounts SET balance = balance + 10.00;
