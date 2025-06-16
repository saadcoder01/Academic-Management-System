CREATE DATABASE College_Database_System;

CREATE TABLE Student_AI(
StudentID INT IDENTITY(240901001,1) PRIMARY KEY NOT NULL,
Student_Name VARCHAR(200),
Father_Name VARCHAR(200),
Student_Age INT CHECK (Student_Age>=18) NOT NULL,
Student_Contact VARCHAR(100),
Father_Contact VARCHAR(100),
Student_CNIC VARCHAR(100),
Student_City VARCHAR(100),
Student_Email VARCHAR(100) UNIQUE,
Student_Password VARCHAR(200)
);

CREATE TABLE Student_DS(
StudentID INT IDENTITY(241201001,1) PRIMARY KEY NOT NULL,
Student_Name VARCHAR(200),
Father_Name VARCHAR(200),
Student_Age INT CHECK (Student_Age>=18) NOT NULL,
Student_Contact VARCHAR(100),
Father_Contact VARCHAR(100),
Student_CNIC VARCHAR(100),
Student_City VARCHAR(100),
Student_Email VARCHAR(100) UNIQUE,
Student_Password VARCHAR(200)
);

CREATE TABLE Faculty(
FacultyID INT IDENTITY(2401,1) PRIMARY KEY NOT NULL,
Faculty_Name VARCHAR(200),
Faculty_Age INT CHECK (Faculty_Age>=24) NOT NULL,
Faculty_Contact VARCHAR(100),
Faculty_CNIC VARCHAR(100),
Faculty_City VARCHAR(100),
Faculty_Email VARCHAR(100) UNIQUE,
Faculty_Salary Decimal(10,2),
Faculty_Password VARCHAR(200)
); 

CREATE TABLE Course(
CourseID INT IDENTITY(101,1) PRIMARY KEY NOT NULL ,
Course_Name VARCHAR(100),
Credit_Hour INT,
FacultyID INT
FOREIGN KEY (FacultyID) REFERENCES Faculty(FacultyID)
);

CREATE TABLE AssignmentMarks_AI(
StudentID INT,
CourseID INT,
FOREIGN KEY (StudentID) REFERENCES Student_AI(StudentID),
FOREIGN KEY (CourseID) REFERENCES Course(CourseID),
AssignMarks1 FLOAT NOT NULL,
AssignMarks2 FLOAT NOT NULL,
AssignMarks3 FLOAT NOT NULL,
AssignMarks4 FLOAT NOT NULL
);

CREATE TABLE AssignmentMarks_DS(
StudentID INT,
CourseID INT,
FOREIGN KEY (StudentID) REFERENCES Student_DS(StudentID),
FOREIGN KEY (CourseID) REFERENCES Course(CourseID),
AssignMarks1 FLOAT NOT NULL,
AssignMarks2 FLOAT NOT NULL,
AssignMarks3 FLOAT NOT NULL,
AssignMarks4 FLOAT NOT NULL
);

CREATE TABLE QuizMarks_AI(
StudentID INT,
CourseID INT,
FOREIGN KEY (StudentID) REFERENCES Student_AI(StudentID),
FOREIGN KEY (CourseID) REFERENCES Course(CourseID),
QiMarks1 FLOAT NOT NULL,
QiMarks2 FLOAT NOT NULL,
QiMarks3 FLOAT NOT NULL,
QiMarks4 FLOAT NOT NULL
);

CREATE TABLE QuizMarks_DS(
StudentID INT,
CourseID INT,
FOREIGN KEY (StudentID) REFERENCES Student_DS(StudentID),
FOREIGN KEY (CourseID) REFERENCES Course(CourseID),
QiMarks1 FLOAT NOT NULL,
QiMarks2 FLOAT NOT NULL,
QiMarks3 FLOAT NOT NULL,
QiMarks4 FLOAT NOT NULL
);

CREATE TABLE FinalMarks_AI(
StudentID INT,
CourseID INT,
FOREIGN KEY (StudentID) REFERENCES Student_AI(StudentID),
FOREIGN KEY (CourseID) REFERENCES Course(CourseID),
Grade VARCHAR(100) NOT NULL
);

CREATE TABLE FinalMarks_DS(
StudentID INT,
CourseID INT,
FOREIGN KEY (StudentID) REFERENCES Student_DS(StudentID),
FOREIGN KEY (CourseID) REFERENCES Course(CourseID),
Grade VARCHAR(100) NOT NULL
);

CREATE TABLE Enrollment_AI(
EnrollmentID INT IDENTITY(1201,1) PRIMARY KEY NOT NULL,
StudentID INT,
FOREIGN KEY (StudentID) REFERENCES Student_AI(StudentID),
CourseID INT,
FOREIGN KEY (CourseID) REFERENCES Course(CourseID),
FacultyID INT,
FOREIGN KEY (FacultyID) REFERENCES Faculty(FacultyID)
);

CREATE TABLE Enrollment_DS(
EnrollmentID INT IDENTITY(1301,1) PRIMARY KEY NOT NULL,
StudentID INT,
FOREIGN KEY (StudentID) REFERENCES Student_DS(StudentID),
CourseID INT,
FOREIGN KEY (CourseID) REFERENCES Course(CourseID),
FacultyID INT,
FOREIGN KEY (FacultyID) REFERENCES Faculty(FacultyID)
);

CREATE TABLE Attendance_AI(
StudentID INT,
FOREIGN KEY (StudentID) REFERENCES Student_AI(StudentID),
CourseID INT,
FOREIGN KEY (CourseID) REFERENCES Course(CourseID),
FacultyID INT,
FOREIGN KEY (FacultyID) REFERENCES Faculty(FacultyID),
Attend1 VARCHAR(100),
Attend2 VARCHAR(100),
Attend3 VARCHAR(100),
Attend4 VARCHAR(100)
);

CREATE TABLE Attendance_DS(
StudentID INT,
FOREIGN KEY (StudentID) REFERENCES Student_DS(StudentID),
CourseID INT,
FOREIGN KEY (CourseID) REFERENCES Course(CourseID),
FacultyID INT,
FOREIGN KEY (FacultyID) REFERENCES Faculty(FacultyID),
Attend1 VARCHAR(100),
Attend2 VARCHAR(100),
Attend3 VARCHAR(100),
Attend4 VARCHAR(100)
);

UPDATE Student_AI 
SET Student_Password = '$StudentPassword'
WHERE Student_Email = '$StudentEmail';

UPDATE QuizMarks_AI 
SET QiMarks1 = '$QuizMarks1',QiMarks2 = '$QuizMarks2',QiMarks3 = '$QuizMarks3',QiMarks4 = '$QuizMarks4'
WHERE CourseID = '$CourseID' AND StudentID = '$StudentID';

UPDATE QuizMarks_DS
SET QiMarks1 = '$QuizMarks1',QiMarks2 = '$QuizMarks2',QiMarks3 = '$QuizMarks3',QiMarks4 = '$QuizMarks4'
WHERE CourseID = '$CourseID' AND StudentID = '$StudentID';

UPDATE FinalMarks_AI
SET Grade = '$FinalGrade'
WHERE CourseID = '$CourseID' AND StudentID = '$StudentID';

UPDATE FinalMarks_DS
SET Grade = '$FinalGrade'
WHERE CourseID = '$CourseID' AND StudentID = '$StudentID';

UPDATE Attendance_AI 
SET Atten1 = '$Attendence1',Atten2 = '$Attendence2',Atten3 = '$Attendence3',Atten4 = '$Attendence4'
WHERE CourseID = '$CourseID' AND StudentID = '$StudentID' AND FacultyID = '$FacultyID';

UPDATE Attendance_DS 
SET Atten1 = '$Attendence1',Atten2 = '$Attendence2',Atten3 = '$Attendence3',Atten4 = '$Attendence4'
WHERE CourseID = '$CourseID' AND StudentID = '$StudentID' AND FacultyID = '$FacultyID';

UPDATE AssignmentMarks_AI 
SET aMarks1 = '$AssignmentMarks1',aMarks2 = '$AssignmentMarks2',aMarks3 = '$AssignmentMarks3',aMarks4 = '$AssignmentMarks4'
WHERE CourseID = '$CourseID' AND StudentID = '$StudentID';

UPDATE AssignmentMarks_DS 
SET aMarks1 = '$AssignmentMarks1',aMarks2 = '$AssignmentMarks2',aMarks3 = '$AssignmentMarks3',aMarks4 = '$AssignmentMarks4'
WHERE CourseID = '$CourseID' AND StudentID = '$StudentID';
