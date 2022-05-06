<!-- 
1. Create an HTML header template inside of 12-templating-header.php
2. Create an HTML footer inside of 12-templating-footer.php
3. Import the header at the top of this file and the footer at the bottom of this file.
   Use the __DIR__ constant to explicitly navigate relative to this file.
 -->
<!-- Testing github repo -->
<?php require_once(__DIR__."/12-templating-header.php")?>

<h1>Hello World</h1>

<p>Page content would be here...</p>
<?php include_once(__DIR__."/12-templating-footer.php")?>
