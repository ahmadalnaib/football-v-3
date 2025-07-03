<script setup>
import AiNav from '@/Components/AiNav.vue'
import __ from '@/lang';
import { Link, Head } from "@inertiajs/vue3";
</script>

<template>
  <Head title="Foota.ai - AI-Powered Football Match Analysis & Predictions">
    <meta name="description" content="At foota.ai, we leverage advanced AI to analyze football match tables and generate winning probabilities for each team. Gain insights into match outcomes, make informed decisions, and elevate your game analysis with our data-driven predictions!">
  </Head>

  <div class="min-h-screen bg-gray-900 text-white">
    <AiNav />
    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
      <!-- About Foota Section -->
      <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <h3 class="text-base font-semibold leading-7">{{ __('about.About Foota') }}</h3>
        <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-400">
   {{ __('about.About') }}
        </p>

        <!-- Improved Match Data Analysis Section -->
        <p class="mt-4 max-w-2xl text-sm leading-6 text-gray-400">
        {{ __('about.Improved Match Data Analysis') }}
        </p>

        <p class="mt-4 max-w-2xl text-sm leading-6 text-gray-400">
        {{ __('about.Improved Match Data Analysis2') }}
        </p>

        <!-- Improved Section on Data Accuracy -->
        <p class="mt-4 max-w-2xl text-sm leading-6 text-gray-400">
        {{ __('about.Improved Data Accuracy') }}
        </p>

        <p class="mt-4 max-w-2xl text-sm leading-6 text-gray-400">
        {{ __('about.Improved Data Accuracy2') }}
        </p>

        <p class="mt-4 max-w-2xl text-sm leading-6 text-gray-400">
        {{ __('about.Improved Data Accuracy3') }}
        </p>

        <!-- Disclaimer -->
        <p class="mt-6 max-w-2xl text-sm leading-6 text-yellow-500">
         {{ __('about.Disclaimer') }}
        </p>

        <!-- Privacy Policy and Terms -->
        <p class="mt-6 max-w-2xl text-sm leading-6 text-gray-400">
        {{ __('about.using') }} <Link data-pan="Privacy" class="text-blue-500 underline" href="/privacy">{{ __('about.Privacy Policy') }}</Link> {{ __('about.and') }} <Link data-pan="Terms" class="text-blue-500 underline" href="/terms">{{ __('about.Terms of Use') }}</Link>.
        </p>
        <p class="mt-4 max-w-2xl text-sm leading-6 text-gray-400">
          &copy; {{ new Date().getFullYear() }} Foota.ai. All rights reserved.
        </p>
      </div>
    </div>
  </div>
</template>

<style scoped>
/* Your styles here */
</style>
