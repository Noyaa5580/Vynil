<template>
  <div class="block">
    <div class="recs">
      <img :src="'img/recs.svg'" alt="" />
      <button class="rec_button" @click="this.recomendate()">
        Мы рекомендуем!
      </button>
    </div>
    <transition>
      <ProductCard
        :name="this.card1.name"
        :price="this.card1.price"
        :artist="this.card1.artist"
        :img="this.card1.img"
        :id="this.card1.id"
      />
    </transition>
    <transition>
      <ProductCard
        :name="this.card2.name"
        :price="this.card2.price"
        :artist="this.card2.artist"
        :img="this.card2.img"
        :id="this.card2.id"
      />
    </transition>
  </div>
</template>

<script>
import axios from "axios";

import ProductCard from "./ProductCard.vue";
export default {
  components: { ProductCard },
  data() {
    return {
      card1: [],
      card2: [],
      rec_num1: null,
      rec_num2: null,
    };
  },
  methods: {
    recomendate() {
      this.card1 = '';
      this.card2 = '';
      this.getRecs();
    },
    get_rec_num() {
      this.rec_num1 = Math.floor(Math.random() * 17 + 1);
      this.rec_num2 = Math.floor(Math.random() * 17 + 1);
      if (this.rec_num1 == this.rec_num2) {
        this.rec_num2++;
      }
    },
    async getRecs() {
      this.get_rec_num();
      try {
        await axios.get("/api/products/" + this.rec_num1).then((response) => {
          this.card1 = response.data;
        });
        await axios.get("/api/products/" + this.rec_num2).then((response) => {
          this.card2 = response.data;
        });
      } catch (error) {
        console.log(error);
      }
    },
  },
  mounted() {
    this.getRecs();
  },
};
</script>

<style scoped>
.block {
  width: 100%;
  height: 840px;
  background-color: #d9d9d9;
  display: flex;
  align-items: center;
  justify-content: space-around;
}
.recs {
  width: 500px;
}
.recs > img {
  width: 480px;
  height: 540px;
  z-index: 0;
}

.rec_button {
  border-radius: 50px;
  border: 1px solid #000;
  background-color: #fff;
  color: #000;
  font-family: "Zen Kaku Gothic Antique", serif;
  font-weight: 600;
  width: 390px;
  height: 120px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 32px;
  position: relative;
  bottom: 32px;
  left: 130px;
  z-index: 1;
  cursor: pointer;
}

</style>