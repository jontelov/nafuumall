<?php
/**
 * Categories Model Class
 *
 * @author John Muiruri <jontedev@gmail.com>
 */

class CategoryModel
{
    /**
     * Instantiate database
     */
    public $db;

    /****************************************
     * Categories Section
     */

    /**
     * Get Categories
     *
     */
    public function getCategories($db)
    {
        $pdo =  $db->getConn();
        
        $sql = "SELECT `cat_id`, `cat_name` FROM `category`";
        
        $result = $pdo->prepare($sql);

        if ($result->rowCount() > 0) {
            $data = $result->fetch();
            return $data;
        } else {
            return false;
        }
    }
    /**
     * Get Category
     *
     */
    public function getCategory($db, $id)
    {
        $pdo = $db->getConn();
        
        $sql = "SELECT `cat_id`, `cat_name` FROM `category` WHERE cat_id=:cat_id";

        $result = $pdo->prepare($sql);
        
        $result->execute($id);

        if ($result->rowCount() > 0) {

            $data = $result->fetch();
            return $data;

        } else {

            return false;
        }
    }
    /**
     * Add Category
     *
     */
    public function addCategory($db, $data)
    {
        $pdo = $db->getConn();
        
        $sql = "INSERT INTO `category`(`cat_name`) VALUES (?)";
        
        $result =$pdo->prepare($sql)->execute($data);
        if ($result) {
            return true;

        } else {
            return false;
        }
    }
    /**
     * Update Category
     *
     */
    public function updateCategory($db, $data)
    {
        $pdo =  $db->getConn();
        
        $sql = "UPDATE`category` SET cat_name=:cat_name WHERE cat_id=:cat_id";
        
        $result =$pdo->prepare($sql)->execute($data);

        if ($result) {
            return true;

        } else {
            return false;
        }
    }
    /**
     * Delete Category
     *
     */
    public function deleteCategory($db, $id)
    {
        $pdo =  $db->getConn();
        
        $sql = "DELETE FROM `category` WHERE cat_id =:cat_id";
        
        $result =$pdo->prepare($sql)->execute($id);

        if ($result) {
            return true;

        } else {
            return false;
        }
    }
    /*************
     * End of Categories
     */

    /****************************************
    * Sub-categories Section
    */
    
    /**
     * Get Sub-categories
     *
     */
    public function getSubs($db)
    {
        $pdo =  $db->getConn();
        
        $sql = "SELECT `sub_id`, `sub_name`,`cat_id` FROM `sub_category`";
        
        $result = $pdo->prepare($sql);

        if ($result->rowCount() > 0) {
            $data = $result->fetch();
            return $data;
        } else {
            return false;
        }
    }
    /**
     * Get Category
     *
     */
    public function getSub($db, $id)
    {
        $pdo =  $db->getConn();
        
        $sql = "SELECT `sub_id`, `sub_name`,`cat_id` FROM `sub_category` WHERE sub_id =:sub_id";
        
        $result = $pdo->prepare($sql);
        
        $result->execute($id);

        if ($result->rowCount() > 0) {

            $data = $result->fetch();
            return $data;

        } else {

            return false;
        }
    }
    /**
     * Add Category
     *
     */
    public function addSub($db, $data)
    {
        $pdo =  $db->getConn();
        
        $sql = "INSERT INTO `sub_category`(`sub_name`,`cat_id`)  VALUES (?,?)";
        
        $result =$pdo->prepare($sql)->execute($data);
        if ($result) {
            return true;

        } else {
            return false;
        }
    }
    /**
     * Update Category
     *
     */
    public function updateSub($db, $data)
    {
        $pdo =  $db->getConn();
        
        $sql = "UPDATE`sub_category` SET sub_name=:sub_name, cat_id=:cat_name WHERE sub_id=:sub_id";
        
        $result =$pdo->prepare($sql)->execute($data);

        if ($result) {
            return true;

        } else {
            return false;
        }
    }
    /**
     * Delete Category
     *
     */
    public function deleteSub($db, $data)
    {
        $pdo =  $db->getConn();
        
        $sql = "DELETE FROM `sub_category` WHERE sub_id=:sub_id";
        
        $result =$pdo->prepare($sql)->execute($id);

        if ($result) {
            return true;

        } else {
            return false;
        }
    }
}
