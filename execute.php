<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if(!$update)
{
  exit;
}
$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = trim($text);
$text = strtolower($text);
header("Content-Type: application/json");
$response = '';
if(strpos($text, "/start") === 0 || $text=="ciao")
{
    $response = "Ciao $firstname, sono il bot del gruppo A7A. Scrivi /serie per sapere quali serie traduciamo al momento, o /sub per conoscere l'avanzamento delle traduzioni. Per contattarci, usa /scrivici. Per sapere come unirti a noi usa il comando /join";
}
elseif($text=="/serie" || $text=="/serie@a7asubtitlesbot")
{
    $response = "Al momento ci occupiamo delle seguenti serie:\r\nThe Flash s06 (solo crossover),\n\rArrow S08 (solo Crossover),\n\rLegends of Tomorrow s05 (solo crossover),\nWatchmen,\r\nThe 100,\nVeronica Mars s04,\nVictoria,\r\nThe Alienist,\r\nBig Sky,\r\nCall Your Mother,\r\nYounger s07,\r\nRiverdale,\r\nFather Brown s08,\r\nGossip Girl 2021,\r\nStargirl (DC),\r\nThe Sex Lives of College Girls,\r\nOutlander,\r\nSwimming with Sharks,\r\nIn my skin,\r\nInside Man,\r\nBrassic,\r\nQueens of Mystery,\r\nRidley,\r\nOne of us is lying";
}
elseif($text=="watchmen")
{
    $response = "Episodi 1x07, 1x08, 1x09: IN REVISIONE";
}
elseif($text=="the girl before")
    {
        $response = "Episodio 1x02: IN TRADUZIONE";
    }
elseif($text=="/sub" || $text=="/sub@a7asubtitlesbot")
    {
        $response = "Di quale serie vorresti conoscere l'avanzamento?\r\nScrivi il titolo della serie citando questo messaggio o clicca sui tasti qui sotto.";
        $keyboard = [
            ["Stargirl", "Ridley"],
            ["One of us is lying", "Swimming with Sharks"],
            ["Brassic", "Inside Man"]
                   ];
    }
elseif($text=="four lives")
    {
        $response = "Episodio 1x01: IN REVISIONE\r\nEpisodio 1x02: IN TRADUZIONE";
    }
elseif($text=="the flash")
    {
        $response = "Episodio 6x09 Crisis Parte 3: IN LAVORAZIONE AVANZATA";
    }
elseif($text=="/join" || $text=="/join@a7asubtitlesbot")
    {
        $response = "🖥 Conosci l'inglese, sei appassionato di serie TV e vuoi metterti alla prova nella traduzione? Scrivi a 📩 a7asubtitles@protonmail.com ✉️ per tradurre con noi! 🤓";
    }
elseif($text=="in my skin")
    {
        $response = "Episodio 2x03: IN REVISIONE";
    }
elseif($text=="outlander")
    {
        $response = "Episodio 6x02: IN REVISIONE\r\nEpisodio 6x03: IN REVISIONE\r\nEpisodio 6x04: IN TRADUZIONE";
    }
elseif($text=="the 100")
    {
        $response = "Episodi da 6x09 a 6x13: IN LAVORAZIONE.\r\nEpisodio 7x10: PUBBLICATO ✅\r\nEpisodio 7x11: IN REVISIONE\r\nEpisodio 7x12: IN TRADUZIONE\r\nEpisodio 7x13: IN TRADUZIONE\r\nEpisodio 7x14: IN TRADUZIONE\r\nEpisodio 7x15: IN TRADUZIONE";
    }
elseif($text=="veronica mars")
    {
        $response = "Episodi 4x08: IN REVISIONE\r\nLa serie verrà completata appena possibile.";
    }
elseif($text=="victoria")
    {
        $response = "Episodi da 3x03 a 3x08: IN LAVORAZIONE.\r\nLa serie verrà recuperata appena possibile, compatibilmente con gli impegni di vita reale del team.";
    }
elseif($text=="inside man")
    {
        $response = "Episodio 1x02: IN REVISIONE";
    }
elseif($text=="younger")
    {
        $response = "Episodi 7x04: PUBBLICATO ✅\r\nEpisodio 7x05: IN TRADUZIONE\r\nEpisodio 7x06: IN TRADUZIONE";
    }
elseif($text=="/scrivici" || $text=="/scrivici@a7asubtitlesbot")
    {
        $response = "Per feedback, segnalazioni o domande, contatta lo staff attraverso il seguente bot: @contattaci_a7a_bot";
    }
elseif($text=="arrow")
     {
         $response = "Episodio 8x08 - Crisis Parte 4 - IN TRADUZIONE\r\n(Ci occupiamo solo del crossover)";
     }
elseif($text=="legends of tomorrow")
    {
        $response = "Episodio 5x01 - Crisis Parte 5 - IN TRADUZIONE\r\n(Ci occupiamo solo del crossover)";
    }
elseif($text=="/prossimamente" || $text=="/prossimamente@a7asubtitlesbot")
    {
        $response = "Prossimamente ci occuperemo delle seguenti serie:\r\nOutlander - Stagione 6\r\nLISTA IN CONTINUO AGGIORNAMENTO";
    }
elseif($text=="stargirl")
    {
       $response = "Episodio 2x06/2x12: IN LAVORAZIONE - usciranno appena possibile\r\nEpisodio 2x13 Finale di Stagione: PUBBLICATO ✅\r\nEpisodio 3x06: IN REVISIONE";
    }
elseif($text=="killing eve")
    {
       $response = "Episodio 4x08 FINALE DI SERIE: PUBBLICATO ✅";
    }   
elseif($text=="riverdale")
    {
       $response = "Episodio 6x01: IN REVISIONE\r\nEpisodio 5x10 midseason finale: IN REVISIONE\r\nEpisodi da 5x12 a 5x19: IN LAVORAZIONE";
    }
elseif($text=="call your mother")
    {
       $response = "Episodio 1x07: IN REVISIONE";
    }
elseif($text=="swimming with sharks")
    {
       $response = "Episodio 1x03: IN REVISIONE\r\nEpisodio 1x04: IN TRADUZIONE";
    }  
elseif($text=="gossip girl")
    {
       $response = "Episodio 1x01: PUBBLICATO ✅\r\nEpisodio 1x02: IN REVISIONE\r\nEpisodio 1x03: IN REVISIONE\r\nAVVISO: La serie verrà completata appena possibile!";
    }      
elseif($text=="ridley")
    {
       $response = "Episodio 1x02: IN TRADUZIONE";
    }    
elseif($text=="the sex lives of college girls")
    {
       $response = "Episodio 1x01: IN REVISIONE\r\nEpisodi 1x02/1x10: IN ATTESA DI TRADUZIONE";
    }
elseif($text=="brassic")
    {
       $response = "Episodio 4x03: IN TRADUZIONE";
    }
elseif($text=="one of us is lying")
    {
       $response = "Episodio 2x01: IN TRADUZIONE";
    }                 
else
{
    $response = "";
}
$parameters = array('chat_id' => $chatId, 'text' => $response);

if (is_array($keyboard)) {
    $parameters['reply_markup'] = ['keyboard' => $keyboard, 'resize_keyboard' => true, 'one_time_keyboard' => true];
}

$parameters['method'] = 'sendMessage';
echo json_encode($parameters);