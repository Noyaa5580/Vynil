<template>
  <div>
    <div class="slider">
      <div class="slider_line" id="slider">
        <div class="item">
          <img :src="'/img/banners/slide1.svg'" alt="" srcset="" />
        </div>
        <div class="item">
          <img :src="'/img/banners/slide2.svg'" alt="" srcset="" />
        </div>
        <div class="item">
          <img :src="'/img/banners/slide3.svg'" alt="" srcset="" />
        </div>
        <div class="item">
          <img :src="'/img/banners/slide4.svg'" alt="" srcset="" />
        </div>
      </div>
    </div>
    <div class="slide_buttons">
      <div
        class="button_slider button_slider_active"
        id="buttonS_1"
        ref="b1"
        @click="this.edit_slider1()"
      ></div>
      <div
        class="button_slider"
        id="buttonS_2"
        ref="b2"
        @click="this.edit_slider2()"
      ></div>
      <div
        class="button_slider"
        id="buttonS_3"
        ref="b3"
        @click="this.edit_slider3()"
      ></div>
      <div
        class="button_slider"
        id="buttonS_4"
        ref="b4"
        @click="this.edit_slider4()"
      ></div>
    </div>
  </div>
</template>

<style scoped>
.slider {
  width: 100%;
  height: 639px;
  overflow: hidden;
}

.slider_line {
  display: flex;
  width: 400%;
  height: 450px;
  position: relative;
  right: 0%;
  z-index: 0;
  transition: all ease-in-out 0.3s;
}

.item {
  width: 100%;
  height: 639px;
}

.item>img{width: 100%; }

.slide_buttons {
  margin-top: 24px;
  display: flex;
  gap: 16px;
  margin-left: 40px;
}

.button_slider {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  background-color: #852E1E;
  cursor: pointer;
}

.button_slider_active {
  border-radius: 12px !important;
  width: 30px;
  transition: all ease-in-out 50ms;
}

@media (min-width: 320px) and (max-width: 767px) {
  .slider {
    height: 150px;
  }

  .slider_line {
    height: 150px;
    align-items: center;
  }

  .item{
    height: 150px;
  }

  .item>img{
    height: 150px;
  }

  .slide_buttons {
    margin: 12px;
    justify-content: center;
  }
}
@media (min-width: 768px) and (max-width: 1023px) {
  .slider {
    height: 300px;
  }

  .slider_line {
    height: 300px;
    align-items: center;
  }
  .item{
    height: 300px;
  }
  .item>img{
    height: 300px;
  }
}


@media (min-width: 1024px) and (max-width: 1440px){
    .slider {
    height: 400px;
  }

  .slider_line {
    height: 400px;
    align-items: center;
  }

  .item{
    height: 400px;
  }
  .item>img{
    height: 400px;
  }
}
</style>

<script>
export default {
  data: function () {
    return {

    };
  },
  methods: {
    edit_slider1() {
      let slider = document.getElementById("slider");
      slider.style.right = "0%";
      this.$refs.b1.classList.add("button_slider_active");
      this.$refs.b2.classList.remove("button_slider_active");
      this.$refs.b3.classList.remove("button_slider_active");
      this.$refs.b4.classList.remove("button_slider_active");

    },
    edit_slider2() {
      let slider = document.getElementById("slider");
      slider.style.right = "100%";
      this.$refs.b2.classList.add("button_slider_active");
      this.$refs.b1.classList.remove("button_slider_active");
      this.$refs.b3.classList.remove("button_slider_active");
      this.$refs.b4.classList.remove("button_slider_active");

    },
    edit_slider3() {
      let slider = document.getElementById("slider");
      slider.style.right = "200%";
      this.$refs.b3.classList.add("button_slider_active");
      this.$refs.b2.classList.remove("button_slider_active");
      this.$refs.b1.classList.remove("button_slider_active");
      this.$refs.b4.classList.remove("button_slider_active");

    },
    edit_slider4() {
      let slider = document.getElementById("slider");
      slider.style.right = "300%";  
      this.$refs.b4.classList.add("button_slider_active");
      this.$refs.b2.classList.remove("button_slider_active");
      this.$refs.b3.classList.remove("button_slider_active");
      this.$refs.b1.classList.remove("button_slider_active");

    },
  },
};
</script>