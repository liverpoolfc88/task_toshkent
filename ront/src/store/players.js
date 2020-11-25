export default {
    state: {
        players:[
            {
                id: 1,
                name: 'Muhammed Salah',
                age:28,
                imageId: 1,
                number:11,
                rating: 4,
                ratingCOunt: 100,
                positsiya:['ss', 'cf', 'rfs'],
                youtube_play_id: 'kjhgkhgk'
            },
            {
                id: 2,
                name: 'Saudio Mane',
                age:28,
                imageId: 2,
                number: 10,
                rating: 4.5,
                ratingCOunt: 85,
                positsiya:['ss', 'lfs'],
                youtube_play_id: 'kkjhjhgkhgk'
            },
            {
                id: 3,
                name: 'Roberto Firminho',
                age: 28,
                imageId: 3,
                number: 9,
                rating: 4,
                ratingCOunt: 80,
                positsiya:['ss', 'cf'],
                youtube_play_id: 'kjhoiouihgkhgk'
            },
            {
                id: 4,
                name: 'Jordan Henderson',
                age: 30,
                imageId: 4,
                number: 14,
                rating: 3.5,
                ratingCOunt: 75,
                positsiya:['amf', 'cmf'],
                youtube_play_id: 'kjhgkigoiughgk'
            }
        ]
    },
    mutation: {
        SET_PLAYERS(state, payload) {
            state.players = payload
        },
    },
    getters:{
        getPlayers:(state) => state.players,
    }
}