<div class="h-screen w-full mt-10 flex justify-center">

    <form method="post" action="<?php echo base_url() . 'Category/store_category'; ?>" class="bg-white rounded-lg w-1/3 h-1/3 shadow-xl p-8 flex flex-col justify-between">

        <label for="categoryName" class="label-input">

            <input type="text" class="peer input-field" id="categoryName" name="categoryName" placeholder="category name" required/>
            <span class="span-input">category name</span>

            <?php echo form_error('categoryName'); ?>

        </label>

        <div class="flex bottom-0 z-50 items-center justify-between w-full h-10">

            <button type="submit" id="submitProduct" style="font-family: 'plus-jakarta-sans', sans-serif" class="btn-base p-4 hover:opacity-80 text-sm">

                <p>add category</p>
                <i id="add_product-btn" data-feather="plus"></i>

            </button>

            <a href="<?php echo base_url('Category'); ?>" style="font-family: 'plus-jakarta-sans', sans-serif" class="btn-outlined p-4 hover:opacity-80 text-sm m-0">

                <p>view categories</p>
                <i id="details-arrow" data-feather="arrow-right"></i>

            </a>

        </div>

    </form>

</div>

<script>
    $(document).ready(function () {

        feather.replace();

    });
</script>