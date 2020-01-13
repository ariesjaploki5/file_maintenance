<template>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Medical Supplies <sub>Homis</sub></div>
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>dmdcomb</th>
                                <th>dmdctr</th>
                                <th>Desc</th>
                                <th>Unit</th>
                                <th>Item ID</th>
                                <th>Item Desc</th>
                                <th>Unit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>dmdcomb</td>
                                <td>dmdctr</td>
                                <td>Desc</td>
                                <td>Unit</td>
                                <td>Item ID</td>
                                <td>Item Desc</td>
                                <td>Unit</td>
                                <td>Action</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
            item: {},
        }
    },
    methods:{
        get_items(){
            axios.get('../item').then(() => {
                
            });
        }
    },

}
</script>

<style>

</style>