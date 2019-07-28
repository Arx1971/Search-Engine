CREATE TABLE page(
    page_id int AUTO_INCREMENT not null,
    url text,
    title text,
    description text,
    lastModified date,
    lastIndexed date,
    timeToindex date,
    PRIMARY KEY(page_id)
);

/*----------*/

CREATE TABLE word(
    word_id int AUTO_INCREMENT,
    wordName varchar(512),
    PRIMARY KEY(word_id)
);

/*----------*/

CREATE TABLE page_word(
    pageWordId int AUTO_INCREMENT,
    page_id int,
    word_id int,
    freq int,
    PRIMARY KEY(pageWordId),
    FOREIGN KEY (page_id) REFERENCES page(page_id) ON DELETE CASCADE,
    FOREIGN KEY (word_id) REFERENCES word(word_id) ON DELETE CASCADE
);

/*-----------*/

CREATE TABLE search(
    searchid int AUTO_INCREMENT not null,
    terms text,
    count int,
    searchDate date,
    timeTosearch time,
    PRIMARY KEY(searchid)
);puerto rico people died