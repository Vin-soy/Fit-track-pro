--Create database name fittrack

CREATE TABLE IF NOT EXISTS workouts (
    workout_id INT AUTO_INCREMENT PRIMARY KEY,
    workout_name VARCHAR(255) NOT NULL
);

INSERT INTO workouts (workout_name) VALUES
('Treadmill Running'),
('Indoor Cycling'),
('Jump Rope'),
('Bodyweight Squats'),
('Push-Ups'),
('Planks'),
('Yoga'),
('Pilates'),
('Dumbbell Bicep Curls'),
('Kettlebell Swings'),
('Jogging on Treadmill'),
('Brisk Walking'),
('Power Walking'),
('Walking Lunges'),
('Interval Running'),
('Hill Climbing (Treadmill)'),
('Walking with Dumbbells');
