<?php
function get_items_by_category($category_id)
{
    global $db;
    if ($category_id) {
        $query = 'SELECT A.ItemNum, A.Title, A.Description, C.categoryName From todoitems A
            LEFT JOIN categories C ON A.categoryID = C.categoryID
                WHERE A.categoryID = :categoryID ORDER BY A.ItemNum';
    } else {
        $query = 'SELECT A.ItemNum, A.Title, A.Description, C.categoryName From todoitems A
        LEFT JOIN categories C ON A.categoryID = C.categoryID ORDER BY C.categoryID';
    }
    $statement = $db->prepare($query);
    if ($category_id) {
        $statement->bindValue(':categoryID', $category_id);
    }
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

function delete_item($task_id)
{
    global $db;
    $query = 'DELETE FROM todoitems WHERE ItemNum = :task_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':task_id', $task_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_item($category_id, $title, $description)
{
    global $db;
    $query = 'INSERT INTO todoitems ( categoryID, Title, Description ) VALUES (:category_id, :title, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();
}
