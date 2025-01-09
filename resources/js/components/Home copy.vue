<template>
    <v-card>
        <v-card-title style="background-color:#B2DFDB">Companies</v-card-title>
        <v-card-text>
            <v-simple-table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Company Name</th>
                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, i) in company_list" :key="i">
                        <td>{{i + 1}}</td>
                        <td>{{item.company_name}}</td>
                        <td>
                            <v-btn color="blue" @click="editFunc(item)"> Edit </v-btn>
                            <v-btn :color="item.deleted_at == null ? '#F44336' : '#FFC107'"  @click="resdelFunc(item.deleted_at)">
                                {{item.deleted_at == null ? 'Delete' : 'Restore'}}
                            </v-btn>
                        </td>
                        <td :style="item.deleted_at == null ? 'color:green' : 'color:red'">{{item.deleted_at == null ? 'Active' : 'Inactive'}}</td>
                    </tr>
                </tbody>
            </v-simple-table>
            <v-dialog v-model="company_dialog" max-width="600px" persistent>
                <v-card>
                    <v-card-title style="background-color:teal;">
                        <v-spacer/>
                        <v-icon right @click="closeEdit()">mdi-close</v-icon>
                    </v-card-title>
                    <br>
                    <v-card-text>
                       <v-row dense>
                 
                            <v-col cols="10">
                        
                            <v-text-field v-model="editobj.company_name" dense outlined/>
                    
                            </v-col>
                        
                            <v-col cols="2">
                        
                            <v-btn color="green" @click="save()">Save</v-btn>
                    
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>    
            </v-dialog>
        </v-card-text>
    </v-card>
</template>

<script>
import axios from 'axios';

    export default {
        data:()=>({
            company_list : [],
            company_dialog: false,
            editobj : {},
        }),
        created(){
            axios.get(`${this.$url}/api/companies/`)
            .then(res=>{
                this.company_list = res.data
            })
        },
        methods:{
            editFunc(item){
                // alert('Edit')
                this.editobj ={...item}
                this.company_dialog = true
            },
            closeEdit(){
                this.company_dialog = false
            },
            resdelFunc(deleted_at){
                alert(deleted_at != null ? 'Restore' : 'Delete')
                    
            },
            save(){
                axios.put(`${this.$url}/api/companies/editobj`)
                .then(res=>{
                    this.editobj = res.data
                })
            }
        }
    }
</script>
<style scoped>
    table,th,td{
        border: 1px solid black;
        border-collapse: collapse;;
    }
</style>