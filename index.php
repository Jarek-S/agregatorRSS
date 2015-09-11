<?php
class Agregator
{
 public function pobierz()
 {
 $url  = 'http://wiadomosci.wp.pl/rss.xml';
 $xml  = new SimpleXMLElement(file_get_contents($url));
 
 echo '<div class="kontener">';
 echo '<p class="logo">Nasze wiadomości</p>';
 foreach( $xml->channel->item as $item )
  {
  echo '<div class="newsy">';
  echo ' <h2>'.$item->title.'</h2>';
  echo ' <p>'.$item->description.'</p>';
  echo '</div>';
  }
 echo '</div>';
 }
}
?>
 
<!DOCTYPE html>
<html>
 <head>
 <title>Wiadomości z RSS</title>
 <link rel="stylesheet" href="style.css">
 <meta charset="utf-8"> 
 </head>
 <body>
 <?php
 try
 {
 if(class_exists('SimpleXMLElement'))
  {
  $agregator = new Agregator;
  $agregator->pobierz();
  }
  else throw new Exception('Brak obsługi SimpleXML.');
 }
 catch(Exception $e)
 {
 echo $e->getMessage();
 }
 ?>
 </body>
</html>