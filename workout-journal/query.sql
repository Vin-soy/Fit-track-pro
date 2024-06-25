CREATE TABLE `tbl_activities` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `activity` varchar(255) DEFAULT NULL,
  `time_spent` varchar(50) DEFAULT NULL,
  `distance` varchar(50) DEFAULT NULL,
  `set_count` int(11) DEFAULT NULL,
  `reps` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
)

CREATE TABLE `tbl_user` (
  `tbl_user_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `contact_number` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) 
CREATE TABLE workouts (
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

