<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/main.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
<script src="js/messages_zh_TW.min.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			$.validator.addMethod('strongpwd',function(value,element){
				return this.optional(element) ||  /^[A-Za-z]\w{7,14}$/.test(value);
			},'密碼不符合');
			
			$.validator.addMethod('checkID',function(value,element){
				return this.optional(element) ||  /^[A-Z](1|2)\d{8}$/.test(value);
			},'身分證不符合');
			
			$.validator.addMethod('checkName',function(value,element){
				return this.optional(element) ||  value.length <= 5 && /^[\u4e00-\u9fa5]{2,5}$/.test(value);
			},'姓名不符合');
			
			$.validator.addMethod('checkPhone',function(value,element){
				return this.optional(element) || /^[09]{2}[-]\d{8}$/.test(value);
			},'手機號碼不符合');
			
			$.validator.addMethod('checkHomephone',function(value,element){
				return this.optional(element) || /^[0][2-8][-]\d{7}$/.test(value);
			},'電話不符合');
			
			$.validator.addMethod('checkAddress',function(value,element){
				return this.optional(element) || value.length >= 10;
			},'住址不符合');
			
			$('#form1').validate({
				submitHandler: function(form){
					form.submit();
				},
				rules: {
					id:{
						required: true,
						checkID: true,
						minlength: 10,
						remote:{
							url: 'sql/checkrepeat.php',
							type: 'post'
						}

					},
					email:{
						required: true,
						email: true,
						remote:{
							url: 'sql/checkrepeat.php',
							type: 'post'
						}
					},
					password: {
						required: true,
						strongpwd: true
					},
					password2: {
						required:true,
						equalTo: '#password'
					},
					name:{
						required: true,
						checkName: true
					},
					date:{
						required: true,
						date: true
					},
					phone:{
						required: true,
						checkPhone: true
					},
					homephone:{
						required: true,
						checkHomephone: true
					},
					address:{
						required: true,
						checkAddress: true
					}
					
				},
				messages:{
					id:{
						remote: '身分證已重複'
					},
					email:{
						remote: 'Email已重複'
					}
				}
			});
		});
	</script>
<style>

input[type="text"], input[type="password"] {
	width: 100%;
	outline: none;
}
.block {
	display: block;
	margin: 5px 0;
	font-size: 16px;
}
.error {
	color: #ff0000;
	font-size: 14px;
}
</style>
</head>
<body>
<div id="content">
  <form name="form1" id="form1" method="post"  action="test.html">
    <table width="500" cellspacing="0" cellpadding="5" align="center">
      <tr>
        <td><label for="id" class="block">身分證字號</label>
          <input name="id" id="id" type="text"  placeholder="A123456789"/></td>
      </tr>
      <tr>
        <td><label for="email" class="block">Email信箱</label>
          <input name="email" id="email" type="text"  /></td>
      </tr>
      <tr>
        <td><label for="password" class="block">密碼 (第一個字必須英文字母)</label>
          <input name="password" id="password" type="password"   /></td>
      </tr>
      <tr>
        <td><label for="passowrd2" class="block">驗證密碼</label>
          <input name="password2" id="password2" type="password"   /></td>
      </tr>
      <tr>
        <td><label for="name" class="block">中文姓名</label>
          <input name="name" id="name" type="text"   /></td>
      </tr>
      <tr>
        <td><label for="date" class="block">生日</label>
          <input name="date" id="date" type="text"   placeholder="2017/01/01"/></td>
      </tr>
      <tr>
        <td><label for="sex" class="block">性別</label>
          <label>
            <input name="sex" type="radio" id="sex_0" value="M" checked="CHECKED">
            男</label>
          <label>
            <input type="radio" name="sex" value="F" id="sex_1">
            女</label></td>
      </tr>
      <tr>
        <td><label for="phone" class="block">手機號碼</label>
          <input name="phone" id="phone" type="text"  placeholder="09-12345678"/></td>
      </tr>
	  <tr>
        <td><label for="homephone" class="block">電話號碼</label>
          <input name="homephone" id="homephone" type="text"  placeholder="02-1234567"/></td>
      </tr>
	  <tr>
        <td><label for="address" class="block">住址</label>
          <input name="address" id="address" type="text"   /></td>
      </tr>
      <tr>
        <td align="center"><input type="submit" name="submit" id="submit" value="送出" ></td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>
