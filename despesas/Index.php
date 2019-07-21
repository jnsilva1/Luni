<?php
	include "../Layout/Header.php";
?>
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item">
					<a class="nav-link active" id="despesa-tab" data-toggle="tab" href="#despesa" role="tab" aria-controls="despesa" aria-selected="true">Despesas</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" id="lista-tab" data-toggle="tab" href="#lista" role="tab" aria-controls="lista" aria-selected="false">Listagem</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" id="relatorio-tab" data-toggle="tab" href="#relatorio" role="tab" aria-controls="relatorio" aria-selected="false">Relatorio</a>
				  </li>
				</ul>
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane fade show active" id="despesa" role="tabpanel" aria-labelledby="despesa-tab">
					<div class="container">
						<form class="form">
							<div class="row">&nbsp;</div>
							<div class="row">
								<div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6 form-group">
									<label for="km">Km</label>
									<input type="number" class="form-control" placeholder="55555" id="km" name="km">
								</div>
								<div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6 form-group">
									<label for="abastecido">Valor Abastecido</label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text">R$</span>
										</div>
											<input type="number" class="form-control" placeholder="40.00" id="abastecido" name="abastecido">
									</div>									
								</div>
							</div>
							<div class="row">
								<div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6 form-group">
									<label for="combustivel">Valor Combustível</label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text">R$</span>
										</div>
											<input type="number" class="form-control" placeholder="2.399" id="combustivel" name="combustivel">
									</div>
								</div>
								<div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6 form-group">
									<label for="litros">Litros Abatecido</label>
									<div class="input-group mb-3">
										<input type="text" class="form-control" placeholder="" id="litros" name="litros" disabled>
										<div class="input-group-append">
											<span class="input-group-text">L</span>
										</div>
									</div>
									
								</div>
							</div>
							<div class="row">
								<div class="col col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group">
									<input type="button" id="btn_save" name="btn_save" value="Gravar" class="btn btn-primary">
									<input type="button" id="btn_new" name="btn_new" value="Novo" class="btn btn-primary">
									<input type="reset" id="btn_reset" hidden>
								</div>
							</div>
						</form>
					</div>
				  </div>
				  
				  <div class="tab-pane fade" id="lista" role="tabpanel" aria-labelledby="lista-tab">
						<div class="container">
							<div class="row">
								<div class="col col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group">
									<div id="listContentJs" class="table-responsive-sm">
									</div>
								</div>
							</div>	
						</div>
					</div>
				  <div class="tab-pane fade" id="relatorio" role="tabpanel" aria-labelledby="relatorio-tab">...</div>
				</div>

				
<script type="text/javascript" src="../script/despesas.js"></script>

<?php
	include "../Layout/Footer.php";
?>