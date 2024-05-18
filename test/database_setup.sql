-- Create events table with an image column
CREATE TABLE events (
    event_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    event_date DATE,
    event_time TIME,
    venue VARCHAR(255),
    image VARCHAR(255)
);

-- Create users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL
);

-- It is recommended to handle user privileges and passwords in a secure manner
-- Ensure this command is run with appropriate security measures
ALTER USER 'sara'@'localhost' IDENTIFIED BY '12345';
FLUSH PRIVILEGES;

-- Insert sample data into events table
INSERT INTO events (title, description, event_date, event_time, venue, image)
VALUES ('Community Meetup', 'A gathering for local entrepreneurs to share ideas.', '2024-05-20', '18:00:00', 'Downtown Hub', 'images/community-meetup.jpg');
