<?php include_once '../Service/TestService.php'; 
$records = get_service();
echo '<pre>'; print_r($records); 
?>
<html>
    <head></head>
    <body>
        <h3>Sample App</h3>
        <?php echo '<pre>'; print_r($records); ?>
    </body>
</html>