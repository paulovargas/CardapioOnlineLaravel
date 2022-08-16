<template>
  <DashboardComponent> 
    <h1 class="p-2">Reservas</h1>
    <div class="row m-3 mr-0">
      <slot>
        <div class="row col page">
          <div class="col mt-3" v-for="reservation in reservations" :key="reservation.id">
            <CardsComponent
              :name="`${reservation.name}`"
              :reservation="`${reservation.dta_reservation} - ${reservation.hr_reservation}`"
              :qtdPeople="`${reservation.qtd}`"
              :tele="`${reservation.phone}`"
              />
            </div>
          </div>       
       </slot>      
    </div>
  </DashboardComponent>
</template>

<script>
import api from "../../api";
import DashboardComponent from "../Dashboard/DashboardComponent.vue";
import CardsComponent from "../../components/CardsComponent.vue";
//import ListsComponent from "../../components/ListsComponent.vue";
//const axios = require("axios");

export default {
  name: "HomeComponent",
  data() {
    return {
      reservations: [],
    };
  },
  created() {
     this.getReservations();
   },
  mounted() {    
    this.getReservations();
  },
  methods: {
    getReservations() {
      api
      .get("/reservations")
      .then((res) => {
        this.reservations = res.data;
      })
      .catch((error) => {
        console.log(error)
      });
    },
  },
  components: {
    DashboardComponent,
    CardsComponent,
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
