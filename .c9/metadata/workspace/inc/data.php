{"filter":false,"title":"data.php","tooltip":"/inc/data.php","undoManager":{"mark":2,"position":2,"stack":[[{"start":{"row":0,"column":0},"end":{"row":32,"column":6},"action":"insert","lines":["    <?php","        $data = date('D');","        $mes = date('M');","        $dia = date('d');","        $ano = date('Y');","        ","        $semana = array(","            'Sun' => 'Domingo', ","            'Mon' => 'Segunda-Feira',","            'Tue' => 'Terca-Feira',","            'Wed' => 'Quarta-Feira',","            'Thu' => 'Quinta-Feira',","            'Fri' => 'Sexta-Feira',","            'Sat' => 'Sábado'","        );","        ","        $mes_extenso = array(","            'Jan' => 'Janeiro',","            'Feb' => 'Fevereiro',","            'Mar' => 'Marco',","            'Apr' => 'Abril',","            'May' => 'Maio',","            'Jun' => 'Junho',","            'Jul' => 'Julho',","            'Aug' => 'Agosto',","            'Nov' => 'Novembro',","            'Sep' => 'Setembro',","            'Oct' => 'Outubro',","            'Dec' => 'Dezembro'","        );","        ","        echo $semana[\"$data\"] . \", {$dia} de \" . $mes_extenso[\"$mes\"] . \" de {$ano}\";","    ?>"],"id":1}],[{"start":{"row":31,"column":8},"end":{"row":31,"column":9},"action":"insert","lines":["/"],"id":2}],[{"start":{"row":31,"column":9},"end":{"row":31,"column":10},"action":"insert","lines":["/"],"id":3}]]},"ace":{"folds":[],"scrolltop":120,"scrollleft":0,"selection":{"start":{"row":31,"column":10},"end":{"row":31,"column":10},"isBackwards":true},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":281,"mode":"ace/mode/php"}},"timestamp":1505488724955,"hash":"4618aa1686cb44e7e03595c09b4002179bb8a4a5"}