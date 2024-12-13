CREATE TABLE `score`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_quiz` BIGINT NOT NULL,
    `id_player` BIGINT NOT NULL,
    `score` BIGINT NOT NULL
);
CREATE TABLE `answer`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `content` VARCHAR(255) NOT NULL,
    `id_question` BIGINT NOT NULL,
    `is_right` BOOLEAN NOT NULL
);
CREATE TABLE `question`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `content` VARCHAR(255) NOT NULL,
    `id_quiz` BIGINT NOT NULL
);
CREATE TABLE `quiz`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL
);
CREATE TABLE `player`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `pseudo` VARCHAR(255) NOT NULL
);
ALTER TABLE
    `score` ADD CONSTRAINT `score_id_player_foreign` FOREIGN KEY(`id_player`) REFERENCES `player`(`id`);
ALTER TABLE
    `answer` ADD CONSTRAINT `answer_id_question_foreign` FOREIGN KEY(`id_question`) REFERENCES `question`(`id`);
ALTER TABLE
    `score` ADD CONSTRAINT `score_id_quiz_foreign` FOREIGN KEY(`id_quiz`) REFERENCES `quiz`(`id`);
ALTER TABLE
    `question` ADD CONSTRAINT `question_id_quiz_foreign` FOREIGN KEY(`id_quiz`) REFERENCES `quiz`(`id`);