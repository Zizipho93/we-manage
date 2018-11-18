<template>
    <form >
        <div class="form-group">
            <label for="exampleInputEmail1">Project Name</label>
            <input type="text" class="form-control" v-model="project[0].name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter project name">
            <small class="form-text  text-danger" v-if="(errors['project.'+0+'.name'])"><strong>{{errors['project.'+0+'.name'][0]}}</strong></small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <input type="text"  v-model="project[0].description" class="form-control" id="exampleInputPassword1" placeholder="project description">
            <small class="form-text  text-danger" v-if="(errors['project.'+0+'.description'])"><strong>{{errors['project.'+0+'.description'][0]}}</strong></small>
        </div>

        <table class="table table-bordered" id="invites" >
            <template v-for="(input, index) in project">
                <tr style="background-color: #e6e6e6">
                    <th  colspan="2">
                        <i class="fa fa-angle-right fa fa-angle-right"></i> Participant {{index+1}}
                        <a v-if="index != 0" style="padding-left:30px" @click="addIdToDelete(index)"  href="javascript:void(0);"><i class="fa fa-trash" ></i> Remove Participant</a>
                    </th>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Name</label>
                            <input type="textarea" v-model="input.email_name" class="form-control" id="exampleInputPassword1" placeholder="name">
                            <small class="form-text  text-danger" v-if="(errors['project.'+index+'.email_name'])"><strong>{{errors['project.'+index+'.email_name'][0]}}</strong></small>
                        </div>
                    </td>
                </tr>
                <tr >
                    <td>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email Address </label>
                            <input type="textarea" v-model="input.email_invites" class="form-control" id="exampleInputPassword1" placeholder="email addresses">
                            <small class="form-text text-danger" v-if="(errors['project.'+index+'.email_invites'])"><strong>{{errors['project.'+index+'.email_invites'][0]}}</strong></small>
                        </div>
                    </td>
                </tr>
            </template>

            <tr>
                <th colspan="2"><a @click="addSibling()"  href="javascript:void(0);"><i class="fa fa-plus" ></i> Add Another Participant</a></th>
            </tr>
        </table>
        <button @click="save()" type="button" class="btn btn-primary ">Submit</button>
    </form>
</template>

<script>
    export default {
        name: "new-project",
        data(){
            return{
                project:[{
                    name:'',
                    description:'',
                    email_name:'',
                    email_invites:''
                }],
                errors:{}
            }
        },
        methods:{
            addIdToDelete(index){
                this.project.splice(index,1)
            },
            addSibling(){
                        var obj = {
                        email_name:'',
                        email_invites:''
                            };
                this.project.push(obj);
            },
            save(){
                axios.post('/newProjectStore', {
                    project: this.project
                })
                    .then(response => {
                        console.log(response);
                    })
                    .catch(error => {
                        console.log(error)
                        this.errors = error.response.data.errors
                    });
            }

        }
    }
</script>

<style scoped>

</style>
