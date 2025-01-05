INSERT INTO Client (name, mail, telephone, password)
VALUES
('Jean Dupont', 'jean.dupont@email.com', '0612345678', 'password'),
('Marie Lemoine', 'marie.lemoine@email.com', '0678451234', 'password'),
('Paul Martin', 'paul.martin@email.com', '0622334455', 'password'),
('Sophie Moreau', 'sophie.moreau@email.com', '0644123412', 'password'),
('Pierre Durand', 'pierre.durand@email.com', '0698765432', 'password');

INSERT INTO Doctor (name, mail, telephone, id_office, id_appointement, password)
VALUES
('Dr. Alice Bernard', 'alice.bernard@email.com', '0145678901', 1, 1, 'doctorpassword'),
('Dr. Pierre Lefevre', 'pierre.lefevre@email.com', '0146789012', 2, 2, 'doctorpassword'),
('Dr. Clara Simon', 'clara.simon@email.com', '0147890123', 3, 3, 'doctorpassword'),
('Dr. Vincent Roussel', 'vincent.roussel@email.com', '0148901234', 4, 4, 'doctorpassword'),
('Dr. Isabelle Lemoine', 'isabelle.lemoine@email.com', '0149012345', 5, 5, 'doctorpassword');

INSERT INTO Appointement (start, end, id_doctor, id_client)
VALUES
('2025-01-10 00:00:00', '2025-01-10 02:00:00', 1, 1),
('2025-01-10 00:00:00', '2025-01-10 02:00:00', 1, NULL),
('2025-01-12 00:00:00', '2025-01-12 02:00:00', 2, 2),
('2025-01-12 00:00:00', '2025-01-12 02:00:00', 2, NULL),
('2025-01-15 00:00:00', '2025-01-15 02:00:00', 3, 3),
('2025-01-15 00:00:00', '2025-01-15 02:00:00', 3, NULL),
('2025-01-18 00:00:00', '2025-01-18 02:00:00', 4, 4),
('2025-01-18 00:00:00', '2025-01-18 02:00:00', 4, NULL),
('2025-01-20 00:00:00', '2025-01-20 02:00:00', 5, 5),
('2025-01-20 00:00:00', '2025-01-20 02:00:00', 5, NULL);

INSERT INTO Office (id_address, id_doctor, room_nbr)
VALUES
(1, 1, 101),
(2, 2, 102),
(3, 3, 103),
(4, 4, 104),
(5, 5, 105);

INSERT INTO Address (address)
VALUES
('123 Rue de Paris, 75001 Paris'),
('456 Avenue de la République, 75002 Paris'),
('789 Boulevard Saint-Germain, 75003 Paris'),
('101 Rue de la Liberté, 75004 Paris'),
('202 Avenue Montaigne, 75005 Paris');

INSERT INTO Specialities (speciality_name)
VALUES
('Cardiologie'),
('Dermatologie'),
('Chirurgie générale'),
('Pédiatrie'),
('Orthopédie');

INSERT INTO Doctor_Jobs (id_doctor, id_specialty)
VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);