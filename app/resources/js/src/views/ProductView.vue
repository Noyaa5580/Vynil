<template>
  <transition name="fade">
    <div class="page_content" v-if="update">
      <div @click="router_back()" class="back_link">
        <!-- <img src="../assets/icons/Chevron_Left_Duo.svg" alt="" /> -->
        Назад
      </div>
      <div class="product_info">
        <img :src="'img/products/' + product_info.img + '.svg'" alt="" />
        <div class="product_specifications">
          <p class="product_name">{{ product_info.name }}</p>
          <div class="specs">
            <p>Артикул: {{ product_info.id }}</p>
            <p>Автор: {{ product_info.artist }}</p>
          </div>
          <div class="description">
            <p class="specs_description">Описание:</p>
            <p class="description_text">{{ product_info.description }}</p>
          </div>
        </div>
        <div class="buy_block">
          <p class="price">{{ product_info.price }} ₽</p>
          <div v-on:click="this.checkproducts()" class="buy_button">
            Добавить в корзину
          </div>
          <div class="delivery">
            <p class="city">Москва</p>
            <p class="dil_time">Доставка от 2 дней</p>
          </div>
        </div>
      </div>
      <p class="see_label">Смотрите также</p>
      <div class="see_more">
        <div class="products_container">
          <ProductCard
            v-for="item in see_products"
            :key="item"
            :name="item.name"
            :price="item.price"
            :author="item.artist"
            :img="item.img"
            :id="item.id"
          ></ProductCard>
        </div>
      </div>
    </div>
  </transition>
</template>

<style scoped>
.page_content {
  margin: 0px 68px;
}
.back_link {
  font-family: "Zen Kaku Gothic Antique", serif;
  font-weight: 400;
  display: flex;
  align-items: center;
  font-size: 20px;
  height: 22px;
  margin-bottom: 24px;
}

.product_info {
  display: flex;
  justify-content: space-between;
}
.product_info > img {
  width: 380px;
  height: 480px;
}

.product_name {
  font-family: "Zen Kaku Gothic Antique", serif;
  font-weight: 600;
  font-size: 36px;
  color: #000;
}

.product_specifications {
  margin-left: 70px;
}

.specs {
  display: flex;
  flex-direction: column;
  gap: 12px;
  font-family: "Martian Mono", serif;
  font-weight: 400;
  font-size: 20px;
  color: #ababab;
  margin-top: 24px;
}

.specs_description {
  font-family: "Martian Mono", serif;
  font-weight: 400;
  font-size: 20px;
  color: #ababab;
  margin-top: 18px;
  margin-bottom: 12px;
}

.description {
  font-family: "Martian Mono", serif;
  font-weight: 400;
  color: #000;
}

.description_text {
  max-width: 650px;
  font-size: 20px;
  line-height: 25px;
  text-align: justify;
}

.buy_block {
  min-width: 250px;
  height: 180px;
  border-radius: 8px;
  box-shadow: 0 0 5px 3px rgba(0, 0, 0, 0.03);
  background: #f7f7f7;
  margin-left: 260px;
}

.buy_button {
  border-radius: 12px;
  width: 225px;
  height: 38px;
  background: #d4452b;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: "Zen Kaku Gothic Antique", serif;
  font-weight: 600;
  font-size: 20px;
  color: #fff;
  margin-left: 12px;
  cursor: pointer;
}

.price {
  color: #000;
  font-family: "Martian Mono", serif;
  font-size: 32px;
  margin: 10px 0px 12px 12px;
  font-weight: 600;
}

.delivery {
  margin-top: 14px;
  margin-left: 12px;
}

.city {
  font-family: "Martian Mono", serif;
  font-weight: 500;
  font-size: 14px;
  margin-bottom: 0px;
}

.dil_time {
  font-family: "Nunito";
  font-size: 12px;
  color: #d6d6d6;
  margin-top: 4px;
}

.products_container {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  width: 80%;
  gap: 24px;
}

.see_more {
  display: flex;
  width: 100%;
  justify-content: center;
  margin-bottom: 40px;
}
.see_label {
  font-family: "Zen Kaku Gothic Antique", serif;
  font-weight: 600;
  font-size: 28px;
  color: #000;
  margin: 24px 0px;
}

.fade-enter-active,
.fade-leave-active {
  transition: all 0.5s ease-in-out;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
  height: 200vh;
}

.fade-enter-to,
.fade-leave-from {
  opacity: 1;
}

@media (min-width: 320px) and (max-width: 767px) {
  p {
    margin-bottom: 2px;
    text-align: center;
  }
  .page_content {
    margin: 0px;
    justify-content: center;
  }
  .product_info > img {
    width: 300px;
    height: 300px;
  }
  .product_info {
    align-items: center;
    flex-direction: column;
  }
  .product_specifications {
    margin: 0px;
  }
  .product_name {
    font-size: 18px;
  }
  .specs {
    gap: 4px;
    margin-top: 8px;
    font-size: 12px;
  }
  .specs_description {
    font-size: 20px;
  }
  .description_text {
    font-size: 12px;
    padding: 8px;
    text-align: left;
  }
  .buy_block {
    margin-left: 0px;
  }
  .dil_time {
    text-align: left;
  }
  .card {
    margin-right: 0px;
  }
}
@media (min-width: 768px) and (max-width: 1023px) {
 p {
    margin-bottom: 2px;
    text-align: center;
  }
  .page_content {
    margin: 0px;
    justify-content: center;
  }
  .product_info > img {
    width: 380px;
    height: 380px;
  }
  .product_info {
    align-items: center;
    flex-direction: column;
  }
  .product_specifications {
    margin: 0px;
  }

  .specs {
    gap: 4px;
    margin-top: 8px;
    font-size: 16px;
  }
  .specs_description {
    font-size: 20px;
  }
  .description_text {
    font-size: 16px;
    padding: 8px;
    text-align: left;
  }
  .buy_block {
    margin-left: 0px;
  }
  .dil_time {
    text-align: left;
  }
  .card {
    margin-right: 0px;
  }
}
@media (min-width: 1024px) and (max-width: 1440px) {
 .page_content {
    margin: 0px;
    justify-content: center;
  }
  .product_info > img {
    width: 380px;
    height: 380px;
  }
  .product_info {
    align-items: center;
    flex-direction: column;
  }
  .product_specifications {
    margin: 0px;
  }

  .specs {
    gap: 4px;
    margin-top: 8px;
    font-size: 16px;
  }
  .specs_description {
    font-size: 20px;
  }
  .description_text {
    font-size: 16px;
    padding: 8px;
    text-align: left;
  }
  .buy_block {
    margin-left: 0px;
  }
  .dil_time {
    text-align: left;
  }
  .card {
    margin-right: 0px;
  }
}
</style>

<script>
import axios from "axios";
import ProductCard from "../components/ProductCard.vue";

export default {
  components: { ProductCard },
  data: function () {
    return {
      product_info: {},
      see_products: [],
      update: true,
    };
  },
  methods: {
    router_back() {
      this.$router.go(-1);
    },
    getProducts() {
      let lim1 = Math.round(Math.random() * 17 + 1);
      if (lim1 > 13) lim1 = 13;
      let lim2 = lim1 + 5;
      axios
        .get("api/pagination/start=" + lim1 + "&lim=" + lim2)
        .then((response) => (this.see_products = response.data))
        .catch((error) => {
          console.error("Ошибка при запросе к API:", error);
        });
    },
    async getProduct() {
      try {
        axios
          .get("api/products/" + this.$route.query.id)
          .then((response) => (this.product_info = response.data));
      } catch (error) {
        console.log(error);
      }
    },
    checkproducts() {
      console.log(this.see_products);
    },
  },
  mounted() {
    this.$watch("$route.query.id", () => {
      this.update = false;
      this.product_info = "";
      this.see_products = "";
      this.getProduct();
      this.getProducts();
      setTimeout(() => {
        this.update = true;
      }, 300);
    });
    this.getProduct();
    this.getProducts();
  },
  beforeMount() {
    this.product_info = "";
    this.see_products = "";
  },
};
</script>