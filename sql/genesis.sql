DROP TABLE IF EXISTS pages;
DROP TABLE IF EXISTS writers;

CREATE TABLE pages (
    title CHAR(140),
    body TEXT,
    author CHAR(20),
    lasteditby CHAR(20),
    lasteditts DATETIME,
    createts DATETIME,
    PRIMARY KEY (title)
);

CREATE TABLE writers (
    username CHAR(20),
    passhash CHAR(128),
    createts DATETIME,
    PRIMARY KEY (username)
);

INSERT INTO writers VALUES (
    'Adonai', 'ef2369228ae8b359e058e7273f1d13a7', datetime()
);

INSERT INTO pages VALUES (
    'Genesis',
    'When God began to create the heavens and the earth the earth was without shape or form, it was dark over the deep sea, and God’s wind swept over the waters.',
    'Adonai',
    NULL,
    NULL,
    datetime()
);
