
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>testWork</title>
    <link rel="stylesheet" href="master.css">
  </head>
  <body>
    <?php

    class treeOfDir
    {

      public function printTree($level = -1)
      {
          $dir      = '.';
          $iterator = new RecursiveIteratorIterator(
              new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
              RecursiveIteratorIterator::SELF_FIRST
          );
          if ($level > -1) {
              $iterator->setMaxDepth($level);
          }



          foreach ($iterator as $path => $obj) {
            echo $path . "<form action='delMake.php' method = 'post'> <button name = 'delite' value='$path'>delite</button> </form>";
                  if ($obj->isDir()){
                    echo "<form action='delMake.php' method = 'post'><input type = 'text' placeholder = 'название и разрешение' name = 'newUserFile'> <button name = 'makeFile' value='$path'>make a file!</button> </form>";
                  }
            echo '</br>';
          }
      }
    }
    $callTheClass = new treeOfDir();
    $callTheClass->printTree();

    ?>
  </body>
</html>
