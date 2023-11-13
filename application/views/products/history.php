<body>
    <table id="myHistoryTable" class="display" style="right: 0; ">
      <thead>
        <tr>
          <th>Nom du produit</th>
          <th>Type d'événement</th>
          <th>Changement de quantité</th>
          <th>Date</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

        <?php foreach ($product as $records) { ?>

          <tr>

            <td><?php echo $records['product_name']; ?></td>
            <td>

            <?php
              $records_code = '';

              switch ($records['event_type']) {

                case 'insert' : 
                  $records_code = 'success';
                  $records_text = 'text-success';
                  $records_bg = 'bg-success-bg';
                  break;

                case 'shipment' :
                  $records_code = 'warning';
                  $records_text = 'text-warning';
                  $records_bg = 'bg-warning-bg';
                  break;

                case 'update' :
                  $records_code = 'purplee';
                  $records_text = 'text-purplee';
                  $records_bg = 'bg-purplee-bg';
                  break;

                default : 
                  $records_code = 'info';
                  $records_text = 'text-info';
                  $records_bg = 'bg-info-bg';

              };
            ?>

              <div class='center relative inline-block select-none whitespace-nowrap rounded-lg <?php echo "$records_text $records_bg"; ?> py-2 pl-4 pr-2 align-baseline font-sans text-xs font-bold uppercase leading-none before:absolute before:w-2 before:h-2 before:bg-<?php echo $records_code; ?> before:rounded-full before:-translate-x-[9px] before:translate-y-[1.5px]'>
                <span class="mt-px"><?php echo $records['event_type']; ?></span>
              </div>
            </td>
            <td><?php echo $records['quantity_change']; ?></td>
            <td><?php echo $records['date']; ?></td>
            <td class="text-center block text-primary-500 transition-opacity duration-300 hover:opacity-70"><a href="<?php echo base_url('Product/history_detail/' . $records['id_product']) ?>">voir historique</a></td>

          </tr>

        <?php } ?>
  
      </tbody>
    </table>

    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() . 'src/js/products/history.js' ?>"></script>