<template>
  <DashboardComponent>
    <div class="content-pages">
      <h1 class="p-2">Cardápio</h1>
      <div class="p-3">
        <slot>         
        <div v-for="menu in menus" :key="menu.id">
         <CardsMenuComponent
          :title="`${menu.title}`"
          :description="`${menu.description}`"
          :price="`${menu.price}`"
          :category="`${menu.category}`"
          :image="`${menu.image}`"
      />
      </div>          
        </slot>
      </div>
    </div>
  </DashboardComponent>
</template>

<script>

import api from "../../api";
import DashboardComponent from "../Dashboard/DashboardComponent.vue";
import CardsMenuComponent from "../../components/CardsMenuComponent.vue";

export default {
  name: "MenuComponent",
  data() {
    return {
      menus: {},
    };
  },
   created() {
     this.getMenus();
   },
  mounted() {
    this.getMenus();
  },
  methods: {
     getMenus() {
      api
      .get("/menus")
      .then((res) => {
        this.menus = res.data;
        console.log('Menus :', this.menus)
      })
      .catch((error) => {
        console.log(error)
      });
    },
  },
  components: {
    DashboardComponent,
    CardsMenuComponent,
  },
};
</script>
<style scoped></style>
