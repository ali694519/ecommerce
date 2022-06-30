<?php 


function getAll($field,$table,$orderfield,$where = NULL,$and = NULL,$ordering='DESC') {
  global $connect;
  $getAll = $connect->prepare("SELECT $field FROM $table $where $and ORDER BY $orderfield $ordering");
  $getAll->execute();
  $all = $getAll->fetchAll();
  return $all;
}

 /**
     * Get  All Function v1.0
     * Function To Get All Records From Any Database Table
     */
    function GetAllFrom($tableName,$orderBy,$where = NULL) {
      global $connect;
$getAll = $connect->prepare("SELECT * FROM $tableName $where ORDER BY $orderBy DESC");
      $getAll->execute();
      $all =  $getAll->fetchAll();
      return $all;
}

 /**
     * Get  Categories Function v1.0
     * Function To Get Category From Database 
     */
function getCat() {
      global $connect;
      $getcat = $connect->prepare("SELECT * FROM categoriess where parent = 0 ORDER BY id ASC");
      $getcat->execute();
      $cats =  $getcat->fetchAll();
      return $cats;
}



 /**
     * Get Ad Items  Function v2.0
     * Function To Get Ad Items From Database 
     */
    function getItem($where,$value,$paprove = NULL) {
      global $connect;
      if($paprove == NULL) {
        $sql = "AND approve = 1";
      }else {
        $sql = NULL;
      }
      $getitem = $connect->prepare("SELECT * FROM itemss WHERE $where = ? $sql ORDER BY itemid DESC");
      $getitem->execute(array($value));
      $items =  $getitem->fetchAll();
      return $items;
}




function gettags($where,$paprove = NULL) {
  global $connect;
  if($paprove == NULL) {
    $sql = "AND approve = 1";
  }else {
    $sql = NULL;
  }
  $getitem = $connect->prepare("SELECT * FROM itemss WHERE $where $sql ORDER BY itemid DESC");
  $getitem->execute();
  $items =  $getitem->fetchAll();
  return $items;
}


/**
 * Check If User Is Not Activate
 * Function To Check The RegStatus Of The User
 */
function checkUserStatus($user) {
       global $connect;
       $stmtx = $connect->prepare("SELECT username , regstatus 
       FROM userss
       WHERE username = ?
       AND regstatus = 0");
       $stmtx->execute(array($user));
       $status = $stmtx->rowCount();
       return $status;
}
/**
   * CheckItems Function v1.0
   * Function To Check Item In Database [Function Accept Parameters]
   * $select = the Item Select [Example: user,item,category]
   * $from = the Table To Select From[ Example : users, items, categories]
   * $value = The Value Of Select [ Example : ali, box, Electronics ]
   */
function checkItem($select, $from, $value) {
  global $connect;
  $statement = $connect->prepare("SELECT $select FROM $from WHERE $select = ?" );
  $statement->execute(array($value));
  $count = $statement->rowCount();
  return $count;
}











// echo "Function Is Here";
/***
 * GetTitle Function v1.0
 * Title Function That Echo The Page Title In Case Page
 * Has The Variable $page And Echo Defult Title For Other Pages
 */

 function getTitle() {

    global $pageTitle;

    if(isset($pageTitle)) {
        echo $pageTitle;
    }else {
        echo "Default";
    }
 }

 /* Home Redirect Function v2.0
  *  [This Function Accept Parameters]
  * $theMsg = Ecvho The  Message[Error | Success | Warning]
  $url = The Link You Want To Redirect To 
  * $second = Seconds Befor Redirecting
  */

  function redirectHome($theMsg, $url = null, $seconds = 3)
    {
      if($url === null) 
      {
        $url = 'index.php';
        $link = "Homepage";
      } 
      else 
      {
        if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '' ) {
          $url = $_SERVER['HTTP_REFERER'];
          $link = "Previous page";
        }
        else{
        $url = 'index.php';
        $link = "Previous";
      }
    }
      echo $theMsg;
echo "<div class='alert alert-info'> You Will Be Redirected to $link After $seconds Seconds.</div>";
 header("refresh:$seconds;url=$url");
    exit();
    
  }


   /**
    * Count Number Of Items Function v1.0
    *Function To Count Of Items Rows
    *$item = The Item To Count
    *$table = The Table To Choose From
    */

    function countItems($item,$table) {
    global $connect;
    $stmt = $connect->prepare("SELECT COUNT($item) FROM $table");
    $stmt->execute();
   return $stmt->fetchColumn();
    }

    /**
     * Get Latest Records Function v1.0
     * Function To Get Items From Database [Users,Item,Comments]
     * $select = Field To Select
     * $table = The Table To Chosse From
     * $limit = Number Of Records To Gets
     */

     function getLatest($select,$table,$order,$limit = 5) {
       global $connect;
       $getstmt = $connect->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");
       $getstmt->execute();
       $rows =  $getstmt->fetchAll();
       return $rows;
     }



?>