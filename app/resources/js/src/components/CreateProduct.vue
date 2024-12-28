<template>
  <div class="CreateForm">
    <form action="" @submit.prevent="this.postData()" ref="ProductForm">
      <input type="text" placeholder="Название продукта" v-model="formData.name" />
      <input type="text" placeholder="Цена продукта" v-model="formData.price" />
      <input type="text" placeholder="Путь к изображению продукта" v-model="formData.img" />
      <textarea placeholder="Oписание продукта" v-model="formData.description" />
      <input type="submit" class="btn btn-success" value="Отправить" />
    </form>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      formData: {
        name: "",
        price: "",
        img: "",
        description: "",
      },
    };
  },
  methods: {
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

<style>
form {
  display: flex;
  gap: 24px;
  width: 800px;
  flex-wrap: wrap;
  align-items: center;
  justify-content: center;
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