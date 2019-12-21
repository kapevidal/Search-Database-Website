
CREATE TABLE `page` (
  `pageId` int NOT NULL AUTO_INCREMENT,
  `url` varchar(1000) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `lastModified` varchar(1000) NULL,
  `lastIndexed` varchar(1000)  NULL,
  `timeToIndex` varchar(45) NULL,
  PRIMARY KEY (`pageId`)
);
 

CREATE TABLE `search` (
  `searchId` int NOT NULL AUTO_INCREMENT,
  `terms` varchar(45) NOT NULL,
  `count` int(11) NOT NULL,
  `searchDate` varchar(45) NOT NULL,
  `timeToSearch` varchar(100) NOT NULL,
  PRIMARY KEY (`searchId`)
);

CREATE TABLE `word` (
  `wordId` int NOT NULL AUTO_INCREMENT,
  `wordName` varchar(45) NOT NULL,
  FULLTEXT(wordName),
  PRIMARY KEY (`wordId`)
);

CREATE TABLE `page_word`
 (
  `pageWordId` int NOT NULL AUTO_INCREMENT,
  `pageId` int(11) NOT NULL,
  `wordId` int(11) NOT NULL,
  `freq` int(11) NOT NULL,
  PRIMARY KEY (`pageWordId`),
   KEY `pageId_fk_idx` (`pageId`),
   KEY `wordId_fk_idx` (`wordId`),
  
  CONSTRAINT `pageId_fk` FOREIGN KEY (`pageId`) REFERENCES `page` (`pageId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `wordId_fk` FOREIGN KEY (`wordId`) REFERENCES `word` (`wordId`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

/*delete tables*/
ALTER TABLE `page_word`
DROP FOREIGN KEY `pageID_fk`;
    
alter table `page_word`
DROP FOREIGN KEY `wordId_fk`;
    
DROP TABLE page;
DROP TABLE page_word;
DROP TABLE search;
DROP TABLE word;

/*test tables*/
select * from page;

select * from word;
select * from page_word
select * from search

SELECT page.url, page.title, page.description, page_word.freq
                FROM page, word, page_word
                WHERE page.pageId = page_word.pageId
                AND word.wordId = page_word.wordId
                AND MATCH(UPPER(word.wordName)) AGAINST( UPPER('twitter zybooks' IN NATURAL LANGUAGE MODE))
                GROUP BY url
                ORDER BY freq;
                
SELECT * FROM search Order by searchDate  Desc;