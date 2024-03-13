<template>
  <div class="main">
    <div class="sidebar"><SideBarComponent /></div>
    <div class="content-right">
      <div class="navbar"><NavBarCmponent /></div>
      <div class="pages">
        <slot></slot>
      </div>
    </div>
  </div>
</template>

<script>
import SideBarComponent from "./components/SideBarComponent.vue";
import NavBarCmponent from "./components/NavBarComponent.vue";

export default {
  name: "DashBoardComponent",
  components: {
    SideBarComponent,
    NavBarCmponent,
  },
};
</script>

<style lang="scss" src="./style.scss" scoped></style>
