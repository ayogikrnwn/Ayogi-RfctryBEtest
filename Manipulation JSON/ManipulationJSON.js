var inventory =
[
  {
    "inventory_id": 9382,
    "name": "Brown Chair",
    "type": "furniture",
    "tags": [
      "chair",
      "furniture",
      "brown"
    ],
    "purchased_at": 1579190471,
    "placement": {
      "room_id": 3,
      "name": "Meeting Room"
    }
  },
  {
    "inventory_id": 9380,
    "name": "Big Desk",
    "type": "furniture",
    "tags": [
      "desk",
      "furniture",
      "brown"
    ],
    "purchased_at": 1579190642,
    "placement": {
      "room_id": 3,
      "name": "Meeting Room"
    }
  },
  {
    "inventory_id": 2932,
    "name": "LG Monitor 50 inch",
    "type": "electronic",
    "tags": [
      "monitor"
    ],
    "purchased_at": 1579017842,
    "placement": {
      "room_id": 3,
      "name": "Lavender"
    }
  },
  {
    "inventory_id": 232,
    "name": "Sharp Pendingin Ruangan 2PK",
    "type": "electronic",
    "tags": [
      "ac"
    ],
    "purchased_at": 1578931442,
    "placement": {
      "room_id": 5,
      "name": "Dhanapala"
    }
  },
  {
    "inventory_id": 9382,
    "name": "Alat Makan",
    "type": "tableware",
    "tags": [
      "spoon",
      "fork",
      "tableware"
    ],
    "purchased_at": 1578672242,
    "placement": {
      "room_id": 10,
      "name": "Rajawali"
    }
  }
]

const pertanyaan1 = (data) => {
  let items = [];
  data.map((item, i) => {
    if (item.placement.name.toLowerCase() == 'meeting room') {
      items.push(item.name)
    }
  })
  return [items];
}

const pertanyaan2 = (data) => {
  let items = [];
  data.map((item, i) => {
    if (item.type.toLowerCase() == 'electronic') {
      items.push(item.name);
    }
  })
  return [items];
}

const pertanyaan3 = (data) => {
  let items = [];
  data.map((item, i) => {
    if (item.type.toLowerCase() == 'furniture') {
      items.push(item.name);
    }
  })
  return [items];
}

const pertanyaan4 = (data) => {
  let items = [];
  data.map((item, i) => {
    if (new Date(item.purchased_at * 1000).toString().substr(5, 10)
      == new Date('2020/01/16').toString().substr(5, 10)) {
      items.push(item.name);
    }
  })
  return [items];
}


const pertanyaan5 = (data) => {
  let items = [];
  data.map((item, i) => {
    var tags = item.tags;
    if (tags.includes('brown')) {
      items.push(item.name)
    }
  })
  return [items];
}
