CREATE TABLE IF NOT EXISTS
finforex_users
(
userid
int(15) NOT NULL AUTO_INCREMENT,
username
varchar(50) NOT NULL,
password
varchar(60) NOT NULL,
role
varchar(20) NOT NULL,
emailid
varchar(25) NOT NULL,
phonenumber
varchar(15) NOT NULL,
PRIMARY KEY (
userid
)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;