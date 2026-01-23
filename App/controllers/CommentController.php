<?php

namespace App\Controllers;

use App\Models\commentaire;
use PDO;

class CommentaireController
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    
    public function index($db)
    {
        $model = new commentaire($this->db);
        $model->getAllComments($db);
        
        
    }

    
    public function delete($id)
    {
        $comment = new commentaire($this->db);
        $comment->setIdCommentaire($id);

        if ($comment->deleteComment()) {
            $_SESSION['message'] = "Comment deleted successfully.";
        } else {
            $_SESSION['error'] = "Failed to delete comment.";
        }
        
        header('Location: /comments');
    }

    
    public function approve($id)
    {
        if (commentaire::approveComment($this->db, $id)) {
            $_SESSION['message'] = "Comment approved.";
        }
        header('Location: /comments');
    }

    public function reject($id)
    {
        if (commentaire::rejectComment($this->db, $id)) {
            $_SESSION['message'] = "Comment rejected.";
        }
        header('Location: /comments');
    }
}

?>