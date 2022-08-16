<template>
  <div class="my_card">
    <div class="content">
      <h3>{{ title }}</h3>
      <p class="percentage">
      <i class="fa-solid fa-bowl-food"></i>
          {{ description }}
      </p>
      <p><i class="fa fa-users"> </i>   Serve até {{ 2 }} pessoas</p>
      <p><i class="fa-solid fa-brazilian-real-sign"></i> {{ price }}</p>
      <p><i class="fa-solid fa-kitchen-set"></i> {{ category }}</p>
      <img :src=image  style="width: 100%; height: 100%;"/>
     
      
    </div>
  </div>
</template>

<script>
//import api from '@/api';

export default {
  name: "CardsMenuComponent",
  data(){
    return {
      imageSrc: null,
    }
  },
  mounted() {
    this.getImage();
  },
  methods: {
    getImage(){
      this.imageSrc = this.image.headers;
    }
  },
  props: {
    title: String,
    description: String,
    image: String,
    price: String,
    category: String
  },
};
</script>

<style lang="scss" scoped>
@import "@/assets/scss/main";
.my_card {
  display: flex;
  flex-direction: column;
  width: 300px;
  background-color: $red;
  padding: 15px;
  border-radius: 7px;
  color: #fff;

  .top {
    display: flex;
    justify-content: space-between;
  }
  .footer {
    display: flex;
    justify-content: space-between;
  }
  .img {
    max-width: 100%;
  }
}
</style>
