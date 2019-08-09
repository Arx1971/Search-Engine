CREATE TABLE page(
    page_id int AUTO_INCREMENT not null,
    url text,
    title text,
    description text,
    lastModified text,
    lastIndexed date,
    timeToindex time,
    PRIMARY KEY(page_id)
);

/*----------*/

CREATE TABLE word(
    word_id int AUTO_INCREMENT,
    wordName varchar(512) NOT NULL,
    primary KEY(word_id),
    UNIQUE (wordName)
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
);

/*-------------*/

delete from page_word;
delete from page;
DELETE from word;
DELETE from pages;


/*--------------*/

SELECT * 
FROM page, word, page_word 
WHERE page.page_id = page_word.page_id 
AND word.word_id = page_word.word_id 
AND word.wordName = 'Bounty'
ORDER BY freq DESC
