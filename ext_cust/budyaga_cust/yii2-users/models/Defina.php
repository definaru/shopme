<?php

namespace budyaga_cust\users\models;

use Yii;
use yii\helpers\Html;
/*
 * @author CMS Defina
 */
class Defina {
    
    const CLOCK = '<i class="fa fa-clock-o"></i>';
    const CALENDAR = '<i class="ionicons ion-ios-calendar-outline"></i>';
    const compatible = 'IE=edge'; //<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    const viewport = 'width=device-width, initial-scale=1'; //<meta name="viewport" content="width=device-width, initial-scale=1" /> 
    const description = 'Документация на русском языке'; //<meta name="description" content="Документация на русском языке" />  
    const keywords = 'фреймворк, фронтэнд, веб разработка, web разработка'; //<meta name="keywords" content="фреймворк, фронтэнд, веб разработка, web разработка" /> 
    const my = 'Vera.Fund';
    const ColorBlock = '#fff'; // цвет блока по умолчанию
    const ColorInfo = '#4bc5dc'; // цвет информативного блока
    const ColorDanger = '#f00'; // цвет блока с важной информацией
    const MySQL = 'http://ld3a5159.justinstalledpanel.com/phpmyadmin/db_structure.php?db=verafund&token=5aa5580cffd151e8e63dde2b02c1c06a'; // путь к базе данных
    const filemanager = '/filemanager/default';
    const help = '/user/help';
    const MyCompany = ''; // название компании
    const Slogan = ''; // слоган или дивиз компании
    const SeePage = 'подробнее <i class="ionicons ion-arrow-right-a"></i>'; // текст кнопки ПОДРОБНЕЕ
    const Orders = 'Инвестировать Сейчас'; // текст кнопки ЗАКАЗАТЬ
    const ArrowBottom = ''; // глиф стрелки вниз
    const ArrowTop = '<i class="pe-7s-angle-up"></i>'; // глиф стрелки вверх
    const FontFamily = ''; // имя шрифта
    const FontWay = ''; // путь к шрифту
    const Date = 'd F Y'; // формат даты в статьях
    const DateFormat = 'd F Y в H:i'; // формат даты в записях
    const DateFormatChat = 'd F Y в H:i'; // формат даты в чате
    const CountPage = ''; // количество отображаемых страниц
    const CountArticle = ''; // количество отображаемых страниц статей
    const CountBlog = 3; // количество отображаемых страниц в блоге
    const CountProperty = 3; // количество отображаемых страниц на главной недвижимость
    const CountNews = ''; // количество отображаемых страниц в новостях
    const CountSlider = ''; // количество отображаемых фотографий в галерее на главной
    const Subscripts = 'Новое сообщение';
    const current_mail = 'adminEmail'; // 'adminEmail', 'supportEmail', 'infoEmail'
    const TextName = 'Пожалуйста, пишите понятные, собственные имена! Письма с неразборчивыми именами удаляется модератором без рассмотрения!';
    const TextBody = 'ВНИМАНИЕ! У нас работает антиспам и антиреклама, подозрительные сообщения, не прошедшие через фильтр, удаляются автоматически!'; 
    const PHName = 'Ваше имя';
    const PHMail = 'Ваш E-mail';
    const PHPhone = 'Ваш телефон';
    const PHBody = 'Здесь напишите ваше сообщение';
    const PHCaptha = 'Код с картинки';
    const SuccessText = '<b><i class="fa fa-check"></i> Успешно</b> Ваше сообщение получено';
    const RIGHT = 0;
    const TextOrderHead = 'Бланк заказа';
    const extensions = 'pdf, txt, doc, docx, xlsx, rar, zip, jpg, png';
    const Catalog = 'Каталог';
    const CurrentWallet = 'USD'; // Defina::CurrentWallet
    const STARS = '<sup>*</sup>';
    
}