<template>
    <div class="row">
        <div class="col-md-6">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <div style="float: left" v-if="has_Admin_rights == true">
                            <a href="#" type="submit" class="btn btn-success"  data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Task</a>
                        </div>

                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <table class="table">
                            <thead>
                            <tr >
                                <th scope="col">Name</th>
                                <th scope="col">Task</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="tas in incomplete">
                                <th scope="row">{{tas.name}}</th>
                                <td>{{tas.task_name}}</td>
                                <td>{{tas.start_date}}</td>
                                <td>{{tas.due_date}}</td>
                                <td>
                                    <a href="#" class="btn btn-success a-btn-slide-text " @click="completed(tas.id)" style="float: right;">
                                        <span class="fa fa-check" aria-hidden="true"></span>
                                        <span><strong>Complete</strong></span>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal -->
                    <div id="myModal" class="modal fade modal-lg" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Task</h4>
                                </div>
                                <div class="modal-body">
                                    <div >
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Task Name *</label>
                                            <input type="text" v-model="task_name" class="form-control col-md-12">
                                            <!--<small class="form-text text-muted text-danger" v-if="(errors['personaldetails.person_addresses.'+index+'.geography.province_id'])">-->
                                            <!--<strong >{{ errors['personaldetails.person_addresses.'+index+'.geography.province_id'][0]}}</strong>-->
                                            <!--</small>-->
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Pick User to assign *</label>
                                            <select   class="form-control col-md-12" id="exampleFormControlSelect1" v-model="user">
                                                <option v-for="inv in invites" :value="inv.id">{{inv.name}}</option>
                                            </select>
                                            <!--<small class="form-text text-muted text-danger" v-if="(errors['personaldetails.person_addresses.'+index+'.geography.province_id'])">-->
                                            <!--<strong >{{ errors['personaldetails.person_addresses.'+index+'.geography.province_id'][0]}}</strong>-->
                                            <!--</small>-->
                                        </div>
                                    </div>
                                    <div >
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Start Date *</label>
                                            <datepicker v-model="start_date" class="col-md-12"></datepicker>
                                            <!--<small class="form-text text-muted text-danger" v-if="(errors['personaldetails.person_addresses.'+index+'.geography.province_id'])">-->
                                            <!--<strong >{{ errors['personaldetails.person_addresses.'+index+'.geography.province_id'][0]}}</strong>-->
                                            <!--</small>-->
                                        </div>
                                    </div>
                                    <div >
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Due Date *</label>
                                            <datepicker v-model="end_date" class="col-md-12"></datepicker>
                                            <!--<small class="form-text text-muted text-danger" v-if="(errors['personaldetails.person_addresses.'+index+'.geography.province_id'])">-->
                                            <!--<strong >{{ errors['personaldetails.person_addresses.'+index+'.geography.province_id'][0]}}</strong>-->
                                            <!--</small>-->
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" @click="save()"><i class="fa fa-save"></i> Save</button>                            </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                     Completed Tasks

                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <table class="table">
                            <thead>
                            <tr >
                                <th scope="col">Name</th>
                                <th scope="col">Task</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="tas in complete">
                                <th scope="row">{{tas.name}}</th>
                                <td>{{tas.task_name}}</td>
                                <td>{{tas.start_date}}</td>
                                <td>{{tas.due_date}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal -->
                    <div id="myModal" class="modal fade modal-lg" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Task</h4>
                                </div>
                                <div class="modal-body">
                                    <div >
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Task Name *</label>
                                            <input type="text" v-model="task_name" class="form-control col-md-12">

                                            <small class="form-text text-danger" v-if="(errors['start_date'])">
                                                <!--<strong >{{ errors.task_name[0]}}</strong>-->
                                                here
                                            </small>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Pick User to assign *</label>
                                            <select   class="form-control col-md-12" id="exampleFormControlSelect1" v-model="user">
                                                <option v-for="inv in invites" :value="inv.id">{{inv.name}}</option>
                                            </select>
                                            <small class="form-text text-danger" v-if="(errors['task_name'])">
                                                <strong >{{ errors['task_name'][0]}}</strong>
                                            </small>
                                        </div>
                                    </div>
                                    <div >
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Start Date *</label>
                                            <datepicker v-model="start_date" class="col-md-12"></datepicker>
                                            <!--<small class="form-text text-muted text-danger" v-if="(errors['personaldetails.person_addresses.'+index+'.geography.province_id'])">-->
                                            <!--<strong >{{ errors['personaldetails.person_addresses.'+index+'.geography.province_id'][0]}}</strong>-->
                                            <!--</small>-->
                                        </div>
                                    </div>
                                    <div >
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Due Date *</label>
                                            <datepicker v-model="end_date" class="col-md-12"></datepicker>
                                            <!--<small class="form-text text-muted text-danger" v-if="(errors['personaldetails.person_addresses.'+index+'.geography.province_id'])">-->
                                            <!--<strong >{{ errors['personaldetails.person_addresses.'+index+'.geography.province_id'][0]}}</strong>-->
                                            <!--</small>-->
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="close" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" @click="save()"><i class="fa fa-save"></i> Save</button>                            </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import datepicker from 'vue-flatpickr-component';
    import 'flatpickr/dist/flatpickr.css';
    export default {
        components: { datepicker},
        props:['invites','tasks','completedtasks'],
        name: "assign-task",
        data(){
            return{
                start_date:'',
                task_name:'',
                end_date:'',
                user:null,
                project_id:null,

                complete:[],
                incomplete:[],
                has_Admin_rights: false,
                errors:[],

                config: {
                    wrap: true, // set wrap to true only when using 'input-group'
                    altFormat: 'M	j, Y',
                    dateFormat: 'Y-m-d',
                    defaultDate: null,
                    altInput: false,
                    enableTime: true
                },
            }
        },
        created(){
            if(this.invites.length > 0)
                this.project_id = this.invites[0].project_id
            if(this.tasks.length > 0)
                this.incomplete = this.tasks
            if(this.completedtasks.length > 0)
                this.complete = this.completedtasks
            this.getUserSatus()
        },
        methods:{
            getUserSatus(){
                axios.get('/has_admin_rights', {
                    }).then(response => {
                    this.has_Admin_rights = response.data
                }).catch(error => {
                })
            },

            getTasks(){
                axios.get('/get_all_tasks/'+this.project_id, {
                }).then(response => {
                    console.log( response.data[0][0])
                    this.incomplete = response.data[0][0]
                    this.complete = response.data[0][1]
                }).catch(error => {
                })
            },
            completed(id){
                axios.get('/change_task_status/'+id, {
                }).then(response => {
                    console.log(response.data)

                        this.getTasks()

                }).catch(error => {
                })
            },
            save(){
                axios.post('/store_task', {
                    start_date: this.start_date,
                    task_name: this.task_name,
                    end_date : this.end_date,
                    user_id : this.user,
                    project_id: this.project_id
                }).then(response => {
                    if(response.data === 'successfully inserted'){
                        this.getTasks()
                        this.start_date = ''
                        this.task_name =''
                        this.end_date= ''
                        this.user =''
                        this.$swal('Tasks Created !', response.data , 'success')
                            .then(function() {
                                document.getElementById("close").click();
                            })
                    }
                    else this.$swal('Oops!', 'Something went wrong, Please try again' , 'error')
                }).catch(error => {
                    this.errors = error.response.data.errors
                    //window.scrollTo(0, 10)
                })
            }
        }
    }
</script>

<style scoped>

</style>
