<template>
  <DashboardComponent>
    <h1 class="p-2">Reservas</h1>
    <div class="row p-3">
      <slot
        >
        <div class="col m-0 mt-3" v-for="reservation in reservations" :key="reservation.id">
         <CardsComponent
          :name="`${reservation.name}`"
          :reservation="`${reservation.dta_reservation} - ${reservation.hr_reservation}`"
          :qtdPeople="`${reservation.qtd}`"
          :tele="`${reservation.phone}`"
      /></div>
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
        console.log('reser :', res.data)
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
.Cards {
  display: flex;
  justify-content: center;
}
</style>
