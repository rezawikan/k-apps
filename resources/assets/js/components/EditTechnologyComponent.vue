<template>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Edit Technology</h5>
        </div>
        <div class="ibox-content">
          <div class="row">
            <div class="col-lg-12">
              <form class="form-horizontal" action="" method="POST">
                <input type="hidden" name="project_id">
                <div class="form-group">
                  <div class="col-lg-4 col-sm-4">
                    <label class="m-t">Technology Name</label>
                    <v-select :options="convertTovueOption(technologies)" v-model="technology_id"></v-select>
                    <!-- <select data-placeholder="Choose one" class="form-control chosen-select" v-model="technology_id">
                      <option value="">Select</option>
                      <option v-for="technology in technologies" :value="technology" :selected="current.technology_id == technology.id ">{{technology.name }} </option>
                    </select> -->
                    <span class="help-block m-b-none"></span>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <label class="m-t">Distribution Target</label>
                    <v-select label="name" :options="distribution_targets" v-model="distribution_target_id"></v-select>
                    <span class="help-block m-b-none"></span>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <label class="m-t">Distribution Unit</label>
                    <input id="distribution_unit" type="text" placeholder="Distribution Unit" class="form-control" v-model="distribution_unit">
                    <span class="help-block m-b-none"></span>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <label class="m-t">People Reached Multiplier</label>
                    <input  type="text" placeholder="People Reached" class="form-control" v-model="per_unit">
                    <span class="help-block m-b-none"></span>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <label class="m-t">Total Reached</label>
                    <input type="text" placeholder="Total Reached Multiplier" class="form-control" readonly="readonly" v-model="total_reach">
                    <span class="help-block m-b-none"></span>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <label class="m-t">Year</label>
                    <input type="text" placeholder="Year" class="form-control" v-model="year">
                    <span class="help-block m-b-none"></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-12 col-sm-12">
                    <button @click.prevent="updateTechnology()" class="btn btn-sm btn-primary">Save</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import 'vue-select/dist/vue-select.css';
export default {
  data() {
    return {
      'technologies': [],
      'distribution_targets': [],
      'technology_id': null,
      'distribution_target_id': null,
      'distribution_unit': '',
      'per_unit': '',
      'year': '',
      'multiplier': [],
      'current': []
    }
  },
  computed: {
    total_reach: function() {
      return this.distribution_unit * this.per_unit
    }
  },
  methods: {
    currentTechnology() {
      axios.get("/api/project-technology/"+this.$route.params.idp+"/"+this.$route.params.pivotID+"/list")
        .then(response => {
          this.current = response.data.data[0]
          this.technology_id = this.convertSelected(response.data.data[0].technology)
          this.distribution_target_id = this.convertDisTarget(response.data.data[0].distribution_target_id)
          this.distribution_unit = response.data.data[0].distribution_unit
          this.per_unit = response.data.data[0].per_unit
          this.year = response.data.data[0].year
        })
        .catch(response => console.log('error'));
    },
    getMultiplier() {
      axios.get('/api/technology/multiplier')
        .then(response => {
          this.multiplier = response.data.data
        })
        .catch(response => console.log('error'));
    },
    getTechnology() {
      axios.get('/api/technology/list')
        .then(response => {
          this.technologies = response.data.data
        })
        .catch(response => console.log('error'));

    },
    getDistributionTarget() {
      axios.get('/api/distribution-target/list')
        .then(response => {
          this.distribution_targets = response.data.data
        })
        .catch(response => console.log('error'));

    },
    convertDisTarget(value){
      let a = this.distribution_targets.map((x) => {
        if (x.id == value) {
            return x
        }
      })
      console.log(a.filter(Boolean)[0]);
      return a.filter(Boolean)[0]
    },
    convertSelected(value){
      return {
        label: value.name,
        code: value.id
      }
    },
    convertTovueOption(value){
      let arr = []
      value.forEach((x) => {
        arr.push({
          label: x.name,
          code: x.id
        })
      })
      return arr
    },
    getType(value) {
      return this.technologies.find((x) => {
        if (this.technology_id.code == x.id) {
            return x.type == value
        }
        return false
      })
    },
    getTotalReached() {
      if (this.distribution_target_id !== null && this.technology_id !== null) {
        this.multiplier.find((multi) => {
          if (multi.distribution_target_id === this.distribution_target_id.id && this.getType(multi.technology_type_id)) {
            return this.per_unit = multi.multiplier
          }
          this.per_unit = 0
        })
      }
    },
    updateTechnology() {
      axios.put("/api/project-technology/"+this.$route.params.idp+"/"+this.$route.params.pivotID+"/update", {
          current_tech_id: this.current.technology.id,
          technology_id: this.technology_id.code,
          distribution_target_id: this.distribution_target_id.id,
          per_unit: this.per_unit,
          distribution_unit: this.distribution_unit,
          total_reach: this.total_reach,
          year: this.year
        })
        .then(function(response) {
          window.location = "/impact-tracker/"+response.data.data[0].project_id+"/view";
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  },

  mounted() {
    this.getTechnology();
    this.getDistributionTarget();
    this.getMultiplier();
    this.currentTechnology();
  },

  watch: {
    'distribution_target_id': function() {
      this.getTotalReached();
      console.log('ganti distri');
    },
    'technology_id': function() {
      this.getTotalReached();
      console.log('ganti tech');
    }

  }
}
</script>
