<template>
  <Head :title="`${match.homeTeam.name} vs ${match.awayTeam.name} - Foota.ai Match Analysis & Predictions`">
      <meta
          name="description"
          content="At foota.ai, we leverage advanced AI to analyze football match tables and generate winning probabilities for each team. Gain insights into match outcomes, make informed decisions, and elevate your game analysis with our data-driven predictions!"
      />
  </Head>

  <div>
      <TransitionRoot as="template" :show="sidebarOpen">
          <Dialog
              class="relative z-50 xl:hidden"
              @close="sidebarOpen = false"
          >
              <TransitionChild
                  as="template"
                  enter="transition-opacity ease-linear duration-300"
                  enter-from="opacity-0"
                  enter-to="opacity-100"
                  leave="transition-opacity ease-linear duration-300"
                  leave-from="opacity-100"
                  leave-to="opacity-0"
              >
                  <div class="fixed inset-0 bg-gray-900/80" />
              </TransitionChild>

              <div class="fixed inset-0 flex">
                  <TransitionChild
                      as="template"
                      enter="transition ease-in-out duration-300 transform"
                      enter-from="-translate-x-full"
                      enter-to="translate-x-0"
                      leave="transition ease-in-out duration-300 transform"
                      leave-from="translate-x-0"
                      leave-to="-translate-x-full"
                  >
                      <DialogPanel
                          class="relative mr-16 flex w-full max-w-xs flex-1"
                      >
                          <TransitionChild
                              as="template"
                              enter="ease-in-out duration-300"
                              enter-from="opacity-0"
                              enter-to="opacity-100"
                              leave="ease-in-out duration-300"
                              leave-from="opacity-100"
                              leave-to="opacity-0"
                          >
                              <div
                                  class="absolute left-full top-0 flex w-16 justify-center pt-5"
                              >
                                  <button
                                      type="button"
                                      class="-m-2.5 p-2.5"
                                      @click="sidebarOpen = false"
                                  >
                                      <span class="sr-only"
                                          >Close sidebar</span
                                      >
                                      <XMarkIcon
                                          class="h-6 w-6 text-white"
                                          aria-hidden="true"
                                      />
                                  </button>
                              </div>
                          </TransitionChild>
                          <!-- Sidebar component, swap this element with another sidebar if you like -->
                          <div
                              class="flex grow flex-col gap-y-5 overflow-y-auto bg-gray-900 px-6 ring-1 ring-white/10"
                          >
                              <div
                                  class="flex h-16 shrink-0 items-center"
                              ></div>
                              <LeagueSelector :leagues="leagues" />
                          </div>
                      </DialogPanel>
                  </TransitionChild>
              </div>
          </Dialog>
      </TransitionRoot>
      
      <!-- Static sidebar for desktop -->
      <div
          class="hidden xl:fixed xl:inset-y-0 xl:z-50 xl:flex xl:w-72 xl:flex-col"
      >
          <!-- Sidebar component, swap this element with another sidebar if you like -->
          <div
              class="flex grow flex-col gap-y-5 overflow-y-auto bg-black/10 px-6 ring-1 ring-white/5"
          >
              <div class="flex h-16 shrink-0 items-center"></div>
              <LeagueSelector :leagues="leagues" />
          </div>
      </div>
      

    <div class="xl:pl-72">
      <div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-6 border-b border-white/5 bg-gray-900 px-4 shadow-sm sm:px-6 lg:px-8">
        <button type="button" class="-m-2.5 p-2.5 text-white xl:hidden" @click="sidebarOpen = true">
          <span class="sr-only">Open sidebar</span>
          <Bars3Icon class="h-5 w-5" aria-hidden="true" />
        </button>
        <AiNav />
      </div>

      <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-4 text-center text-gray-400">{{ __('home.AI Analysis') }}</h1>
        <div class="flex justify-center mb-4 xl:hidden">
      <button 
        type="button" 
        class="text-blue-600 underline hover:text-blue-500" 
      onclick="history.back()"
      >
        Back
      </button>
    </div>

        <div class="border border-gray-200 rounded-lg shadow-lg bg-white overflow-hidden">
          <div class="bg-gray-100 p-4">
            <h2 class="text-2xl font-semibold mb-2 text-center">{{ match.homeTeam.name }} vs {{ match.awayTeam.name }}</h2>
            <p class="text-gray-500 mb-4 text-center">Date: {{ new Date(match.utcDate).toLocaleDateString() }}</p>
            <div class="flex justify-center my-4">
              <img :src="match.homeTeam.crest" alt="Home Team Logo" class="w-24 h-24 mr-4" />
              <img :src="match.awayTeam.crest" alt="Away Team Logo" class="w-24 h-24" />
            </div>
          </div>

          <div class="p-4">
            <h3 class="text-lg font-semibold mb-2 text-center text-green-600">{{ __('home.AI Winning Probabilities') }}</h3>
            <p class="mb-4 ">{{ analysis }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import LeagueSelector from '@/Components/LeagueSelector.vue'
import AiNav from '@/Components/AiNav.vue'
import { Head, Link } from "@inertiajs/vue3";
import Banner from "@/Components/Banner.vue";

defineProps({
  leagues: Object,
  match: Object,
  analysis: String,
})

const sidebarOpen = ref(false);
</script>

<style scoped>
.container {
  max-width: 800px;
}


</style>
