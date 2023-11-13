
<body>

    <div class="w-full py-2 px-8 my-8 leading-8">
        <h2 class="text-neutral-600">Categories</h2>
        <p>This is where you can insert new categories </p>
    </div>

    <table id="categoryTable" class="display" style="right: 0; ">
      <thead>
        <tr>
          <th>Category name</th>
          <th class="w-full flex justify-end">
            <a class="flex select-none items-center gap-3 rounded-lg bg-gradient-to-tr from-primary-600 to-primary-700 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-primary-500/20 transition-all hover:shadow-lg hover:shadow-primary-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" href="<?php echo base_url() . 'Category/insert_category'; ?>" data-ripple-light="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                <span class="uppercase text-white font-medium">add category</span>
            </a>
          </th>
        </tr>
      </thead>
      <tbody>

        <?php foreach ($category as $categories) { ?>

          <tr>

            <td><?php echo $categories['category_name']; ?></td>

            <td class="mr-10 flex items-center justify-end flex-wrap">

              <div class="flex items-center w-fit">
                <a href="<?php echo base_url('category/delete/' . $categories['id_category']); ?>" class="flex" id="deleteBtn" data-id="<?php echo $categories['id_category']; ?>">
                  <span class="p-2 bg-danger-bg border border-solid border-danger text-danger hover:bg-red-100/50 hover:border-red-700 hover:text-red-700 rounded-2xl leading-4 transition-all duration-200">delete</span>
                </a>
              </div>

            </td>

          </tr>

        <?php } ?>
  
      </tbody>
    </table>

    
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() . 'src/js/category/category.js' ?>"></script>
