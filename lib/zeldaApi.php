<?php

namespace api;

use \PDO;

class personsApi extends api
{
    // get info about a person
    public function search($search_term)
    {
        $query = "
            SELECT *
            FROM imdb_person
            WHERE imdb_person.fullname LIKE ?
            ORDER BY imdb_person.imdb_id ASC
            LIMIT 0,12
        ";

        $statement = static::$pdo->prepare($query);

        $statement->execute(['%'.$search_term.'%']);

        $statement->setFetchMode(PDO::FETCH_OBJ);

        return $statement->fetchAll();
    }

    // get info about all the choices in a chapter
    public function getChoicesForChapter($chapter_id)
    {
        $query = "
            SELECT `choice`.*
            FROM `choice`
            WHERE `choice`.`chapter_id` = ?
            ORDER BY `choice`.`order` ASC
        ";

        $statement = static::$pdo->prepare($query);

        $statement->execute([$chapter_id]);

        $statement->setFetchMode(PDO::FETCH_OBJ);

        return $statement->fetchAll();
    }

    // get info about all the illustrations in a chapter
    public function getIllustrationsForChapter($chapter_id)
    {
        $query = "
            SELECT `illustration`.*
            FROM `illustration`
            WHERE `illustration`.`chapter_id` = ?
            ORDER BY `illustration`.`order` ASC
        ";

        $statement = static::$pdo->prepare($query);

        $statement->execute([$chapter_id]);

        $statement->setFetchMode(PDO::FETCH_OBJ);

        return $statement->fetchAll();
    }
}