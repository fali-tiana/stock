<!DOCTYPE html>
<html lang="en">
<head>

    <!-- meta link -->

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- link for the favicon -->
    
	<link rel="shortcut icon" href="<?php echo base_url() . 'public/img/favicon.ico' ?>" type="image/x-icon">
    
    <!-- link for the font -->
    
    <link href="https://api.fontshare.com/v2/css?f[]=boska@500,400,700,300&f[]=general-sans@200,500,300,600,400,700&display=swap" rel="stylesheet">

    <!-- link for jquery -->

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

    <!-- tailwind css link -->

    <link rel="stylesheet" href="<?php echo base_url() . 'src/css/datatable.css' ?>" />
    <link rel="stylesheet" href="<?php echo base_url() . 'public/output.css' ?>" />
    <link rel="stylesheet" href="<?php echo base_url() . 'src/css/productTable.css' ?>" />

    <!-- title -->
    
    <title>stock</title>

</head>

<h2>Liste des produits (avec les détails)</h2>

<table id="myTable" class="display" style="right: 0; ">

    <thead style="border: 1px solid #a0a0a0; background-color: #efefef; border-radius: 0.75rem 0.75rem 0 0; overflow: hidden;">
    <tr style="border: 1px solid #a0a0a0; background-color: #efefef; border-radius: 0.75rem;">
        <th style="border-left: 1px solid #a0a0a0; padding: 1rem">Nom du produit</th>
        <th style="border-left: 1px solid #a0a0a0; padding: 1rem">Code article</th>
        <th style="border-left: 1px solid #a0a0a0; padding: 1rem">Propriétés techniques</th>
    </tr>
    </thead>

    <tbody style="border: 1px solid #a0a0a0; border-radius: 0 0 0.75rem 0.75rem;">

    <?php foreach ($product as $products) { ?>

        <tr style="border-bottom: 1px solid #a0a0a0;">

            <td style="padding: 1rem"><?php echo $products['product_name']; ?></td>
            <td style="padding: 1rem"><?php echo $products['article_code']; ?></td>
            <td style="padding: 1rem"><?php echo $products['technical_properties']; ?></td>

        </tr>

    <?php } ?>

    </tbody>

</table>

<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script>
    $("#myTable").DataTable({
        "paging": false,
        "searching": false,
        "info": false,
	});
</script>


</body>

</html>