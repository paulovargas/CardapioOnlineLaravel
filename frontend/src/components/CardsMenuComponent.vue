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
      <img src="" alt="">
      
    </div>
  </div>
</template>

<script>

export default {
  name: "CardsMenuComponent",
  data(){
    return {
      imageSrc: null,
    }
  },
  mounted($evt) {
      console.log($evt);
    this.getImage();
  },
  methods: {
    getImage($evt){
      this.imageSrc = this.image.headers;
      console.log($evt);
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
