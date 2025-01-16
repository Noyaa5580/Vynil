<template>
  <div>
    <BannerSlider />
    <ProductsSlider />
    <RecomendationsBlock />
  </div>
</template>

<script>
import BannerSlider from "../components/BannerSlider.vue";
import ProductsSlider from "../components/ProductsSlider.vue";
import RecomendationsBlock from '../components/RecomendationsBlock.vue';


export default {
  components: { BannerSlider, ProductsSlider, RecomendationsBlock },
};
</script>

<style>
</style>