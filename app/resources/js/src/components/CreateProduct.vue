<template>
  <div class="CreateForm">
    <form action="" @submit.prevent="this.postData()" ref="ProductForm">
      <input
        type="text"
        placeholder="Название продукта"
        v-model="formData.name"
      />
      <input type="text" placeholder="Исполнитель" v-model="formData.artist" />
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
import { useToast } from "vue-toastification";
const toast = useToast();
export default {
  data() {
    return {
      SAP_state: false,
      formData: {
        name: "",
        artist: "",
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
          "/api/products",
          this.formData
        );
        if (response.status == 200){
          toast.success(response.status + ' Объект добавлен', {timeout: 2000})
        }
      } catch (error) {
        toast.error(error.status + ' Объект не может быть добавлен', {timeout: 2000})
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
  padding-left: 24px;
  display: flex;
  gap: 24px;
  width: 700px;
  flex-wrap: wrap;
  align-items: center;
}
textarea {
  width: 625px;
  padding: 6px;
  height: 80px;
  border-radius: 4px;
  border: 1px solid green;
  resize: none;
}
textarea:focus {
  outline: none;
}
input {
  width: 300px;
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