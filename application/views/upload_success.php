<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload success</title>
</head>
<body>
  
    <h3>Your file was successfully uploaded!</h3>

    <?php var_dump($someData); ?>

    <img src="<?php echo base_url() . 'uploads/'; ?><?php echo ($someData); ?>">

    <p><?php echo anchor('upload', 'Upload Another File!'); ?></p>

</body>
</html>