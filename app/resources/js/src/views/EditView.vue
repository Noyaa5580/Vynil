<template>
  <div class="content">
    <h1>Редактирование продукта №{{ this.$route.query.id }}</h1>
    <form action="" @submit.prevent="this.updateData()" ref="ProductForm">
      <input
        type="text"
        placeholder="Название продукта"
        v-model="formData.name"
        value=""
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
      <input type="submit" class="btn btn-primary" value="Сохранить"/>
    </form>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      formData: {

      },
    };
  },
  methods: {
    async getProduct() {
      try {
        await axios
          .get("http://0.0.0.0/api/products/" + this.$route.query.id)
          .then((response) => {
            this.formData = response.data;
          });
      } catch (error) {
        console.log(error);
      }
    },
   async updateData() {
      try {
        const response = await axios.put(
          "http://0.0.0.0/api/products/" + this.$route.query.id,
          this.formData
        );
        console.log(response);
        this.$router.push('/admin');
      } catch (error) {
        console.log(error);
      }
    }
  },
  mounted(){
    this.getProduct();
  }
};
</script>

<style scoped>
.content {
  width: 100%;
}
form {
  width: 500px;
}
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