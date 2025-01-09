<template>
    <v-card>
        <v-card-title style="background-color:#B2DFDB">Compassssny</v-card-title>
        <v-card-text>
            <v-simple-table>
                <thead>
                    <tr>
                        <th>Seq</th>
                        <th>Company Name</th>
                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, i) in company_list" :key="i">
                        <td>{{i+1}}</td>
                        <td>{{item.company_name}}</td>
                        <td>
                            <v-btn 
                                color="blue"
                                :disabled="item.deleted_at != null"
                                @click="edit(item)"
                            >
                                Edit
                            </v-btn>
                            <v-btn 
                                :color="item.deleted_at == null ? '#F44336' : '#FFC107'"
                                @click="delete_restore(item)"
                            >
                                {{item.deleted_at == null ? 'Delete' : 'Restore'}}
                            </v-btn>
                        </td>   
                        <td :style="item.deleted_at == null ? 'color:Green' : 'color:Red'">
                            {{item.deleted_at == null ? "Active" : "Inactive"}}
                        </td>
                    </tr>
                </tbody>
            </v-simple-table>
            <v-btn
              fab
              dark
              right
              bottom
              absolute
              color="green"
              @click="dialog_title = 'Add', company_dialog = true"
            >
              <v-icon>+</v-icon>
            </v-btn>
        </v-card-text>

        <v-dialog persistent v-model="company_dialog" max-width="600px" >
            <v-card>
                <v-card-title style="background-color:teal;">
                    <h2 style="color:white;">{{dialog_title}} Company</h2>
                    <v-spacer/>
                    <v-icon right @click="company_dialog = false, clear_obj()">mdi-close</v-icon>
                </v-card-title>
                <br>
                <v-card-text>
                    <v-row dense>
                        <v-col cols="10">
                            <v-text-field dense outlined v-model="company_obj.company_name"/>
                        </v-col>
                        <v-col cols="2">
         
                            <v-btn dark color="green" @click="dialog_title == 'Add' ? insert() : save()">{{dialog_title == 'Add' ? 'Add' : 'Save'}}</v-btn>
                        </v-col>
                    </v-row>
             
                </v-card-text>
            </v-card>
        </v-dialog>
    </v-card>
</template>

<script>
    export default {
        data:()=>({
            dialog_title:'',
            company_dialog: false,
            company_obj:{
                company_code:'',
                company_name:'',
                deleted_at:''
            },
            company_list:[]
        }),
        created(){
            axios.get(`${this.$url}/api/companies`)
            .then(res => {
                this.company_list = res.data
            }).catch(({response})=>{
                this.$router.push(`/error/${response.status}`);

            })
        },
        methods:{
            edit(item){
                this.dialog_title = 'Edit'
                this.company_obj.company_code = item.company_code
                this.company_obj.company_name = item.company_name
                this.company_obj.deleted_at = item.deleted_at
                this.company_dialog = true
            },

            insert(){
                axios.post(`${this.$url}/api/companies`,this.company_obj)
                .then(res =>{
                    this.company_list = res.data
                    this.company_dialog = false
                    this.clear_obj()
                })
            },

            save(){
                axios.put(`${this.$url}/api/companies/update`,this.company_obj)
                .then(res =>{
                    this.company_list = res.data
                    this.company_dialog = false
                    this.clear_obj()
                })
            },

            delete_restore(item){
                axios.put(`${this.$url}/api/companies/delete_restore`,item)
                .then(res =>{
                    this.company_list = res.data
                    this.company_dialog = false
                })
            },

            clear_obj(){
                this.company_obj.company_code = ''
                this.company_obj.company_name = ''
                this.company_obj.deleted_at = ''
            },
            loginAccountDialogClose(){
      this.$emit("loginAccountClose", false);

            }
        }
    }
</script>
<style scoped>
    table, tr, th, td{
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>