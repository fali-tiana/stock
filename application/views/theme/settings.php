  
  <div class="h-full w-full bg-stone-100">
    <div class="m-auto flex h-[1100px] w-4/5 flex-col justify-around p-4">
      <form action="<?php echo base_url() . 'Settings/set_settings/' . $user->id_responsable ?>" method="post" class="flex h-3/5 w-full flex-col justify-between rounded-2xl border border-solid border-gray-100 bg-stone-50 px-4 py-6 shadow-xl">
        <div>
          <h1 class="px-4 text-xl font-bold text-gray-800">Paramètres du compte</h1>

          <div class="grid w-full grid-cols-9 p-4">
            <div class="col-span-2 font-medium text-gray-700"></div>
            <div class="col-span-6 col-start-4"></div>
          </div>

          <div class="mt-4 grid w-full grid-cols-9 p-4">
            <div class="col-span-2 font-medium text-gray-700">Nom</div>

            <div class="col-span-6 col-start-4 flex justify-between">

              <input placeholder="Antonio" value="<?php echo $user->name ?? ''; ?>" type="text" id="firstName" name="firstName" class="w-2/5 block rounded-md border border-gray-300 p-2.5 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-indigo-500 dark:focus:ring-indigo-500 bg-transparent" />
              <?php echo form_error('firstName'); ?>

              <input placeholder="De la Cruz" value="<?php echo $user->last_name ?? ''; ?>" type="text" id="lastName" name="lastName" class="w-2/5 block rounded-md border border-gray-300 p-2.5 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-indigo-500 dark:focus:ring-indigo-500 bg-transparent" />
              <?php echo form_error('lastName'); ?>

            </div>
          </div>

          <div class="mt-4 grid w-full grid-cols-9 p-4">

            <div class="col-span-2 font-medium text-gray-700">Adresse e-mail</div>

            <div class="col-span-6 col-start-4">
              <input placeholder="anto@gmail.com" value="<?php echo $user->email ?? ''; ?>" type="email" id="email" name="email" class="block w-full rounded-md border border-gray-300 p-2.5 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-indigo-500 dark:focus:ring-indigo-500 bg-transparent" />
              <?php echo form_error('email'); ?>
            </div>

          </div>

          <div class="mt-4 grid w-full grid-cols-9 p-4">

            <div class="col-span-2 font-medium text-gray-700">Numéro de téléphone <span class="text-gray-300">(facultatif)</span></div>

            <div class="col-span-6 col-start-4">
              <input placeholder="0333333333" value="<?php echo $user->phone ?? ''; ?>" type="tel" id="phone" name="phone" class="block w-full rounded-md border border-gray-300 p-2.5 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-indigo-500 dark:focus:ring-indigo-500 bg-transparent" />
              <?php echo form_error('phone'); ?>
            </div>

          </div>

          <div class="mt-4 grid w-full grid-cols-9 p-4">

            <div class="col-span-2 font-medium text-gray-700">Département</div>

            <div class="col-span-6 col-start-4">
              <input placeholder="Direction des Domaines et de la Propriété Foncière" value="<?php echo $user->department ?? ''; ?>" type="text" id="department" name="department" class="block w-full rounded-md border border-gray-300 p-2.5 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-indigo-500 dark:focus:ring-indigo-500 bg-transparent" />
              <?php echo form_error('department'); ?>
            </div>

          </div>

          <div class="mt-4 grid w-full grid-cols-9 p-4">
            
            <div class="col-span-2 font-medium text-gray-700">Fonction</div>

            <div class="col-span-6 col-start-4">
              <input placeholder="Assistant de direction " value="<?php echo $user->function ?? ''; ?>" type="text" id="position" name="position" class="block w-full rounded-md border border-gray-300 p-2.5 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-indigo-500 dark:focus:ring-indigo-500 bg-transparent" />
              <?php echo form_error('position'); ?>
            </div>

          </div>
        </div>

        <div class="my-4 grid grid-cols-9">
          <button type="submit" class="col-span-2 rounded-lg bg-indigo-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-indigo-800 focus:outline-none focus:ring-4 focus:ring-indigo-300 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">Save changes</button>
        </div>

      </form>

      <form action="<?php echo base_url() . 'Settings/set_passwords/' . $user->id_responsable ?>" method="post" class="flex h-1/3 w-full flex-col justify-between rounded-2xl border border-solid border-gray-100 bg-white px-4 py-6 shadow-xl">
        <div>
          <h1 class="px-4 text-xl font-bold text-gray-800">Sécurité</h1>

          <div class="grid w-full grid-cols-9 p-4">
            <div class="col-span-2 font-medium text-gray-700"></div>
            <div class="col-span-6 col-start-4"></div>
          </div>

          <div class="col-span-6 col-start-4">
            <div class="mt-4 grid w-full grid-cols-9 p-4">

              <div class="col-span-2 font-medium text-gray-700">Mot de passe</div>

              <div class="col-span-6 col-start-4">
                <input placeholder="Doit contenir au moins 6 caractères" value="<?php echo $user->password ?? ''; ?>" type="password" id="password" name="password" class="block w-full rounded-md border border-gray-300 p-2.5 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-indigo-500 dark:focus:ring-indigo-500 bg-transparent" />
                <?php echo form_error('password'); ?>
              </div>

            </div>

            <div class="mt-4 grid w-full grid-cols-9 p-4">

              <div class="col-span-3 font-medium text-gray-700">Confirmez mot de passe</div>

              <div class="col-span-6 col-start-4">
                <input placeholder="confirm your password" value="<?php echo $user->password ?? ''; ?>" type="password" id="passwordConfirm" name="passwordConfirm" class="block w-full rounded-md border border-gray-300 p-2.5 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-indigo-500 dark:focus:ring-indigo-500 bg-transparent" />
                <?php echo form_error('passwordConfirm'); ?>
              </div>

            </div>
          </div>
        </div>
      

        <div class="my-4 grid grid-cols-9">
          <button type="submit" class="col-span-3 rounded-lg bg-indigo-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-indigo-800 focus:outline-none focus:ring-4 focus:ring-indigo-300 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">Change password</button>
        </div>

      </form>
    </div>
  </div>
