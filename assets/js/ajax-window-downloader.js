
$(document).ready(function(){
	
	$(".loginUsername").focus();

	$("#getwindow").click(function(){
										var url = base_website_url + "svyazatsya-s-nami.html?timeStamp=" + new Date().getTime();
		
										$.ajax({
												url: url,
												type: "GET",
												cache: false,
												success: Result,
												error: Error,
												dataType: 'html'          
												});
	
	});
	
	
	$("#registrlink").click(function(){
												var url = base_website_url + "registrikey.html?timeStamp=" + new Date().getTime();
		
										$.ajax({
										url: url,
										type: "POST",
										cache: false,
										success: Result,
										error: Error,
										dataType: 'html'          
											});       
																			
	
	});
	
	
});
/*------------------------------------------------------------------------------------------------------------------------------------------*/

function Registration() {


var person= new registredPerson(
								/*document.getElementById("registrykey").value*/'',
								document.getElementById("family").value,
								document.getElementById("name").value,
								document.getElementById("otchestvo").value,
								document.getElementById("password").value,
								document.getElementById("password_confirm").value,
								document.getElementById("email").value,
								document.getElementById("phone").value
								);
if(person.error){return 0;}

	var url = base_website_url + "validateregistrikey.html?timeStamp=" + new Date().getTime();
	
  $.ajax({
            url: url,
            type: "POST",
			data: {jsonPerson: JSON.stringify(person)},
			cache: false,
            success: function(result){ if(result.error) {getErrMessage(result.error); return;}
									   if(result.success) $('#contact-window-text').html(result.success);
									},
            error: Error,
            dataType: 'json'          
        });
}

function registredPerson (key,family,name,otchestvo,password,password_confirm,email,phone)
											{	
												var pattern1=/[^А-ЯЁA-Z\-]/i;
												//var pattern2=/[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]/i;
												var pattern2=/.+@.+\..+/i;
												//var pattern3=/[^\+\(\)\-0-9]/;
												var pattern3=/^( +)?((\+?7|8) ?)?((\(\d{3}\))|(\d{3}))?( )?(\d{3}[\- ]?\d{2}[\- ]?\d{2})( +)?$/;
												var pattern4=/[0-9a-z_]{6}$/i;
												var pattern5=/[0-9a-zA-Z]{6}$/;
												
												$(".error").remove();
												
												/*if(key==''||key==' '){getErrMessage("Введите ключ регистрации"); this.error=1; return 0;}
												if(!pattern5.test(key)){getErrMessage("Не правильный ключ регистрации");this.error=1;return 0;}
												else {this.key=key;}*/
												this.key='';
												
												if(family==''||family==' '){getErrMessage("Введите свою фамилию");this.error=1;return 0;}
												if(pattern1.test(family)){getErrMessage("В фамилии можно использовать только буквы и дефис");this.error=1;return 0;}												
												else {this.family=family;}
												
												if(name==''||name==' '){getErrMessage("Введите своё имя");this.error=1;return 0;}
												if(pattern1.test(name)){getErrMessage("В имени можно использовать только буквы и дефис");this.error=1;return 0;}												
												else {this.name=name;}
												
												if(otchestvo==''||otchestvo==' '){getErrMessage("Введите своё отчество");this.error=1;return 0;}
												if(pattern1.test(otchestvo)){getErrMessage("В отчестве можно использовать только буквы и дефис");this.error=1;return 0;}												
												else {this.otchestvo=otchestvo;}

												if(password==''){getErrMessage("Придумайте пароль");this.error=1;return 0;}
												if(!pattern4.test(password)){getErrMessage("Пароль может содержать латинские буквы,цифры и быть не короче 6 символов");this.error=1;return 0;}
												if(password_confirm==''){getErrMessage("Введите пароль еще раз");this.error=1;return 0;}
												if(password!=password_confirm){getErrMessage("Пароли не совпадают");this.error=1;return 0;}
												else {this.password=password;}

												if(email==''||email==' '){getErrMessage("Введите адрес электронной почты");this.error=1;return 0;}
												if(!pattern2.test(email)){getErrMessage("Не верный формат электронной почты");this.error=1;return 0;}												
												else {this.email=email;}
												
												if(phone==''||phone==' '){getErrMessage("Введите контактный телефон");this.error=1;return 0;}
												if(!pattern3.test(phone)){getErrMessage("Номер телефона может содержать только цифры и следующие символы: + - () и содержать не менее 11 цифр.");this.error=1;return 0;}												
												else {this.phone=phone;}
										
											}


function getErrMessage(msg)
	{
		$('.registerMessage').html("<div class='error'>"+msg+"</div>");
	}

function Result(htmlcode){
	var overlay=document.createElement("div");
	if(!overlay){alert("Не удалось создать блокирующий слой.");return;}
	overlay.setAttribute("id","overlay");
	var body=document.getElementById("bodyId");
	if(!body){alert("Не найден контейнер окна.");return;}
	body.appendChild(overlay);
	
	var contaynerWindow=document.createElement("div");
	if(!contaynerWindow){alert("Не удалось создать контейнер окна.");return;}
	contaynerWindow.setAttribute("id","contaynerwindow");
	contaynerWindow.innerHTML=htmlcode;
	body.appendChild(contaynerWindow);
	
	var closeBtn=document.getElementById("closewindow");
	if(!closeBtn){alert("Не назначена процедура закрытия окна"); return;}
	closeBtn.onclick=removeContactWindow;	
}

function Error(x,textStatus){
	alert(textStatus);
}

function removeContactWindow(){

	var overlay=document.getElementById("overlay");
	var contaynerWindow=document.getElementById("contaynerwindow");
	overlay.parentNode.removeChild(overlay);
	contaynerWindow.parentNode.removeChild(contaynerWindow);


}