<template>
  <div class="my_card">
    <div class="content">
      <i class="fa-duotone fa-pot-food"></i>
      <h3>{{ title }}</h3>
      <p class="percentage">
      <i class="fa-duotone fa-pot-food"></i>   {{ description }}
      </p>
      <p><i class="fa fa-users"> </i>   Serve até {{ 2 }} pessoas</p>
      <p><i class="fa fa-users"> </i> {{ price }}</p>
      <p><i class="fa-solid fa-kitchen-set"> </i> {{ category }}</p>
      <img :src=image  style="width: 100%; height: 100%;"/>
    </div>
  </div>
</template>

<script>

export default {
  name: "CardsMenuInitComponent",
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
