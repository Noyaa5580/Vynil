<template>
  <div id="page">
    <router-view></router-view>
  </div>
</template>

<script>
export default {
};
</script>

<style>
* {
  margin: 0%;
  padding: 0%;
}
#page {
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  flex-grow: 1;
}
</style>