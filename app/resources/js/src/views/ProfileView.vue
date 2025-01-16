<template>
  <div>
    <img
      :src="'img/icons/logout.svg'"
      alt=""
      srcset=""
      class="icon"
      @click="this.logout()"
    />
    <p>Hello {{ this.user.name }}</p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: [],
    };
  },
  methods: {
    logout() {
      axios.get("/logout");
      setTimeout(() => {
        this.$router.push("/");
      }, 400);
    },
    async getUser() {
      try {
        await axios
          .get("/api/users/" + this.$route.query.id)
          .then((response) => {
            this.user = response.data;
          });
      } catch (error) {
        console.log(error);
      }
    },
  },
  mounted() {
    this.getUser();
  },
};
</script>

<style scoped>
.icon {
  width: 30px;
}
</style>