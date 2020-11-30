<?php 
if (isset($_SESSION['txHash'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div>
		<p class="folioCert">FOLIO: <?php echo $_SESSION['folio'];?></p>
		<img class="qr" src="qrs/<?php echo $_SESSION['folio'];?>.png">
	</div>
	<div class="liga">
		<a href="http://localhost:8080/CertificadosBlockchainEthereum/back/TESI%20__%20Sitio%20__%20Oficial.php?hashtx=<?php echo $_SESSION['txHash'].'&n'.$_SESSION['net'];?>">http://tesi.org.mx/dir/certificados.php?hashtx=<?php echo $_SESSION['txHash'].'&n'.$_SESSION['net'].'&ps'.$_SESSION['clave'];?></a>
	</div>
		<p class="infTx">Información de la transacción</p>
		<table class="tableTx">
		  <tr>
		    <th class="conTx">Hash de la Transacción:</th>
		    <th class="conTx"><?php echo $_SESSION['txHash'];?></th>
		  </tr>
		  <tr>
		    <td class="conTx">De:</td>
		    <td class="conTx"><?php echo $_SESSION['from'];?></td>
		  </tr>
		   <tr>
		    <td class="conTx">Para:</td>
		    <td class="conTx"><?php echo $_SESSION['to'];?></td>
		  </tr>
		  <tr>
		    <td class="conTx">Bloque número:</td>
		    <td class="conTx"><?php echo $_SESSION['blockNumber'];?></td>
		  </tr>
		</table>
		<div>
		<p class="clave">Clave certificado digital: <?php echo $_SESSION['clave'];?></p>
	</div>
</body>
</html>
<?php  
session_destroy();
}
?>