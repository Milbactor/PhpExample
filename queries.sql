CREATE DATABASE university2;
USE university2;

CREATE TABLE person (
  id INT NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(100) NOT NULL,
  last_name VARCHAR(100) NOT NULL,
  gender ENUM('female', 'male') NOT NULL,
  birth_date DATE NOT NULL,
  street VARCHAR(100) NOT NULL,
  house_no VARCHAR(10) NOT NULL,
  zip_code VARCHAR(10) NOT NULL,
  city VARCHAR(100) NOT NULL,
  password VARCHAR(32) NOT NULL,
  is_student BOOLEAN NOT NULL DEFAULT FALSE,
  is_teacher BOOLEAN NOT NULL DEFAULT FALSE,
  is_admin BOOLEAN NOT NULL DEFAULT FALSE,
  PRIMARY KEY (id)
) ENGINE=INNODB;

CREATE TABLE admin (
  id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id) REFERENCES person(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=INNODB;

CREATE TABLE teacher (
  id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id) REFERENCES person(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=INNODB;

CREATE TABLE student (
  id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id) REFERENCES person(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=INNODB;

INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Vera', 'Matei', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO student(id) VALUES (1);
INSERT INTO admin(id) VALUES (1);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Petar', 'Velkov', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO student(id) VALUES (2);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Nana', 'Okamoto', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO student(id) VALUES (3);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Hristo', 'Dimitrov', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO student(id) VALUES (4);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Alina', 'Huzuneanu', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO student(id) VALUES (5);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Panait', 'Huzuneanu', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO student(id) VALUES (6);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Irina', 'Margarint', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO student(id) VALUES (7);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Veronica', 'Dragoi', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO student(id) VALUES (8);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Giulia', 'Manole', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO student(id) VALUES (9);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Ionut', 'Petrescu', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO student(id) VALUES (10);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Aurel', 'Dorel', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO student(id) VALUES (11);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Tudor', 'Voiculescu', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO student(id) VALUES (12);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Robert', 'Tobosaru', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO student(id) VALUES (13);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Razvan', 'Paunescu', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO student(id) VALUES (14);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Amelia', 'Stere', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO student(id) VALUES (15);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Iulia', 'Jieanu', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO student(id) VALUES (16);

##############################

INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Lya', 'Kamp', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO teacher(id) VALUES (17);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Eddy', 'Rooij', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO teacher(id) VALUES (18);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Wim', 'LaBlans', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO teacher(id) VALUES (19);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Mak', 'Mak', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO teacher(id) VALUES (20);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Gerard', 'Koetsier', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO teacher(id) VALUES (21);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Jan', 'Baas', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO teacher(id) VALUES (22);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Diane', 'Smith', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO teacher(id) VALUES (23);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Anna', 'Williams', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO teacher(id) VALUES (24);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Ligia', 'Jones', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO teacher(id) VALUES (25);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Amelia', 'Browne', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO teacher(id) VALUES (26);
INSERT INTO person(first_name, last_name, gender, birth_date, street, house_no, zip_code, city, password) 
       VALUES('Amber', 'Taylor', 'female', '1989-10-24', 'Kaaikhof', '147', '1567jp', 'Assendelft', MD5('password'));
INSERT INTO teacher(id) VALUES (27);

CREATE TABLE subject (
  id INT NOT NULL AUTO_INCREMENT,
  subject_name VARCHAR(100),
  credits TINYINT UNSIGNED NOT NULL,
  PRIMARY KEY(id),
  UNIQUE KEY(subject_name)
) ENGINE=INNODB;

CREATE TABLE teacher_subject (
  teacher_id INT NOT NULL,
  subject_id INT NOT NULL,
  PRIMARY KEY (teacher_id, subject_id),
  FOREIGN KEY (teacher_id) REFERENCES person(id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (subject_id) REFERENCES subject(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=INNODB;

INSERT INTO subject(subject_name, credits) Values('Calculus', 2);
INSERT INTO teacher_subject(teacher_id, subject_id) Values(17, 1);

INSERT INTO subject(subject_name, credits) Values('Basic Math', 2);
INSERT INTO teacher_subject(teacher_id, subject_id) Values(18, 2);

INSERT INTO subject(subject_name, credits) Values('Algebra', 2);
INSERT INTO teacher_subject(teacher_id, subject_id) Values(19, 3);

INSERT INTO subject(subject_name, credits) Values('Java', 2);
INSERT INTO teacher_subject(teacher_id, subject_id) Values(20, 4);

INSERT INTO subject(subject_name, credits) Values('C', 2);
INSERT INTO teacher_subject(teacher_id, subject_id) Values(21, 5);

INSERT INTO subject(subject_name, credits) Values('C++', 2);
INSERT INTO teacher_subject(teacher_id, subject_id) Values(22, 5);

INSERT INTO subject(subject_name, credits) Values('Ruby', 2);
INSERT INTO teacher_subject(teacher_id, subject_id) Values(23, 6);

INSERT INTO subject(subject_name, credits) Values('Python', 2);
INSERT INTO teacher_subject(teacher_id, subject_id) Values(24, 7);

INSERT INTO subject(subject_name, credits) Values('Prolog', 2);
INSERT INTO teacher_subject(teacher_id, subject_id) Values(25, 8);

INSERT INTO subject(subject_name, credits) Values('Rascal', 2);
INSERT INTO teacher_subject(teacher_id, subject_id) Values(26, 9);

INSERT INTO subject(subject_name, credits) Values('Pascal', 2);
INSERT INTO teacher_subject(teacher_id, subject_id) Values(26, 10);

INSERT INTO subject(subject_name, credits) Values('Assembly', 2);
INSERT INTO teacher_subject(teacher_id, subject_id) Values(27, 11);

INSERT INTO subject(subject_name, credits) Values('Basic', 2);
INSERT INTO teacher_subject(teacher_id, subject_id) Values(27, 12);

INSERT INTO subject(subject_name, credits) Values('SmallTalk', 2);
INSERT INTO teacher_subject(teacher_id, subject_id) Values(27, 13);
INSERT INTO teacher_subject(teacher_id, subject_id) Values(23, 13);

#CREATE TABLE grade (
#  student_id INT NOT NULL,
#  subject_id INT NOT NULL,
#  grade TINYINT UNSIGNED NOT NULL,
#  PRIMARY KEY (student_id, subject_id),
#  FOREIGN KEY (student_id) REFERENCES person(id) ON DELETE CASCADE ON UPDATE CASCADE,
#  FOREIGN KEY (subject_id) REFERENCES subject(id) ON DELETE CASCADE ON UPDATE CASCADE
#) ENGINE=INNODB;

CREATE TABLE timeslot (
  id INT NOT NULL AUTO_INCREMENT,
  start_time TIME NOT NULL,
  end_time TIME NOT NULL,
  PRIMARY KEY(id),
  UNIQUE KEY(start_time, end_time)
) ENGINE=INNODB;

INSERT INTO timeslot(start_time, end_time) VALUES('08:00', '10:00');
INSERT INTO timeslot(start_time, end_time) VALUES('10:15', '12:15');
INSERT INTO timeslot(start_time, end_time) VALUES('12:45', '14:45');
INSERT INTO timeslot(start_time, end_time) VALUES('15:00', '17:00');

CREATE TABLE schedule (
  id INT NOT NULL AUTO_INCREMENT,
  subject_id INT NOT NULL,
  teacher_id INT NOT NULL,
  timeslot_id INT NOT NULL,
  week_day ENUM('mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun') NOT NULL,
  room VARCHAR(10) NOT NULL,
  PRIMARY KEY(id),
  UNIQUE KEY(subject_id, teacher_id, timeslot_id, week_day),
  FOREIGN KEY (subject_id) REFERENCES subject(id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (teacher_id) REFERENCES person(id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (timeslot_id) REFERENCES timeslot(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=INNODB;

INSERT INTO schedule(subject_id, teacher_id, timeslot_id, week_day, room) VALUES(1, 1, 1, 'mon', 'r1');
INSERT INTO schedule(subject_id, teacher_id, timeslot_id, week_day, room) VALUES(1, 2, 1, 'tue', 'r1');
INSERT INTO schedule(subject_id, teacher_id, timeslot_id, week_day, room) VALUES(2, 3, 1, 'wed', 'r2');
INSERT INTO schedule(subject_id, teacher_id, timeslot_id, week_day, room) VALUES(3, 4, 1, 'thu', 'r2');
INSERT INTO schedule(subject_id, teacher_id, timeslot_id, week_day, room) VALUES(3, 5, 2, 'fri', 'r1');
INSERT INTO schedule(subject_id, teacher_id, timeslot_id, week_day, room) VALUES(4, 1, 3, 'tue', 'r3');
INSERT INTO schedule(subject_id, teacher_id, timeslot_id, week_day, room) VALUES(5, 3, 4, 'wed', 'r4');
INSERT INTO schedule(subject_id, teacher_id, timeslot_id, week_day, room) VALUES(6, 6, 4, 'thu', 'r5');

CREATE TABLE student_schedule (
  student_id INT NOT NULL,
  schedule_id INT NOT NULL,
  PRIMARY KEY (student_id, schedule_id),
  FOREIGN KEY (student_id) REFERENCES person(id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (schedule_id) REFERENCES schedule(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=INNODB;

#############################################

# SELECT last_name, last_name
# FROM person
# WHERE ID in (SELECT teacher_id
# 	     FROM subject, teacher_subject
# 	     WHERE subject.sid = teacher_subject.sid);
# 
# //select teacher query
# SELECT last_name, last_name
# FROM person, teacher_subject
# WHERE person.ID = teacher_subject.teacher_id AND sid = 'SmallTalk';
# 
# //time slot
# SELECT start_time, end_time
# FROM timeslot;
