<?php

if(date('H') >= 0 && date('H') <= 12){

	echo "Bom dia <strong>{$_SESSION['nome_usuario']}!</strong>";

} elseif (date('H') >= 13 && date('H') <= 18) {

	echo "Boa tarde <strong>{$_SESSION['nome_usuario']}!</strong>";
}else {

	echo "Boa noite <strong>{$_SESSION['nome_usuario']}!</strong>";
}

?>		