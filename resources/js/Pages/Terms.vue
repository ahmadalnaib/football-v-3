<script setup>
import { Head } from '@inertiajs/vue3'
import AiNav from '@/Components/AiNav.vue'
</script>

<template>
  <Head title="Terms of Use - Foota.ai">
    <meta name="description" content="Read Foota.ai's terms of use to understand the rules and responsibilities when using our platform.">
  </Head>
  <AiNav />
  <div class="min-h-screen bg-gray-900 text-white">
    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
      <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold text-white">Terms of Use</h1>
        <p class="mt-4 text-sm text-gray-400">
          Welcome to Foota.ai. By accessing and using our platform, you agree to the following terms and conditions. Please read them carefully.
        </p>

        <!-- Platform Usage -->
        <h2 class="mt-6 text-lg font-semibold text-white">Platform Usage</h2>
        <p class="mt-2 text-sm text-gray-400">
          Foota.ai provides AI-generated football match analysis and winning probabilities. These are for informational purposes only. By using Foota.ai, you acknowledge that these predictions are not guaranteed to be accurate and should not be the sole basis for any decisions, including financial or betting-related decisions.
        </p>

        <!-- Disclaimer on Gambling -->
        <h2 class="mt-6 text-lg font-semibold text-white">Disclaimer on Gambling</h2>
        <p class="mt-2 text-sm text-gray-400">
          Foota.ai does not promote gambling. The predictions and analysis provided by our platform are meant to inform football enthusiasts and should not be used for gambling purposes. Users are solely responsible for their actions, and Foota.ai is not liable for any losses incurred through betting or other financial activities.
        </p>

        <!-- Intellectual Property -->
        <h2 class="mt-6 text-lg font-semibold text-white">Intellectual Property</h2>
        <p class="mt-2 text-sm text-gray-400">
          All content on Foota.ai, including but not limited to text, graphics, logos, and software, is the property of Foota.ai. Unauthorized use of any content is strictly prohibited.
        </p>

        <!-- Modifications to Terms -->
        <h2 class="mt-6 text-lg font-semibold text-white">Modifications to Terms</h2>
        <p class="mt-2 text-sm text-gray-400">
          Foota.ai reserves the right to modify these terms at any time. Any changes will be posted on this page. Your continued use of the platform signifies your acceptance of the updated terms.
        </p>

        <p class="mt-4 text-sm text-gray-400">
          If you have any questions about these Terms of Use, please contact us at: <a href="mailto:info@foota.ai" class="text-blue-500 underline">info@foota.ai</a>.
        </p>
      </div>
    </div>
  </div>
</template>

<style scoped>
/* Your styles here */
</style>
