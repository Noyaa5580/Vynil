<template>
  <div class="page">
    <header><TheHeader /></header>
    <main>
    <router-view v-slot="{ Component }">
  <transition name="fade">
    <component :is="Component" />
  </transition>
</router-view>
    </main>
    <footer><TheFooter /></footer>
  </div>
</template>

<script>
import TheHeader from "./components/TheHeader.vue";
import TheFooter from "./components/TheFooter.vue";

export default {
  components: { TheHeader, TheFooter },
  data() {
    return {
      show: false,
    };
  },
  mounted() {
    this.show = true;
  },
};
</script>

<style scoped>
* {
  margin: 0%;
  padding: 0%;
}

.page {
  overflow: hidden;
  width: 100%;
  height: 100%;
  display: flex;
  flex-grow: 1;
  flex-direction: column;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease-in-out;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.fade-enter-to,
.fade-leave-from {
  opacity: 1;
}
</style>