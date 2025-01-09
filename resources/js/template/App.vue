<template>
   <v-app id="inspire">
      <v-navigation-drawer
         v-model="drawer"
         app
         v-if="!this.$router.history.current.path.includes('/error')"
      >
         <v-list dense>
            <v-subheader>LIST COMPONENTS:</v-subheader>
               <v-list-item
                  v-for="(item, i) in items"
                  :key="i"
                  :to="item.to"
               >
                  <v-list-item-icon :color="item.color">
                     <v-icon >{{ item.icon }}</v-icon>
                  </v-list-item-icon>
                  
                  <v-list-item-content>
                     <v-list-item-title v-text="item.text"></v-list-item-title>
                  </v-list-item-content>
               </v-list-item>
         </v-list>
      </v-navigation-drawer>

      <v-app-bar app v-if="!this.$router.history.current.path.includes('/error')">
         <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
         <v-toolbar-title>SPA Demo App</v-toolbar-title>
      </v-app-bar>

      <v-main class="ma-2">
         <router-view></router-view>
      </v-main>
   </v-app>
</template>

<script  lang="js">
   export default {
      data: () => ({
         drawer: null,
         items:[
            {text:'Company', icon:'mdi-factory', to:'home', color:'black'},
            {text:'Hello', icon:'mdi-hand-wave', to:'hello', color:'green'},
            {text:'OPEN APP', icon:'', to:'openApp', color:'red'}
         ]
      }),
   }
</script>