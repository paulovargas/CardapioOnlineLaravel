<template>
  <DeliveryComponent>
    <h1 class="p-2">Cardápio</h1>
    <div class="p-3">
      <slot>
      <div v-for="menu in menus" :key="menu.id">
         <CardsMenuInitComponent
          :title="`${menu.title}`"
          :description="`${menu.description}`"
          :price="`${menu.price}`"
          :category="`${menu.category}`"
          :image="`${menu.image}`"
      />
      </div>  
       </slot>      
    </div>
  </DeliveryComponent>
</template>

<script>
import api from "../../../api";
import DeliveryComponent from "../DeliveryComponent.vue";
import CardsMenuInitComponent from "../components/CardsMenuInitComponent.vue";

export default {
  name: "HomeComponent",
  data() {
    return {
      menus: {},
    };
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
        console.log('menus',this.menus)
      })
      .catch((error) => {
        console.log(error)
      });
    },
  },
  components: {
    DeliveryComponent,
    CardsMenuInitComponent,
  },
};
</script>
<style scoped></style>
