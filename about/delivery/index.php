<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Осуществляем доставку натуральных продуктов с собственной фермы в Пензе. Условия доставки здорового питания во все районы Пензы. Интернет-магазин доставки натуральных продуктов по Пензе");
$APPLICATION->SetPageProperty("keywords", "Доставка натуральных продуктов");
$APPLICATION->SetPageProperty("title", "Доставка натуральных продуктов по Пензе");
$APPLICATION->SetTitle("Доставка");

// Определяем город пользователя (можно сделать через IP, выбор пользователя и т.д.)
$city = $_SESSION['USER_GEO_POSITION']['city'] ?? '';


$deliveryData = false;
// Настраиваем фильтр для получения данных из инфоблока
if ($city == "Москва") {
    $filter = array("IBLOCK_ID" => 17, "NAME" => $city);
// Получаем данные статьи из инфоблока
$deliveryData = \CIBlockElement::GetList(
    array(),
    $filter,
    false,
    false,
    array("ID", "NAME", "PREVIEW_TEXT", "DETAIL_TEXT", "PROPERTY_DELIVERY")
)->Fetch();

}
?>
 <div class='container delivery-page'>
    <h1>Доставка</h1>
    <?$APPLICATION->IncludeComponent(
        "bitrix:menu",
        "personal",
        Array(
            "ALLOW_MULTI_SELECT" => "N",
            "CHILD_MENU_TYPE" => "",
            "COMPONENT_TEMPLATE" => "personal",
            "DELAY" => "N",
            "MAX_LEVEL" => "1",
            "MENU_CACHE_GET_VARS" => "",
            "MENU_CACHE_TIME" => "3600000",
            "MENU_CACHE_TYPE" => "A",
            "MENU_CACHE_USE_GROUPS" => "Y",
            "ROOT_MENU_TYPE" => "about",
            "USE_EXT" => "N"
        ),
        false,
        Array(
            'ACTIVE_COMPONENT' => 'N'
        )
    );?> <br>
<?php if ($deliveryData): ?>
        <?= $deliveryData["PROPERTY_DELIVERY_VALUE"]['TEXT'] ?>
<?php else: ?>
    <br>
    <h4>Порядок приема заказов&nbsp;&nbsp;<br>
    </h4>
    Продукты нашего магазина это более 500 наименований продуктов собственного производства и наиболее востребованных товаров других производителей по ценам, действующим в магазинах.<br>
    <br>
    <div>
        Конечно,&nbsp; не весь ассортимент размещен на сайте но Вы можете написать нам или оставить комментарий к заказу, менеджер интернет-магазина с Вами свяжется и проинформирует Вас по любой интересующей информации. <br>
    </div>
    <div>
        <br>
    </div>
    <div>
        Прием заказов осуществляется накануне дня, предшествующего дню доставки с 9-00 до 21-00 ч на сайте или по тел. 8 (902) 206-12-20 с 9-00 до 14-00
    </div>
    <div>
        <br>
    </div>
    <div>
        Доставка продуктов питания осуществляется с понедельника по субботу. В воскресенье доставка не осуществляется.&nbsp;<br>
    </div>
    <br>
    <h4>Вес продуктов</h4>
    Многие товары в нашем магазине весовые.&nbsp;Для каждого из таких продуктов вы можете выбрать один из предложенных вариантов веса. Например, 0,5 кг, 1 кг или 1,5 кг. Но реальный<br>
    <div>
        вес продукта будет немного отличаться от указанного. Об этой разнице Вам сообщим менеджер интернет-магазина по телефону, указанному в заявку к заказу.
    </div>
    <div>
        &nbsp;
    </div>
    <div>
        Поэтому сначала в вашей корзине будет значится итоговая цена, рассчитанная исходя из&nbsp; желаемых значений веса. <br>
    </div>
    <div>
        <br>
    </div>
    Когда ваш заказ будет сформирован, цена изменится настолько, насколько фактический вес будет отличаться от указанного. Конечную стоимость заказа Вам сообщит&nbsp; менеджер по телефону.&nbsp;<br>
    <br>
    ВАЖНАЯ ИНФОРМАЦИЯ!&nbsp; Цена на некоторые товары может отличаться от заявленных на сайте. Убедительно просим, дополнительно уточнять информацию у менеджера.&nbsp;<br>
    <h4>Стоимость доставки и способы оплаты</h4>
    <div class="global-block-container">
        <p>
        </p>
        <br>
        Стоимость доставки для жителей районана "Арбеково" -100 рублей. <br>
        Для жителей районов Центр,&nbsp;Окружная, Западная поляна - 150 рублей. <br>
        Для жителей районов Спутник, Терновка, Маяк, ГПЗ - 200 рублей. <br>
        Для жителей близлежащих населенных пунктов (например, с. Бессоновка, с. Лебедевка и т.п.)&nbsp; стоимость доставки обговаривается индивидуально с менеджером.&nbsp;<br>
        Минимальная сумма заказа 500 рублей.&nbsp;<br>
        При заказе от 5000 рублей доставка в пределах города бесплатная. <br>
        <br>
        Мы предлагаем два варианта получения вашего заказа: <br>
        <br>
        1. Самовывоз из магазинов: <br>
        <br>
        Вы самостоятельно забираете свой заказ из магазинов по адресу: <br>
        ТЦ "Космос-сити" ежедневно с 11-00 до 20-00 ч,<br>
        магазин «Гидростроевский» ежедневно с 14-00 до 21-00 ч.<br>
        <br>
        2.&nbsp; Доставка курьерской службой<br>
        <br>
        Курьер в согласованное с Вами время, в течение&nbsp; дня с 9-00 до 21-00 ч доставит заказ по указанному адресу.
    </div>
    <div class="global-block-container">
        <br>
    </div>
    <div class="global-block-container">
        Стоимость доставки зависит от удаленности адресата.<br>
        <br>
        Способ оплаты:<br>
        <table>
            <thead>
            </thead>
            <tbody>
            <tr>
                <td>
                    <p>
                        1. Наличный расчёт
                    </p>
                    <p>
                        Если товар доставляется курьером, то оплата осуществляется наличными курьеру в руки. При получении товара обязательно проверьте комплектацию товара и наличие чека.<br>
                        <br>
                        2. Банковской картой
                    </p>
                    Для выбора оплаты товара с помощью банковской карты на соответствующей странице сайта необходимо нажать кнопку «Оплата банковской картой».<br>
                    Оплата происходит через авторизационный сервер Процессингового центра Банка с<br>
                    использованием Банковских кредитных карт следующих платежных систем:<br>
                    <br>
                    VISA International&nbsp;<br>
                    <br>
                    MasterCard World Wide<br>
                    <br>
                    Описание процесса передачи данных<br>
                    <br>
                    Для оплаты покупки Вы будете перенаправлены на платежный шлюз ОАО "Сбербанк России" для ввода реквизитов Вашей карты. Пожалуйста, приготовьте Вашу пластиковую карту заранее. Соединение с платежным шлюзом и передача информации осуществляется в защищенном режиме с использованием протокола шифрования SSL.<br>
                    <br>
                    В случае если Ваш банк поддерживает технологию безопасного проведения интернет-платежей Verified By Visa или MasterCard Secure Code для проведения платежа также может потребоваться ввод специального пароля. Способы и возможность получения паролей для совершения интернет-платежей Вы можете уточнить в банке, выпустившем карту.<br>
                    <br>
                    Настоящий сайт поддерживает 128-битное шифрование. Конфиденциальность сообщаемой персональной информации обеспечивается ОАО "Сбербанк России". Введенная&nbsp;информация не будет предоставлена третьим лицам за исключением случаев, предусмотренных законодательством РФ. Проведение платежей по банковским картам осуществляется в строгом соответствии с требованиями платежных систем Visa Int. и MasterCard Europe Sprl.<br>
                    <br>
                    Описание процессa оплаты<br>
                    При выборе формы оплаты с помощью пластиковой карты проведение платежа по заказу<br>
                    производится непосредственно после его оформления. После завершения оформления заказа в нашем магазине, Вы должны будете нажать на кнопку «Оплата банковской картой», при этом система переключит Вас на страницу авторизационного сервера, где Вам будет предложено ввести данные пластиковой карты, инициировать ее авторизацию, после чего вернуться в наш магазин кнопкой "Вернуться в магазин". После того, как Вы возвращаетесь в наш магазин, система уведомит Вас о результатах авторизации. В случае подтверждения авторизации Ваш заказ будет автоматически выполняться в соответствии с заданными Вами условиями. В случае отказа в авторизации карты Вы сможете повторить процедуру оплаты.<br>
                    При аннулировании заказа<br>
                    <br>
                    При аннулировании позиций из оплаченного заказа (или при аннулировании заказа целиком) Вы можете заказать другой товар на эту сумму, либо вернуть всю сумму на карту предварительно написав письмо на e-mail.<br>
                    <br>
                    <img src="/ba455714171262b3fe232c1d70fe2b30.jpg" style="height:30px;">
                </td>
            </tr>
            </tbody>
        </table>
    </div>
<?php endif; ?>

 <br>
 <br>
 <br>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

