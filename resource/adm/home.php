<?php
error_reporting(0);
ignore_user_abort();
date_default_timezone_set("America/Fortaleza");

function getstr($url,$start,$fim,$n){
  return explode($fim, explode($start, $url)[$n])[0];
}



function l($size){
    $basic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
    $return= "";
    for($count= 0; $size > $count; $count++){
        $return.= $basic[rand(0, strlen($basic) - 1)];
    }
    return $return;
}


function adm($message){
	

	$chat_id = $message["chat"]["id"];
	$from_id = $message["from"]["id"];

	$text = strtolower($message['text']);
	preg_match_all('/[a-z-A-Z-0-9]*+/', $text, $args);
	$args = array_values(array_filter($args[0]));
	$cmd = $args[0];


	if ($cmd == "admin" || $cmd == "menu"){
			$menu .= "===================================\n";
			$menu .= "                 [MENU ADMIN THZBOT]\n ";
			$menu .= "===================================\n";
			$menu .= "/addcc -  adiciona novas ccs\n";
			$menu .= "/addmix -  adiciona novos mixs\n";
			$menu .= "/price - altera os preços\n";
			$menu .= "/mixprice - altera os preços dos mix\n";
	
			$menu .= "/GetUser - obter informacoes de um usuario pelo user\n";

			$menu .= "/addsaldo - add saldo a um usuário\n";
			$menu .= "/resaldo - remove saldo de um usuário!\n";
			$menu .= "/getsaldo - obter o saldo de um usuario!\n";
			$menu .= "/gGift - gera um git para resgata saldo\n";
			$menu .= "/users - LISTA OS USUARIO DO BOT\n";
			$menu .= "/setwelcome - adiciona uma msg de boas vindas\n";
			$menu .= "/addadmin - adiciona um admin\n";
			$menu .= "/showadms - mostra admins\n";
			$menu .= "/delladm - deleta um admin\n";
			$menu .= "/send - envia msg para os usuarios\n";
	 		bot("sendMessage",array("chat_id"=> $chat_id , "text" => $menu));
	 		die;

	}

	if ($cmd == "addcc"){
		$txt = "ℹ️ O comando /addcc funcionará da seguinte forma, onde o usuário colocará diante dos exemplos abaixo!

➕ Formato correto de adicionar seus cartões:* /addcc 5276600064049219|12|2024|721 *você também pode utilizar mostrando o valor dela ao lado e o nível!

ℹ️ Lembrete: O valor dela pode ser trocado pelo comando /price que também é utilizado para você setar os valores dos níveis (classic,standard,black)";
		if (empty($args[1])){
			bot("sendmessage",array("chat_id" => $chat_id , "text" => "$txt"));
			die();
		}else{

			$cc = str_replace("/addcc", '', explode("\n", $text));

			$totalccs = sizeof($cc);

			$nre = 0;

			$napr = 0;

			$logs = [];

			$txt = "ℹ️ Caro Administrador, por favor utilize essa função com muita segurança e muita paciência pois qualquer uso abusivo causará a queda total do bot e perda de arquivos.

✅ Os cartões informados já estão sendo adicionados!

🔄 Não repita este processo novamente com um novo comando, pois irá causar o loop infinito de adição de cartões.";

			bot("sendmessage",array("chat_id" => $chat_id , "text" => "$txt"));

			foreach ($cc as $value) {


				$lista = str_replace(array(" "), '/', trim($value));

				$regex = str_replace(array(':',";","|",",","=>","-"," ",'/','|||'), "|", $lista);

				$open = json_decode(file_get_contents("./ccs.json"),true);
			
				$bin = substr(trim($value), 0,6);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.4devs.com.br/ferramentas_online.php');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_ENCODING, "gzip");
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: www.4devs.com.br',
'sec-ch-ua-mobile: ?0',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36',
'Content-Type: application/x-www-form-urlencoded',
'Accept: */*',
'Origin: https://www.4devs.com.br',
'Referer: https://www.4devs.com.br/gerador_de_pessoas',
'Accept-Language: pt-PT,pt;q=0.9,en-US;q=0.8,en;q=0.7',
));
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/55555533xxxx.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/ddfrrrdeww23444.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'acao=gerar_pessoa&sexo=H&pontuacao=S&idade=0&cep_estado=&txt_qtde=1&cep_cidade=');
$gerar = curl_exec($ch);
$nome = GetStr($gerar, 'nome":"', '"');
$cpf = GetStr($gerar, 'cpf":"', '"');

				$binchk = file_get_contents('https://storebot.store/binsearch.php?bin='.$bin);
				$ban = strtoupper(getstr($binchk,'"bandeira": "','"',1));
				$type = strtoupper(getstr($binchk,'"tipo": "','"',1));
				$banco = strtoupper(getstr($binchk,'"banco": "','"',1));
				$pais = strtoupper(getstr($binchk,'"pais": "','"',1)); 
				$nivel = strtoupper(getstr($binchk,'"nivel": "','"',1));
			
				

				if (strtoupper($nivel) == 'ELECTRONIC'){
					$nivel = 'standard';
				}

				if (strpos(strtoupper($nivel) , 'PREPAID RELOADABLE') !==false){
					$nivel = 'standard';
				}

				if (strpos(strtolower($nivel),'platinum/world/standard') !==false){
					$nivel = 'platinum';
				}

				if (strpos(strtolower($nivel),'prepaid business') !==false){
					$nivel = 'business';
				}

				if (substr($bin, 0,4) == 5067 || substr($bin, 0,2) == 65  || substr($bin, 0,4) == 6363 ){
					$nivel = 'ELO';
				}

				if (substr($bin, 0,2) == 60 ){
					$nivel = 'HIPER';
				}

				if (empty(trim($nivel)) || empty(trim($pais))){
					$logs[] = "❌ o cartão: $value não foi adicionada, encontramos uma falha na mesma.";
				}

				$dir = (trim($pais) == "BRASIL") ? "brasil" : "gringa";
				

				if (!file_exists(getcwd()."/ccs/$dir")){
					mkdir(getcwd()."/ccs/$dir", 0755, true);
					$logs[] = "✅ diretórios de brasil/gringa foram criados.";	
				}

				$file = json_decode(file_get_contents("./ccs/$dir/$nivel.json"),true);

				$cc = explode("|", $regex)[0];
				$mes = explode("|", $regex)[1];
				$ano = explode("|", $regex)[2];
				$cvv = explode("|", $regex)[3];
$pas = "$pais";
$bann = "$banco";
				if (strlen($mes) == 1){
					$mes = "0$mes";
				}

				if (strlen($ano) == 2){
					$ano = "20$ano";
				}

				$indexs = (sizeof($file) > 0 ) ? sizeof($file) +1 : 1;

				$file [$indexs] = array(
					"cc" => $cc ,
					"mes" => $mes,
					"ano" => $ano,
					"cvv" => $cvv,
              	    "nome" => $nome,
               	    "cpf" => $cpf,
					"bandeira" => trim($ban),
					"nivel" => trim($nivel),
					"tipo" => trim($type),
					"banco" => $bann , 
					"pais" => $pas
				);
				
				$dsalva = json_encode($file,JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT );
				$salva = file_put_contents("./ccs/$dir/$nivel.json", $dsalva);
				if ($salva){
					$txt = "✔️ O cartão foi adicionado com sucesso em sua loja virtual!

ℹ️ Informações do cartão adicionado: $cc $mes/$ano $cvv - $ban $nivel $type $bann $pas

🔄 Não repita o processo de adicionar cartão para não dar loop infinito no bot.";
					bot("sendMessage",array("chat_id" => $chat_id,'text' =>"$txt"));
				}
				
			}

			bot("sendmessage",array("chat_id" => $chat_id , "text" => "⚙️ Logs das Atividades:\n" . implode("\n", $logs)."\n✅ Os cartões foram adicionados com sucesso! Boas vendas =D" ));
	
			die();
		}
	}else if ($cmd == "send"){
		$confs =  json_decode(file_get_contents('./resource/conf.json'),true);

		if (empty(buscaprox($message , "/send" , ["/send"]))){
			die(bot("sendmessage" , ["chat_id" => $chat_id , "text" => "⚙️ Para utilizar está função você deve digitar por exemplo: /send Olá pessoal bem vindos a minha loja virtual. Após isso você confirma e envie a todos os usuários cadastrados no bot!" , "parse_mode" => "html"]));
		}else{

			$menu =  ['inline_keyboard' => [[['text'=>"🔹",'callback_data'=>"envia_nao_0"] ,['text'=>"🔸",'callback_data'=>"envia_sim_0"]],]];

			$send = buscaprox($message , "/send" , ["/send"]);
			file_put_contents("./msgs.txt", trim($send));
			$txt .= "<b>✨Você está na opção de enviar mensagem/alerta a todos os usuários!</b>\n\n";
			$txt .= "<b>📩 - Sua Mensagem:</b> {$send}\n\n";
			$txt .= "<b>⚠️ - Será necessário escolher o modo de envio!</b>\n";
			$txt .= "<b>🔹 - Enviar para todos!</b>\n";
			$txt .= "<b>🔸 - Enviar e deletar os que não forem enviados!</b>\n";			
			bot("sendmessage" , ["chat_id" => $chat_id , "text" => $txt , "parse_mode" => "html" , "reply_markup" => $menu , "reply_to_message_id" => $message['message_id']]);
		}

		die();

	}else if($cmd == 'getuser'){

		$r = bot("sendmessage",array("chat_id" => $chat_id , "text" => "<b>⚙️ Estamos obtendo as informações deste usuário...</b>!" , "reply_to_message_id"=> $message['message_id'],"parse_mode" => "html"));

		$message_id = json_decode($r , true)['result']['message_id'];

		$users = json_decode(file_get_contents("./usuarios.json"),true);
		$ccscom = json_decode(file_get_contents("./ccsompradas.json"),true);
		$saldocom = json_decode(file_get_contents("./salcocomprado.json"),true); 

		if (empty($args[1])){
			die(bot("sendmessage",array("chat_id" => $chat_id , "text" => "ops , user: /GetUser [username]\nExemplo: /GetUser @terrordelas !" , "parse_mode" => "html")));
		}

		$user = str_replace("@", '', explode(" ", $message['text'])[1]);

		foreach ($users as $key => $value) {
			if ((string) trim($value['username']) == (string) trim( $user)){
				$iduser = $key;
				break;
			}	
		}

		if (empty($iduser)){
			die(bot("editMessageText",array( "message_id" => $message_id , "chat_id"=> $chat_id , "text" => "<b>ops , usuario nao encontrado !</b>","parse_mode" => 'html')));
		}

		if (!$users[$iduser]){
			die(bot("editMessageText",array( "message_id" => $message_id , "chat_id"=> $chat_id , "text" => "<b>ops , usuario nao encontrado !</b>","parse_mode" => 'html')));
		}

		$dados = $users[$iduser];
		$totalcc = sizeof($ccscom[$iduser]['ccs']);
		$totalmix = sizeof($ccscom[$iduser]['mixs']);
		$totalsaldo = sizeof($saldocom[$iduser]);

		$txt = "<b>informacoes do usuario!</b>\n\n";

		$txt .= "🧰<b>Id da carteira:</b> $iduser\n";
		$txt .= "💎<b>Nome: </b> {$dados['nome']}\n";

		$txt .= "💰<b>Saldo: </b> {$dados['saldo']}\n";

		$txt .= "📅<b>Data Cadastro: </b> ".date("d/m/Y H:s:i" , $dados['cadastro'])."\n";

		$txt .= "💳<b>Total De Ccs Compradas:</b> $totalcc\n";

		$txt .= "💳<b>Total De Mixs Comprados:</b> $totalmix\n";
		
		$txt .= "🏛<b>Recargas Feitas: </b> $totalsaldo	\n";

		bot("editMessageText",array( "message_id" => $message_id , "chat_id"=> $chat_id , "text" => $txt,"reply_to_message_id"=> $message['message_id'],"parse_mode" => 'html'));

	}else if($cmd == 'getsemlevel'){
		$open = json_decode(file_get_contents("./ccs.json"),true);
		$cc = '';
		foreach ($open['semnivel'] as $value) {

			$cc .= "ID DA CC: <code>{$value[id]}</code>\n";
			$cc .= "CC: {$value[cc]}\n";
			$cc .= "Bandeira: {$value[bandeira]}\n";
			$cc .= "Tipo: {$value[tipo]}\n";
			$cc .= "banco: {$value[banco]}\n";
			$cc .= "Pais: {$value[pais]}\n\n";
		}

		bot("sendMessage",array("chat_id" => $chat_id , "text" =>$cc,"parse_mode" => "html"));
		die();
	}else if($cmd == 'users'){
		
		$users = json_decode(file_get_contents("./usuarios.json"),true);

		$indexs = array_chunk(array_keys($users), 10)[0];
		$t = array_chunk($users, 10);

		$tt = sizeof($t);
		$txt .= "<b>✨LISTA DE USUARIOS DO BOT\n🍃mostrando: 1 de $tt</b>\n";

		
		foreach ($t[0] as $iduser => $value) {

			$txt .= "\n🧰<b>Id da carteira:</b> $indexs[$iduser]\n";
			$txt .= "💎<b>Nome: </b> {$value[nome]}\n";
			$txt .= "💰<b>Saldo: </b> {$value[saldo]}\n";
			$txt .= "📅<b>Data Cadastro: </b> ".date("d/m/Y H:s:i" , $value['cadastro'])."\n";
		
		}

		$menu =  ['inline_keyboard' => [

		[
			['text'=>"<<",'callback_data'=>"users_ant_0"] , ['text'=>">>",'callback_data'=>"users_prox_0"]
		] ,[
			['text'=>"🔙Volta",'callback_data'=>"menu"]
		]

		,]];

		bot("sendMessage",array("chat_id" => $chat_id , "text" =>$txt,"parse_mode" => "html" , "reply_to_message_id" => $message['message_id'] , "reply_markup" =>$menu));

		die();
	}else if ($cmd == "addadmin"){

		$id = explode(" ", $text)[1];

		if (empty($id)){
			bot("sendMessage",array("chat_id" => $chat_id , "text" =>"user: /addadmin [id_user]","parse_mode" => "html" , "reply_to_message_id" => $message['message_id']));
			die;
		}
		
		$users = json_decode(file_get_contents("./usuarios.json"),true);

		if (!$users[$id]){
			bot("sendMessage",array("chat_id" => $chat_id , "text" =>"<b>Usuario não encontrado! , ele deve envia-me uma msg antes de se torna um admin !</b>","parse_mode" => "html" , "reply_to_message_id" => $message['message_id']));
			die;
		}

		$conf = json_decode(file_get_contents('./resource/conf.json'),true);
		if ($conf['dono'] != $message['from']['id']){
			bot("sendMessage",array("chat_id" => $chat_id , "text" =>"<b>Erro: Apenas o dono pode add novos admins !</b>","parse_mode" => "html" , "reply_to_message_id" => $message['message_id']));
			die;
		}

		$nome = $users[$id]['nome'];
		$username = $users[$id]['username'];

		$users[$id]['adm'] = true;

		$dsalva = json_encode($users,JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT );
		$salva = file_put_contents('./usuarios.json', $dsalva);

		if ($salva){
			bot("sendMessage",array("chat_id" => $chat_id , "text" =>"<b>Novo admin Adicionado\nId: {$id}\nNome: {$nome}\nUser: {$username} !!</b>","parse_mode" => "html" , "reply_to_message_id" => $message['message_id']));
		}else{
			bot("sendMessage",array("chat_id" => $chat_id , "text" =>"<b>Erro ao Adiciona o admin !!</b>","parse_mode" => "html" , "reply_to_message_id" => $message['message_id']));
		}
		



	}else if ($cmd == "delladm"){

		$id = explode(" ", $text)[1];

		if (empty($id)){
			bot("sendMessage",array("chat_id" => $chat_id , "text" =>"user: /delladm [id_user]","parse_mode" => "html" , "reply_to_message_id" => $message['message_id']));
			die;
		}
		
		$users = json_decode(file_get_contents("./usuarios.json"),true);

		if (!$users[$id]){
			bot("sendMessage",array("chat_id" => $chat_id , "text" =>"<b>Usuario não encontrado! </b>","parse_mode" => "html" , "reply_to_message_id" => $message['message_id']));
			die;
		}

		$conf = json_decode(file_get_contents('./resource/conf.json'),true);
		if ($conf['dono'] != $message['from']['id']){
			bot("sendMessage",array("chat_id" => $chat_id , "text" =>"<b>Erro: Apenas o dono pode remove admins !</b>","parse_mode" => "html" , "reply_to_message_id" => $message['message_id']));
			die;
		}

		$nome = $users[$id]['nome'];
		$username = $users[$id]['username'];

		$users[$id]['adm'] = false;

		$dsalva = json_encode($users,JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT );
		$salva = file_put_contents('./usuarios.json', $dsalva);

		if ($salva){
			bot("sendMessage",array("chat_id" => $chat_id , "text" =>"<b>Id: {$id}\nNome: {$nome}\nUser: {$username}\nNão e mas admin !!</b>","parse_mode" => "html" , "reply_to_message_id" => $message['message_id']));
		}else{
			bot("sendMessage",array("chat_id" => $chat_id , "text" =>"<b>Erro ao Adiciona o admin !!</b>","parse_mode" => "html" , "reply_to_message_id" => $message['message_id']));
		}
		



	}else if ($cmd == "showadms"){

		
		$users = json_decode(file_get_contents("./usuarios.json"),true);

		

		$conf = json_decode(file_get_contents('./resource/conf.json'),true);
		if ($conf['dono'] != $message['from']['id']){
			bot("sendMessage",array("chat_id" => $chat_id , "text" =>"<b>Erro: Apenas o dono pode ver os admins !</b>","parse_mode" => "html" , "reply_to_message_id" => $message['message_id']));
			die;
		}

		$adms = [];
		foreach ($users as $key => $amdss) {
			if ($amdss["adm"] == "true" ){
				$adms[] = "🔐ID: $key\n✨Nome: $amdss[nome]\n🍃Username: $amdss[username]\n";
			}


		}

		bot("sendMessage",array("chat_id" => $chat_id , "text" => implode("\n", $adms),"parse_mode" => "html" , "reply_to_message_id" => $message['message_id']));

	}else if ($cmd == 'editnivel'){
		if (empty($args[1])){
			die(bot("sendmessage",array("chat_id" => $chat_id , "text" => "Para edita vc deve pega o id da cc , vc pode usa o /getsemlevel , user: /editnivel [id_cc] [level/nivel]" , "parse_mode" => "html")));
		}

		$values = explode(" ", $message['text']);


		$id = explode(" ", $message['text'])[1];

		$nivel = trim(substr( $message['text'],strlen($values[0] . $values[1]) +1));

		$open = json_decode(file_get_contents("./ccs.json"),true);

		foreach ($open['semnivel'] as $value) {
			if ((string)$value['id'] == (string) $id){
				$cc = $value;
				break;
			}
		}

		if (empty($cc)){
			die(bot("sendmessage",array("chat_id" => $chat_id , "text" => "Cc nao encontrada !" , "parse_mode" => "html")));
		}

		$key = array_search($cc, $open['semnivel']);

		$open[$nivel][] = array(
			"id" => sizeof($open[$nivel]),
			"cc" => $cc['cc'],
			"bandeira" => $cc['bandeira'],
            "tipo" => $cc['tipo'],
            "nivel" => strtoupper($nivel),
            "banco" => $cc['banco'],
            "pais" => $cc['pais']
 		);
		unset($open['semnivel'][$id]);
		$open['semnivel'] = array_values($open['semnivel']);
		$dsalva = json_encode($open,JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT );
		$salva = file_put_contents('./ccs.json', $dsalva);
		if ($salva){
			bot("sendMessage" , array("chat_id" => $chat_id , "text" => "Nivel Alterado ,\nCC: {$cc[cc]}\nBandeira: {$cc[bandeira]}\nTipo: {$cc[tipo]}\nNivel: {$nivel}\nBanco: {$cc[banco]}\nPais: {$cc[pais]}"));
		}


	}else if ($cmd == "getnivel"){

		$open = json_decode(file_get_contents("./ccs.json"),true);
		
		bot("sendmessage",array("chat_id" => $chat_id , "text" =>"Estes sao os niveis encontrados na db!\n<code>".implode("\n", array_keys($open))."</code>","parse_mode" => "html"));

	}else if ($cmd == "price"){
		if (empty($args[1])){
			bot("sendmessage",array("chat_id" => $chat_id , "text" => "
=====================

User: /price [nivel] [valor]

Obs: 
	* O nivel tem que ser exator com as das ccs ! 
	* O Valor dever ser um Numero Inteiro !
	* O nao e possivel atera o preco de apenas uma cc!
	* Caso uma cc seja add e o preços nao esta definido ele pega um valor padrao !
	* user /price default [valor] para altera o valor padrao

Exemplo:
	* /price gold 10
	* /price default 15

Note:
	* User o /getNivel para obter os nives que a na db!

====================="));
			die();
		}else{
			$openprice = json_decode(file_get_contents('./resource/conf.json'),true);

			$nivel = strtolower($args[1]);
			$price = $args[2];

			if (empty($price)){
				die(bot("sendmessage",array("chat_id" => $chat_id , "text" => "user /price")));
			}

			if (empty($nivel)){
				die(bot("sendmessage",array("chat_id" => $chat_id , "text" => "user /price")));
			}

			$openprice['price'][$nivel] = (int) $price;
			$dsalva = json_encode($openprice,JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT );
			$salva = file_put_contents('./resource/conf.json', $dsalva);

			if ($salva){
				bot("sendmessage",array("chat_id" => $chat_id , "text" => "sucesso preço alterado ! \n$nivel - $price" , "parse_mode" => "html"));	
			}else{
				bot("sendmessage",array("chat_id" => $chat_id , "text" => "Error ao altera preco !!" , "parse_mode" => "html"));
			}
		}

	}elseif ($cmd == 'addsaldo') {
		
		if (empty($args[1])){
			die(bot("sendmessage",array("chat_id" => $chat_id , "text" => "user: /addsaldo [id da carteira] [valor] \no usuario pode obter este id da carteira em seu perfil , o valor dever ser um Numero inteiro !", "parse_mode" => "html")));
		}

		if (empty($args[2])){
			die(bot("sendmessage",array("chat_id" => $chat_id , "text" => "user: /addsaldo [id da carteira] [valor] \no usuario pode obter este id da carteira em seu perfil , o valor dever ser um Numero inteiro !", "parse_mode" => "html")));
		}


		$openusers = json_decode(file_get_contents('./usuarios.json'),true);

		$cliente_id = $args[1];

		if (!$openusers[$cliente_id]){
			bot("sendmessage",array("chat_id" => $chat_id , "text" => "<b>Cliente Nao Encontrado Na Db !!</b>", "parse_mode" => "html"));
		}

		$saldoAn = $openusers[$cliente_id]['saldo'];

		$saldoaddd = (int) $saldoAn + (int) $args[2];
		$openusers[$cliente_id]['saldo'] = (int) $saldoaddd;
		

		$openusers[$cliente_id]['dataLimite'] = strtotime("+1 week");

 		$dsalva = json_encode($openusers,JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT );
		$salva = file_put_contents('./usuarios.json', $dsalva);

		$s = $openusers[$cliente_id]['nome'];
		$saldo = $args[2];
		if ($salva){
			bot("sendMessage",array("chat_id" => $chat_id , "text" => "<b>💰Sucesso Saldo Adicionado\nSaldo Add Ao Cliente: <b>$s</b>\nSaldo Add: <b>$saldo</b>\n\n⚠️Este saldo possuir a valida de 1 semana!!</b>" , "parse_mode" => "html"));	
		}else{
			bot("sendmessage",array("chat_id" => $chat_id , "text" => "Error ao add saldo !!" , "parse_mode" => "html"));
		}
		
	}elseif ($cmd == 'resaldo') {
		
		if (empty($args[1])){
			die(bot("sendmessage",array("chat_id" => $chat_id , "text" => "user: /resaldo [id_usuario] [valor] \no usuario pode obter este id_usuario em /dados , o valor dever ser um Numero inteiro !", "parse_mode" => "html")));
		}

		if (empty($args[2])){
			die(bot("sendmessage",array("chat_id" => $chat_id , "text" => "user: /resaldo [id_usuario] [valor] \no usuario pode obter este id_usuario em /dados , o valor dever ser um Numero inteiro !", "parse_mode" => "html")));
		}


		$openusers = json_decode(file_get_contents('./usuarios.json'),true);

		$cliente_id = $args[1];

		if (!$openusers[$cliente_id]){
			bot("sendmessage",array("chat_id" => $chat_id , "text" => "<b>Cliente Nao Encontrado Na Db !!</b>", "parse_mode" => "html"));
		}

		$saldoAn = $openusers[$cliente_id]['saldo'];

		$openusers[$cliente_id]['saldo'] = (int) $saldoAn - (int) $args[2];

		$dsalva = json_encode($openusers,JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT );
		$salva = file_put_contents('./usuarios.json', $dsalva);

		$s = $openusers[$cliente_id]['nome'];

		if ($salva){
			bot("sendmessage",array("chat_id" => $chat_id , "text" => "Saldo Removido do Cliente: $s" , "parse_mode" => "html"));	
		}else{
			bot("sendmessage",array("chat_id" => $chat_id , "text" => "Error ao remove saldo !!" , "parse_mode" => "html"));
		}
		
	}elseif ($cmd == 'getsaldo') {
		if (empty($args[1])){
			die(bot("sendmessage",array("chat_id" => $chat_id , "text" => "user: /getsaldo [id_usuario] \n", "parse_mode" => "html")));
		}


		$openusers = json_decode(file_get_contents('./usuarios.json'),true);
		$cliente_id = $args[1];

		if (!$openusers[$cliente_id]){
			bot("sendmessage",array("chat_id" => $chat_id , "text" => "<b>Cliente Nao Encontrado Na Db !!</b>", "parse_mode" => "html"));
		}

		$s = $openusers[$cliente_id]['nome'];
		$saldo = $openusers[$cliente_id]['saldo'];
		bot("sendmessage",array("chat_id" => $chat_id , "text" => "Saldo do Cliente: <b>$s</b> e <b>$saldo</b>" , "parse_mode" => "html"));	

	}else if ($cmd == 'ggift'){
		if (empty($args[1])){
			die(bot("sendmessage",array("chat_id" => $chat_id , "text" => "
=====================

User: /gGift [valor]

Obs: 
	* O codigo gerado so pode ser usado uma vez !
	* O Este codigos nao possui validade !
	* Os Valores dever ser numeros inteiros! 
	* E permitido a entrado de qualquer valor de 0 - 99999
	* O valor e em saldo !

Exemplo:

	* /gGift 10

=====================")));
		}

		$valor = (int) $args[1];

		$gif = l(10);

		$openprice = json_decode(file_get_contents('./gifts.json'),true);

		while (true) {
			if (!$openprice['gifts'][$gif]){
				break;
			}
		}

		$data = date("d-m-Y H:i:s");
		$openprice[$gif] = ["valor" => $valor , "date" => $data];

		$dsalva = json_encode($openprice,JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT );
		$salva = file_put_contents('./gifts.json', $dsalva);

		if ($salva){
			bot("sendmessage",array("chat_id" => $chat_id , "text" => "<b>Sucesso ao cria o codigo\nCodigo:</b> <code>$gif</code>\n<b>Valor:</b> $valor (saldo)\n\n⚠️<b>Obs: Este codigo so pode ser usando uma vez!</b>" , "parse_mode" => "html"));
		}else{
			bot("sendmessage",array("chat_id" => $chat_id , "text" => "Error ao Gera Gift !!" , "parse_mode" => "html"));
		}
		

	}else if ($cmd == 'addmix'){
		if (empty($args[1])){
			$space = '';
			for ($i=0; $i < 30; $i++) { 
				$space .= " ";
			}
			die(bot(
				"sendmessage",array("chat_id" => $chat_id , "text" => "
===================================
$space ADD MIX
===================================

user: /addmix [ccs]

Obs: 
	* O numero de ccs sera o numero do mix Ex: 2 ccs = mix de 2 etc..
	* O Evite Add mas 10 ccs , pode ocorre do bot buga !
	* O valor do mex e geral Exemplo todos os mix 2 terao o mesmo valor !

Exemplo:
	/addmix 4066695543634018|12|2025|176
	5447317485524324|05|2027|822
" , "parse_mode" => "html")));
		}

		$ccs = substr($text, strlen('addmix')+1);

		$ccs = explode("\n", $ccs);
		$mix = sizeof($ccs);
		$openmix = json_decode(file_get_contents("./mix.json"),true);

		$openmix[$mix][] = implode("\n", $ccs);


		$dsalva = json_encode($openmix,JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT );
		$salva = file_put_contents("./mix.json", $dsalva);

		if ($salva){
			bot("sendmessage",array("chat_id" => $chat_id , "text" => "mix - $mix\n".implode("\n", $ccs)."\nSalvo!!!!!" , "parse_mode" => "html"));
		}else{
			bot("sendmessage",array("chat_id" => $chat_id , "text" => "Error ao salva mix !!" , "parse_mode" => "html"));
		}

	}else if ($cmd == "mixprice"){
		if (empty($args[1])){
			bot("sendmessage",array("chat_id" => $chat_id , "text" => "
=====================

User: /mixprice [mix] [valor]

Obs:
	* Caso o mix seja add e o preços nao esta definido ele pega um valor padrao !
	* user /price default [valor] para altera o valor padrao
Exemplo:
	* /mixprice 5 50
	* /mixprice default 50

====================="));
			die();
		}else{
			$openprice = json_decode(file_get_contents('./resource/conf.json'),true);

			$mix = $args[1];
			$valor = $args[2];

			if (empty($mix)){
				die(bot("sendmessage",array("chat_id" => $chat_id , "text" => "user /price")));
			}

			if (empty($valor)){
				die(bot("sendmessage",array("chat_id" => $chat_id , "text" => "user /price")));
			}

			$openprice['pricemix'][$mix] = (int) $valor;
			$dsalva = json_encode($openprice,JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT );
			$salva = file_put_contents('./resource/conf.json', $dsalva);

			if ($salva){
				bot("sendmessage",array("chat_id" => $chat_id , "text" => "sucesso preço alterado ! \nmix: $mix - valor: $valor" , "parse_mode" => "html"));	
			}else{
				bot("sendmessage",array("chat_id" => $chat_id , "text" => "Error ao altera preco !!" , "parse_mode" => "html"));
			}
		}

	}else if ($cmd = "setwelcome"){
		
		if (empty(buscaprox($message , "/setwelcome" , ["/setwelcome"]))){
			die(bot("sendMessage",array("chat_id" => $chat_id , "text" =>"<b>setwelcome</b>\n\nuse: /setwelcome [message]\n\n<b>parametros (opcional)</b>:\n{name} - exibir o nome do usuario\n{id} - mostra o id da usuario\n\n<b>Estilos (opcional)</b>:\n* texto * - msg em negrito\n_texto_ - msg em italico\n [ texto ] (url) - cria um link\n\nExemplo:\n/setwelcome *{nome} , seja bem vindo(a) a store bot 😍*\n*seu id e:* _{id}_\nLink do meu grupo: [clik-aqui](t.me/exemplogrupo)\n_Estou sempre atualizado !_\n\nResultado: <b>Teste , seja bem vindo(a) a store bot 😍\nseu id e: </b><i>457674588</i>\nLink do meu grupo: <a href='https://t.me/testdgdfgrtrte'>clik-aqui</a>\n<i>Estou sempre atualizado !</i>","parse_mode" => "html" , "reply_to_message_id" => $message['message_id'])));
		}

		$msg = buscaprox($message , "/setwelcome" , ["/setwelcome"]);

		$txt = str_replace("{nome}", "testenome", $msg);
		$txt = str_replace("{id}", '1934634734', $txt);

		$testaenvio = bot("sendMessage",array("chat_id" => $chat_id , "text" => $txt , 'parse_mode' => "Markdown"));

		if (!$testaenvio){
			die(bot("sendMessage",array("chat_id" => $chat_id , "text" => "Sua message possui erro(s) no estilo !, tente novamete")));
		}


		$conf = json_decode(file_get_contents("./resource/conf.json") , true);

		$conf['welcome'] = trim($msg);

		$dsalva = json_encode($conf,JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT );
		$salva = file_put_contents("./resource/conf.json", $dsalva);
		if ($salva){
			bot("sendMessage",array("chat_id" => $chat_id , "text" => "boas vindas salva!"));
	    	exit();
		}else{
			bot("sendMessage",array("chat_id" => $chat_id , "text" => "Erro ao salva !"));
		}


	}


	


	// bot("sendmessage",array("chat_id" => $chat_id , "text" => $openmix));


	
}



?>