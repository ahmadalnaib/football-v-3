<script setup>
import { ref } from 'vue';


const props = defineProps({
standings: Object,
league: Object,
summary: Object,
})



</script>

<template>
  <div class="min-h-screen bg-gray-900 text-white">
    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
      <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <h3 class="text-base font-semibold leading-7">{{ league.name }}</h3>
        <table class="mt-4 w-full text-sm text-left text-gray-400">
          <thead class="text-xs uppercase bg-gray-700 text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">Position</th>
              <th scope="col" class="px-6 py-3">Team</th>
              <th scope="col" class="px-6 py-3">Played</th>
              <th scope="col" class="px-6 py-3">Won</th>
              <th scope="col" class="px-6 py-3">Draw</th>
              <th scope="col" class="px-6 py-3">Lost</th>
              <th scope="col" class="px-6 py-3">Points</th>
              <th scope="col" class="px-6 py-3">Goals For</th>
              <th scope="col" class="px-6 py-3">Goals Against</th>
              <th scope="col" class="px-6 py-3">Goal Difference</th>
           
            </tr>
          </thead>
          <tbody>
            <tr v-for="team in standings" :key="team.team.id" class="bg-gray-800 border-b border-gray-700">
              <td class="px-6 py-4">{{ team.position }}</td>
              <td class="px-6 py-4 flex items-center">
                <img :src="team.team.crest" alt="team crest" class="h-6 w-6 mr-2">
                {{ team.team.name }}
              </td>
              <td class="px-6 py-4">{{ team.playedGames }}</td>
              <td class="px-6 py-4">{{ team.won }}</td>
              <td class="px-6 py-4">{{ team.draw }}</td>
              <td class="px-6 py-4">{{ team.lost }}</td>
              <td class="px-6 py-4">{{ team.points }}</td>
              <td class="px-6 py-4">{{ team.goalsFor }}</td>
              <td class="px-6 py-4">{{ team.goalsAgainst }}</td>
              <td class="px-6 py-4">{{ team.goalDifference }}</td>
          
            </tr>
          </tbody>
        </table>
        <div class="mt-8">
          <h3 class="text-base font-semibold leading-7">Summary</h3>
          <p class="mt-1 text-sm leading-6 text-gray-400 whitespace-pre-line">{{ summary }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
/* Your styles here */
</style>