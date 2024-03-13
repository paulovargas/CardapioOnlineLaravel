<template>
  <DashboardComponent>
    
    <div class="content-pages">
      <h1 class="p-2">Cadastrar Categoria</h1>
      <slot>
        <div >        
        <div class="d-flex p-3">
          <form class="d-flex form" @submit.stop.prevent="submit">            
            <div class="form-group">
              <label for="exampleInputEmail1">Descrição</label>
              <input
                v-model="description"
                type="text"
                class="form-control"
                id="description"
                aria-describedby="description"
                aria-label="description"
                placeholder="Categoria"
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
      <th scope="col">Descrição</th>
      <th scope="col">Acões</th>
    </tr>
  </thead>
  <tbody>    
    <tr v-for="category in categorys" :key="category.id">
      <th scope="row">{{ category.id }}</th>
      <td>{{ category.description }}</td>
      <td><button
              className="btn btn-alert ml-2"
              v-on:click="editCategory(category.id, category.description)"
            >
              <i class="fa fa-edit"></i>
            </button> <button
              className="btn btn-danger ml-2"
              v-on:click="destroyCategory(category.id)"
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
    this.btnText = 'Salvar';    
    this.getCategory();
  },
  methods: {     
    async submit() {
      const payload = {
        description: this.description,
      };
      if(this.btnText == 'Salvar'){
        await fetch(`http://localhost:8000/api/category`, {
        method: 'POST',
        headers: {
          'Content-Type':'application/json',
          'Access':'application/json',
        },
        body: JSON.stringify(payload)
      }).then(response => response.json())
      .then(res => { res })
      this.getCategory();
      }
      if(this.btnText == 'Salvar alteração'){
     await fetch(`http://localhost:8000/api/category/${this.id}`, {
        method: 'PUT',
        headers: {
          'Content-Type':'application/json',
          'Access':'application/json',
        },
        body: JSON.stringify(payload)
      }).then(response => response.json())
      .then(res => { res })
      this.getCategory();
      }
        
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
      this.description = '';
    },
    editCategory(id, category){
      this.btnText = 'Salvar alteração';
      this.description = category;

      
    }, 
    destroyCategory(id){
       api
      .delete(`/category/${id}`)
      .then((res) => {
         res ,
         alert(res.data.message),
      this.getCategory() })
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
