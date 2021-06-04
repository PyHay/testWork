<?php

class delMakeTree
{
  public function treeChanger()
  {
    if ($_POST['delite']) {

    $dir = $_POST['delite'];
    function recursiveRemoveDir($dir) {

    	$includes = glob($dir.'/*');

    	foreach ($includes as $include) {

    		if(is_dir($include)) {

    			recursiveRemoveDir($include);
    		}

    		else {

    			unlink($include);
    		}
    	}

    	rmdir($dir);
    }


    if (is_dir($dir)) {
      recursiveRemoveDir($dir);
    }else{
      unlink($dir);
    }

    header('Location:index.php');


  }
  else{

    $dir = $_POST['makeFile'];
    $userfile = $_POST['newUserFile'];
    file_put_contents($dir . "/$userfile", '');
    header('Location:index.php');

  }
}
}
$cht = new delMakeTree();
$cht->treeChanger();

 ?>
