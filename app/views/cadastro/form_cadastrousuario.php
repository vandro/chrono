<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cadastrousuario
 *
 * @author Emanuel
 */
class cadastrousuario {
<body class="blog">
	<div class="site-wrap">
		
		
		
		<div class="main-content">
			<div class="row"><div class="eightcol column">
	<h1>Cadastrar</h1>
	<form class="ajax-form formatted-form" action="http://www.google.com" method="POST">
		<div class="message"></div>
		<div class="sixcol column">
			<div class="field-wrapper">
				<input type="text" name="user_login" placeholder="Usuário (sem espaços ou acentos)">
			</div>								
		</div>
		<div class="sixcol column last">
			<div class="field-wrapper">
				<input type="text" name="user_email" placeholder="E-mail (conta válida)">
			</div>
		</div>
		<div class="clear"></div>
		<div class="sixcol column">
			<div class="field-wrapper">
				<input type="password" name="user_password" placeholder="Senha (pelo menos 4 letras)">
			</div>
		</div>
		<div class="sixcol column last">
			<div class="field-wrapper">
				<input type="password" name="user_password_repeat" placeholder="Repetir Senha">
			</div>
		</div>
		<div class="clear"></div>			
				<a href="#" class="button submit-button left"><span class="button-icon register"></span>Cadastrar</a>
		<div class="form-loader"></div>
		<input type="hidden" name="user_action" value="register_user">
		<input type="hidden" name="user_redirect" value="">
		<input type="hidden" name="nonce" class="nonce" value="c8b5aff44b">
		<input type="hidden" name="action" class="action" value="themex_update_user">
	</form>
	<div style="display:block;clear:both;background-color: rgba(0,0,0,0.1);width:0px;padding:0px;">
	</div>
</div>
<div class="fourcol column last">
		<h1>Entrar</h1>
		<form class="ajax-form formatted-form" action="http://www.google.com" method="POST">
		<div class="message"></div>
		<div class="field-wrapper">
			<input type="text" name="user_login" placeholder="Usuário">
		</div>
		<div class="field-wrapper">
			<input type="password" name="user_password" placeholder="Senha">
		</div>			
		<a href="#" class="button submit-button left"><span class="button-icon login"></span>Entrar</a>
				<div class="form-loader"></div>
		<input type="hidden" name="user_action" value="login_user">
		<input type="hidden" name="user_redirect" value="">
		<input type="hidden" name="nonce" class="nonce" value="c8b5aff44b">
		<input type="hidden" name="action" class="action" value="themex_update_user">
	</form>			
</div>
<div class="clear"></div>
								</div>
			</div>
			
			
						
		</div>
		
	</body>
}
