<template>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Add Technology</h5>
        </div>
        <div class="ibox-content">
          <div class="row">
            <div class="col-lg-12">
              <form class="form-horizontal" action="" method="POST">
                <input type="hidden" name="project_id">
                <div class="form-group">
                  <div class="col-lg-4 col-sm-4">
                    <label class="m-t">Technology Name</label>
                    <select data-placeholder="Choose one" class="form-control chosen-select" v-model="technology_id">
                      <option value="">Select</option>
                      <option v-for="technology in technologies" :value="technology">{{technology.name }}</option>
                    </select>
                    <span class="help-block m-b-none"></span>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <label class="m-t">Distribution Target</label>
                    <select data-placeholder="Choose one" class="form-control chosen-select" v-model="distribution_target_id">
                      <option value="">Select</option>
                      <option v-for="distribution_target in distribution_targets" :value="distribution_target.id">{{distribution_target.name }}</option>
                    </select>
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
                    <button @click.prevent="saveTechnology()" class="btn btn-sm btn-primary">Save</button>
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
export default {
  data() {
    return {
      'technologies': [],
      'distribution_targets': [],
      'technology_id': '',
      'distribution_target_id': '',
      'distribution_unit': '',
      'per_unit': '',
      'year': '',
      'multiplier': [],
    }
  },
  computed: {
    total_reach: function() {
      return this.distribution_unit * this.per_unit
    }
  },
  methods: {
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
    getTotalReached() {
      if (this.distribution_target_id != '' && this.technology_id != '') {
        this.multiplier.find((multi) => {
          if (multi.distribution_target_id === this.distribution_target_id && multi.technology_type_id === this.technology_id.type) {
            this.per_unit = multi.multiplier
          }
        })

      }
    },
    saveTechnology() {
      axios.post('/api/project-technology', {
          project_id: this.$route.params.id,
          technology_id: this.technology_id.id,
          distribution_target_id: this.distribution_target_id,
          per_unit: this.per_unit,
          distribution_unit: this.distribution_unit,
          total_reach: this.total_reach,
          year: this.year
        })
        .then(function(response) {
          window.location = "/impact-tracker/" + response.data.project_id + "/view";
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  },
  mounted() {
    this.getMultiplier();
    this.getTechnology();
    this.getDistributionTarget();
  },
  watch: {
    'distribution_target_id': function() {
      this.getTotalReached();
    },
    'technology_id': function() {
      this.getTotalReached();
    }

  }
}
</script>
