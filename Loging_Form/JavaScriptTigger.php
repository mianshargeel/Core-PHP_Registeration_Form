<script type="text/javascript">
		
	document.myform.onsubmit=function() 
	{
		if(document.myform.username.value == '')
		{
			alert("Please enter your name");
			document.myform.username.focus();
			return false;

		} 
		elseif(document.myform.password.value == '')
		{
			alert("Please enter your Password");
			document.myform.password.focus();
			return false;

		}
		elseif(document.myform.email.value == '')
		{
			alert("Please enter your email");
			document.myform.email.focus();
			return false;

		}
		return true;
	}

	</script>