# Star Wars API

This is implements the [Star Wars API](https://swapi.co/).
A web demo is available at [https://starwars.mattsplat.net/](https://starwars.mattsplat.net/).

## Dev Setup
composer install
php artisan serve
npm run dev


## API Routes

### Films

- [GET] /api/films

```json
{
    "count": 6,
    "next": null,
    "previous": null,
    "results": [
        {
            "id": "1",
            "title": "A New Hope",
            "episode_id": 4,
            "opening_crawl": "It is a period of civil war.\r\nRebel spaceships, striking\r\nfrom a hidden base, have won\r\ntheir first victory against\r\nthe evil Galactic Empire.\r\n\r\nDuring the battle, Rebel\r\nspies managed to steal secret\r\nplans to the Empire's\r\nultimate weapon, the DEATH\r\nSTAR, an armored space\r\nstation with enough power\r\nto destroy an entire planet.\r\n\r\nPursued by the Empire's\r\nsinister agents, Princess\r\nLeia races home aboard her\r\nstarship, custodian of the\r\nstolen plans that can save her\r\npeople and restore\r\nfreedom to the galaxy....",
            "director": "George Lucas",
            "producer": "Gary Kurtz, Rick McCallum",
            "release_date": "1977-05-25",
            "characters": [
                "1"
            ]
        },
        {
            "id": "3",
            "title": "Return of the Jedi",
            "episode_id": 6,
            "opening_crawl": "Luke Skywalker has returned to\r\nhis home planet of Tatooine in\r\nan attempt to rescue his\r\nfriend Han Solo from the\r\nclutches of the vile gangster\r\nJabba the Hutt.\r\n\r\nLittle does Luke know that the\r\nGALACTIC EMPIRE has secretly\r\nbegun construction on a new\r\narmored space station even\r\nmore powerful than the first\r\ndreaded Death Star.\r\n\r\nWhen completed, this ultimate\r\nweapon will spell certain doom\r\nfor the small band of rebels\r\nstruggling to restore freedom\r\nto the galaxy...",
            "director": "Richard Marquand",
            "producer": "Howard G. Kazanjian, George Lucas, Rick McCallum",
            "release_date": "1983-05-25",
            "characters": [
                "1",
                "2"
            ]
        }
    ]
}

```

- [GET] /api/films/:id

```json
{
    "id": "1",
    "title": "A New Hope",
    "episode_id": 4,
    "opening_crawl": "It is a period of civil war.\r\nRebel spaceships, striking\r\nfrom a hidden base, have won\r\ntheir first victory against\r\nthe evil Galactic Empire.\r\n\r\nDuring the battle, Rebel\r\nspies managed to steal secret\r\nplans to the Empire's\r\nultimate weapon, the DEATH\r\nSTAR, an armored space\r\nstation with enough power\r\nto destroy an entire planet.\r\n\r\nPursued by the Empire's\r\nsinister agents, Princess\r\nLeia races home aboard her\r\nstarship, custodian of the\r\nstolen plans that can save her\r\npeople and restore\r\nfreedom to the galaxy....",
    "director": "George Lucas",
    "producer": "Gary Kurtz, Rick McCallum",
    "release_date": "1977-05-25",
    "characters": [
        "1",
        "2",
        "3",
        "4"
    ]
}
```

- [GET] /api/films/:id/species

```json
[
    {
        "name": "Human",
        "classification": "mammal",
        "designation": "sentient",
        "average_height": "180",
        "skin_colors": "caucasian, black, asian, hispanic",
        "hair_colors": "blonde, brown, black, red",
        "eye_colors": "brown, blue, green, hazel, grey, amber",
        "average_lifespan": "120",
        "homeworld": "https://swapi.dev/api/planets/9/",
        "language": "Galactic Basic",
        "people": [
            "https://swapi.dev/api/people/66/",
            "https://swapi.dev/api/people/67/",
            "https://swapi.dev/api/people/68/",
            "https://swapi.dev/api/people/74/"
        ],
        "films": [
            "https://swapi.dev/api/films/1/",
            "https://swapi.dev/api/films/2/",
            "https://swapi.dev/api/films/3/",
            "https://swapi.dev/api/films/4/",
            "https://swapi.dev/api/films/5/",
            "https://swapi.dev/api/films/6/"
        ],
        "created": "2014-12-10T13:52:11.567000Z",
        "edited": "2014-12-20T21:36:42.136000Z",
        "url": "https://swapi.dev/api/species/1/"
    },
    {
        "name": "Droid",
        "classification": "artificial",
        "designation": "sentient",
        "average_height": "n/a",
        "skin_colors": "n/a",
        "hair_colors": "n/a",
        "eye_colors": "n/a",
        "average_lifespan": "indefinite",
        "homeworld": null,
        "language": "n/a",
        "people": [
            "https://swapi.dev/api/people/2/",
            "https://swapi.dev/api/people/3/",
            "https://swapi.dev/api/people/8/",
            "https://swapi.dev/api/people/23/"
        ],
        "films": [
            "https://swapi.dev/api/films/1/",
            "https://swapi.dev/api/films/2/",
            "https://swapi.dev/api/films/3/",
            "https://swapi.dev/api/films/4/",
            "https://swapi.dev/api/films/5/",
            "https://swapi.dev/api/films/6/"
        ],
        "created": "2014-12-10T15:16:16.259000Z",
        "edited": "2014-12-20T21:36:42.139000Z",
        "url": "https://swapi.dev/api/species/2/"
    }
]
```

### People

- [GET] /api/people

```json
{
    "count": 82,
    "next": "https://swapi.dev/api/people/?page=2",
    "previous": null,
    "results": [
        {
            "name": "Luke Skywalker",
            "height": "172",
            "mass": "77",
            "hair_color": "blond",
            "skin_color": "fair",
            "eye_color": "blue",
            "birth_year": "19BBY",
            "gender": "male",
            "id": "1"
        },
        {
            "name": "C-3PO",
            "height": "167",
            "mass": "75",
            "hair_color": "n/a",
            "skin_color": "gold",
            "eye_color": "yellow",
            "birth_year": "112BBY",
            "gender": "n/a",
            "id": "2"
        }
    ]
}
```

- [GET] /api/people/:id

```json
{
    "name": "Luke Skywalker",
    "height": "172",
    "mass": "77",
    "hair_color": "blond",
    "skin_color": "fair",
    "eye_color": "blue",
    "birth_year": "19BBY",
    "gender": "male",
    "id": "1"
}
```

- [GET] /api/people/:id/starships

```json
[
    {
        "name": "Imperial shuttle",
        "model": "Lambda-class T-4a shuttle",
        "manufacturer": "Sienar Fleet Systems",
        "cost_in_credits": "240000",
        "length": "20",
        "max_atmosphering_speed": "850",
        "crew": "6",
        "passengers": "20",
        "cargo_capacity": "80000",
        "consumables": "2 months",
        "hyperdrive_rating": "1.0",
        "MGLT": "50",
        "starship_class": "Armed government transport",
        "id": "22"
    },
    {
        "name": "X-wing",
        "model": "T-65 X-wing",
        "manufacturer": "Incom Corporation",
        "cost_in_credits": "149999",
        "length": "12.5",
        "max_atmosphering_speed": "1050",
        "crew": "1",
        "passengers": "0",
        "cargo_capacity": "110",
        "consumables": "1 week",
        "hyperdrive_rating": "1.0",
        "MGLT": "100",
        "starship_class": "Starfighter",
        "id": "12"
    }
]
```

### Planets

- [GET] /api/planets
```json
{
  "results": [
    {
      "name": "Tatooine",
      "rotation_period": "23",
      "orbital_period": "304",
      "diameter": "10465",
      "climate": "arid",
      "gravity": "1 standard",
      "terrain": "desert",
      "surface_water": "1",
      "population": "200000",
      "id": "1"
    },
    {
      "name": "Alderaan",
      "rotation_period": "24",
      "orbital_period": "364",
      "diameter": "12500",
      "climate": "temperate",
      "gravity": "1 standard",
      "terrain": "grasslands, mountains",
      "surface_water": "40",
      "population": "2000000000",
      "id": "2"
    },
    {
      "name": "Yavin IV",
      "rotation_period": "24",
      "orbital_period": "4818",
      "diameter": "10200",
      "climate": "temperate, tropical",
      "gravity": "1 standard",
      "terrain": "jungle, rainforests",
      "surface_water": "8",
      "population": "1000",
      "id": "3"
    }
  ]
}
```
- [GET] /api/planets/:id
```json
{
  "name": "Tatooine",
  "rotation_period": "23",
  "orbital_period": "304",
  "diameter": "10465",
  "climate": "arid",
  "gravity": "1 standard",
  "terrain": "desert",
  "surface_water": "1",
  "population": "200000",
  "id": "1"
}
```
- [GET] /api/planets/galaxy
```json
{
  "population": 1007536201000,
  "planets": 10
}
```
### Species

- [GET] /api/species
```json
{
  "count": 37,
  "next": "https://swapi.dev/api/species/?page=2",
  "previous": null,
  "results": [
    {
      "name": "Human",
      "classification": "mammal",
      "designation": "sentient",
      "average_height": "180",
      "skin_colors": "caucasian, black, asian, hispanic",
      "hair_colors": "blonde, brown, black, red",
      "eye_colors": "brown, blue, green, hazel, grey, amber",
      "average_lifespan": "120",
      "homeworld": "https://swapi.dev/api/planets/9/",
      "language": "Galactic Basic",
      "id": "1"
    },
    {
      "name": "Droid",
      "classification": "artificial",
      "designation": "sentient",
      "average_height": "n/a",
      "skin_colors": "n/a",
      "hair_colors": "n/a",
      "eye_colors": "n/a",
      "average_lifespan": "indefinite",
      "homeworld": null,
      "language": "n/a",
      "id": "2"
    }
  ]
}
```
- [GET] /api/species/:id
```json
{
  "name": "Human",
  "classification": "mammal",
  "designation": "sentient",
  "average_height": "180",
  "skin_colors": "caucasian, black, asian, hispanic",
  "hair_colors": "blonde, brown, black, red",
  "eye_colors": "brown, blue, green, hazel, grey, amber",
  "average_lifespan": "120",
  "homeworld": "https://swapi.dev/api/planets/9/",
  "language": "Galactic Basic",
  "id": "1"
}
```
- [GET] /api/species/:id/planet
```json
{
  "name": "Tatooine",
  "rotation_period": "23",
  "orbital_period": "304",
  "diameter": "10465",
  "climate": "arid",
  "gravity": "1 standard",
  "terrain": "desert",
  "surface_water": "1",
  "population": "200000",
  "id": "1"
}
```
