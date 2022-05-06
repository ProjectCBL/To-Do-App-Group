-- User related entries
INSERT INTO users(UserName, Password, Email, FirstName, LastName) VALUES
    ("jupiter", ";%Zns&m3Tv", "ashley_bradtke21@hotmail.com", "Ashley", "Bradtke"),
    ("romanholiday", "Lb5Z\H$2a=", "evan_ondricka@hotmail.com", "Evan", "Odrick"),
    ("cauliflower", "/a9^D$zX`+", "nya.yundt54@gmail.com", "Anthony", "Hubbert"),
    ("tangerine", "MEdR>5'Gb`", "clementine10@hotmail.com", "Clementine", "Greer");

-- Task related entries
INSERT INTO Tasks(Title, Description, AccountID, Status, EntryDate, DueDate) VALUES
    ("Take Out the Trash", "Put it in the green bin.", 1, 'Not-Started', NULL, NULL),
    ("Wash the Dishes", "Wash and dry.", 1, 'Done', NULL, NULL),
    ("Go Biking", NULL, 2, 'In-Progress', "2022-04-23", NULL),
    ("Mail Letter", "Go to post office and mail letter", 2, 'Not-Started', NULL, "2022-05-16"),
    ("Create Spreadsheat", NULL, 2, 'OverDue', NULL, "2022-03-12"),
    ("Bake Cookies", "Bake 2 batches of cookies", 3, 'In-Progress', "2022-04-23", "2022-04-26"),
    ("Wash the Dog", "Go to pet salon.", 4, 'Not-Started', NULL, "2022-04-27"),
    ("Pick Up Friend", NULL, 4, 'Not-Started', "2022-04-23", NULL);

COMMIT;