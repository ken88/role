// JavaScript Document
$(document).ready(function(){
						$(":input").each(function(){
									var str = $(this).attr('class');
									 if(str!==undefined){
										 
											var arr=str.split(' ');
											for(var i=0;i<arr.length-1;i++){
												if(arr[i]=='required'){
													$(this).blur(function(){
																 checkform($(this),str);	
														 });	
												}
											}
									 }
						});		   
			})
			function checkform(input,str){
				
							 if(str!==undefined){
							 var arr=str.split(' ');
							
								for(var i=0;i<arr.length;i++){
									if(arr[i] == 'free'){
												inputtext = input.val();
												if(inputtext!==''){
													input.removeAttr("style");
													input.next().remove();
												}
												if(inputtext==''){
												
													if(input.next().attr('class')!=='label label-important'){
														input.after("<span class='label label-important' id='error'>不能为空</span>");
													}
														input.css("border","1px solid red");
														exit();
												}
									}
									if(arr[i] == 'url'){
											inputtext = input.val();
											var ab=/^http:\/\/[a-zA-Z0-9]+\.[a-zA-Z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"\"])*$/;   
											if(ab.test(inputtext) == false){
												if(input.next().attr('class')!=='label label-important'){
													input.after("<span class='label label-important' id='error'>请输入合法网址</span>");
												}
												input.css("border","1px solid red");
												exit();
											}else if(ab.test(inputtext) == true && input.next().attr('class')=='label label-important'){
													input.removeAttr("style");
													input.next().remove();
											}		
							}
									if(arr[i] == 'phone'){
											inputtext = input.val();
											
											var ab=/^(13[0-9]|15[0-9]|18[2|6|7|8|9])\d{8}$/;
											if(ab.test(inputtext) == false){
												if(input.next().attr('class')!=='label label-important'){
													input.after("<span class='label label-important' id='error'>电话格式不合法</span>");
												}
												input.css("border","1px solid red");
												exit();
											}else if(ab.test(inputtext) == true && input.next().attr('class')=='label label-important'){
													input.removeAttr("style");
													input.next().remove();
											}
										
									}
									if(arr[i] == 'email'){
										inputtext = input.val();
										var ab = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
										if(ab.test(inputtext) == false){
												if(input.next().attr('class')!=='label label-important'){
													input.after("<span class='label label-important' id='error'>邮箱格式不合法</span>");
												}
												input.css("border","1px solid red");
												exit();
											
										}else if(ab.test(inputtext) == true && input.next().attr('class')=='label label-important'){
													input.removeAttr("style");
													input.next().remove();
										}
										
									}
									if(arr[i] == 'length'){
									
										inputtext = input.val();
										var length = inputtext.length;
										var minlength = input.attr("minlength");
										var maxlength = input.attr("maxlength");
										if(typeof(minlength)!=='undefined' && typeof(maxlength)=='undefined'){
												if(length<minlength){
													if(input.next().attr('class')!=='label label-important'){
														input.after("<span class='label label-important' id='error'>最小长度为"+minlength+"</span>");
														input.css("border","1px solid red");
														
													}
													exit();
												}else if(length>=minlength && input.next().attr('class')=='label label-important'){
													input.removeAttr("style");
													input.next().remove();
												}
										}
										if(typeof(maxlength)!=='undefined' && typeof(minlength)=='undefined'){
												if(length>maxlength){
													if(input.next().attr('class')!=='label label-important'){
														input.after("<span class='label label-important' id='error'>最大长度为"+maxlength+"</span>");
														input.css("border","1px solid red");
														
													}
													exit();
												}else if(length<=maxlength && input.next().attr('class')=='label label-important'){
													input.removeAttr("style");
													input.next().remove();
												}
										}
										if(typeof(minlength)!=='undefined' && typeof(maxlength)!=='undefined'){
											
												if(length>maxlength || length<minlength){
												//	if(input.next().attr('class')!=='label label-important' && length>maxlength || length<minlength){
													if(input.next().attr('class')!=='label label-important'){
													
													//	input.after("<span class='label label-important' id='error'>长度必须在"+minlength+"-"+maxlength+"之间</span>");
														//input.css("border","1px solid red");
														
													}
													exit();
												}else if(length<=maxlength && length>=minlength && input.next().attr('class')=='label label-important'){
													input.removeAttr("style");
													input.next().remove();
												}
										}
										
									}
									
									
									if(arr[i] == 'repeat'){
										inputtext = input.val();
										var id = input.attr("equalto");
										var val = $(id).val();
										if(typeof(id)!=='undefined' && inputtext!==val){
												if(input.next().attr('class')!=='label label-important'){
														input.after("<span class='label label-important' id='error'>两次值不一样</span>");
														input.css("border","1px solid red");
														
												}
											exit();
										}else if(inputtext==val){
												if(input.next().attr('class')=='label label-important'){
													input.removeAttr("style");
													input.next().remove();
												}
										}
										
									}
									
									
									
									
									
									
								}//if
								}//for
				
			/*
				var inputtext = '';
				var name = '';
				var inputhtml = '';
				$(':text').each(function(){
					inputtext = $(this).val();
					inputname = $(this).attr('name');
					name = $(this).parent().siblings().text();
					if(inputtext==''){
						name = $(this).parent().siblings().text();
						$(this).parent().find("#error").remove();
						$(this).parent().append("<span class='label label-important' id='error'>"+name+"不能为空</span>");
						exit();
					}else{
						if(inputname == 'email'){
							//验证邮箱地址
							if (inputtext.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1){
								$(this).parent().find("#error").remove();
								$(this).parent().append("<span class='label label-important' id='error'>"+name+"格式错误</span>");
								exit();
							}else{
								$(this).parent().find("#error").remove();
							}
						}else if(inputname == 'phone'){
							//验证电话号码手机号码，包含至今所有号段   
							var ab=/^(13[0-9]|15[0-9]|18[2|6|7|8|9])\d{8}$/;
						
							if(ab.test(inputtext) == false){
								$(this).parent().find("#error").remove();
								$(this).parent().append("<span class='label label-important' id='error'>"+name+"格式错误</span>");
								exit();
							}else{		
								$(this).parent().find("#error").remove();
							}

						}else{
							$(this).parent().find("#error").remove();	
						}
					}
				});
			*/
			}
			
			
			
			function submitCheckForm(){
				
					$(":input").each(function(){
							var str = $(this).attr('class');
						//	alert(str);
							 if(str!==undefined){
							 var arr=str.split(' ');
								for(var i=0;i<arr.length;i++){
									if(arr[i] == 'free'){
												inputtext = $(this).val();
												if(inputtext!==''){
													$(this).removeAttr("style");
													$(this).next().remove();
												}
												if(inputtext==''){
													if($(this).next().attr('class')!=='label label-important'){
														$(this).after("<span class='label label-important' id='error'>不能为空</span>");
													}
														$(this).css("border","1px solid red");
														exit();
												}
									}
									if(arr[i] == 'url'){
											inputtext = $(this).val();
											var ab=/^http:\/\/[a-zA-Z0-9]+\.[a-zA-Z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"\"])*$/;   
											if(ab.test(inputtext) == false){
												if($(this).next().attr('class')!=='label label-important'){
													$(this).after("<span class='label label-important' id='error'>请输入合法网址</span>");
												}
												$(this).css("border","1px solid red");
												exit();
											}else if(ab.test(inputtext) == true && $(this).next().attr('class')=='label label-important'){
													$(this).removeAttr("style");
													$(this).next().remove();
											}		
							}
							if(arr[i] == 'phone'){
											inputtext = $(this).val();
											
											var ab=/^(13[0-9]|15[0-9]|18[2|6|7|8|9])\d{8}$/;
											if(ab.test(inputtext) == false){
												if($(this).next().attr('class')!=='label label-important'){
													$(this).after("<span class='label label-important' id='error'>电话格式不合法</span>");
												}
												$(this).css("border","1px solid red");
												exit();
											}else if(ab.test(inputtext) == true && $(this).next().attr('class')=='label label-important'){
													$(this).removeAttr("style");
													$(this).next().remove();
											}
										
									}
									if(arr[i] == 'email'){
										inputtext = $(this).val();
										var ab = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
										if(ab.test(inputtext) == false){
											if($(this).next().attr('class')!=='label label-important'){
													$(this).after("<span class='label label-important' id='error'>邮箱格式不合法</span>");
												}
												$(this).css("border","1px solid red");
												exit();
											
										}else if(ab.test(inputtext) == true && $(this).next().attr('class')=='label label-important'){
													$(this).removeAttr("style");
													$(this).next().remove();
										}
										
									}
									
									if(arr[i] == 'length'){
										
										inputtext = $(this).val();
										var length = inputtext.length;
										var minlength = $(this).attr("minlength");
										var maxlength = $(this).attr("maxlength");
										if(typeof(minlength)!=='undefined' && typeof(maxlength)=='undefined'){
												if(length<minlength){
													if($(this).next().attr('class')!=='label label-important'){
														$(this).after("<span class='label label-important' id='error'>最小长度为"+minlength+"</span>");
														$(this).css("border","1px solid red");
														
													}
													exit();
												}else if(length>=minlength && $(this).next().attr('class')=='label label-important'){
													$(this).removeAttr("style");
													$(this).next().remove();
												}
										}
										if(typeof(maxlength)!=='undefined' && typeof(minlength)=='undefined'){
												if(length>maxlength){
													if($(this).next().attr('class')!=='label label-important'){
														$(this).after("<span class='label label-important' id='error'>最大长度为"+maxlength+"</span>");
														$(this).css("border","1px solid red");
														
													}
													exit();
												}else if(length<=maxlength && $(this).next().attr('class')=='label label-important'){
													$(this).removeAttr("style");
													$(this).next().remove();
												}
										}
										if(typeof(minlength)!=='undefined' && typeof(maxlength)!=='undefined'){
											
												if(length>maxlength || length<minlength){
													if($(this).next().attr('class')!=='label label-important'){
													
															$(this).after("<span class='label label-important' id='error'>长度必须在"+minlength+"-"+maxlength+"之间</span>");
													
														$(this).css("border","1px solid red");
														
													}
													exit();
												}else if(length<=maxlength && length>=minlength && $(this).next().attr('class')=='label label-important'){									
													$(this).removeAttr("style");
													$(this).next().remove();
												}
										}
										
									}
									
									if(arr[i] == 'repeat'){
										inputtext = $(this).val();
										var id = $(this).attr("equalto");
										var val = $(id).val();
										if(typeof(id)!=='undefined' && inputtext!==val){
												if($(this).next().attr('class')!=='label label-important'){
														$(this).after("<span class='label label-important' id='error'>两次值不一样</span>");
														$(this).css("border","1px solid red");
														
												}
											exit();
										}else if(inputtext==val){
												if($(this).next().attr('class')=='label label-important'){
													$(this).removeAttr("style");
													$(this).next().remove();
												}
										}
										
									}
									
									
									
									
									
									
								}
								}
									  
					});
			
			}