<template>
  <DashboardComponent>
    
    <div class="content-pages">
      <h1 class="p-2">Cadastrar Categoria</h1>
      <slot>
        <div >        
        <div class="d-flex p-3">
          <form @submit.stop.prevent="submit">            
            <div class="form-group">
              <label for="exampleInputEmail1">Descrição</label>
              <input
                v-model="description"
                type="text"
                class="form-control"
                id="description"
                aria-describedby="description"
                placeholder="Categoria"
              />
            </div>           
            <div class="form-check"></div>
            <div class="">
              <button
              type="submit"
              class="btn"
            >
              Salvar
            </button>
            </div>
            
          </form>
        </div>
      </div>
              <table class="table">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Descrição</th>
      <th scope="col">Acões</th>
    </tr>
  </thead>
  <tbody>    
    <tr v-for="category in categorys" :key="category.id">
      <th scope="row">{{ category.id }}</th>
      <td>{{ category.description }}</td>
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
  name: "RegisterCategoryComponent",
  data() {
    return {
      description: '',
      categorys: {},
    };
  },
   created() {
     this.getCategory();
   },
  mounted() {    
    this.getCategory();
  },
  methods: {     
    submit() {
      const payload = {
        description: this.description,
      };

      fetch(`http://localhost:8000/api/category`, {
        method: 'POST',
        headers: {
          'Content-Type':'application/json',
          'Access':'application/json',
        },
        body: JSON.stringify(payload)
      }).then(response => response.json())
      .then(res => {
        console.log(res)
        console.log(payload)
      })
    },
    getCategory() {
      api
      .get("/category")
      .then((res) => {
        this.categorys = res.data;
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
<style scoped>
.btn{
  color: #fff;
  background-color: red;
}
</style>
