CREATE TABLE `student_answer` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `question_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `script` TEXT NOT NULL,
  `score` INT NOT NULL,
  `result` BOOLEAN NOT NULL,
  `message` TEXT NOT NULL,
  `createdate` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `lastupdate` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  primary key (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `assignment` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` TEXT NOT NULL,
  `duedate` date NOT NULL,
  `active` BOOLEAN NOT NULL,
  `deleted` BOOLEAN NOT NULL,
  `createdate` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `lastupdate` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  primary key (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `question` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `assignment_id` INT NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` varchar(100) NOT NULL,
  `guideline` varchar(100) NOT NULL,
  `score` int(3) NOT NULL,
  `active` BOOLEAN NOT NULL,
  `deleted` BOOLEAN NOT NULL,
  `createdate` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `lastupdate` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  primary key (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `test_case` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `question_id` INT NOT NULL,
  `input` TEXT NOT NULL,
  `output` TEXT NOT NULL,
  `createdate` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `lastupdate` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  primary key (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `role` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `createdate` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `lastupdate` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  primary key (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `role_id` INT NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `active` BOOLEAN NOT NULL,
  `deleted` BOOLEAN NOT NULL,
  `regisdate` date NOT NULL,
  `createdate` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `lastupdate` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  primary key (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `comment` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `student_answer_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `comment` TEXT NOT NULL,
  `createdate` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `lastupdate` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  primary key (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `sub_comment` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `comment_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `comment` TEXT NOT NULL,
  `createdate` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `lastupdate` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  primary key (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `role` (`name`, `createdate`, `lastupdate`) VALUES ('ADMIN', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

INSERT INTO `user` ( `role_id`, `user`, `password`, `firstname`, `lastname`, `email`, `active`, `deleted`, `regisdate`, `createdate`, `lastupdate`) VALUES ( '1', 'admin', 'admin', 'admin', 'admin', 'admin@admin.com', '1', '0', '2017-04-03', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

ALTER TABLE `user` ADD CONSTRAINT `role_fk_id` FOREIGN KEY (`role_id`) REFERENCES `role`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `question` ADD CONSTRAINT `assignment_fk_id` FOREIGN KEY (`assignment_id`) REFERENCES `assignment`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;;

ALTER TABLE `test_case` ADD CONSTRAINT `question_fk_id` FOREIGN KEY (`question_id`) REFERENCES `question`(`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

ALTER TABLE `student_answer` ADD CONSTRAINT `student_answer_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

ALTER TABLE `student_answer` ADD CONSTRAINT `student_answer_fk_question_id` FOREIGN KEY (`question_id`) REFERENCES `question`(`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

ALTER TABLE `comment` ADD CONSTRAINT `comment_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

ALTER TABLE `comment` ADD CONSTRAINT `comment_fk_student_answer_id` FOREIGN KEY (`student_answer_id`) REFERENCES `student_answer`(`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

ALTER TABLE `sub_comment` ADD CONSTRAINT `sub_comment_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

ALTER TABLE `sub_comment` ADD CONSTRAINT `sub_comment_fk_comment_id` FOREIGN KEY (`comment_id`) REFERENCES `comment`(`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

