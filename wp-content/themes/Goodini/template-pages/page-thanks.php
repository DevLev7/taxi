<?php
//	Template Name: Страница благодарности
?>

<?php
//	Проверка формы
//	====================
	if ( (!$_POST) || ($_POST['e-mail']) ) {
		get_template_part('404');

//	Проверка антибот
	//} elseif (!empty($_REQUEST["captcha"]) && $_REQUEST["captcha"] == md5(date("Y-m-d"))) {
	} elseif(true) {

//	Обработчик формы
//	====================

// ID заявки
	function getNumber() {
		$filename = get_theme_file_path( 'orderNum.txt');
		$number = file_get_contents($filename);
		$number++;
		file_put_contents($filename, $number);
		return $number;
	}

//	Присваиваем переменные
	$name 			= $_POST['name1'];
	$phone 			= $_POST['phone'];
	$email 			= $_POST['email'];
	$textarea 		= $_POST['textarea'];
	$attachment 	= $_POST['attachment'];
	$time 			= $_POST['time'];
	$utm 			= $_POST['utm'];
	$orderID 		= file_get_contents(get_theme_file_path( 'orderNum.txt'));

	$formid 		= $_POST['formid'];
	$title	 		= $_POST['title'];
	$url 			= $_POST['url'];
	$domen 			= get_site_url();
	if (is_plugin_active('multycity/multycity.php')) {
	$city 			= do_shortcode('[city_i]');
	}
	$browser		= $_POST['browser'];
	$size_viewport	= $_POST['size_viewport'];
	$ip 			= isset($_SERVER["REMOTE_ADDR"]) ? $_SERVER["REMOTE_ADDR"] : '127.0.0.1';
	$user 			= isset($_SERVER["HTTP_USER_AGENT"]) ? $_SERVER["HTTP_USER_AGENT"] : 'localhost';
	
//	Услуги опросника
	if(!empty($answers)) { 
		foreach($answers as $check) { 
			$answers_check .= $check."<br>"; 
		}
	}

//	Тема письма
	$subject = 'Заявка / '.$phone.' / '.$orderID;

//	Отправитель
	$from 			= get_bloginfo("name");
	$from_email 	= 'info@'.parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);

//	Заголовок
	$headers  = "From:".$from."<".$from_email.">\r\n";
	$headers .= "Reply-To: ".$from_email."\r\n";
	$headers .= "Content-type: text/html; charset=utf-8 \r\n";

//	Создаем сообщение

						$mess ='<body>';
						
						$mess .='<h3>Контакты</h3>';
						$mess .= '<style>table{border-collapse:collapse;border:1px solid #ccc}tr{border-bottom:1px solid #ccc}tr:last-child{border-bottom:0}td{border-right:1px solid #ccc;padding:5px 15px}td:last-child{border-right:0}</style><table>';							
if ($orderID)			$mess .='<tr><td>ID			</td><td>'.$orderID.'</td></tr>';
if ($name)				$mess .='<tr><td>Имя			</td><td>'.$name.'</td></tr>';
if ($phone)				$mess .='<tr><td>Телефон		</td><td>'.$phone.'</td></tr>';
if ($email)				$mess .='<tr><td>Email			</td><td>'.$email.'</td></tr>';
if ($city)				$mess .='<tr><td>Город			</td><td>'.$city.'</td></tr>';
if ($textarea)			$mess .='<tr><td>Сообщение		</td><td>'.$textarea.'</td></tr>';
if ($answers_check)		$mess .='<tr><td>Сообщение		</td><td>'.$answers_check.'</td></tr>';
						$mess .='</table>';
						
						$mess .='<h3>Общая информация</h3>';
						$mess .= '<style>table{border-collapse:collapse;border:1px solid #ccc}tr{border-bottom:1px solid #ccc}tr:last-child{border-bottom:0}td{border-right:1px solid #ccc;padding:5px 15px}td:last-child{border-right:0}</style><table>';							
if ($domen)				$mess .='<tr><td>Домен			</td><td>'.$domen.'</td></tr>';
if ($title) 			$mess .='<tr><td>Страница		</td><td> <a href="'.$url.'">'.$title.'</a></td></tr>';
if ($utm)				$mess .='<tr><td>UTM			</td><td>'.$utm.'</td></tr>';
if ($formid)			$mess .='<tr><td>Форма			</td><td>'.$formid.'</td></tr>';
if ($ip)				$mess .='<tr><td>IP адрес		</td><td>'.$ip.'</td></tr>';
if ($browser)			$mess .='<tr><td>Браузер		</td><td>'.$browser.'</td></tr>';
if ($size_viewport)		$mess .='<tr><td>Экран			</td><td>'.$size_viewport.'</td></tr>';
if ($user)				$mess .='<tr><td>Детали			</td><td>'.$user.'</td></tr>';
						$mess .='</table>';
						
						$mess .='</body>';

//	Проверяем файлы
	$attachments = array();
	if ( ! empty($_FILES['attachment']) ) {
		require_once(ABSPATH . 'wp-admin/includes/file.php');
		$overrides['test_form'] = false;
		//Допустимые типы
		$overrides['mimes'] = array(
			'pdf' => 'application/pdf',
			'rar' => 'application/x-rar-compressed',
			'zip' => 'application/zip',
			'7z'  => 'application/x-7z-compressed',
			'cdr' => 'application/coreldraw',
			'eps' => 'application/postscript',
			'ai'  => 'application/adobe.illustrator'

		);

		//Сделаем нормальный массив
		$attachment = $_FILES['attachment'];
		$files = [];
		foreach($attachment['name'] as $idx => $name) {
			if (! $name) {
				continue;
			}
			$files[$idx] = [
				'name' => $name,
				'type' => $attachment['type'][$idx],
				'tmp_name' => $attachment['tmp_name'][$idx],
				'error' => $attachment['error'][$idx],
				'size' => $attachment['size'][$idx]
			];
		}

		// Максимальный размер файлов
		$max_size = 20 * 1024; //in KB
		$full_size = 0;
		foreach ($files as $file) {
			$file_size = filesize( $file['tmp_name'] );
			if ( $file_size > ( KB_IN_BYTES * $max_size ) ) {
				$file['error'] = sprintf( __( 'This file is too big. Files must be less than %1$s KB in size.' ), $max_size );
			}

			$full_size += $file_size;
			if ( $full_size > ( KB_IN_BYTES * $max_size ) ) {
				$file['error'] = sprintf( __( 'Общий размер файлов не должен превышать %1$s килобайт.' ), $max_size );
			}

			$movefile = wp_handle_upload($file, $overrides);
			if ( $movefile && empty($movefile['error']) ) {
					$attachments[] = $movefile['file'];
			} else {
				//Удаляем файлы в случае ошибки
				foreach ($attachments as $filename) {
						unlink($filename);
				}
				wp_die($file['name']. ' : ' .$movefile['error']);
			}
		}
	}


//	Исправление косяка wp_mail(неправильно извлекает $from_name, если есть '<' в загаловке), убрать когда починят
	add_filter( 'wp_mail_from_name', function(){ return get_bloginfo("name");} );

//	Функция отправки
	wp_mail(get_field('order','option'), $subject, $mess, $headers, $attachments); // для wp
	//mail($to, $subject, $mess, $headers); // для php


//	Удаляем файлы
	foreach ($attachments as $filename) {
		unlink($filename);
    }



//	Сохранение контактов в базе
//	====================
	if(get_field('saveorder','option')){
		$date = date("d.m.y");
		$clock = date("H:i", time());
		$domen_no = str_replace('.', '_', $domen);
		$source_file = iconv("utf-8", "windows-1251", "$date;$clock;$name;$phone;$email;$city;$domen;$title;$formid;$url;$ip; \r\n");
		$file_name = 'base_'.$domen_no.'-'.get_field('saveorder','option').'.csv';
		$Saved_File = fopen($file_name, 'a+');
		fwrite($Saved_File, $source_file);
		fclose($Saved_File);
	}


// SMS оповещение
//	====================

//	Исходные данные
	if ($title)		$sms_title 	= $title."\n";
	if ($formid)	$sms_formid = $formid."\n";
	if ($name)		$sms_name 	= $name."\n";
	if ($phone)		$sms_phone 	= $phone."\n";
	if ($email)		$sms_email 	= $email;
					$country_code = "+7";
//	Создание сообщения
	$sms_text 	= $sms_title.$sms_formid.$sms_name.$sms_phone.$sms_email;

while( have_rows('sms','option') ): the_row();
	$api = get_sub_field('sms-api');
	$phone = get_sub_field('sms-phone');

//	Абонент
	$ch = curl_init("http://sms.ru/sms/send");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_POSTFIELDS, array(

		"api_id"		=>	$api,
		"to"			=>	$country_code.$phone,
		"text"			=>	iconv("utf-8","utf-8",$sms_text),
		"partner_id"	=>	"34022",
		//"translit"		=>	"1"

	));
	$body = curl_exec($ch);
	curl_close($ch);

endwhile;

//	Пересчет номера заявки 
	getNumber();

//	Дизайн страницы благодарности
//	====================
		get_template_part('template-parts/thanks');

//	Провал проверки антибот
	} else {
		get_template_part('404');
	}
?>
