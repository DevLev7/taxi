/* https://misha.blog/wordpress/shortcodes.html 
https://www.gavick.com/blog/wordpress-tinymce-custom-buttons

*/

(function() {
	/*
	tinymce.PluginManager.add('151', function( editor, url ) {
		editor.addButton( '151', { 
			text: '—',
			title: 'Длинное тире',
			onclick: function() {
				editor.insertContent('&#151;');
			}
		});
	});
	*/
	
	tinymce.PluginManager.add('text_color', function( editor, url ) {
		editor.addButton( 'text_color', { 
			//text: '—',
			icon: 'forecolor', 
			title: 'Выделение цветом',
			onclick: function() {
				editor.selection.setContent('<span class="text_color">' + editor.selection.getContent() + '</span>');
			}
		});
	});
	
	tinymce.PluginManager.add('popup_buttons', function( editor, url ) {
		editor.addButton( 'popup_buttons', { 
			//icon: 'icon dashicons-editor-textcolor', 
			text: 'Кнопка',
			//image: url + '../navigation.svg',
			type: 'menubutton',
			title: 'Вставить кнопку',
			menu: [ 
				{
					text: 'Заказать звонок',
					onclick: function() {
						editor.insertContent('[popup_btn link="popup-call"]Заказать звонок[/popup_btn]');
					}
				},
				{
					text: 'Получить консультацию',
					onclick: function() {
						editor.insertContent('[popup_btn link="popup-consultation"]Получить консультацию[/popup_btn]');
					}
				},
				{
					text: 'Оставить заявку',
					onclick: function() {
						editor.insertContent('[popup_btn link="popup-order"]Оставить заявку[/popup_btn]');
					}
				},
				{
					text: 'Записаться',
					onclick: function() {
					editor.insertContent('[popup_btn link="popup-lead"]Записаться[/popup_btn]');
					}
				}
			]
		});
	});
	
	tinymce.PluginManager.add('city', function( editor, url ) {
		editor.addButton( 'city', { 
			//icon: 'map-marker-alt', 
			//icon: 'permanent-pen', 
			text: 'Город',
			//image: url + '/navigation.svg',
			type: 'menubutton',
			title: 'Вставить город',
			menu: [ 
				{
					text: 'В Москве',
					onclick: function() {
						editor.insertContent('[city_gde]');
					}
				},
				{
					text: 'По Москве',
					onclick: function() {
						editor.insertContent('[city_d]');
					}
				},
				{
					text: 'Москва',
					onclick: function() {
						editor.insertContent('[city_i]');
					}
				},
				{
					text: 'Из Москвы',
					onclick: function() {
						editor.insertContent('[city_r]');
					}
				},
			]
		});
	});
	
	tinymce.PluginManager.add('contacts_short', function( editor, url ) {
		editor.addButton( 'contacts_short', { 
			//icon: 'map-marker-alt', 
			text: 'Контакты',
			//image: url + '../navigation.svg',
			type: 'menubutton',
			title: 'Вставить контакты',
			menu: [ 
				{
					text: 'Телефон',
					onclick: function() {
						editor.insertContent('[phone]');
					}
				},
				{
					text: 'Телефон (WhatsApp)',
					onclick: function() {
						editor.insertContent('[phone_wa][/phone_wa]');
					}
				},
				{
					text: 'Адрес',
					onclick: function() {
						editor.insertContent('[adress]');
					}
				},
				{
					text: 'E-mail',
					onclick: function() {
						editor.insertContent('[email]');
					}
				},
			]
		});
	});
	
	tinymce.PluginManager.add('price-list', function( editor, url ) {
		editor.addButton( 'price-list', { 
			//image: url + '/builder_link.svg',
			text: 'Прайс',
			//title: 'Прайс',
			onclick: function() {
				editor.insertContent('[price-list][/price-list]');
			}
		});
	});/*
	tinymce.PluginManager.add('nbsp', function( editor, url ) {
		editor.addButton( 'nbsp', { 
			image: url + '/space.svg',
			title: 'Вставить неразрывной пробел',
			onclick: function() {
				editor.insertContent('&nbsp;');
			}
		});
	});*/
})();