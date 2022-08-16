<template>
  <DashboardComponent>
    <div class="content-pages">
      <h1 class="p-2">Usuários</h1>
      <slot>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Acões</th>
    </tr>
  </thead>
  <tbody>    
    <tr v-for="user in users" :key="user.id">
      <th scope="row">{{ user.id }}</th>
      <td>{{ user.name }}</td>
      <td>{{ user.email }}</td>
      <td><i class="fa fa-edit"></i> <i class="fa fa-trash"></i></td>
    </tr>    
  </tbody>
</table>
</slot>
    </div>
  </DashboardComponent>
</template>

<script>
import api from "@/api";
import DashboardComponent from "../Dashboard/DashboardComponent.vue";

export default {
  name: "UsersComponent",
  data() {
    return {
      users: {},
    };
  },
  created() {
     this.getUsers();
   },
  mounted() {    
    this.getUsers();
  },
  methods: {
    getUsers() {
      api
      .get("/users")
      .then((res) => {
        this.users = res.data;
      })
      .catch((error) => {
        console.log(error)
      });
    },
  },
  components: {
    DashboardComponent,
  },
};
</script>
<style scoped></style>
