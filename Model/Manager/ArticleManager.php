<?php

namespace App\Model\Manager;

use App\Model\Entity\Article;
use Connect;
use DateTime;
use UserManager;

class ArticleManager
{
    public function findAll() : array {
        $articles = [];
        $query = Connect::dbConnect()->query("SELECT * FROM article");

        if ($query) {
            $format = "Y-m-d H:i:s";
            $userManager = new UserManager();
            foreach ($query ->fetchAll() as $article) {
                $articles[] = (new Article())
                    ->setId($article['id'])
                    ->setContent($article['content'])
                    ->setDateAdd(DateTime::createFromFormat($format,$article['date_add']))
                    ->setDateUpdate(DateTime::createFromFormat($format,$article['date_update']))
                    ->setTitle($article ['title'])
                    ->setAuthor($userManager->getUserById($article['user_fk']))
                ;
            }
        }
        return $articles;
    }
}