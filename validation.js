function validate(){
					name = document.contactfrm.name.value;
					email = document.contactfrm.email.value;
					phone = document.contactfrm.phone.value;
					msg = document.contactfrm.msg.value;
					
					

					if(name=="Name"){
						alert("Enter your name");
						document.contactfrm.name.focus();
						return false;
					}					
					if(email=="Email"){
						alert("Enter your email");
						document.contactfrm.email.focus();
						return false;
					}
					if(phone=="Phone"){
						alert("Enter your Contact number");
						document.contactfrm.phone.focus();
						return false;
					}
					if(msg=="Message"){
						alert("Enter your Message");
						document.contactfrm.msg.focus();
						return false;
					}
			}