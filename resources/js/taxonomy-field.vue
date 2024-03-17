<script setup>
  defineProps(['url'])
</script>

<style scoped>
  .control .results {
    display: none;
  }
</style>

<template>
  <div class="control field taxonomy">
    <input type="text" name="taxonomy-search" placeholder="Enter search terms..." />
    <div class="results">

    </div>
  </div>
</template>