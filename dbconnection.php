<?php
	$page_tittle = 'MySQL Laboratory';
	include('includes/header.html');
	include('includes/configuration.php');

	if(ini_get("magic_quotes_gpc") == "1")
	{
   	$_POST['query'] = stripslashes($_POST['query']);
	}


	/* Section that executes query and displays the results */
	if(!empty($_POST['form']))
	{
  		$cxn = mysqli_connect($host,$user,$password,$database);
  		$result = mysqli_query($cxn,$_POST['query']);
  		//echo "Database Selected: <b>{$_POST['database']}</b><br>
  		//      Query: <b>{$_POST['query']}</b>
  		echo "<h3>Results</h3><hr>";
  		if($result == false)
  		{
     		echo "<h4>Error: ".mysqli_error($cxn)."</h4>";
  		}
  		elseif(@mysqli_num_rows($result) == 0)
  		{
     		echo "<h4>Query completed. 
            No results returned.</h4>";
  		}
		else
  		{
   	/* Display results */
     		echo "<table border='1'><thead><tr>";
     		$finfo = mysqli_fetch_fields($result);
     		foreach($finfo as $field)
     		{
        		echo "<th>".$field->name."</th>";
     		}
     		echo "</tr></thead>
         	  <tbody>";
     		for ($i=0;$i < mysqli_num_rows($result);$i++)
     		{
        		echo "<tr>";
        		$row = mysqli_fetch_row($result);
        		foreach($row as $value)
        		{
           		echo "<td>".$value."</td>";
        		}
        		echo "</tr>";
     		}
     		echo "</tbody></table>";
  		} 
		 /* Display form with only buttons after results */
  		$query = str_replace("'","%&%",$_POST['query']);
  		echo "<hr><br>
      <form action='{$_SERVER['PHP_SELF']}' method='POST'>
        <input type='hidden' name='query' value='$query'>
        <input type='hidden' name='database'
               value={$_POST['database']}>
        <input type='submit' name='queryButton'
               value='New Query'>
        <input type='submit' name='queryButton'
               value='Edit Query'>
      </form>";
  		exit();
	} 

	/* Displays form for query input */
	if (@$_POST['queryButton'] != "Edit Query")
	{
   	$query = " ";
	}
	else
	{
   	$query = str_replace("%&%","'",$_POST['query']);
	}
	include('includes/formquery.html');
	include('includes/footer.html');
?>

