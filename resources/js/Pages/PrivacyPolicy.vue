<script setup>
import { Head } from '@inertiajs/vue3'
import AiNav from '@/Components/AiNav.vue'
</script>

<template>
  <Head title="Privacy Policy - Foota.ai">
    <meta name="description" content="Read Foota.ai's privacy policy to learn how we handle and protect your data while using our platform.">
  </Head>

  <AiNav />

  <div class="min-h-screen bg-gray-900 text-white">
    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
      <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold text-white">Privacy Policy</h1>
        <p class="mt-4 text-sm text-gray-400">
          At Foota.ai, we are committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website.
        </p>

        <!-- Data Collection -->
        <h2 class="mt-6 text-lg font-semibold text-white">Data Collection</h2>
        <p class="mt-2 text-sm text-gray-400">
          Foota.ai does not collect any personal data from users. We do not require any registration or login for using our platform. No cookies, tracking, or personal identifiers are stored or shared.
        </p>

        <!-- Data Security -->
        <h2 class="mt-6 text-lg font-semibold text-white">Data Security</h2>
        <p class="mt-2 text-sm text-gray-400">
          Since we do not collect any personal data, there is no data stored on our servers. However, we take standard measures to protect any non-personally identifiable information that may be processed by third-party analytics tools.
        </p>

        <!-- Third-Party Services -->
        <h2 class="mt-6 text-lg font-semibold text-white">Third-Party Services</h2>
        <p class="mt-2 text-sm text-gray-400">
          Foota.ai may utilize third-party services to analyze website traffic. These third parties do not have access to personal information and adhere to their respective privacy policies. 
        </p>

        <!-- Policy Updates -->
        <h2 class="mt-6 text-lg font-semibold text-white">Policy Updates</h2>
        <p class="mt-2 text-sm text-gray-400">
          Foota.ai reserves the right to update this privacy policy at any time. Any changes will be posted on this page. Your continued use of the platform constitutes acceptance of those changes.
        </p>

        <p class="mt-4 text-sm text-gray-400">
          If you have any questions about our Privacy Policy, please contact us at: <a href="mailto:info@foota.ai" class="text-blue-500 underline">info@foota.ai</a>.
        </p>
      </div>
    </div>
  </div>
</template>

<style scoped>
/* Your styles here */
</style>
