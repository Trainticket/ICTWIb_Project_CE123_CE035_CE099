CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `verified` VARCHAR(1) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `authenticate` (
  `id` int(11) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `expired` varchar(1) NOT NULL DEFAULT 'n',
  `created` TIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;