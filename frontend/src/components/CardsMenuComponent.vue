<template>
  <div class="my_card">
    <div class="content">
      <h3>{{ dishName }}</h3>
      <p class="percentage">
        <i class="fa-regular fa-calendar-check"></i> {{ description }}
      </p>
      <p><i class="fa fa-users"> </i> - {{ qtdPeople }} pessoas</p>
      <p><i class="fa-solid fa-phone"> </i> - {{ tele }}</p>
      <p><img src="../assets/img-menu/batata.jpg" alt="" class="img" /></p>
    </div>
  </div>
</template>

<script>
export default {
  name: "CardsComponent",
  props: {
    dishName: String,
    description: String,
    photo: String,
    price: String,
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
