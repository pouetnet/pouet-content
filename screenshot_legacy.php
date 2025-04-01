<?
$id = (int)$_GET["id"];
$ext = $_GET["ext"];
switch($ext)
{
  case "jpeg": 
  case "jpg": header("Content-type: image/jpeg"); break;
  case "png": header("Content-type: image/png"); break;
  case "gif": header("Content-type: image/gif"); break;
  default: exit();
}
$newPath = sprintf("files/screenshots/%05d/%08d.%s",(int)($id/1000),$id,$ext);
echo file_get_contents($newPath);
?>
