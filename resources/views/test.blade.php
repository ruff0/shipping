<!DOCTYPE html>
<html>
	<head>
	<link href="{{url('public/shippingtemplate/css/alert/sweetalert.css')}}" rel="stylesheet"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="{{url('public/shippingtemplate/js/alert/sweetalert.min.js"></script>
	</head>
	<body style="font-family:Arial">

		<?php 
		$i = 0;
		$a = 5;
		for($i;$i<=10;$i++)
		{
			$a = $a + 1;
		}
		echo $a."<br/>";
		echo $i;

		?>
		
	    <form id="form1" runat="server">
	    <textarea ID="TextBox1" runat="server" TextMode="MultiLine"
	        Rows="5" Columns="30" onkeyup="hasPendingChanges()">
	    </textarea>
	    <br /><br />
	    <button ID="Button1" runat="server" Text="Save" disabled="true"
	    OnClientClick="onSaveButtonClick()" onclick="Button1_Click"> Submit </button>
	    <script type="text/javascript">
	        var changesSaved = true;

	        function onSaveButtonClick()
	        {
	            changesSaved = true;
	        }

	        function hasPendingChanges()
	        {
	            changesSaved = document.getElementById('TextBox1').value.length == 0;
	            document.getElementById('Button1').disabled = changesSaved;
	        }

	        window.onbeforeunload = function ()
	        {
	            if (!changesSaved)
	            {
	                return "You haven't saved your changes";
	            }

	        };
	    </script>
	    </form>
	</body>
</html>