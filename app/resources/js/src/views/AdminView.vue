<template>
  <div>
    <div class="btn btn-success" @click="showAddProduct()">Добавить продукт</div>
   <CreateProduct v-if="SAP"></CreateProduct>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td colspan="2">Larry the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import CreateProduct from "../components/CreateProduct.vue";
export default {
  components:{
    CreateProduct
  },
  data(){
    return{
      SAP:false //bool for show component "Show add product"
    }
  },
  methods:{
    showAddProduct(){
     this.SAP = true
    }
  }
};
</script>

<style>
</style>