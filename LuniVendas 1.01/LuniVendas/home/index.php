<?php
	include "../Layout/Header.php";
?>	
			<div name="menuHome" class="menuHome form-group" id="menuHome"><!-- DESENVOLVIMENTO DO MENU-->
				<div name="menuListaHome" class="menuListaHome" id="menuListaHome" type="none">
					<a href="#"><div class="menuItemHome" id="btncatalogo"><i class="fas fa-book fa-3x"></i><br>Catálogo</div></a>
					<a href="../clientes"><div class="menuItemHome" id="btnclientes"><i class="fas fa-address-card fa-3x"></i><br>Clientes</div></a>
					<a href="#"><div class="menuItemHome" id="btnestoque"><i class="fas fa-archive fa-3x"></i><br>Estoque</div></a>				
					<a href="../vendas"><div class="menuItemHome" id="bntvendas"><i class="fas fa-shopping-cart fa-3x"></i><br>Vendas</div></a>
					<a href="../despesas"><div class="menuItemHome" id="btnDespesas"><i class="fas fa-file-invoice-dollar fa-3x"></i><br>Despesas</div></a>
					<a href="../Controller/logOut.php"><div class="menuItemHome" id="btnSair"><i class="fas fa-sign-out-alt fa-3x"></i><br>Sair</div></a>
				</div>
			</div>
			
			
<?php
	include "../Layout/Footer.php";
?>