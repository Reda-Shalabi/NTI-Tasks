CREATE VIEW task1 AS 
SELECT 
  c.title AS course_title,
  COUNT(e.student_id) AS total_students
FROM 
  courses c 
LEFT JOIN 
  enrollments e 
ON 
  c.id_course = e.course_id
GROUP BY 
  c.title;

-- Task2
SELECT * 
FROM students
WHERE id = (
  SELECT student_id 
  FROM enrollments
  GROUP BY student_id
  ORDER BY COUNT(*) DESC
  LIMIT 1
);
-- Task3
SELECT *
FROM students
WHERE id NOT IN (
  SELECT student_id FROM enrollments
);
-- Task4
SELECT s.name, COUNT(e.course_id) AS total_courses
FROM students s
JOIN enrollments e ON s.id = e.student_id
GROUP BY s.id, s.name;
