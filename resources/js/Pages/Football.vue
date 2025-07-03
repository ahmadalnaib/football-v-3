<template>
    <Head title="Foota.ai - AI-Powered Football Match Analysis & Predictions">
        <meta
            name="description"
            content="At foota.ai, we leverage advanced AI to analyze football match tables and generate winning probabilities for each team. Gain insights into match outcomes, make informed decisions, and elevate your game analysis with our data-driven predictions!"
        />
    </Head>


<!-- START ADVERTISER: PAKAMA Athletics DE/AT from awin.com -->
<div class="flex justify-center items-center my-6">
  <a rel="sponsored" href="https://www.awin1.com/cread.php?s=3127041&v=29905&q=435893&r=1762335">
    <img src="https://www.awin1.com/cshow.php?s=3127041&v=29905&q=435893&r=1762335" border="0" alt="Awin Ad">
  </a>
</div>
<div class="flex justify-center items-center my-6">

<!-- START ADVERTISER: logo-matten DE from awin.com -->

<a rel="sponsored" href="https://www.awin1.com/cread.php?s=3425769&v=58127&q=468733&r=1762335">
    <img src="https://www.awin1.com/cshow.php?s=3425769&v=58127&q=468733&r=1762335" border="0">
</a>

<!-- END ADVERTISER: logo-matten DE from awin.com -->

</div>



<!-- END ADVERTISER: PAKAMA Athletics DE/AT from awin.com -->
  

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
            <!-- Sticky search header -->
            <div
                class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-6 border-b border-white/5 bg-gray-900 px-4 shadow-sm sm:px-6 lg:px-8"
            >
                <button
                    type="button"
                    class="-m-2.5 p-2.5 text-white xl:hidden"
                    @click="sidebarOpen = true"
                >
                    <span class="sr-only">Open sidebar</span>
                    <Bars3Icon class="h-5 w-5" aria-hidden="true" />
                </button>

                <AiNav />
            </div>

            <main class="overflow-x-auto">
                
                <header :class=" { 'text-right': language === 'ar' } ">
             
                    <!-- Secondary navigation -->

                    <!-- Heading -->
                    <div
                        class="flex flex-col items-start justify-between gap-x-8 gap-y-4 bg-gray-700/10 px-4 py-4 sm:flex-row sm:items-center sm:px-6 lg:px-8 border-b-2 "
                    >
                        <div>
                            <div class="flex items-center gap-x-3">
                                <div
                                    class="flex-none rounded-full bg-green-400/10 p-1 text-green-400"
                                >
                                    <div
                                        class="h-2 w-2 rounded-full bg-current"
                                    />
                                </div>
                                <h1 class="flex gap-x-3 text-base leading-7">
                                    <span class="font-semibold text-white"
                                        >{{ __('home.Foota') }}</span
                                    >
                                    <span class="text-gray-600">/</span>
                                    <span class="font-semibold text-white"
                                        >{{ __('home.Football') }}</span
                                    >
                                </h1>
                            </div>
                            <p
                                class="mt-2 text-md leading-6 text-gray-400 font-semibold"
                            >
                              {{ __('home.Analyze') }}
                            </p>
                        </div>
                        <div
                            class="order-first flex-none rounded-full bg-indigo-400/10 px-2 py-1 text-xs font-medium text-red-600 ring-1 ring-inset ring-indigo-400/30 sm:order-none live-badge"
                        >
                            {{ __('home.Live') }}
                        </div>
                    </div>

                    <!-- Stats -->
                    <!-- Stats -->
                    <div
                        v-if="matches && matches.length"
                        class="grid grid-cols-1 bg-gray-800 rounded-lg shadow-md p-6 sm:grid-cols-2 lg:grid-cols-4 gap-4"
                    >
                        <div class="col-span-1 sm:col-span-2 lg:col-span-4">
                            <h2 class="text-lg font-semibold text-white mb-2">
                                <InformationCircleIcon
                                    class="h-6 w-6 text-yellow-400 rounded-sm"
                                />
                            </h2>
                            <p
                                class="text-md font-medium leading-6 text-gray-300"
                            >
                                {{ summary }}
                            </p>
                        </div>
                    </div>
                </header>

                <!-- Activity list -->
                <div class="border-t border-white/10 pt-11">
                    <div class="flex items-center">
                        <hr
                            class="flex-grow h-px bg-gradient-to-r from-purple-500 to-indigo-500"
                        />
                        <h2
                            class="px-4 text-base font-semibold leading-7 text-white sm:px-6 lg:px-8"
                        >
                          {{__('home.Football Fixtures')}}- {{ league.name }}
                        </h2>
                        <hr
                            class="flex-grow h-px bg-gradient-to-r from-purple-500 to-indigo-500"
                        />
                    </div>

                    <table class="w-full text-left mt-10">
                        <thead
                            class="border-b border-white/10 text-sm leading-6 text-white hidden sm:table-header-group"
                        >
                            <tr>
                                <!-- Matches column header -->
                                <th
                                    scope="col"
                                    class="py-2 pl-4 pr-8 font-semibold sm:pl-6 lg:pl-8 w-full sm:w-6/12 text-center"
                                >
                                    {{ __('home.Matches') }}
                                </th>
                                <!-- AI Analysis column header (hidden on mobile) -->
                                <th
                                    scope="col"
                                    class="py-2 pl-0 pr-8 font-semibold sm:table-cell sm:w-6/12 text-center"
                                >
                             {{ __('home.AI Analysis') }}
                                </th>
                            </tr>
                        </thead>
                   
                        <!-- Body -->
                        <tbody v-if="matches && matches.length">
                            <tr
                                v-for="match in matches"
                                :key="match.id"
                                class="flex flex-col sm:table-row mobile-border border-b border-white/10"
                            >
                                <!-- Matches -->
                                <td
                                    class="py-4 pl-4 pr-8 sm:pl-6 lg:pl-8 w-full sm:w-auto"
                                >
                                    <div
                                        class="flex items-center justify-between gap-x-4"
                                    >
                                        <img
                                            :src="match.homeTeam.crest"
                                            alt="Home Team Logo"
                                            class="h-8 w-8 rounded-full bg-gray-800"
                                        />
                                        <Link
                                        :data-pan="`match-${match.id}`"
                                            :href="`/matches/${match.id}`"
                                            class="truncate text-sm font-medium leading-6 text-white text-center hover:underline hover:text-teal-400 cursor-pointer"
                                            title="Click to view match details "
                                        >
                                            {{ match.homeTeam.name }} vs
                                            {{ match.awayTeam.name }}
                                            <span class="text-xs">→</span>
                                        </Link>

                                        <img
                                            :src="match.awayTeam.crest"
                                            alt="Away Team Logo"
                                            class="h-8 w-8 rounded-full bg-gray-800"
                                        />
                                    </div>

                                    <!-- Score -->
                                    <div class="flex justify-center my-2">
                                        <div
                                            class="font-mono text-sm leading-6 text-gray-100 bg-gray-700 rounded-sm px-2 py-1"
                                        >
                                            {{ match.score.fullTime.home }} -
                                            {{ match.score.fullTime.away }}
                                        </div>
                                    </div>

                                    <!-- Date and Time -->
                                    <div
                                        class="text-sm leading-6 text-gray-300 mt-2 flex justify-center"
                                    >
                                        <div
                                            class="flex items-center text-gray-400"
                                        >
                                            <span class="font-mono text-white">
                                                {{
                                                    new Date(
                                                        match.utcDate
                                                    ).toLocaleTimeString([], {
                                                        hour: "2-digit",
                                                        minute: "2-digit",
                                                    })
                                                }}
                                            </span>
                                            <span class="mx-2">|</span>
                                            <span class="font-mono text-white">
                                                {{
                                                    new Date(
                                                        match.utcDate
                                                    ).toLocaleDateString([], {
                                                        day: "numeric",
                                                        month: "long",
                                                    })
                                                }}
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                <!-- AI Analysis -->
                                <td class="py-4 pl-0 pr-8 w-full sm:w-auto">
                                    <!-- AI Analysis Title for Mobile (only visible on mobile) -->
                                       <Link
                                        :data-pan="`match-${match.id}`"
                                            :href="`/matches/${match.id}`"
                                        class="sm:hidden truncate  font-medium leading-6   hover:underline hover:text-teal-200 cursor-pointer  flex justify-center items-center text-xs  text-white bg-gradient-to-r from-purple-500 to-indigo-500 rounded-full py-1 mb-5 text-center shadow-md transition duration-300 ease-in-out hover:bg-opacity-80"
                                    >
                                        {{ __('home.AI Analysis') }}
                                    </Link>

                                    <div class="flex flex-col gap-y-2">
                                        <div
                                            v-for="line in parseAnalysis(
                                                match.analysis
                                            )"
                                            :key="line.team"
                                            class="flex items-center group"
                                            role="listitem"
                                        >
                                            <span
                                                class="w-1/3 text-sm text-white truncate"
                                                >{{ line.team }}</span
                                            >
                                            <div
                                                class="relative w-2/3 bg-gray-700 rounded-full h-2.5 overflow-hidden"
                                            >
                                                <div
                                                    :style="{
                                                        width:
                                                            line.probability +
                                                            '%',
                                                    }"
                                                    class="bg-green-400 h-2.5 rounded-full transition-all duration-300 ease-in-out"
                                                    :aria-label="`${line.team} probability: ${line.probability}%`"
                                                    role="progressbar"
                                                    aria-valuenow="line.probability"
                                                    aria-valuemin="0"
                                                    aria-valuemax="100"
                                                ></div>
                                            </div>
                                            <span
                                                class="ml-2 text-sm text-white"
                                                >{{ line.probability }}%</span
                                            >
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>

                        <!-- No matches available state -->
                        <tbody v-else>
                            <tr>
                                <td
                                    colspan="2"
                                    class="py-4 pl-4 pr-8 text-center text-gray-500"
                                >
                                    No matches available.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import LeagueSelector from "@/Components/LeagueSelector.vue";
import Banner from "@/Components/Banner.vue";
import AiNav from "@/Components/AiNav.vue";
import { defineProps } from "vue";
import { Head, Link } from "@inertiajs/vue3";

const props = defineProps({
    matches: Array,
    leagues: Object,
    league: Object,
    summary: String,
    language: String,
});
import {
    Dialog,
    DialogPanel,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";
import { HashtagIcon, XMarkIcon } from "@heroicons/vue/24/outline";
import { Bars3Icon, InformationCircleIcon } from "@heroicons/vue/20/solid";


// Function to parse the AI analysis response
function parseAnalysis(analysis) {
    const lines = analysis.split("\n").filter((line) => line.trim() !== "");
    return lines
        .map((line) => {
            const [team, probability] = line
                .split(":")
                .map((part) => part.trim());
            const parsedProbability = parseFloat(probability);
            if (!isNaN(parsedProbability)) {
                return { team, probability: parsedProbability };
            }
            return null;
        })
        .filter((item) => item !== null);
}

const sidebarOpen = ref(false);
</script>

<style scoped>


/* Keyframes for pulsing animation */
@keyframes pulse {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.1);
        opacity: 0.8;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

/* Style for the Live badge */
.live-badge {
    animation: pulse 1.5s infinite; /* Apply the pulse animation */
}

@media (max-width: 640px) {
    /* Mobile view */
    .mobile-border {
        border-bottom: 2px solid #ffffff; /* Increase border width and change color */
    }


}
</style>
