var j = jQuery.noConflict();
j(document).ready(function(){

j("#fullcart").css({"margin-top":"-1000px"});
j(".loginUsername").focus();
j("*[data-id]").hover( 
					function(e) {
									j(".mytooltip").html(j(this).data("id"));
									j(".mytooltip").stop(true,true).fadeIn('500');
								},
					function() {j(".mytooltip").css({"display":"none"});}
				);

j("*[data-id]").mousemove(function(e){
										var center=j(document).width()/2;
										if(e.pageX>=center){j(".mytooltip").offset({"top":e.pageY+20,"left":e.pageX-j(".mytooltip").width()-1});}
										else {j(".mytooltip").offset({"top":e.pageY+20,"left":e.pageX-1});}
									});

j("#addContactPeoples").click(function(){j(".contactPeoples").slideToggle(400);});

j("#anim, button, .anim, input[type='submit']").hover( 
					function() {j(this).stop().animate({backgroundColor:"#90cc4a"},200);},
					function() {j(this).stop().animate({backgroundColor:"#7fb243"},200);}
				);

j("#footer input[type='submit']").hover( 
					function() {j(this).stop().animate({backgroundColor:"#656371"},200);},
					function() {j(this).stop().animate({backgroundColor:"#5c5a68"},200);}
				);
				
j(".animtext").hover( 
					function() {j(this).animate({color:"green"},300);},
					function() {j(this).animate({color:"#000"},300);}
				);
				
j("#cart-block").hover( 
					function() {j("#cart-block:has(#fullcart)").css({"background":"#e3e1d4", "border":"2px solid #fff", "margin":"17px 0 0 3px"});
								j("#fullcart").css({"margin-top":"0px"});
								
							   },
							   
					function() {j("#cart-block").css({"background":"url('" + base_website_url + "assets/css/img/cart-bg.jpg')","border":"none","margin":"19px 0 0 5px"});
								j("#fullcart").css({"margin-top":"-1000px"});
							   }
				);

j(".opisanie-order").click(function(){j(this).next().slideToggle(400);});


/*----------------------------------------------------ДОБАВИТЬ ИЛИ УДАЛИТЬ ИЗ ЛЮБИМЫХ ПРОДУКТОВ---------------------------------------------------------------------------------*/

j(".loveprodukt-gray, .loveprodukt-orange").click(
						function(){
									var url=base_website_url + "loveprodukt.html";
									var produktId=j(this).attr("id");
									j.ajax({
											url: url,
											type: "POST",
											data: "id="+produktId,
											cache: false,
											success: function(result){ 																		
																		$("#countLoveProdukt").text(result.count);
																				switch(result.status)
																				{
																					case "on":{
																								$("#"+result.id).attr("class","loveprodukt-orange");		
																								break;
																							   }
																							   
																					case "off":{$("#"+result.id).attr("class","loveprodukt-gray");
																									
																								$("#plitka"+result.id).fadeOut(500, function(){
																																				 $("#plitka"+result.id).remove();
																																			   }
																																);
																								
																								
																								}
																				}

																		},
											error: function(x,textStatus){alert(textStatus);},
											dataType: 'json'          
											});
								  }
						);


/*----------------------------------------------------УПРАВЛЕНИЕ КОНТАКТНЫМИ ЛИЦАМИ-------------------------------------------------------------------------------*/

j("#save-contakt-person").click(
								function(){
											function Persona (name,second_name,family,phone1,phone2,phone3,email,sms,sendmy)
											{
												this.name=name;
												this.second_name=second_name;
												this.family=family;
												this.phone1=phone1;
												this.phone2=phone2;
												this.phone3=phone3;
												this.email=email;
												this.sms=sms;
												this.sendmy=sendmy;											
											};
											
																			
											var mainPersona=new Persona("","","",
																		j("#main-prsona-tel1").attr("value"),
																		j("#main-prsona-tel2").attr("value"),
																		j("#main-prsona-tel3").attr("value"),
																		j("#main-prsona-email").attr("value"),
																		j("#main-person-sms").attr("checked"),
																		j(".send-my").attr("id")
																		);

												
											j.ajax({
													url:base_website_url + "save-contact-user.html?timeStamp=" + new Date().getTime(),
													type: "POST",
													cache: false,
													data:{persona: JSON.stringify(mainPersona)},
													success: function(data){
																			j("#message").html("<div id='success-message-ok'>Профиль сохранён!</div>");
																			j("#success-message-ok").fadeIn('slow',function(){
																		    j("#success-message-ok").delay(800).fadeOut('slow', function(){
																																		j("#success-message-ok").remove();
																																		}
																													);
																								}
																			);
																			
																		   },
													error: function(x,textStatus){alert(textStatus);},
													dataType: 'script'          
												});											


										 }
										  
										  
										  
							);						

/*----------------------------------------------------ВЫВОД СОДЕРЖИМОГО ЗАКАЗА ПРИ КЛИКЕ-------------------------------------------------------------------------------*/
j(".header-order").click(function(){
									var header=j(this).html().split(" ");
									var id=header[2];
									var url=base_website_url + "soderzhanie-zakaza.html?ord_id="+id+"&timeStamp="+ new Date().getTime();
									j.ajax({
											url: url,
											type: "POST",
											cache: false,
											success: function(htmlcode){
																		if(!id){alert("Не получен указатель this!");return;}
																		var thisContentOrderBlock=document.getElementById("order-content"+id);
																		thisContentOrderBlock.innerHTML=htmlcode;
																		//alert(htmlcode);
																		j("#order-content"+id).slideToggle('400');
																		},
											error: Error,
											dataType: 'html'          
										});
									}
);
/*----------------------------------------------------ВСПЛЫВАЮЩЕЕ ОКНО СООБЩЕНИЯ-------------------------------------------------------------------------------*/

j(".wndmsg").ready(function(){j(".wndmsg").delay(2000).fadeOut("slow");});

/*----------------------------------------------------ОКНО ПЕРЕЗВОНИТЕ МНЕ-------------------------------------------------------------------------------*/

j("#sendmytel").click(function(){j("#drop-down-list").slideDown("300");});
j("#sendmytel-footer").click(function(){j("#drop-down-list-footer").slideDown("300");});
j("#drop-down-list li").click(function(){
											var tel=j(this).children(".contact-people-tel-list").html();									
											var abonent=j(this).children(".contact-people-name-list").html();
											j("#sendmytel").val(tel);
											j("#abonent").val(abonent);
											var dt=new Date();
											j("#sendmydate").val(dt.getHours()+":"+dt.getMinutes()+" "+dt.getDate()+"."+dt.getMonth()+"."+dt.getFullYear());
											j("#drop-down-list").stop().slideUp("200");
										}
								);
j("#sendmytel").keyup(function(){j("#drop-down-list").slideUp("200");})
j("#pozvonitemne-block span").click(function(){j("#sendmy-window").slideToggle("200");});
j("#sendmytel").focusout(function(){
									j("#drop-down-list").slideUp("200");
								   }
						);
						

	
});




j("#success-message-ok").ready(function(){
											j("#password_old, #password_new, #password_new_confirm").attr("value","");
											j("#success-message-ok").fadeIn('slow',function(){
																		j("#success-message-ok").delay(800).fadeOut('slow', function(){
																																		j("#success-message-ok").remove();
																																		}
																													);
																								}
																			);
											
										}
							  );
				  
function getErrMessage(msg)
	{
		$('.registerMessage').html("<div class='error'>"+msg+"</div>");
	}						  
							  

function validationForm()
	{
		var patternName=/[^А-ЯЁA-Z\-]/i;
		var patternEmail=/[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]/i;
		var patternTel=/[^\+\(\)\-0-9]/;
		
		$(".error").remove();
		
		var family=j("#family").attr("value");
		var name=j("#name").attr("value");
		var otchestvo=j("#otchestvo").attr("value");
		var phone=j("#phone").attr("value");
		var email=j("#email").attr("value");
		
		//alert();
		
		if(family==""){getErrMessage("Укажите фамилию");return false;}	
		if(patternName.test(family)){getErrMessage("Фамилия может содержать только буквы и дефис");return false;}

		if(name==""){getErrMessage("Укажите имя");return false;}	
		if(patternName.test(name)){getErrMessage("Имя может содержать только буквы и дефис");return false;}	

		if(otchestvo==""){getErrMessage("Укажите отчество");return false;}	
		if(patternName.test(otchestvo)){getErrMessage("Отчество может содержать только буквы и дефис");return false;}

		if(phone==""){getErrMessage("Укажите контактный телефон");return false;}	
		if(patternTel.test(phone)){getErrMessage("Телефон может содержать только цифры и символы: + - ( )");return false;}

		if(!patternEmail.test(email)){getErrMessage("Адрес почты содержит недопустимые символы или не соответствует формату");return false;}
			
		return true;	 
	}
	
function Error(x,textStatus){
	alert(textStatus);
}

function correctTel(){
	
		var phone=$("#sendmytel").val();
		var patternTel=/[^\+\(\)\-0-9]/;
		if(phone==""){$("#sendmy-window-message").html("<br/>Укажите контактный телефон");return false;}	
		if(patternTel.test(phone)){$("#sendmy-window-message").html("<br/>Телефон может содержать только цифры и символы: + - ( )");return false;}
		$("#sendmy-window-message").html("<h3>Уведомление отправлено.</h3> Наш менеджер свяжется с вами в ближайшее время. Спасибо.");
		return true;
}
				   