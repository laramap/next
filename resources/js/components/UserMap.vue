<template>
    <div>
        <div id="map" class="map"></div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                map: null,
                users: []
            }
        },

        mounted() {
            this.createMap();
        },

        methods: {
            createMap() {
                window.mapboxgl.accessToken = 'pk.eyJ1Ijoid2FydG5lcmlvIiwiYSI6ImNrNHkyanZkYzA2cHEzbG82aWI4aXAxb2cifQ.dqf6bWma09cDWqX58Otplg';
                this.map = new window.mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/mapbox/streets-v11',
                    zoom: 1.5
                });

                this.map.addControl(new mapboxgl.NavigationControl());

                this.getUsers();
            },

            async getUsers() {
                let self = this;
                await axios.get('/api/users')
                    .then(function (response) {
                        self.users = response.data.data;
                        self.setMarkers();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            setMarkers() {
                window.collect(this.users).each((user) => {
                    let popup = new mapboxgl.Popup()
                        .setHTML("<a href='/u/" + user.name + "'>" + user.name + "</a>")
                        .setMaxWidth("300px")
                        .addTo(this.map);

                    let marker = new mapboxgl.Marker()
                        .setLngLat([user.longitude, user.latitude])
                        .setPopup(popup)
                        .addTo(this.map);
                })
            }

        }
    }
</script>

<style scoped>

</style>
