<template>
  <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-dark text-white">
                <div class="card-header">
                    <div class="row">
                        <div class="col-auto">
                            <h4>Medical Supplies <sub>Homis</sub></h4>
                        </div>
                        <div class="col-auto">
                            Search:
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control form-control-sm" v-model="word" @keyup="get_homis_mss()">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-hover table-dark">
                        <thead>
                            <tr>
                                <th width="15%">ID</th>
                                <th width="25%">Desc</th>
                                <th>Unit</th>
                                <th width="10%">Item ID</th>
                                <th width="25%">Item Desc</th>
                                <th>Unit</th>
                                <th width="5%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(ms, index) in homis_mss" :key="index">
                                <td>{{ ms.cl1comb }} - {{ ms.cl2comb }}</td>
                                <td>{{ ms.homis_desc }}</td>
                                <td>{{ ms.uocomb }}</td>
                                <td>{{ ms.item_id }}</td>
                                <td>{{ ms.item_desc }}</td>
                                <td>{{ ms.unit_desc }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" @click="edit_homis_ms(ms)">edit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="msModal" tabindex="-1" role="dialog" aria-labelledby="msModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="msModalLabel">Edit Medical Supplies</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="update_homis_ms()">
                <div class="modal-body">

                    <div class="form-group row">
                        <div class="col-3 text-right">
                            Homis Description: 
                        </div>
                        <div class="col">
                            <span>{{ homis_ms.homis_desc }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3 text-right">
                            Item:
                        </div>
                        <div class="col">
                            <select class="form-control form-control-sm" v-model="homis_ms.item_id">
                                <option v-for="item in items" :key="item.item_id" :value="item.item_id">{{ item.item_desc }} {{ item.unit_desc }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return {
            items: [],
            categories: [],
            category_id: '',
            homis_mss: [],
            homis_ms: {},
            word: '',
        }
    },
    methods:{
        get_all(){
            this.get_items();
            this.get_homis_mss();
        },
        get_homis_mss(){
            axios.get('../homis_ms?word='+this.word).then(({data}) => {
                this.homis_mss = data;
            }).catch(() => {

            });
        },
        get_items(){
            axios.get('../item?category_id='+2).then(({data}) => {
                this.items = data;
            }).catch(() => {

            });
        },
        get_categories(){
            axios.get('../category').then(({data}) => {
                this.categories = data;
            }).catch(() => {

            });
        },
        edit_homis_ms(homis_ms){
            this.homis_ms = homis_ms;
            $("#msModal").modal("show");
        },
        update_homis_ms(){
            axios.post('homis_ms',{
                item_id: this.homis_ms.item_id,
                cl2comb: this.homis_ms.cl2comb,
                cl1comb: this.homis_ms.cl1comb
            }).then(() => {
                $("#msModal").modal("hide");
                this.get_homis_mss();
            })
        },
        remove_item_id(){

        }
    },
    created(){
        this.get_all();
        this.get_categories();
    }

}
</script>

<style scoped>

</style>