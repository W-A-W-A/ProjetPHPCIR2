CREATE TABLE Client (
    id SERIAL;
    name VARCHAR (20) NOT NULL;
    mail VARCHAR (40) NOT NULL;
    telephone VARCHAR(12) NOT NULL;
    password VARCHAR(40) NOT NULL;
);

CREATE TABLE Appointement (
    id SERIAL;
    start DATE;
    end DATE;
    id_doctor INTEGER;
    id_client INTEGER;
);

CREATE TABLE Doctor (
    id SERIAL;
    name VARCHAR (20) NOT NULL;
    mail VARCHAR (40) NOT NULL;
    telephone VARCHAR (12) NOT NULL;
    id_office INTEGER;
    id_appointement INTEGER;
    password VARCHAR(40) NOT NULL
);

CREATE TABLE Office (
    id SERIAL;
    id_address INTEGER;
    id_doctor INTEGER;
    room_nbr INTEGER;
);

CREATE TABLE Address () {
    id SERIAL;
    address VARCHAR (40) NOT NULL;
}

CREATE TABLE Specialities (
    id SERIAL;
    speciality_name VARCHAR (30) NOT NULL
);

CREATE TABLE Doctor_Jobs (
    id_doctor INTEGER;
    id_specialty INTEGER;
);