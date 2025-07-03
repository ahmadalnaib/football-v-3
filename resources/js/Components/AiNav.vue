<script setup>
import __ from '@/lang';
import { Link, usePage,router } from '@inertiajs/vue3';

const isActive = (url) => {
  const currentUrl = usePage().url;
  return currentUrl === url;
};
</script>

<template>
  <div class="flex flex-1 justify-between items-center py-4 border-b border-gray-800 px-4 lg:px-8">
    <!-- Left side navigation links -->
    <nav class="flex gap-x-6 text-sm font-semibold text-gray-400">
      <ul class="flex items-center gap-x-6">
        <li>
          <Link 
            data-pan="Home" 
            :href="'/'" 
            :class="{ 'text-indigo-400': isActive('/'), 'text-gray-400 hover:text-indigo-400': !isActive('/') }"
          >
            {{ __('navbar.Home') }}
  
            
          </Link>
        </li>
        <li>
          <Link 
            data-pan="About" 
            :href="'/about'" 
            :class="{ 'text-indigo-400': isActive('/about'), 'text-gray-400 hover:text-indigo-400': !isActive('/about') }"
          >
            {{ __('navbar.About') }}
          </Link>
        </li>
        <!-- <li>
          {{ __('home.greeting',{name:$page.props.auth.user.name}) }}
          {{ __('navbar.greeting') }}
        </li> -->
      </ul>
    </nav>

    <!-- Right side language selector -->
    <div class="relative">
      <select 
      v-on:change="router.post(route('language.store', { language: $event.target.value }))"
        name="language" 
        id="language" 
        class="px-4 py-2 bg-gray-700 text-white border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 appearance-none"
      >
        <option 
          :value="language.value" 
          v-for="language in $page.props.languages" 
          :key="language.value"
          :selected="language.value === $page.props.language"
        >
          {{ language.label }}
        </option>
      </select>
      <!-- Custom dropdown icon -->
    
    </div>
  </div>
</template>
