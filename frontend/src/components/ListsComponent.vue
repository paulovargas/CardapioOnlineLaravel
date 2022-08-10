<template>
  <div class="lists">
    <div class="top">
      <p>Cliente</p>
    </div>
    <div class="content">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id">
            <th scope="row">{{ user.id }}</th>
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.phone }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  name: "ListsComponent",
  props: {
    users: Array,
  },
};
</script>
<style lang="scss" scoped>
.lists {
  width: 100%;
  padding: 15px;
  border: 1px solid #ccc;
  border-radius: 3px;
  background-color: #fff;
}
</style>
