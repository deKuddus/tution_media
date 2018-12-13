var app = new Vue({
		el:"#root",
		data(){
			return{
				blink_speed:1000,
				showteacherForm:false,
				showgardianform:false,
				teacher_login:false,
				gardian_login:false,
			}
			
		},
		mounted:function(){
				console.log("mounded");
		},
		methods:{
			 home(){
					window.location = 'index.php';
			},

			 teachers(){
				window.location = 'teacher.php';
			},

			 tutions(){
				window.location = 'tution.php';
			},

			 register(){
				window.location = 'register.php';
			},	

			 login(){
				window.location = 'login.php';
			},

			teachersfrom(){
				this.showteacherForm = true,
				this.showgardianform = false

					var t = setInterval(function () {
					    var ele1 = document.getElementById('myBlinkingDiv1');
					    ele1.style.visibility = (ele1.style.visibility == 'hidden' ? '' : 'hidden');
					}, this.blink_speed);
			},
			gardiansfrom(){
				this.showteacherForm = false,
				this.showgardianform = true

					var t = setInterval(function () {
					     var ele2 = document.getElementById('myBlinkingDiv2');
					    ele2.style.visibility = (ele2.style.visibility == 'hidden' ? '' : 'hidden');
					}, this.blink_speed);
			},
			teacherlogin(){
				this.teacher_login = true,
				this.gardian_login = false

					var t = setInterval(function () {
					    var ele3 = document.getElementById('blinkforteacherloging');
					    ele3.style.visibility = (ele3.style.visibility == 'hidden' ? '' : 'hidden');
					}, this.blink_speed);

			},
			gardianlogin(){
				this.teacher_login = false,
				this.gardian_login = true

					var t = setInterval(function () {
					    var ele4 = document.getElementById('blinkforgardloging');
					    ele4.style.visibility = (ele4.style.visibility == 'hidden' ? '' : 'hidden');
					}, this.blink_speed);

			},
            logout(){
			 	window.location ='logout.php';
			},
            profile(){
                window.location ='teacherprofile.php';
            }
	
		
			
			
		}
	});