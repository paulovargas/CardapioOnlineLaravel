<template>
  <DashboardComponent>
    <div class="content-pages">
      <h1 class="p-2">Cardápio</h1>
        <div class="row m-3 mr-0"> 
          <slot>         
            <div class="row col page">
              <div class="col mt-3" v-for="menu in menus" :key="menu.id">
                <CardsMenuComponent
                  :title="`${menu.title}`"
                  :description="`${menu.description}`"
                  :price="`${menu.price}`"
                  :category="`${menu.category}`"
                  :image="'http://localhost:8000' + `${menu.image}`"
                  />
            </div>
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
<style scoped>
.page {
  width: 90%;
  position: absolute;
  bottom: 0;
  top: 130px;
  overflow: auto;
  margin-top: 85px;
  flex-wrap: wrap;
}
.card{
  justify-content: center;
}
</style>
