<template>
  <DashboardComponent>
    <h1 class="p-2">Reservas</h1>
    <div class="p-3">
      <slot
        ><CardsComponent
          :name="'Nome Cliente'"
          :reservation="'10/08/2022 20:30'"
          :qtdPeople="'3'"
          :tele="'51 9999 9999'"
      /></slot>
      <div class="row">
        <div class="col-12 col-md-6">
          <ListsComponent :users="users" />
        </div>
      </div>
    </div>
  </DashboardComponent>
</template>

<script>
import DashboardComponent from "../Dashboard/DashboardComponent.vue";
import CardsComponent from "../../components/CardsComponent.vue";
import ListsComponent from "../../components/ListsComponent.vue";
const axios = require("axios");

export default {
  name: "HomeComponent",
  data() {
    return {
      users: [],
    };
  },
  mounted() {
    this.getUsers();
  },
  methods: {
    async getUsers() {
      const response = await axios.get(
        "https://6282b7eb92a6a5e46218f315.mockapi.io/delivery"
      );
      if (response.status == 200) {
        this.users = response.data;
        console.log(response.data);
      } else {
        console.error("Ocorreu um erro na API !");
      }
    },
  },
  components: {
    DashboardComponent,
    CardsComponent,
    ListsComponent,
  },
};
</script>
<style scoped></style>
