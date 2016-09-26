CREATE TABLE registration (
  userId INT(10) UNSIGNED AUTO_INCREMENT,
  fullName VARCHAR(30),
  userName VARCHAR(30),
  password VARCHAR(10),
  email VARCHAR(30),
  phoneNumber VARCHAR(30),
  country VARCHAR(20),
  language VARCHAR(20),
  ethnicity VARCHAR(20),
  age INT(3),
  university VARCHAR(30),
  gender TINYINT(1),
  status VARCHAR(10),
  year INT(10),
  major VARCHAR(30),
  PRIMARY KEY (userId, major, status, ethnicity, university)
);

CREATE TABLE Login (
  userName varchar(30) REFERENCES registration,
  password varchar(30) REFERENCES registration
);

CREATE TABLE Scholarship (
  sponsor VARCHAR(30),
  major VARCHAR(30) REFERENCES registration,
  status VARCHAR(30) REFERENCES registration,
  ethnicity VARCHAR(30) REFERENCES registration
);

CREATE TABLE School (
  university VARCHAR(30) REFERENCES registration,
  major VARCHAR(30) REFERENCES registration,
  id VARCHAR(30)
);

CREATE TABLE Administrator (
  adminId VARCHAR(30),
  fullName VARCHAR(30),
  userName VARCHAR(30),
  password VARCHAR(30),
  email VARCHAR(30),
  phoneNumber VARCHAR(30)
);
