<template>
  <div class="CreateForm">
    <form action="" @submit.prevent="this.postData()" ref="ProductForm">
      <input
        type="text"
        placeholder="Название продукта"
        v-model="formData.name"
      />
      <input type="text" placeholder="Цена продукта" v-model="formData.price" />
      <input 
        type="text"
        placeholder="Путь к изображению продукта"
        v-model="formData.img"
      />
      <textarea
        placeholder="Oписание продукта"
        v-model="formData.description"
      />
      <input
        type="submit"
        class="btn btn-success"
        value="Отправить"
        @click.once="this.reload_page()"
        v-on:click="this.CloseAddForm()"
      />
      <div class="btn btn-danger" @click="this.CloseAddForm()">Закрыть</div>
    </form>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      SAP_state: false,
      formData: {
        name: "",
        price: "",
        img: "",
        description: "",
      },
      reloadState: 1,
    };
  },
  methods: {
    reload_page() {
      this.$emit("update:products", this.reloadState);
    },
    CloseAddForm() {
      this.$emit("update:adding", this.SAP_state);
    },
    async postData() {
      try {
        const response = await axios.post(
          "http://0.0.0.0/api/products",
          this.formData
        );
        console.log(response);
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>

<style scoped>
.btn {
  max-height: 40px;
}
.CreateForm {
  display: flex;
  margin: 12px 0px;
}
form {
  display: flex;
  gap: 24px;
  width: 1000px;
  flex-wrap: wrap;
  align-items: center;
}
textarea {
  width: 300px;
  width: 520px;
  padding: 6px;
  border-radius: 4px;
  border: 1px solid green;
}
textarea:focus {
  outline: none;
}
input {
  width: 250px;
  height: 40px;
  border-radius: 4px;
  border: 1px solid green;
  padding-left: 12px;
  font-size: 16px;
}
input::placeholder {
  font-size: 14px;
}
input:focus {
  outline: none;
}
</style>