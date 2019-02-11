<template>
    <div class="container">
        <div class="row justify-content-center">
            <el-form :label-position="labelPosition" label="Filter" ref="form" :model="form" label-width="120px">
                <el-form-item label="Name">
                    <el-input v-model="form.name"></el-input>
                </el-form-item>
                <div class="row">
                    <div class="col">
                        <el-form-item label="Price">
                            <el-input-number v-model="form.price" controls-position="right" :min="1000"></el-input-number>
                        </el-form-item>
                    </div>
                    <div class="col">
                        <el-form-item label="Bedrooms">
                            <el-input-number v-model="form.bedrooms" controls-position="right"
                                             :min="1"></el-input-number>
                        </el-form-item>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <el-form-item label="Bathrooms">
                            <el-input-number v-model="form.bathrooms" controls-position="right"
                                             :min="1"></el-input-number>
                        </el-form-item>
                    </div>
                    <div class="col">
                        <el-form-item label="Storeys">
                            <el-input-number v-model="form.storeys" controls-position="right"
                                             :min="1"></el-input-number>
                        </el-form-item>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <el-form-item label="Garages">
                            <el-input-number v-model="form.garages" controls-position="right"
                                             :min="0"></el-input-number>
                        </el-form-item>
                    </div>
                    <div class="col">
                        <el-form-item>
                            <el-button type="primary" icon="el-icon-search" class="search" @click="onSubmit">Search</el-button>
                        </el-form-item>
                    </div>
                </div>
            </el-form>
        </div>
        <el-table
            v-loading="loading"
            :data="tableData"
            style="width: 100%"
            v-if="tableData.length > 0">
            <el-table-column
                prop="name"
                label="Name"
                width="180">
            </el-table-column>
            <el-table-column
                prop="price"
                label="Price"
                width="180">
            </el-table-column>
            <el-table-column
                prop="bedrooms"
                label="Bedrooms"
                width="180">
            </el-table-column>
            <el-table-column
                prop="bathrooms"
                label="Bathrooms"
                width="180">
            </el-table-column>
            <el-table-column
                prop="storeys"
                label="Storeys"
                width="180">
            </el-table-column>
            <el-table-column
                prop="garages"
                label="Garages">
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
    export default {
        name: "ExampleComponent",
        data() {
            return {
                labelPosition: 'top',
                tableData:[],
                loading:false,
                form: {
                    name: null,
                    price: 1000,
                    bedrooms: 1,
                    bathrooms: 1,
                    storeys: 1,
                    garages: 0,
                }
            }
        },
        methods: {
            onSubmit() {
                this.loading = true;
                axios.post('/api/search', {
                    name: this.form.name,
                    price: this.form.price,
                    bedrooms: this.form.bedrooms,
                    bathrooms: this.form.bathrooms,
                    storeys: this.form.storeys,
                    garages: this.form.garages,
                }).then(response =>{
                    if (response.data.success){
                     this.tableData = response.data.data;
                     this.loading = false;
                    } else {
                        this.tableData = [];
                        this.loading = false;
                    }
                });
            }
        }
    }
</script>
