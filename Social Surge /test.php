<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('socialsurge.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }

   $sql =<<<EOF
       CREATE TABLE NEWSLETTER
       (NEWSLETTERID  INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
        EMAILADDRESS          TEXT    NOT NULL);

        CREATE TABLE LOGIN
        (LOGINID  INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
         EMAILADDRESS          TEXT    NOT NULL,
         PASSWORD          varchar(15)   NOT NULL,);

      CREATE TABLE SUBSCRIPTION
      (SUBSCRIPTIONID  INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
      FULLNAME           varchar(25)    NOT NULL,
      EMAILADDRESS       TEXT           NOT NULL,
      PHONENUMBER        TEXT           NOT NULL);

      CREATE TABLE USERS
      (USERID  INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
      FULLNAME          varchar(25)   NOT NULL,
      EMAILADDRESS      TEXT          NOT NULL,
      PHONENUMBER       TEXT         NOT NULL,
      AGE               number(3)     NOT NULL,
      PASSWORD          varchar(15)   NOT NULL,
      ADDRESS           varchar(30)   NOT NULL,
      CITY              varchar(20)   NOT NULL,
      STATE             varchar(20)   NOT NULL,
      DATECREATED       date          NOT NULL);


      CREATE TABLE SESSIONUSER
      (SESSIONID  INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
      USERID                   INTEGER,
      SESSIONFULLNAME          varchar(25)   NOT NULL,
      SESSIONEMAILADDRESS      TEXT          NOT NULL,
      SESSIONUSERLISTID        INTEGER     NOT NULL,
      ACTIVESESSION            TEXT          NOT NULL,
      SUBSCRIPTIONID           INTEGER     NOT NULL);

      CREATE TABLE RECOMMENDATIONLIST
      (USERLISTID  INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
      USERID            INTEGER    NOT NULL,
      CATEGORY          TEXT         NOT NULL,
      ITEMNAME          TEXT         NOT NULL,
      RATING            TEXT         NOT NULL,
      RATINGREQUESTED   TEXT         NOT NULL,
      DIRECTIONSREQUESTED TEXT       NOT NULL);

      CREATE TABLE CONTACT
      (CONTACTID  INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
      FULLNAME                   varchar(25)   NOT NULL,
      EMAILADDRESS               TEXT          NOT NULL,
      PHONENUMBER                TEXT          NOT NULL,
      PREFERREDCOMMUNICATION     TEXT          NOT NULL,
      SUBJECT                    varchar(50)   NOT NULL,
      MESSAGE                    TEXT          NOT NULL,
      DATECREATED                date          NOT NULL);


      CREATE TABLE PASSWORDRESET
      (RESETID  INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
      USERID                     INTEGER               ,
      TOKEN                      varchar(15)   NOT NULL,
      NEWPASSWORD                varchar(15)   NOT NULL,
      CONFIRMATIONPASSWORD       varchar(15)   NOT NULL,
      PREFERREDCOMMUNICATION     TEXT          NOT NULL,
      EMAILADDRESS               TEXT          NOT NULL,
      PHONENUMBER                TEXT          NOT NULL,
      DATEREQUESTED              date          NOT NULL);



EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table created successfully\n";
   }
   $db->close();
?>
