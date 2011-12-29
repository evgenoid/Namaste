hs.registerOverlay({
	html: '<div class="closebutton" onclick="return hs.close(this)" title="Закрити"></div>',
	position: 'top right',
	useOnHtml: true,
	fade: 2 // fading the semi-transparent overlay looks bad in IE
});


// Ukrainian language strings
hs.lang = {
	cssDirection: 'ltr',
	loadingText: 'Завантаження...',
	loadingTitle: 'Натисніть для скасування',
	focusTitle: 'Натисніть щоб перемістити на передній план',
	fullExpandTitle: 'Розкрити до оригінального розміру',
	creditsText: 'Namaste.ck.ua',
	creditsTitle: 'Відвідати домашню сторінку Highslide JS',
	previousText: 'Попереднє',
	nextText: 'Наступне',
	moveText: 'Перемістити',
	closeText: 'Закрити',
	closeTitle: 'Закрити (esc)',
	resizeTitle: 'Змінити розмір',
	playText: 'Слайдшоу',
	playTitle: 'Почати слайдшоу (пробіл)',
	pauseText: 'Пауза',
	pauseTitle: 'Призупинити слайдшоу (пробіл)',
	previousTitle: 'Попереднє (стрілка ліворуч)',
	nextTitle: 'Наступне (стрілка праворуч)',
	moveTitle: 'Перемістити',
	fullExpandText: 'Оригінальний розмір',
	number: 'Зображення %1 з %2',
	restoreTitle: 'Настисніть кнопку мишеняти щоб закрити зображення, натисніть та перетягніть для зміни розташування. Для просмотру зображень користуйтеся стрілками.'
};