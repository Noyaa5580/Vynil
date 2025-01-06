<template>
  <div class="head">
    <div class="header_string">
      <div class="city_button">
        <div class="city" @click="this.open_drop()">
          <img :src="'img/icons/map.svg'" alt="" id="location" />
          <p>{{ this.city }}</p>
        </div>
        <div class="delivery_time">Доставка от {{ this.delivery }} дней</div>
        <div class="drop_con" ref="drop">
          <div class="city_drop" v-on:mouseleave="this.close_drop()" id="drop">
            <div class="item_drop" @click="this.Moscow()" id="first_item_drop">
              Москва
            </div>
            <div class="item_drop" @click="this.St()">Санкт-Петербург</div>
            <div class="item_drop" @click="this.Novosibirsk()">Новосибирск</div>
            <div class="item_drop" @click="this.sofrino()" id="last_item_drop">
              Софрино
            </div>
          </div>
        </div>
      </div>

      <div><img :src="'img/logo.svg'" alt="" class="logo" /></div>
      <div class="menu_icons">
        <img :src="'img/icons/Heart_01.svg'" alt="" srcset="" class="icon" />
        <img :src="'img/icons/User.svg'" alt="" srcset="" class="icon" />
        <img
          :src="'img/icons/Shopping_Cart_01.svg'"
          alt=""
          srcset=""
          class="icon"
        />
      </div>
    </div>
    <nav class="menu">
      <div v-for="url in urls" :key="url">
        <router-link :to="url.link" active-class="active_link" class="link">
          {{ url.name }}
        </router-link>
      </div>
    </nav>
  </div>
</template>

<style>
.head {
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 40px !important;
}
.menu {
  display: flex;
  width: 980px;
  justify-content: space-between;
}

.header_string {
  width: 100%;
  margin: 24px 0px 32px 0px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.menu_icons {
  display: flex;
  gap: 12px;
  margin-right: 24px;
}
.menu_icons > img {
  width: 30px;
  height: 30px;
}

.city {
  display: flex;
  gap: 4px;
  font-family: "Zen Kaku Gothic Antique", serif;
  font-weight: 500;
  font-size: 18px;
  align-items: center;
}
.city > p {
  margin-bottom: 0px;
  min-width: 150px !important;
  max-height: 30px;
}
.city_button {
  margin-left: 24px;
  max-width: 160px;
  cursor: pointer;
}

#location {
  min-width: 24px;
  min-height: 24px;
  max-width: 24px;
  max-height: 24px;
}

.drop_con {
  display: none;
  position: absolute;
  transition: 0.3s all ease-in-out;
  visibility: hidden;
  opacity: 0;
}

.city_drop {
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: center;
  margin-top: 12px;
  font-family: "Martian Mono", serif;
  font-size: 20px;
  background-color: #d6d6d6;
  margin-left: 24px;
  width: 250px;
  height: 140px;
  z-index: 1;
  border-radius: 10px;
  padding: 10px 0px;
}

.item_drop {
  border-bottom: 1px solid black;
  cursor: pointer;
  min-height: 35px;
  display: flex;
  align-items: center;
  width: 250px;
  padding-left: 12px;
  transition: 0.3s all ease-in-out;
}

.item_drop:hover {
  background-color: #D4452B;
}

#first_item_drop {
  border-radius: 10px 10px 0px 0px;
}

#last_item_drop {
  border: none;
  border-radius: 0px 0px 10px 10px;
}

.delivery_time {
  font-family: "Martian Mono", serif;
  font-weight: 500;
  font-size: 14px;
  color: #d6d6d6;
  margin-left: 28px;
  margin-top: 4px;
  width: 180px;
}

.link {
  color: black;
  font-size: 28px;
  text-decoration: none;
  font-family: "Zen Kaku Gothic Antique", serif;
  font-weight: 500;
}
.active_link {
  color: #D4452B;
}

.icon {
  cursor: pointer;
}

@media (min-width: 320px) and (max-width: 767px) {
  .header_string {
    justify-content: center;
    margin: 10px 0px;
  }

  .menu {
    width: 320px;
    justify-content: center;
    gap: 12px;
  }

  .link {
    font-size: 14px;
  }
  .logo {
    width: 100px;
    height: 30px;
  }
  .city_button {
    display: none;
  }

  .menu_icons {
    width: 10px;
    height: 30px;
    margin-right: 0px;
  }
  .menu_icons {
    display: none;
  }
}

@media (min-width: 768px) and (max-width: 1023px) {
  .menu {
    width: 650px;
  }
}
</style>

<script>
export default {
  data: function () {
    return {
      urls: [
        { name: "Главная", link: "/" },
        { name: "Каталог", link: "/catalog" },
        { name: "Контакты", link: "/contacts" },
        { name: "О нас", link: "/about" },
      ],
      delivery: "2",
      city: "Москва",
    };
  },
  methods: {
    open_drop() {
      this.$refs.drop.style.display = "flex";
      setTimeout(() => {
        this.$refs.drop.style.visibility = "visible";
        this.$refs.drop.style.opacity = "1";
      }, 0);
    },
    close_drop() {
      this.$refs.drop.style.opacity = "0";
      this.$refs.drop.style.visibility = "hidden";
      setTimeout(() => {
        this.$refs.drop.style.display = "none";
      }, 300);
    },
    Moscow() {
      this.city = "Москва";
    },
    St() {
      this.city = "Санкт-Петербург";
    },
    sofrino() {
      this.city = "Софрино";
    },
    Novosibirsk() {
      this.city = "Новосибирск";
    },
  },

  mounted() {},
};
</script>