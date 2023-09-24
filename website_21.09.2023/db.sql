CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(25) NOT NULL UNIQUE,
    active BOOL NOT NULL,
    mailing BOOL NOT NULL
    );
 
CREATE TABLE groups (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255)
    );

CREATE TABLE group_user (
    user_id INT NOT NULL,
    group_id INT NOT NULL,
    PRIMARY KEY (user_id, group_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (group_id) REFERENCES groups(id) ON DELETE CASCADE
    );

CREATE TABLE colors (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    rgb VARCHAR(255) NOT NULL
    );

CREATE TABLE sections (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT NOW(),
    user_id INT NOT NULL,
    color_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (color_id) REFERENCES colors(id) ON DELETE CASCADE
    );

CREATE TABLE messages (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    text TEXT NOT NULL,
    header VARCHAR(255),
    created_at TIMESTAMP NOT NULL DEFAULT NOW(),
    user_sender_id INT NOT NULL,
    user_recipient_id INT NOT NULL,
    section_id INT NOT NULL,
    FOREIGN KEY (`user_sender_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`user_recipient_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`section_id`) REFERENCES `sections`(`id`) ON DELETE CASCADE
    );

INSERT INTO users 
    (fullname, email, password, phone, active, mailing)
    VALUES
    ('Администратор', 'admin@example.com', '$2y$10$0aTP9nvH2xeT/RLBI0ArhOLdJYlYOlWvt.8mWWKXrgna45WlTKI0e', '11111111111', 1, 1), #pass
    ('User1', 'user1@example.com', '$2y$10$WoC8jGUJ2dUGOx9HzXkBP.XbvZsqLNcNhWsbmHa4A1mR6IswHK0pa', '22222222222', 1, 0), #1234
    ('User2', 'user2@example.com', '$2y$10$Fe7gPEPZFOtuQLn2oIIrn.FZ45Zaheg0MgcSp5JyoiFD4jg4ai1hG', '33333333333', 0, 1), #2345
    ('User3', 'user3@example.com', '$2y$10$izGiJBqnqfhCHGVVnCCB0eZRb5R0oGJI5JtOuSQXGAXVfeXjKymO.', '44444444444', 1, 1), #3456
    ('User4', 'user4@example.com', '$2y$10$0CcpOS7CBWg.c6foUHZNa.feVMQtg4VUL9iAlFEA2nfElFwZcOwta', '55555555555', 0, 0), #4567
    ('Петров Петр Петрович', 'petr@yn.ru', '$2y$10$EmvpjzYnz/NRHvUzA79I3.BS1lSkfKwfw/G5NbSBCs84ViLMpZXUq', '89234567426', 1, 1); #5678

INSERT INTO users 
    (fullname, email, password, phone, active, mailing)
    VALUES
    ('Петров Петр Петрович', 'petrov@yn.ru', '$2y$10$Pe35BnDf9ntfz2q0WYkbUeV.E7TDn/UUYusTHu7DpppCaXmjSuNrO', '8923454444', 1, 1); #123456

INSERT INTO groups 
    (name, description)
    VALUES
    ('Седан', 'Любители Седана'),
    ('Пикап', 'Любители Пикапа'),
    ('Хэтчбек', 'Любители Хэтчбека'),
    ('Минивэн', 'Любители Минивэна'),
    ('Кроссовер', 'Любители Кроссовера'),
    ('Внедорожник', 'Любители Внедорожника');

INSERT INTO group_user 
    (user_id,  group_id)
    VALUES
    (7, 1),
    (7, 2),
    (7, 3),
    (7, 4),
    (7, 5),
    (7, 6);