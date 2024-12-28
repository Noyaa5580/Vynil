<template>
  <div class="page_content">
    <div class="btn btn-success" @click="showAddProduct()">
      Добавить продукт
    </div>
    <transition
      name="fade-move"
      @before-enter="beforeEnter"
      @enter="enter"
      @before-leave="beforeLeave"
      @leave="leave"
      ><CreateProduct
        v-if="SAP"
        @update:adding="chSAP"
        @update:products="getUpdates"
      ></CreateProduct
    ></transition>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Название</th>
          <th scope="col">Изображение</th>
          <th scope="col">Цена</th>
          <th scope="col">Описание</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="product in this.products" :key="product">
          <th scope="row">{{ product.id }}</th>
          <td>{{ product.name }}</td>
          <td><img :src="product.img" :alt="product.img" /></td>
          <td>{{ product.price }}</td>
          <td>{{ product.description }}</td>
          <td><button @click="gotoEditor(product.id)" class="btn btn-warning">Изменить</button></td>
          <td>
            <button @click="deleteProduct(product.id)" class="btn btn-danger">
              Удалить
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";
import CreateProduct from "../components/CreateProduct.vue";
export default {
  components: {
    CreateProduct,
  },
  data() {
    return {
      SAP: false, //bool for show component "Show add product"
      products: [],
      products_state: 0,
    };
  },
  methods: {
    showAddProduct() {
      this.SAP = true;
    },
    chSAP(data) {
      this.SAP = data;
    },
    getUpdates(data) {
      this.products_state = data;
      console.log(this.products_state);
    },
    async getData() {
      try {
        await axios.get("http://0.0.0.0/api/products").then((response) => {
          this.products = response.data;
          console.log(this.products);
        });
      } catch (error) {
        console.log(error);
      }
    },

    //aнимация появления формы добавления
    beforeEnter(el) {
      // Устанавливаем начальное состояние для анимации появления
      el.style.opacity = 0;
      el.style.transform = "translateX(100px)";
      el.style.height = 0 + "px";
    },
    enter(el, done) {
      // Запуск анимации появления
      el.offsetHeight; // trigger reflow to restart the animation
      el.style.transition =
        "opacity 0.5s ease, transform 0.5s ease, height 0.5s ease";
      el.style.opacity = 1;
      el.style.height = 132 + "px";
      el.style.transform = "translateX(0)";
      done(); // Завершаем анимацию
    },
    beforeLeave(el) {
      // Подготовка элемента к исчезновению
      el.style.transition =
        "opacity 0.5s ease, transform 0.5s ease, height 0.5s ease ";
    },
    leave(el, done) {
      // Анимация исчезновения
      el.style.margin = 0;
      el.style.opacity = 0;
      el.style.height = 0 + "px";
      el.style.transform = "translateX(100px)";
      // Задерживаем удаление элемента до завершения анимации
      setTimeout(done, 600); // Время задержки должно совпасть с длительностью анимации
    },

    gotoEditor(id) {
      this.$router.push("/admin/edit?id="+id);
    },

    async deleteProduct(id) {
      await axios.delete("http://0.0.0.0/api/products/" + id);
      this.products_state = 1;
    },
  },
  mounted() {
    this.getData();
    this.$watch("products_state", () => {
      if (this.products_state == 1) {
        this.products = null;
        setTimeout(() => {
          this.getData();
        }, 150);
        this.products_state = 0;
      } else {
        console.log("reloaded");
      }
    });
  },
};
</script>

<style scoped>
.page_content{
  min-width: 100%;
  height: 100%;
}
</style>