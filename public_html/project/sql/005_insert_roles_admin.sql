-- Active: 1674754247998@@db.ethereallab.app@3306@nff4
INSERT INTO Roles(id, name, is_active) VALUES(1, 'Admin', 1) ON DUPLICATE KEY UPDATE name = name;