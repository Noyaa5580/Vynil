<template>
  <div class="page">
    <header>
      <TheHeader
        :cookie_state="this.cookie_state"
        :show_admin="this.show_admin"
      />
    </header>
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
      cookie_state: false,
      show_admin: false,
    };
  },
  mounted() {
    this.show = true;
    this.$watch("$route.path", () => {
      if (this.$cookies.get("id") !== null) {
        console.log(this.$cookies.get("id"));
        this.cookie_state = true;
      }
      if (this.$cookies.get("id") == null) {
        this.cookie_state = false;
      }
      if (this.$cookies.get("role") == 2) {
        this.show_admin = true;
      } 
      if(this.$cookies.get("role") != 2) {
        this.show_admin = false;
      }
    });
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
  transition: all 0.3s ease-in-out;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
  height: 0px;
}

.fade-enter-to,
.fade-leave-from {
  opacity: 1;
}
</style>