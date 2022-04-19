CREATE TABLE IF NOT EXISTS `Transactions` (
    `id` INT NOT NULL AUTO_INCREMENT, 
    `source` INT NOT NULL,
    `dest` INT NOT NULL, 
    `BalanceChange` INT, 
    `TransactionType` INT NOT NULL DEFAULT 0, 
    `memo` VARCHAR(500), 
    `ExpectedTotal` INT NOT NULL, 
    `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`id`),
    FOREIGN KEY (`source`) REFERENCES Accounts(id),
    FOREIGN KEY (`dest`) REFERENCES Accounts(id)

)