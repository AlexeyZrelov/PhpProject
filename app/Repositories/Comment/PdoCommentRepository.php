<?php

namespace App\Repositories\Comment;

use App\Models\Dbh;
use PDO;

class PdoCommentRepository implements CommentRepository
{
    public function all(): array
    {
        $stmt1 = (new Dbh())->connect()->prepare('SELECT * FROM comments');
        $stmt1->execute();
        return $stmt1->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($apartment_id, $name, $comment): void
    {
        $stmt = (new Dbh())->connect()->prepare('INSERT INTO comments (apartment_id, name, comment, date) VALUES (?, ?, ?, NOW())');
        $stmt->execute([$apartment_id, $name, $comment]);
    }

    public function deleteById(array $vars): void
    {
        $id = (int)$vars['id'];
        $stmt = (new Dbh())->connect()->prepare('DELETE FROM comments WHERE id=?');
        $stmt->execute([$id]);
    }

}