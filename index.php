<!DOCTYPE html>
<html>
<head>

	<title>xkcd Password Generator</title>
	<meta charset='utf-8'>
	
	<link href='css/default.css' rel="stylesheet">
	
</head>
<body>
	<?php
		$word_list = Array(
				'argument',
    				'calculate',
    				'middle',
    				'fumbling',
    				'admit',
    				'injure',
    				'stick',
    				'entertaining',
    				'diligent',
    				'hollow',
    				'books',
    				'skin',
    				'abusive',
    				'unpack',
    				'move',
   	 			'guttural',
    				'unequaled',
    				'bucket',
    				'liquid',
    				'humor'
				);
			
			$symbol_list = Array(
				'!',
				'@',
				'#',
				'$',
				'%',
				'^',
				'&',
				'*',
				'(',
				')'
				);			

   			$pw = '';
 
			$nowords = intval($_GET['nwords']);			

			for ($i = 1; $i <= $nowords; $i++) 
			{
				// Get random word from $lines
				$key = rand(0,19);

				if ((preg_match("/^[a-z]+$/", $word_list[$key]) == 1)) 
				{
					// String only contains a to z characters
					$pw = $pw . $word_list[$key] . " ";
				}
			}

		if ($_GET['add_symbol'] == 'on')
		{
			$pw = $pw . $symbol_list[rand(0,9)];
		}

		if ($_GET['add_number'] == 'on')
		{
			$pw = $pw . rand(0,9);
		}
		?>

	<div class='container'>
		<h1>xkcd Password Generator</h1>
	
		<p class='password'> <?php echo $pw; ?></p>
		
		<form>
			<p class='options'>
			
				<label for='word_count'>No. of Words</label>
				<input type='text' name='nwords' id='number_of_words' value=''>  (Max 20)
				<br>
					
				<input type='checkbox' name='add_number' id='add_number' > 
				<label for='add_number'>Add a number</label>
				<br>
				<input type='checkbox' name='add_symbol' id='add_symbol' > 
				<label for='add_symbol'>Add a symbol</label>
			</p>
		
			<input type='submit' class='btn btn-default' value='Generate New'>
					
		</form>

		<p class='description'>
			Randomly generated passwords have been a common item in web design for many years now. Recently, the webcomic XKCD
			intriduced a novel method for generating a password that the author claims is much easier for a human to remember and much
			harder for a computer to guess based on "bits of entropy". This comic was very popular and on this page I have made a generator for the style of passwords
			suggested. Above you will find the form for generating a new password with the conditions you choose, while below you can read the
			source comic.</p>

		<p class='details'>
			<a href='http://xkcd.com/936/'>xkcd password strength</a><br>
		
			<a href='http://xkcd.com/936/'>
				<img class='comic' src='http://imgs.xkcd.com/comics/password_strength.png' alt='xkcd style passwords'>
			</a>
			<br>
		</p>
			
	</div>
</body>
</html>
