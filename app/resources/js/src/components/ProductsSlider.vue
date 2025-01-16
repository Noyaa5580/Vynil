<template>
  <div>
    <div
      class="slider"
      v-on:mouseover="show_buttons1()"
      v-on:mouseleave="hide_buttons1()"
    >
      <p class="slider_name">Популярные новинки</p>
      <div class="buttons_container">
        <div class="buttons" id="buttons1">
          <div class="button_slider" id="left1" @click="this.slider_left1()">
            <!-- <img src="../assets/icons/Arrow_left.svg" alt="" /> -->
          </div>
          <div class="button_slider" id="right1" @click="this.slider_right1()">
            <!-- <img src="../assets/icons/Arrow_right.svg" alt="" /> -->
          </div>
        </div>
      </div>
      <div class="slider_line" id="slider_line1">
        <ProductCard
          v-for="item in new_products"
          :key="item"
          :name="item.name"
          :price="item.price"
          :artist="item.artist"
          :img="item.img"
          :id="item.id"
        ></ProductCard>
      </div>
    </div>
  </div>
</template>
<style scoped>
.slider {
  position: relative;
  width: 100%;
  height: 680px;
  overflow: hidden;
  margin-bottom: 32px;
}

.slider_name {
  margin: 32px 0px 24px 68px;
  font-family: "Zen Kaku Gothic Antique", serif;
  font-weight: 600;
  font-size: 28px;
  color: #000;
}

.slider_line {
  display: flex;
  width: 300%;
  position: absolute;
  left: 0%;
  gap: 130px;
  padding: 0px 68px;
  transition: all ease-in-out 1s;
}

.button_slider {
  width: 50px;
  height: 50px;
  background-color: white;
  border-radius: 50%;
  box-shadow: 0 0 5px 3px rgba(0, 0, 0, 0.05);
  margin: 0px 38px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}

.buttons_container {
  position: relative;
  top: 35%;
}

.buttons {
  display: flex;
  visibility: hidden;
  opacity: 100%;
  position: absolute;
  z-index: 1;
  justify-content: space-between;
  width: 100%;
  transition: all ease-in-out 0.3s;
}
@media (min-width: 320px) and (max-width: 767px) {
  .slider_line {
    padding-left: 12px;
    width: 900%;
    gap: 20px;
  }
}

@media (min-width: 768px) and (max-width: 1023px) {
  .slider_line {
    padding-left: 12px;
    width: 500%;
    gap: 40px;
  }
}
@media (min-width: 1024px) and (max-width: 1440px) {
  .slider_line {
    padding-left: 12px;
    gap: 120px;
  }
}
</style>
<script>
import ProductCard from "./ProductCard.vue";
import axios from "axios";
export default {
  components: {
    ProductCard,
  },
  data: function () {
    return {
      new_products: [],
      offset1: 0,
      offset2: 0,
      offset3: 0,
    };
  },
  methods: {
    show_buttons1() {
      let buttons = document.getElementById("buttons1");
      buttons.style.visibility = "visible";
      buttons.style.opacity = "1";
    },
    hide_buttons1() {
      let buttons = document.getElementById("buttons1");
      buttons.style.visibility = "hidden";
      buttons.style.opacity = "0";
    },

    slider_left1() {
      let slider = document.getElementById("slider_line1");
      this.offset1 += 100;
      if (window.innerWidth >= 320 && window.innerWidth <= 767) {
        slider.style.left = this.offset1 + "%";
        if (this.offset1 > 0) {
          this.offset1 = -800;
          slider.style.left = this.offset1 + "%";
        }
      }
      if (window.innerWidth >= 768 && window.innerWidth <= 1023) {
        slider.style.left = this.offset1 + "%";
        if (this.offset1 > 0) {
          this.offset1 = -400;
          slider.style.left = this.offset1 + "%";
        }
      }
      if (window.innerWidth >= 1024 && window.innerWidth <= 1440) {
        slider.style.left = this.offset1 + "%";
        if (this.offset1 > 0) {
          this.offset1 = -300;
          slider.style.left = this.offset1 + "%";
        }
      }
      if (window.innerWidth > 1440) {
        slider.style.left = this.offset1 + "%";
        if (this.offset1 > 0) {
          this.offset1 = -200;
          slider.style.left = this.offset1 + "%";
        }
      }
    },
    slider_right1() {
      let slider = document.getElementById("slider_line1");
      this.offset1 -= 100;
      if (window.innerWidth >= 320 && window.innerWidth <= 767) {
        slider.style.left = this.offset1 + "%";
        if (this.offset1 < -800) {
          this.offset1 = 0;
          slider.style.left = this.offset1 + "%";
        }
      }
      if (window.innerWidth >= 768 && window.innerWidth <= 1023) {
        slider.style.left = this.offset1 + "%";
        if (this.offset1 < -400) {
          this.offset1 = 0;
          slider.style.left = this.offset1 + "%";
        }
      }
      if (window.innerWidth >= 1024 && window.innerWidth <= 1440) {
        slider.style.left = this.offset1 + "%";
        if (this.offset1 < -300) {
          this.offset1 = 0;
          slider.style.left = this.offset1 + "%";
        }
      }
      if (window.innerWidth > 1440) {
        slider.style.left = this.offset1 + "%";
        if (this.offset1 < -200) {
          this.offset1 = 0;
          slider.style.left = this.offset1 + "%";
        }
      }
    },
  },
  mounted() {
    axios
      .get("/api/pagination/start=3&lim=14")
      .then((response) => (this.new_products = response.data))
      .catch((error) => {
        console.error("Ошибка при запросе к API:", error);
      });
  },
};
</script>