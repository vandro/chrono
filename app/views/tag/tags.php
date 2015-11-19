
<?php
/**
 * Description of tags
 *
 * @author Emanuel Lucena <elucena94@gmail.com>
 */
 ?>

class tags {
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tags</title>
<head>

<style type="text/css">
/*Formata as tags*/
.tagCloud_1{
         font-family:verdana,arial; font-size: xx-small; 
}
.tagCloud_2{ 
         font-family:verdana,arial; font-size: small; 
}
.tagCloud_3 { 
         font-family:verdana,arial; font-size: medium; 
}
.tagCloud_4 {
         font-family:verdana,arial; font-size: large; 
}
.tagCloud_5 { 
         font-family:verdana,arial; font-size: xx-large; 
}
</style>

</head>
<body>

<?php
// Cria a conecção à base de dados
$db = @mysql_connect('localhost','root','');
@mysql_select_db("tags",$db);
 
// Obtem a lista de tags e número de vezes que surge na tabela
$resTags = @mysql_query("SELECT COUNT(tag) AS tagCount, tag FROM tags GROUP BY tag");

	// Cria um array de tags
	if (@mysql_num_rows($resTags)) {
	 
	       while (list($count, $tag) = mysql_fetch_row($resTags)) 
	         $array[$tag] = $count;
			
	}
 
// Obtém a tag com o maior número de registos
$max = max($array);
// Obtém a tag com o menor número de registos
$min = min($array);
// Obtém a Aplitude dos registos e calcula a diferença entre as categorias
$distribution = ($max -$min) / 5; // Este número corresponde ao número de categorias da Tag Clouds
 
	// Cria a Lista de tags
	foreach ($array as $tag=>$count) {
	 
	    // Define a categoria da tag
	    if ($count == $min) { $class = "tagCloud_1"; }
	    elseif ($count == $max) { $class = "tagCloud_5"; }
	    elseif ($count > ($min + ($distribution * 2))) { $class = "tagCloud_4"; }
	    elseif ($count > ($min + $distribution)) { $class = "tagCloud_3"; }
	    else { $class = "tagCloud_2"; }
	 
	 
	    // Cria o hiperlink com a tag
	    echo '<a href="?links='.$tag.'" title="'.$count.' Tópicos" class="'.$class.'">'.$tag.'</a> '; 
	 }

?>

</body>
</html>    
}
