INSERT INTO
    users(username, email, password, role)
VALUES
    ('Greg', 'greg@gmail.com', 'blabla', DEFAULT),
    ('Johana', 'jo@hotmail.com', 'blabla', DEFAULT);

INSERT INTO
    tours(name, description, destinations)
VALUES
    ('Voyagez en Inde  du nord au sud', 'Un super itinéraire, de superbes hôtesses vous attendent, vous ne le regreterez pas !', '{"departure":"Bombay", "arrival":"Calcutta","halts": ["Jaipur", "Chennai"]}'),
    ('La France de la tête au pieds', 'Redécouvrez le terroir de vos ancêtres les gaulois', '{"departure":"Panam", "arrival":"Marseille","halts": ["Brest", "Lyon", "Nantes"]}')
