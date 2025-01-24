<template>
  <div class="card">
    <div class="img_container">
      <img :src="'img/products/' + img + '.svg'" alt="" />
    </div>
    <div class="product_info">
      <p class="product_name">{{ name }}</p>
      <p class="product_price">{{ price }} ₽</p>
      <p class="product_author">{{ artist }}</p>
    </div>
    <router-link :to="'/product?id=' + id"
      ><div class="buy_button">Купить</div></router-link
    >
  </div>
</template>
<style scoped>
a {
  display: flex;
  text-decoration: none;
  justify-content: center;
}

.card {
  min-width: 350px;
    max-width: 350px;
  height: 570px;
  display: flex;
  flex-direction: column;
  border-radius: 12px;
  box-shadow: 0 0 5px 3px rgba(0, 0, 0, 0.03);
  background: #f1f1f1;
  padding-bottom: 20px;
  border: none;
}
.img_container {
  width: 320px;
  max-height: 340px;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: white;
  border-radius: 18px;
  margin: 12px;
  flex-grow: 2;
}
img {
  width: 246px;
  height: 326px;
}

.product_info {
  font-family: "Martian Mono", serif;
  margin-left: 12px;
}
.product_name {
  font-size: 16px;
  margin-top: 16px;
  margin-bottom: 8px;
}

.product_price {
  font-style: italic;
  font-weight: 700;
  margin: 0px;
  font-size: 20px;
}
.product_author {
  font-weight: 500;
  font-size: 16px;
  color: #a9a9a9;
  margin-top: 8px;
  margin-bottom: 16px;
}
.buy_button {
  display: flex;
  background-color: #d4452b;
  width: 320px;
  height: 50px;
  border-radius: 32px;
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: "Zen Kaku Gothic Antique", serif;
  font-weight: 600;
  font-size: 24px;
  cursor: pointer;
  position: relative;
}

@media (min-width: 320px) and (max-width: 767px) {
  .card {
    min-width: 280px;
    max-width: 280px;
    height: 440px;
    margin: 0px;
    background-color: #fff;
    margin-right: 20px;
  }

  .img_container {
    max-height: 280px;
    width: 270px;
    margin: 4px;
  }

  .buy_button {
    margin-left: 0px;
    width: 150px;
    height: 30px;
    font-size: 14px;
  }
  .product_name {
    font-size: 12px;
    margin-top: 8px;
    margin-bottom: 8px;
  }
  .product_author {
    font-size: 12px;
  }
  .product_price {
    font-size: 12px;
  }
}
@media (min-width: 768px) and (max-width: 1023px) {
  .card {
    min-width: 280px;
    max-width: 280px;
    height: 450px;
    margin: 0px;
    background-color: #fff;
    margin-right: 20px;
  }

  .img_container {
    max-height: 280px;
    width: 270px;
    margin: 4px;
  }

  .buy_button {
    margin-left: 0px;
    width: 150px;
    height: 30px;
    font-size: 14px;
  }
  .product_name {
    font-size: 12px;
    margin-top: 8px;
    margin-bottom: 8px;
  }
  .product_author {
    font-size: 12px;
  }
  .product_price {
    font-size: 12px;
  }
}
@media (min-width: 1024px) and (max-width: 1440px) {
  .card {
    min-width: 280px;
    height: 450px;
    margin: 0px;
    margin-right: 20px;
  }

  .img_container {
    max-height: 280px;
    width: 270px;
    margin: 4px;
  }

  .buy_button {
    margin-left: 0px;
    width: 150px;
    height: 30px;
    font-size: 14px;
  }
  .product_name {
    font-size: 12px;
    margin-top: 8px;
    margin-bottom: 8px;
  }
  .product_author {
    font-size: 12px;
  }
  .product_price {
    font-size: 12px;
  }
}
</style>
<script>
export default {
  props: {
    name: String,
    price: String,
    artist: String,
    img: String,
    id: Number,
  },
  methods: {
    openproduct(id) {
      this.$router.push("/product?id=" + id);
    },
  },
};
</script>