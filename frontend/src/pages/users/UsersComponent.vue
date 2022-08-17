<template>
  <DashboardComponent>
    
    <div class="content-pages">
      <h1 class="p-2">Cadastrar Usuário</h1>
      <slot>
        <div >        
        <div class="d-flex p-3">
          <form class="d-flex form" @submit.stop.prevent="submit">            
            <div class="form-group m-3">
              <label for="exampleInputEmail1">Nome</label>
              <input
                v-model="user.name"
                type="text"
                class="form-control"
                id="name"
                aria-describedby="name"
                placeholder="Nome do usuário"
              />
            </div>
            <div class="form-group m-3">
              <label for="exampleInputEmail1">Email</label>
              <input
                v-model="user.email"
                type="email"
                class="form-control"
                id="email"
                aria-describedby="email"
                placeholder="Email do usuário"
              />
            </div>
            <div class="form-group m-3">
              <label for="exampleInputEmail1">Senha</label>
              <input
                v-model="user.password"
                type="password"
                class="form-control"
                id="password"
                aria-describedby="password"
                placeholder="Senha"
              />
            </div>            
            <div class="form-check"></div>
            <div class="form-group mt-4">
             <button
              type="submit"
              class="btn"
            > {{ btnText }}
              
            </button>
            </div>
            
          </form>
        </div>
      </div>
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
      <td><button
              className="btn btn-alert ml-2"
              v-on:click="editUsers(user.id, user)"
            >
              <i class="fa fa-edit"></i>
            </button> <button
              className="btn btn-danger ml-2"
              v-on:click="destroyUsers(user.id)"
            >
              <i class="fa fa-trash" ></i>
            </button>
      </td>
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
  name: "RegisterusersComponent",
  data() {
    return {
      user: {
        name: '',
        email: '',
        password: '',
      } ,
      users: {},
    };
  },
   created() {
     this.getUsers();
   },
  mounted() {
    this.btnText = 'Salvar';    
    this.getUsers();
  },
  methods: {     
    async submit() {
      const payload = {
        name: this.user.name,
        email: this.user.email,
        password: this.user.password,
      };      
      if(this.btnText == 'Salvar'){
        await fetch(`http://localhost:8000/api/users`, {
        method: 'POST',
        headers: {
          'Content-Type':'application/json',
          'Access':'application/json',
        },
        body: JSON.stringify(payload)
      }).then(response => response.json())
      .then(res => { res })
      this.getUsers();
      }
      if(this.btnText == 'Salvar alteração'){
          await fetch(`http://localhost:8000/api/users/${this.id}`, {
        method: 'PUT',
        headers: {
          'Content-Type':'application/json',
          'Access':'application/json',
        },
        body: JSON.stringify(payload)
      }).then(response => response.json())
      .then(res => { res })
      this.getUsers();    
      }
      this.getUsers();        
    },
    getUsers() {
      api
      .get("/users")
      .then((res) => {
        this.users = res.data;
      })
      .catch((error) => {
        console.log(error)
      });
      this.user = {};
    },
    editUsers(id, user){
      this.btnText = 'Salvar alteração';
      this.user = user;

      
    }, 
    destroyUsers(id){
       api
      .delete(`/users/${id}`)
      .then((res) => {
         res ,
         alert(res.data.message),
      this.getUsers() })
      .catch((error) => {
        console.log(error)
      });
    }  
  },
  components: {
    DashboardComponent,
  },
};
</script>
<style scoped>
.form{
  align-items: center;
}
.btn{
  color: #fff;
  background-color: red;
}
</style>
