<template>
    <aside class="hidden sm:flex sm:flex-col">
        <a href="/admin/home" class="inline-flex items-center justify-center h-20 w-20 bg-orange-600 hover:bg-gray-500 focus:bg-gray-500">
          <img v-bind:src="url+'img/logo1.png'" class="" style="width: 100%; height: 100%; ">
        </a>
        <div class="flex-grow flex flex-col justify-between text-gray-500 bg-gray-800">
          <nav class="flex flex-col mx-4 my-6 space-y-4">
            <router-link to="/admin/home"  class="inline-flex items-center justify-center py-3 text-orange-600 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
              <span class="sr-only">Home</span>
              <span class="material-symbols-outlined">
                home
                </span>
            </router-link>
            <router-link to="/shopping" class="inline-flex items-center justify-center py-3 text-orange-600 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
              <span class="sr-only">Pedidos</span>
              <span class="material-symbols-outlined">
                shopping_cart
                </span>
            </router-link>
            <router-link to="/checkout/" class="inline-flex items-center justify-center py-3 text-orange-600 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
              <span class="sr-only">Checkout</span>
              <span class="material-symbols-outlined">
                credit_score
                </span>
            </router-link>
            <router-link to="/admin/products" class="inline-flex items-center justify-center py-3 text-orange-600 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
              <span class="material-symbols-outlined">
                inventory_2
                </span>
              </router-link>
          </nav>
          <div class="inline-flex items-center justify-center h-20 w-20 border-t border-gray-700">
            <button class="p-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
              <span class="sr-only">Settings</span>
              <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </button>
          </div>
        </div>
      </aside>
</template>
<script>
    export default{
        name:'AdminAsideComponent',
        data:()=>({
            url:process.env.VUE_APP_ROOT_ASSETS,
        }),
    }
</script>