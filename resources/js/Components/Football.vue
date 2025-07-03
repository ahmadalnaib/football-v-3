<template>
    <div class="flex flex-col items-center min-h-screen bg-gray-100 p-4">
      <div class="container mx-auto p-4 bg-white shadow-lg rounded-lg max-h-screen overflow-y-auto">
        <h1 class="text-3xl font-bold mb-4 text-center">AI Football Analysis</h1>
  
        <div v-if="matches && matches.length" class="flex flex-col items-center gap-4 my-5">
          <div v-for="match in matches" :key="match.id" class="bg-white shadow-md rounded-lg p-4 w-full max-w-md">
            <div class="flex items-center mb-2 justify-between">
              <img :src="match.homeTeam.crest" alt="Home Team Logo" class="w-10 h-10">
              <h2 class="text-xl font-semibold text-center">{{ match.homeTeam.name }} vs {{ match.awayTeam.name }}</h2>
              <img :src="match.awayTeam.crest" alt="Away Team Logo" class="w-10 h-10">
            </div>
            <p class="text-gray-700 text-center">Score: {{ match.score.fullTime.home }} - {{ match.score.fullTime.away }}</p>
            <p class="text-gray-500 text-sm text-center">Date: {{ new Date(match.utcDate).toLocaleDateString() }}</p>
            <p class="text-gray-500 text-sm text-center">Time: {{ new Date(match.utcDate).toLocaleTimeString() }}</p>
            <p class="text-gray-500 text-sm text-center">Stadium: {{ match.homeTeam.tla }}</p>
            <p class="text-gray-500 text-sm text-center">Status: {{ match.status }}</p>
            <div v-if="match.analysis" class="mt-2 p-2 bg-gray-100 rounded">
              <h3 class="text-lg font-bold text-center">AI Analysis</h3>
              <p class="bg-green-100 text-green-700 text-center">{{ match.analysis }}</p>
            </div>
          </div>
        </div>
        <div v-else>
          <p class="text-gray-500 text-center">No matches available.</p>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { defineProps } from 'vue'
  
  const props = defineProps({
    matches: Array
  })
  </script>