<?php 

echo "if you want to server php code in xhtml and html docs,
      use these tags". "\n"; 


?>

<?= "print this string"?>


<?php if ($expression == true): ?> // if true execute the code below, else //skip
  this will show if the expresiion is true.
<?php else: ?>
  otherwise this will show.
<?php endif ; ?>


/* html tags with optional attributes, depending on some php condition.
<html>
<body>
<p <?php if ($highlight) : ?> class="highlight" <?php endif ; ?>>
  this is a paragraph
</p>
</body>
</html>
