<template>
    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
    
        <div class="card 
            text-center 
            shadow 
            none-border">
            <div class="card-header">
                <span>사창리</span>
                <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-arrow-right text-tomato" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L12.793 8l-2.647-2.646a.5.5 0 0 1 0-.708z"/>
                    <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5H13a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8z"/>
                </svg>
                <span>{{ terminal.name }}</span>
            </div>
           
            <ul class="list-group list-group-flush">
                <li v-if="!schedules" 
                    class="list-group-item axios p-4"></li>
                <li v-for="(schedule, index) in schedules"
                    :key="schedule.id"
                    class="list-group-item d-flex justify-content-between align-items-center">        
                    <div class="dropdown">
                        <button class="btn dropdown-toggle btn-sm"
                            :class="{'btn-primary': schedule.use, 'btn-secondary': !schedule.use}"
                            type="button" 
                            id="dropdownMenuButton" 
                            data-toggle="dropdown" 
                            aria-haspopup="true" 
                            aria-expanded="false">
                            {{ useYn(schedule.use) }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" @click="setUse(index, 1)">사용</a>
                            <a class="dropdown-item" @click="setUse(index, 0)">중지</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">삭제</a>
                        </div>
                    </div>
                    {{ schedule.time }}
                </li>
                <li v-if="schedules" 
                    class="list-group-item">
                    <div class="input-group">
                        <input type="text" 
                            class="form-control" 
                            placeholder="00:00">
                        <div class="input-group-append">
                            <button class="btn 
                                btn-outline-secondary" 
                                type="button">출발시간 추가</button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['terminal'],
        created() {
            this.getSchedules()
        },
        data() {
            return {
                schedules: false
            }
        },
        watch: {
            'terminal.id' () {
                this.getSchedules()
            }
        },
        methods: {
            getSchedules() {
                this.schedules = false
                axios.get(`/to-schedules/${this.terminal.id}`)
                .then(response => {
                    this.schedules = response.data
                })
            },
            setUse(index, use) {
                axios.post('/set-use-schedule', {
                    id: this.schedules[index].id,
                    use: use
                })
                .then(response => {
                    this.schedules[index].use = use
                })
            },
            useYn(use) {
                return use === 1 ? '사용' : '중지'
            }
        }
    }
</script>
