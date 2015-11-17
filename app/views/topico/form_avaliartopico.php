<?php

/**
 * Description of form_avaliartopico
 *
 * @author Emanuel
 */
class form_avaliartopico {
    <body><center>
<h2>Formulário</h2>
<br><br>
<form action="mailto:colque aki seu e-mail" method="post" enctype="text/plain">

Nome Completo:<input type="text" name="nome" size="60" maxlenght="20">
<p>
E-mail:<input type="text" name="email" size="60" maxlenght="20">
</p><p>
<input type="checkbox" name="facil">Fácil<br>
<input type="checkbox" name="medio">Médio<br>
<input type="checkbox" name="dificil">Difícil<br>            
</p><p>

</p><p>
Comentarios
</p><p>
<textarea name="comentarios" rows="15" cols="30"></textarea>
</p><p>
<input type="submit" value="Enviar">
<input type="reset" value="Apagar Tudo">
</p></form>
</center>

</body>
}
