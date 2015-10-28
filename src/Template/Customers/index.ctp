<!-- File: src/Template/Customers/index.ctp -->
<?php echo $this->Html->docType(); ?>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Conestoga Pizzeria - Assignment 1</title>
        <?php 
            echo $this->Html->css(['style',                         'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css']); 
            echo $this->Html->script(['validation', 'javascript']);
        ?>
	</head>
	<body>
        <div id="logo">
			<p>
				Conestoga Pizzeria
			</p>
        </div>
        <?php //include('/add.ctp'); ?>
        <p><?= $this->Html->link('Add Customer', ['action' => 'add']) ?></p>
    </body>
</html>