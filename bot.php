<?php
date_default_timezone_set('Asia/Baghdad');
if(!file_exists('config.json')){
	$token = readline('Hi koke Enter Token: ');
	$id = readline('Hi koke Enter Id: ');
	file_put_contents('config.json', json_encode(['id'=>$id,'token'=>$token]));
	
} else {
		  $config = json_decode(file_get_contents('config.json'),1);
	$token = $config['token'];
	$id = $config['id'];
}

if(!file_exists('accounts.json')){
    file_put_contents('accounts.json',json_encode([]));
}
include 'index.php';
try {
	$callback = function ($update, $bot) {
		global $id;
		if($update != null){
		  $config = json_decode(file_get_contents('config.json'),1);
		  $config['filter'] = $config['filter'] != null ? $config['filter'] : 1;
      $accounts = json_decode(file_get_contents('accounts.json'),1);
			if(isset($update->message)){
				$message = $update->message;
				$chatId = $message->chat->id;
				$text = $message->text;
				if($chatId == $id){
					if($text == '/start'){
              $bot->sendphoto([ 'chat_id'=>$chatId,
                  'photo'=>"https://t.me/Xx_Taha_xX1",
                   'caption'=>'ðððð¨ ð½ð¤ð© ðð§ð¤ðð§ðð¢ðð ð½ð® : @Xxx_KSOMK_xxXð',
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'Ø§Ø¶Ø§ÙØ© Ø­Ø³Ø§Ø¨ ð¨ð»âð»','callback_data'=>'login']],
                       [['text'=>"ð¿ðð«ðð¡ð¤ð¥ðð§", 'url'=>"https://t.me/Xxx_Ksomk_xxX"]],
                      ]
                  ])
              ]);   
          } 
if($text == '/help'){
              $bot->sendvideo([ 'chat_id'=>$chatId,
              'video'=>"https://t.me/Xx_Taha_xX1",
              'caption'=>'Ø·Ø±Ù Ø§ÙØ³Ø­Ø¨Ø¨ð¤ð',
                      'reply_markup'=>json_encode([
                      'inline_keyboard'=>[                       
                       [['text'=>"ððð¥ð¤ð§ð© ðð§ð¤ðð¡ðð¢ð¨", 'url'=>"https://t.me/Xxx_Ksomk_xxX"]],
                       ]
                       ])
                       ]);
    
              $bot->sendvoice([ 'chat_id'=>$chatId,
                  'voice'=>"https://t.me/Xx_Taha_xX1",
                           'caption'=>'Ø§ÙØµÙØ¯ ØªØ¶ÙÙ ÙÙÙðð¤',
                ]);
                      $bot->sendvoice([ 'chat_id'=>$chatId,
                  'voice'=>"https://t.me/Xx_Taha_xX1",
              'caption'=>'ÙÙÙ ØªØ¬ÙÙ ÙÙØ²Ø±Ø§Øª ÙÙØµÙØ¯ ð¥ºâ¤',
             ]);
            
 }

    elseif($text != null){
          	if($config['mode'] != null){
          		$mode = $config['mode'];
          		if($mode == 'addL'){
          			$ig = new ig(['file'=>'','account'=>['useragent'=>'Instagram 27.0.0.7.97 Android (28\/9; 320dpi; 720x1544; OPPO; CPH2015; OP4C7D; mt6765; en_US)']]);
          			list($user,$pass) = explode(':',$text);
          			list($headers,$body) = $ig->login($user,$pass);
          			 echo $body;
          			$body = json_decode($body);
          			if(isset($body->message)){
          				if($body->message == 'challenge_required'){
          					$bot->sendMessage([
          							'chat_id'=>$chatId,
          							'parse_mode'=>'markdown',
          							'text'=>"*Error*.\nThe account was rejected because it is blocked or requires authentication âï¸"
          					]);
          				} else {
          					$bot->sendMessage([
          							'chat_id'=>$chatId,
          							'parse_mode'=>'markdown',
          							'text'=>"*Error*.\n - Incorrect Username Or Password"
          					]);
          				}
          			} elseif(isset($body->logged_in_user)) {
          				$body = $body->logged_in_user;
          				preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $headers, $matches);
								  $CookieStr = "";
								  foreach($matches[1] as $item) {
								      $CookieStr .= $item."; ";
								  }
          				$account = ['cookies'=>$CookieStr,'useragent'=>'Instagram 27.0.0.7.97 Android (28\/9; 320dpi; 720x1544; OPPO; CPH2015; OP4C7D; mt6765; en_US)'];
          				
          				$accounts[$text] = $account;
          				file_put_contents('accounts.json', json_encode($accounts));
          				$mid = $config['mid'];
          				$bot->sendMessage([
          				      'parse_mode'=>'markdown',
          							'chat_id'=>$chatId,
          							'text'=>"ØªÙ Ø§Ø¶Ø§ÙÙ Ø­Ø³Ø§Ø¨ Ø¬Ø¯ÙØ¯ Ø§ÙÙ Ø§ÙØ§Ø¯Ø§Ù ð£.*\n _Username_ : [$user])(instagram.com/$user)\n_Account Name_ : _{$body->full_name}_",
												'reply_to_message_id'=>$mid		
          					]);
          				$keyboard = ['inline_keyboard'=>[
										[['text'=>"Ø§Ø¶Ø§ÙØ© Ø­Ø³Ø§Ø¨ Ø¬Ø¯ÙØ¯ ð¨ð»âð»",'callback_data'=>'addL']]
									]];
		              foreach ($accounts as $account => $v) {
		                  $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'ddd'],['text'=>"ðï¸",'callback_data'=>'del&'.$account]];
		              }
		              $keyboard['inline_keyboard'][] = [['text'=>'Ø§ÙØµÙØ­Ø© Ø§ÙØ±Ø¦ÙØ³ÙØ© â»ï¸','callback_data'=>'back']];
		              $bot->editMessageText([
		                  'chat_id'=>$chatId,
		                  'message_id'=>$mid,
		                  'text'=>"Fake Account Control Page ð",
		                  'reply_markup'=>json_encode($keyboard)
		              ]);
		              $config['mode'] = null;
		              $config['mid'] = null;
		              file_put_contents('config.json', json_encode($config));
          			}
          		}  elseif($mode == 'selectFollowers'){
          		  if(is_numeric($text)){
          		    bot('sendMessage',[
          		        'chat_id'=>$chatId,
          		        'text'=>"ØªÙ Ø§ÙØªØ¹Ø¯ÙÙ.",
          		        'reply_to_message_id'=>$config['mid']
          		    ]);
          		    $config['filter'] = $text;
          		    $bot->editMessageText([
                      'chat_id'=>$chatId,
                      'message_id'=>$mid,
                      'text'=>"ðªðððð¢ð ð ð§ð¢ ðð¢ð¡ð§ð¥ð¢ð ð£ðð¡ðð â
ð¾ð¤ð£ð©ððð© ð¿ðð«ðð¡ð¤ð¥ðð§ - @Xxx_Ksomk_xxX",
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'Ø§Ø¶Ø§ÙØ© Ø­Ø³Ø§Ø¨ ð¨ð»âð»','callback_data'=>'login']],
                          [['text'=>'Ø·Ø±Ù Ø§ÙØ³Ø­Ø¨ ð','callback_data'=>'grabber']],
                          [['text'=>'Ø¨Ø¯Ø¡ Ø§ÙØµÙØ¯ â¶ï¸','callback_data'=>'run'],['text'=>'Ø§ÙÙØ§Ù Ø§ÙØµÙØ¯ â¸ï¸','callback_data'=>'stop']],
                              [['text'=>'Ø­Ø§ÙØ© Ø§ÙØ­Ø³Ø§Ø¨Ø§Øª âï¸','callback_data'=>'status']],
                      ]
                  ])
                  ]);
          		    $config['mode'] = null;
		              $config['mid'] = null;
		              file_put_contents('config.json', json_encode($config));
          		  } else {
          		    bot('sendMessage',[
          		        'chat_id'=>$chatId,
          		        'text'=>'- ÙØ±Ø¬Ù Ø§Ø±Ø³Ø§Ù Ø±ÙÙ ÙÙØ· .'
          		    ]);
          		  }
          		} else {
          		  switch($config['mode']){
          		    case 'search': 
          		      $config['mode'] = null; 
          		      $config['words'] = $text;
          		      file_put_contents('config.json', json_encode($config));
          		      exec('screen -dmS gr php search.php');
          		      break;
          		      case 'followers': 
          		      $config['mode'] = null; 
          		      $config['words'] = $text;
          		      file_put_contents('config.json', json_encode($config));
          		      exec('screen -dmS gr php followers.php');
          		      break;
          		      case 'following': 
          		      $config['mode'] = null; 
          		      $config['words'] = $text;
          		      file_put_contents('config.json', json_encode($config));
          		      exec('screen -dmS gr php following.php');
          		      break;
          		      case 'hashtag': 
          		      $config['mode'] = null; 
          		      $config['words'] = $text;
          		      file_put_contents('config.json', json_encode($config));
          		      exec('screen -dmS gr php hashtag.php');
          		      break;
          		  }
          		}
          	}
          }
				} else {
					$bot->sendMessage([
							'chat_id'=>$chatId,
							'text'=>"ÙØ°Ø§ Ø§ÙØ¨ÙØª ÙØ¯ÙÙØ¹ Ù ÙÙØ³ ÙØ¬Ø§ÙÙ 
ÙÙÙÙÙ Ø§ÙØ­ØµÙÙ Ø¹ÙÙ ÙØ³Ø®Ù ÙÙ Ø§ÙØ¨ÙØª Ø¨Ø¹Ø¯ Ø´Ø±Ø§Ø¦Ù ÙÙ Ø§ÙÙØ·ÙØ± 
Ø§Ø¶ØºØ· ÙÙ Ø§ÙØ§Ø³ÙÙ ÙÙØ±Ø§Ø³ÙÙ Ø§ÙÙØ·ÙØ± ð",
							'reply_markup'=>json_encode([
                  'inline_keyboard'=>[
                      [['text'=>'ð¿ðð«ðð¡ð¤ð¥ðð§','url'=>'t.me/Xxx_Ksomk_xxX']]
                  ]
							])
					]);
				}
			} elseif(isset($update->callback_query)) {
          $chatId = $update->callback_query->message->chat->id;
          $mid = $update->callback_query->message->message_id;
          $data = $update->callback_query->data;
          echo $data;
          if($data == 'login'){
              
        		$keyboard = ['inline_keyboard'=>[
									[['text'=>"Ø§Ø¶Ø§ÙØ© Ø­Ø³Ø§Ø¨ Ø¬Ø¯ÙØ¯ ð¨ð»âð»",'callback_data'=>'addL']]
									]];
		              foreach ($accounts as $account => $v) {
		                  $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'ddd'],['text'=>"ðï¸",'callback_data'=>'del&'.$account]];
		              }
		              $keyboard['inline_keyboard'][] = [['text'=>'Ø§ÙØµÙØ­Ø© Ø§ÙØ±Ø¦ÙØ³ÙØ© â»ï¸','callback_data'=>'back']];
		              $bot->sendMessage([
		                  'chat_id'=>$chatId,
		                  'message_id'=>$mid,
		                   'text'=>"Fake Account Control Page ð",
		                  'reply_markup'=>json_encode($keyboard)
		              ]);
          } elseif($data == 'addL'){
          	
          	$config['mode'] = 'addL';
          	$config['mid'] = $mid;
          	file_put_contents('config.json', json_encode($config));
          	$bot->sendMessage([
          			'chat_id'=>$chatId,
          			'text'=>"Send Account Like : `user:pass`",
          			'parse_mode'=>'markdown'
          	]);
          } elseif($data == 'grabber'){
            
            $for = $config['for'] != null ? $config['for'] : 'Ø­Ø¯Ø¯ Ø§ÙØ­Ø³Ø§Ø¨';
            $count = count(explode("\n", file_get_contents($for)));
            $bot->editMessageText([
                'chat_id'=>$chatId,
                'message_id'=>$mid,
                'text'=>"Users collection page. \n - Users : $count \n - For Account : $for",
                'reply_markup'=>json_encode([
                    'inline_keyboard'=>[
                        [['text'=>'Ø¨Ø­Ø« ÙÙÙØ§Øª ð','callback_data'=>'search']],
                        [['text'=>'ÙÙ ÙØ§Ø´ØªØ§Ù #ï¸â£','callback_data'=>'hashtag'],['text'=>'ÙÙ Ø§ÙØ§ÙØ³Ø¨ÙÙØ± ð¡','callback_data'=>'explore']],
                        [['text'=>'Followers ð¥','callback_data'=>'followers'],['text'=>"Following ð¤",'callback_data'=>'following']],
                        [['text'=>"For Account : $for",'callback_data'=>'for']],
                        [['text'=>'ÙØ³ØªÙ Ø¬Ø¯ÙØ¯Ø© ð¤','callback_data'=>'newList'],['text'=>'ÙØ³ØªÙ Ø³Ø§Ø¨ÙØ© ð¥','callback_data'=>'append']],
                        [['text'=>'Ø§ÙØµÙØ­Ø© Ø§ÙØ±Ø¦ÙØ³ÙØ© â»ï¸','callback_data'=>'back']],
                    ]
                ])
            ]);
          } elseif($data == 'search'){
            $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"Ø§ÙØ§Ù ÙÙ Ø¨Ø£Ø±Ø³Ø§Ù Ø§ÙÙÙÙÙ Ø§ÙØªØ±ÙØ¯ Ø§ÙØ¨Ø­Ø« Ø¹ÙÙÙØ§ Ù Ø§ÙØ¶Ø§ ÙÙÙÙÙ ÙÙ Ø§Ø³ØªØ®Ø¯Ø§Ù Ø§ÙØ«Ø± ÙÙ ÙÙÙÙ Ø¹Ù Ø·Ø±ÙÙ ÙØ¶Ø¹ ÙÙØ§ØµÙ Ø¨ÙÙ Ø§ÙÙÙÙØ§Øª ð"
            ]);
            $config['mode'] = 'search';
            file_put_contents('config.json', json_encode($config));
          } elseif($data == 'followers'){
            $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"Ø§ÙØ§Ù ÙÙ Ø¨Ø£Ø±Ø³Ø§Ù Ø§ÙÙÙØ²Ø± Ø§ÙØªØ±ÙØ¯ Ø³Ø­Ø¨ ÙØªØ§Ø¨Ø¹ÙÙ Ù Ø§ÙØ¶Ø§ ÙÙÙÙÙ ÙÙ Ø§Ø³ØªØ®Ø¯Ø§Ù Ø§ÙØ«Ø± ÙÙ ÙÙØ²Ø± Ø¹Ù Ø·Ø±ÙÙ ÙØ¶Ø¹ ÙÙØ§ØµÙ Ø¨ÙÙ Ø§ÙÙÙØ²Ø±Ø§Øª ð¥"
            ]);
            $config['mode'] = 'followers';
            file_put_contents('config.json', json_encode($config));
          } elseif($data == 'following'){
            $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"Ø§ÙØ§Ù ÙÙ Ø¨Ø£Ø±Ø³Ø§Ù Ø§ÙÙÙØ²Ø± Ø§ÙØªØ±ÙØ¯ Ø³Ø­Ø¨ Ø§ÙØ°Ù  ÙØªØ§Ø¨Ø¹ÙÙ Ù Ø§ÙØ¶Ø§ ÙÙÙÙÙ ÙÙ Ø§Ø³ØªØ®Ø¯Ø§Ù Ø§ÙØ«Ø± ÙÙ ÙÙØ²Ø± Ø¹Ù Ø·Ø±ÙÙ ÙØ¶Ø¹ ÙÙØ§ØµÙ Ø¨ÙÙ Ø§ÙÙÙØ²Ø±Ø§Øª ð¤"
            ]);
            $config['mode'] = 'following';
            file_put_contents('config.json', json_encode($config));
          } elseif($data == 'hashtag'){
            $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"Ø§ÙØ§Ù ÙÙ Ø¨Ø£Ø±Ø³Ø§Ù Ø§ÙÙØ§Ø´ØªØ§Ù Ø¨Ø¯ÙÙ Ø¹ÙØ§ÙÙ # ÙÙÙÙÙ ð§¿Ø§Ø³ØªØ®Ø¯Ø§Ù ÙØ§Ø´ØªØ§Ù ÙØ§Ø­Ø¯ ÙÙØ·"
            ]);
            $config['mode'] = 'hashtag';
            file_put_contents('config.json', json_encode($config));
          } elseif($data == 'newList'){
            file_put_contents('a','new');
            $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"ØªÙ Ø§Ø®ØªÙØ§Ø± ÙØ³ØªÙ Ø¬Ø¯ÙØ¯Ù Ø¨ÙØ¬Ø§Ø­ â",
							'show_alert'=>1
						]);
          } elseif($data == 'append'){ 
            file_put_contents('a', 'ap');
            $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"ØªÙ Ø§Ø®ØªÙØ§Ø± ÙØ³ØªÙ Ø³Ø§Ø¨ÙÙ Ø¨ÙØ¬Ø§Ø­ â",
							'show_alert'=>1
						]);
						
          } elseif($data == 'for'){
            if(!empty($accounts)){
            $keyboard = [];
             foreach ($accounts as $account => $v) {
                $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'forg&'.$account]];
              }
              $bot->editMessageText([
                  'chat_id'=>$chatId,
                  'message_id'=>$mid,
                  'text'=>"Select Account",
                  'reply_markup'=>json_encode($keyboard)
              ]);
            } else {
              $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"Add Account First.",
							'show_alert'=>1
						]);
            }
          } elseif($data == 'selectFollowers'){
            bot('sendMessage',[
                'chat_id'=>$chatId,
                'text'=>'ÙÙ Ø¨Ø£Ø±Ø³Ø§Ù Ø¹Ø¯Ø¯ ÙØªØ§Ø¨Ø¹ÙÙ .'  
            ]);
            $config['mode'] = 'selectFollowers';
          	$config['mid'] = $mid;
          	file_put_contents('config.json', json_encode($config));
          } elseif($data == 'run'){
            if(!empty($accounts)){
            $keyboard = [];
             foreach ($accounts as $account => $v) {
                $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'start&'.$account]];
              }
              $bot->editMessageText([
                  'chat_id'=>$chatId,
                  'message_id'=>$mid,
                  'text'=>"Ø­Ø¯Ø¯ Ø­Ø³Ø§Ø¨",
                  'reply_markup'=>json_encode($keyboard)
              ]);
            } else {
              $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"Add Account First.",
							'show_alert'=>1
						]);
            }
          }elseif($data == 'stop'){
            if(!empty($accounts)){
            $keyboard = [];
             foreach ($accounts as $account => $v) {
                $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'stop&'.$account]];
              }
              $bot->editMessageText([
                  'chat_id'=>$chatId,
                  'message_id'=>$mid,
                  'text'=>"Ø§Ø®ØªØ§Ø± Ø§ÙØ­Ø³Ø§Ø¨",
                  'reply_markup'=>json_encode($keyboard)
              ]);
            } else {
              $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"Add Account First.",
							'show_alert'=>1
						]);
            }
          }elseif($data == 'stopgr'){
            shell_exec('screen -S gr -X quit');
            $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"ØªÙ Ø§ÙØ§ÙØªÙØ§Ø¡ ÙÙ Ø§ÙØ³Ø­Ø¨",
							'show_alert'=>1
						]);
						$for = $config['for'] != null ? $config['for'] : 'Select Account';
            $count = count(explode("\n", file_get_contents($for)));
						$bot->editMessageText([
                'chat_id'=>$chatId,
                'message_id'=>$mid,
                'text'=>"Users collection page. \n - Users : $count \n - For Account : $for",
                'reply_markup'=>json_encode([
                    'inline_keyboard'=>[
                       [['text'=>'Ø¨Ø­Ø« ÙÙÙØ§Øª ð','callback_data'=>'search']],
                        [['text'=>'ÙØ§Ø´ØªØ§Ù #ï¸â£ ','callback_data'=>'hashtag'],['text'=>'Ø§ÙØ§ÙØ³Ø¨ÙÙØ± ð¡','callback_data'=>'explore']],
                        [['text'=>'Followers ð¥','callback_data'=>'followers'],['text'=>"Following ð¤",'callback_data'=>'following']],
                        [['text'=>"For Account : $for",'callback_data'=>'for']],
                        [['text'=>'ÙØ³ØªÙ Ø¬Ø¯ÙØ¯Ø© ð¤','callback_data'=>'newList'],['text'=>'ÙØ³ØªÙ Ø³Ø§Ø¨ÙØ© ð¥','callback_data'=>'append']],
                        [['text'=>'Ø§ÙØµÙØ­Ø© Ø§ÙØ±Ø¦ÙØ³ÙØ© â»ï¸','callback_data'=>'back']],
                    ]
                ])
            ]);
          } elseif($data == 'explore'){
            exec('screen -dmS gr php explore.php');
          } elseif($data == 'status'){
					$status = '';
					foreach($accounts as $account => $ac){
						$c = explode(':', $account)[0];
						$x = exec('screen -S '.$c.' -Q select . ; echo $?');
						if($x == '0'){
				        $status .= "*$account* ~> _Working_\n";
				    } else {
				        $status .= "*$account* ~> _Stop_\n";
				    }
					}
					$bot->sendMessage([
							'chat_id'=>$chatId,
							'text'=>"Ø­Ø§ÙÙ Ø§ÙØ­Ø³Ø§Ø¨Ø§Øª : \n\n $status",
							'parse_mode'=>'markdown'
						]);
				} elseif($data == 'back'){
          	$bot->editMessageText([
                      'chat_id'=>$chatId,
                      'message_id'=>$mid,
                     'text'=>"ðªðððð¢ð ð ð§ð¢ ðð¢ð¡ð§ð¥ð¢ð ð£ðð¡ðð â
ð¾ð¤ð£ð©ððð© ð¿ðð«ðð¡ð¤ð¥ðð§ - @Xxx_Ksomk_xxX",
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'Ø§Ø¶Ø§ÙØ© Ø­Ø³Ø§Ø¨ ð¨ð»âð»','callback_data'=>'login']],
                          [['text'=>'Ø·Ø±Ù Ø§ÙØ³Ø­Ø¨ ð','callback_data'=>'grabber']],
                          [['text'=>'Ø¨Ø¯Ø¡ Ø§ÙØµÙØ¯ â¶ï¸','callback_data'=>'run'],['text'=>'Ø§ÙÙØ§Ù Ø§ÙØµÙØ¯ â¸ï¸','callback_data'=>'stop']],
                         [['text'=>'Ø­Ø§ÙØ© Ø§ÙØ­Ø³Ø§Ø¨Ø§Øª âï¸','callback_data'=>'status']],
                      ]
                  ])
                  ]);
          } else {
          	$data = explode('&',$data);
          	if($data[0] == 'del'){
          		
          		unset($accounts[$data[1]]);
          		file_put_contents('accounts.json', json_encode($accounts));
              $keyboard = ['inline_keyboard'=>[
							[['text'=>"Ø§Ø¶Ø§ÙØ© Ø­Ø³Ø§Ø¨ Ø¬Ø¯ÙØ¯ ð¨ð»âð»",'callback_data'=>'addL']]
									]];
		              foreach ($accounts as $account => $v) {
		                  $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'ddd'],['text'=>"ðï¸",'callback_data'=>'del&'.$account]];
		              }
		              $keyboard['inline_keyboard'][] = [['text'=>'Ø§ÙØµÙØ­Ø© Ø§ÙØ±Ø¦ÙØ³ÙØ© â»ï¸','callback_data'=>'back']];
		              $bot->editMessageText([
		                  'chat_id'=>$chatId,
		                  'message_id'=>$mid,
		                    'text'=>"Fake Account Control Page ð",
		                  'reply_markup'=>json_encode($keyboard)
		              ]);
          	} elseif($data[0] == 'moveList'){
          	  file_put_contents('list', $data[1]);
          	  $keyboard = [];
          	  foreach ($accounts as $account => $v) {
                  $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'moveListTo&'.$account]];
              }
              $bot->editMessageText([
                  'chat_id'=>$chatId,
                  'message_id'=>$mid,
                  'text'=>"Ø§Ø®ØªØ± Ø§ÙØ­Ø³Ø§Ø¨ Ø§ÙØ°Ù ØªØ±ÙØ¯ ÙÙÙ Ø§ÙÙØ³ØªÙ Ø§ÙÙÙ ð",
                  'reply_markup'=>json_encode($keyboard)
	              ]);
          	} elseif($data[0] == 'moveListTo'){
          	  $keyboard = [];
          	  file_put_contents($data[1], file_get_contents(file_get_contents('list')));
          	  unlink(file_get_contents('list'));
          	  $keyboard['inline_keyboard'][] = [['text'=>'Ø§ÙØµÙØ­Ø© Ø§ÙØ±Ø¦ÙØ³ÙØ© â»ï¸','callback_data'=>'back']];
          	  $bot->editMessageText([
                  'chat_id'=>$chatId,
                  'message_id'=>$mid,
                  'text'=>"ØªÙ ÙÙÙ Ø§ÙÙØ³ØªÙ Ø§ÙÙ Ø§ÙØ­Ø³Ø§Ø¨ â".$data[1],
                  'reply_markup'=>json_encode($keyboard)
	              ]);
          	} elseif($data[0] == 'forg'){
          	  $config['for'] = $data[1];
          	  file_put_contents('config.json',json_encode($config));
              $for = $config['for'] != null ? $config['for'] : 'Select';
              $count = count(file_get_contents($for));
date_default_timezone_set('Asia/Baghdad');
              $bot->editMessageText([
                'chat_id'=>$chatId,
                'message_id'=>$mid,
                'text'=>"Users collection page. \n - Users : $count \n - For Account : $for",
                'reply_markup'=>json_encode([
                    'inline_keyboard'=>[
                            [['text'=>'Ø¨Ø­Ø« ÙÙÙØ§Øª ð','callback_data'=>'search']],
                        [['text'=>'ÙØ§Ø´ØªØ§Ù #ï¸â£','callback_data'=>'hashtag'],['text'=>'Ø§ÙØ§ÙØ³Ø¨ÙÙØ± ð¡','callback_data'=>'explore']],
                        [['text'=>'Followers ð¥','callback_data'=>'followers'],['text'=>"Following ð¤",'callback_data'=>'following']],
                        [['text'=>"For Account : $for",'callback_data'=>'for']],
                        [['text'=>'ÙØ³ØªÙ Ø¬Ø¯ÙØ¯Ø© ð¤','callback_data'=>'newList'],['text'=>'ÙØ³ØªÙ Ø³Ø§Ø¨ÙØ© ð¥','callback_data'=>'append']],
                        [['text'=>'Ø§ÙØµÙØ­Ø© Ø§ÙØ±Ø¦ÙØ³ÙØ© â»ï¸','callback_data'=>'back']],
                    ]
                ])
            ]);
          	} elseif($data[0] == 'start'){
          	  file_put_contents('screen', $data[1]);
          	  $bot->editMessageText([
                      'chat_id'=>$chatId,
                      'message_id'=>$mid,
                       'text'=>"ðªðððð¢ð ð ð§ð¢ ðð¢ð¡ð§ð¥ð¢ð ð£ðð¡ðð â
ð¾ð¤ð£ð©ððð© ð¿ðð«ðð¡ð¤ð¥ðð§ - @Xxx_Ksomk_xxX",
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'Ø§Ø¶Ø§ÙØ© Ø­Ø³Ø§Ø¨ ð¨ð»âð»','callback_data'=>'login']],
                          [['text'=>'Ø·Ø±Ù Ø§ÙØ³Ø­Ø¨ ð','callback_data'=>'grabber']],
                          [['text'=>'Ø¨Ø¯Ø¡ Ø§ÙØµÙØ¯ â¶ï¸','callback_data'=>'run'],['text'=>'Ø§ÙÙØ§Ù Ø§ÙØµÙØ¯ â¸ï¸','callback_data'=>'stop']],
                         [['text'=>'Ø­Ø§ÙØ© Ø§ÙØ­Ø³Ø§Ø¨Ø§Øª âï¸','callback_data'=>'status']],
                      ]
                  ])
                  ]);
              exec('screen -dmS '.explode(':',$data[1])[0].' php start.php');
              $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>" âââââââââââââââââââââ
" . date('Y/n/j g:i') . "\n" . "
Ø§ÙØ­Ø³Ø§Ø¨ Ø§ÙÙÙÙÙ ð¤º : ".explode(':',$data[1])[0].'

  ØªÙ Ø¨Ø¯Ø§ Ø§ÙÙØ­Øµ â

âââââââââââââââââââââ',
                'parse_mode'=>'markdown'
              ]);
          	} elseif($data[0] == 'stop'){
          	  $bot->editMessageText([
                      'chat_id'=>$chatId,
                      'message_id'=>$mid,
                      'text'=>"ðªðððð¢ð ð ð§ð¢ ðð¢ð¡ð§ð¥ð¢ð ð£ðð¡ðð â
ð¾ð¤ð£ð©ððð© ð¿ðð«ðð¡ð¤ð¥ðð§ - @Xxx_Ksomk_xxX",
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'Ø§Ø¶Ø§ÙØ© Ø­Ø³Ø§Ø¨ ð¨ð»âð»','callback_data'=>'login']],
                          [['text'=>'Ø·Ø±Ù Ø§ÙØ³Ø­Ø¨ ð','callback_data'=>'grabber']],
                          [['text'=>'Ø¨Ø¯Ø¡ Ø§ÙØµÙØ¯ â¶ï¸','callback_data'=>'run'],['text'=>'Ø§ÙÙØ§Ù Ø§ÙØµÙØ¯ â¸ï¸','callback_data'=>'stop']],
                         [['text'=>'Ø­Ø§ÙØ© Ø§ÙØ­Ø³Ø§Ø¨Ø§Øª âï¸','callback_data'=>'status']],
                      ]
                    ])
                  ]);
              exec('screen -S '.explode(':',$data[1])[0].' -X quit');
          	}
          }
			}
		}
	};
	$bot = new EzTG(array('throw_telegram_errors'=>false,'token' => $token, 'callback' => $callback));
} catch(Exception $e){
	echo $e->getMessage().PHP_EOL;
	sleep(1);
}