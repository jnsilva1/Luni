
<?php
	include_once '../Controller/Helpers/HtmlHelpes.php';
	include_once '../conexao.php';
	//include_once '../Layout/_Layout_1.01/index.php';
	use HtmlHelpers\Html as Html;


	$Html = new Html();

	$Html->Title('Testando Novo Layout');

	$Html->Body(
		$Html->CreateTab("tabs")->NewTab("tabs-1", array("caption"=>"Nova Aba"))->NewTab("tabs-2", array("caption"=>"Aba de Teste"))->NewTab("tabs-3", array("caption"=>"Terceira Aba"))->CloseTabs(),
		$Html->CreateContentTab(
			"tabs-1",  		
			"index",
			true,
			$Html->CreateRowBootstrap(
				"",
				$Html->CreateColBootstrap(
					"",
					12,
					6,
					3,
					3,
					$Html->CreateLabel("Meu Input Text"),
					$Html->CreateField(
						"div",
						$Html->TextBox("meutext", $arrayName = ["class" =>"input-group"]),
					)
				),
				$Html->CreateColBootstrap(
					"",
					12,
					6,
					3,
					3,
					$Html->CreateLabel("&nbsp;"),
					$Html->CreateField("",
						$Html->Checkbox("Meu_Checkbox","", "Sou um checkbox?","")
					)
					
				)
			) 
		),
		$Html->CreateContentTab(
			"tabs-2",
			"index",
			true,
			$Html->CreateRowBootstrap("",
				$Html->CreateColBootstrap(
					"",
					3,3,3,3,
					$Html->CreateLabel("Segunda Aba")
				)
			)
		),
		$Html->CreateContentTab(
			"tabs-3",
			"index",
			true,
			$Html->CreateRowBootstrap(
				"",
				$Html->CreateColBootstrap(
					"",
					12,12,12,12,
					$Html->CreateField("",
						$Html->CreateLabel("Terceira Aba" . rand())
					)
				)
			)
		)
	);

	$Html->Layout('../Layout/_Layout_1.01/index.php');

	echo $Html->Body();

?>