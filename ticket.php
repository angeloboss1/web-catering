<html>
<head>
      	<title> Checkbox To Determine Which Team the User Selects</title>
</head>

<div align="center">
<body>

<?php

  if(isset($_POST['formSubmit']))
  {
        $aTeam = $_POST['formTeam'];

        if(empty($aTeam))
        {
        		echo("<p>You didn't select any teams.</p>\n");
        }
	
	else
    	{
	// create variable ‘$N’
	$N = count($aTeam);
     	echo("<p>You selected $N team(s): ");

	// what should the for loop output in the echo statement?
      	for($i=0; $i < $N; $i++)
      	{
        		echo($aTeam[$i] . " ");
      	}

      	echo("</p>");
    }
        //Checking whether a particular check box is selected
        //See the IsChecked() function below
        
       if(IsChecked('formTeam','A'))
        {
        		echo ' Lakewood BlueClaws is checked. ';
        		
        }
      
        if(IsChecked('formTeam','B'))
        {
        		echo ' Staten Island Yankees is checked. ';
        	
        }
        
        if(IsChecked('formTeam','C'))
        {
        		echo ' Trenton Thunder is checked. ';
        	
        }
        if(IsChecked('formTeam','D'))
        {
        		echo ' New Team is checked. ';
        	
        }
        
 }

function IsChecked($chkname,$value)
{
if(!empty($_POST[$chkname]))
    	{
        		foreach($_POST[$chkname] as $chkval)
        		{
          			if($chkval == $value)
             			{
              			return true;
              		}
        		}
    	}
    return false;
 }
?>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
<p>
    Which team game would you like to attend?<br/>
        <input type="checkbox" name="formTeam[]" value="A" />Lakewood BlueClaws<br />
        <input type="checkbox" name="formTeam[]" value="B" />Staten Island Yankees<br />
        <input type="checkbox" name="formTeam[]" value="C" />Trenton Thunder<br />
        <input type="checkbox" name="formTeam[]" value="D" />New Team<br />
</p>

<input type="submit" name="formSubmit" value="Submit" />
</form>

</body>

</div>

</html>