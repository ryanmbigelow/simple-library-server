CREATE TABLE `Book` (
    `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    `title` TEXT NOT NULL,
    `author` TEXT NOT NULL,
    `year published` INTEGER NOT NULL,
    `genre` TEXT NOT NULL
);

INSERT INTO `Book` VALUES (null, "The Grapes of Wrath", "John Steinbeck", "1939", "Historical Fiction");
INSERT INTO `Book` VALUES (null, "Tropical Truth", "Caetano Veloso", "2003", "Biography");
