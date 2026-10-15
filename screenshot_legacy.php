<?php
// Serves the old /screenshots/<id>.<ext> URLs (see .htaccess). A prod has at
// most one screenshot (uploads delete the other extensions), so serve
// whichever exists, in www's find_screenshot() order: links with the wrong
// extension, or .jpeg, still get the image
$types = array("jpg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
$id = (int)($_GET["id"] ?? 0);
if (in_array($_GET["ext"] ?? "", array("jpg", "jpeg", "gif", "png"))) {
  foreach ($types as $ext => $type) {
    $path = sprintf(__DIR__ . "/files/screenshots/%05d/%08d.%s", (int)($id / 1000), $id, $ext);
    if (file_exists($path)) {
      header("Content-Type: " . $type);
      header("Last-Modified: " . gmdate("D, d M Y H:i:s", filemtime($path)) . " GMT");
      readfile($path);
      exit();
    }
  }
}
http_response_code(404);
