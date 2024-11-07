<?php
class Author extends Db
{
    public function getAllAuthor()
    {
        $sql = self::$connection->prepare("SELECT * FROM authors");
    }
}
