<template>
  <div class="content">
    <div class="filters">
      <p class="filters_name">Фильтры</p>
      <p class="filter_category__name" style="margin-top: 16px">Цена</p>
      <div class="price">
        <p>от</p>
        <input type="number" />
        <p>до</p>
        <input type="number" />
      </div>
      <div class="filter_border"></div>
      <p class="filter_category__name">Автор</p>
      <div class="search">
        <input style="width: 200px" type="text" placeholder="Поиск" />
      </div>
      <label v-for="item in this.authors" :key="item"
        ><input type="checkbox" name="" id="" class="checkbox" />{{
          item.artist
        }}</label
      >
      <div class="filter_border"></div>
    </div>
    <div class="products">
      <div class="search_line">
        <div class="search"><input type="text" placeholder="Поиск" /></div>
      </div>
      <transition name="fade">
        <div class="cards" v-show="update">
          <ProductCard
            v-for="item in products"
            :key="item"
            :name="item.name"
            :price="item.price"
            :artist="item.artist"
            :img="item.img"
            :id="item.id"
          ></ProductCard>
        </div>
      </transition>
      <div class="pagination">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <router-link
                :to="'/catalog?page=' + (Number(this.$route.query.page) - 1)"
                class="page-link"
                href="#"
                aria-label="Previous"
              >
                <span aria-hidden="true">&laquo;</span>
              </router-link>
            </li>
            <li class="page-item">
              <router-link to="/catalog?page=1" class="page-link"
                >1</router-link
              >
            </li>
            <li class="page-item">
              <router-link to="/catalog?page=2" class="page-link"
                >2</router-link
              >
            </li>
            <li class="page-item">
              <router-link to="/catalog?page=3" class="page-link"
                >3</router-link
              >
            </li>
            <li class="page-item">
              <router-link
                :to="'/catalog?page=' + (Number(this.$route.query.page) + 1)"
                class="page-link"
                href="#"
                aria-label="Next"
              >
                <span aria-hidden="true">&raquo;</span>
              </router-link>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</template>

<style>
.content {
  display: flex;
  width: 100%;
  justify-content: center;
  margin: 0px 68px;
  width: calc(100% - 132px);
}
.cards {
  display: flex;
  width: 1200px;
  flex-wrap: wrap;
  gap: 24px;
  margin: 24px 0px;
}

.search_line {
  display: flex;
}

.search > input {
  border: 1px solid #a9a9a9;
  border-radius: 6px;
  padding-left: 12px;
  width: 1130px;
  height: 24px;
}
input:focus {
  outline: none;
}

.sort_dropdown {
  display: flex;
  font-family: "Martian Mono", serif;
  justify-content: space-between;
  border: 1px solid #a9a9a9;
  border-radius: 6px;
  width: 198px;
  height: 24px;
  margin-right: 24px;
  cursor: pointer;
  padding-left: 12px;
}

.filters {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  font-family: "Martian Mono", serif;
  width: 300px;
  margin-left: 8px;
}

.filter_border {
  width: 206px;
  height: 2px;
  background-color: black;
  border-radius: 2px;
  margin: 16px 0px;
}
.filters_name {
  font-family: "Zen Kaku Gothic Antique", serif;
  font-weight: 500;
  font-size: 32px;
  text-align: center;
  color: #000;
}
.price {
  display: flex;
  gap: 4px;
  margin-top: 8px;
}

.price > input {
  border: 1px solid #a9a9a9;
  border-radius: 12px;
  width: 48px;
  height: 20px;
}
.page_link:focus {
  box-shadow: 0px 0px 10px 0.3px;

  padding: 0px;
}
.filter_category__name {
  font-size: 24px;
}
label {
  font-size: 18px;
  margin-top: 4px;
}
.checkbox {
  margin-right: 4px;
}
.active_page {
  box-shadow: 0px 0px 10px 0.3px #d4452b;
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
</style>

<script>
import ProductCard from "../components/ProductCard.vue";
import axios from "axios";
export default {
  components: { ProductCard },
  data: function () {
    return {
      products: [],
      update: true,
      authors: [],
    };
  },
  methods: {
    getProducts() {
      let start;
      let limit;
      switch (Number(this.$route.query.page)) {
        case 1:
          start = 0;
          limit = 6;
          break;
        case 2:
          start = 7;
          limit = 12;
          break;
        case 3:
          start = 13;
          limit = 18;
          break;
        default:
          break;
      }
      axios
        .get("/api/pagination/start=" + start + "&lim=" + limit)
        .then((response) => {
          this.products = response.data;
          this.authors = this.products;
          let a = JSON.parse(JSON.stringify(this.authors));
          let currentArtist;
          for (let i = 0; i < a.length; i++) {
            currentArtist = i + 1;
            if (a[i].artist == a[currentArtist].artist) {
              a.splice(i, 1);
            }
            this.authors = a;
          }
        })
        .catch((error) => {
          console.error("Ошибка при запросе к API:", error);
        });
    },
    getAuthors() {
      axios
        .get("/api/products")
        .then((response) => {
          this.authors = response.data;
        })
        .catch((error) => {
          console.error("Ошибка при запросе к API:", error);
        });
    },
    getAuthors() {
      console.log(this.products);
    },
  },
  mounted() {
    this.$watch("$route.query.page", () => {
      this.update = false;
      this.products = "";
      this.getProducts();
      setTimeout(() => {
        this.update = true;
      }, 300);
    });

    this.getProducts();
  },
};
</script>